<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>AWS X-Rayテスト</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.4.2/dist/semantic.min.js"></script>
</head>
<body>
<div class="ui container">
    <h1>Search Book List</h1>
    <div class="ui divider"></div>
    <div class="ui equal width form">
        <form>
            <div class="fields">
                <div class="field">
                    <label>Author</label>
                    <input type="text" placeholder="Author" name="author" value="{{ $author }}">
                </div>
                <div class="field">
                    <label>Title</label>
                    <input type="text" placeholder="Title" name="title" value="{{ $title }}">
                </div>
            </div>
            <button class="ui button blue" type="submit">Search</button>
        </form>
    </div>
    <div class="ui divider"></div>
    <table class="ui red very basic table">
        <thead>
        <tr>
            <th>Title</th>
            <th class="right aligned">Author</th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td class="right aligned">{{ $book->author }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
