<?php

namespace App\Http\Middleware;

use Closure;
use Pkerrigan\Xray\Submission\DaemonSegmentSubmitter;
use Pkerrigan\Xray\Trace;
use App\Lib\MySqlSegment;
use Illuminate\Support\Facades\DB;

class XrayCapture
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        Trace::getInstance()
            ->setTraceHeader($_SERVER['HTTP_X_AMZN_TRACE_ID'] ?? null)
            ->setName('app.example.com')
            ->setUrl($_SERVER['REQUEST_URI'])
            ->setMethod($_SERVER['REQUEST_METHOD'])
            ->begin(100);

        DB::listen(function ($query) {
            $sql = $query->sql;
            foreach ($query->bindings as $value) {
                $sql = preg_replace("/\?/", $value, $sql, 1);
            }

            Trace::getInstance()
                ->getCurrentSegment()
                ->addSubsegment(
                    (new MySqlSegment())
                        ->setName('db.example.com')
                        ->setDatabaseType('MySQL')
                        ->setQuery($sql)    // Make sure to remove sensitive data before passing in a query
                        ->begin()
                        ->end($query->time / 1000)
                );
        });

        return $next($request);
    }

    public function terminate($request, $response)
    {
        Trace::getInstance()
            ->end()
            ->setResponseCode(http_response_code())
            ->submit(new DaemonSegmentSubmitter("xrayd"));
    }
}
