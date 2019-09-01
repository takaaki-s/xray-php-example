## X-Rayの利用準備

X-Rayにデータを送信するために、SDKを利用しますがIAMのcredentialも必要になります。  
credentialを設定する方法はいくつかありますが、今回はaws cliを使います。  

## 開発環境の起動

開発環境はDockerで構築されていますので、  
あらかじめDockerとDocker Composeをインストールしておきます。  

```shell script
$ docker --version
Docker version 19.03.1, build 74b1e89

$ docker-compose --version
docker-compose version 1.24.1, build 4667896b
```

### Dockerコンテナの起動

`docker-compose.yml`にコンテナの設定が定義されていますので、  
下記コマンドを実行して少し待てば、開発環境が起動します。

```shell script
docker-compose up -d
```

### 初期設定

開発環境の初回起動時にはまだ、ライブラリや環境設定ファイルがインストールされていません。  
ですので、１度だけ下記コマンドを実行して  
起動したDockerコンテナで、ライブラリのインストールと、  
設定ファイルの構築を行うためのスクリプトを実行します。

```shell script
bash init_development.sh
```

この作業は初回起動時や、環境の再構築時にのみ必要になります。  
2回目の起動時には不要です。

### Dockerコンテナの終了と削除

開発環境が不要になった場合は、下記コマンドを実行すれば  
コンテナを停止＆削除します。

```shell script
docker-compose down
```

### コンテナのログ確認

コンテナのログは下記コマンドで確認できます

```shell script
docker-compose logs
```

コンテナ単位でログを確認したい場合は、`docker-compose logs <サービス名>`で確認できます。  
  
phpサービスのログを見たい場合のコマンド

```shell script
docker-compose logs php
```

継続的にログを見たい場合は`-f`オプションを使用します。

```shell script
docker-compose logs -f
```

詳しくはDocker Composeのヘルプを参照してください。
