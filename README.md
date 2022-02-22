# Name
お店予約アプリケーションのバックエンドを構築する
  
# Installation
以下、gitをインストールしてあること、MySQLのインストール&設定、  
PHP(本アプリのversionは7.4.24)が終わっていることを前提に進めます。  
(MySQLのユーザー名とパスワードはrootとする)
すでにインストールされている場合は飛ばす場所を  
(*)で示しました。
  
【バックエンド環境構築】  
MySQLにてデータベースを作成  
コマンドプロンプト、もしくはターミナルを起動し、ディレクトリを移動  
Macの場合  
cd /Applications/MAMP/Library/bin/  
Windowsの場合  
cd C:\xampp\mysql\bin  
  
MySQLに接続。パスワードはrootを入力。  
mysql -u root -p  
rootを入力、Enter  
  
データベースを作成  
CREATE DATABASE backenddb;
  
次にバックエンドを構築していきます  
  
新たにコマンドプロンプト、もしくはターミナルを起動  
htdocsへ移動  
Macの場合  
cd /Applications/MAMP/htdocs  
Windowsの場合  
cd C:\xampp\htdocs  
  
GitHubからクローンし、フォルダに移動  
git clone https://github.com/ryuuho01/back-end.git  
cd back-end  
  
(*)Composerをインストールされていない方  
curl -sS https://getcomposer.org/installer | php  
sudo mv composer.phar /usr/local/bin/composer  
chmod a+x /usr/local/bin/composer  
  
Laravel(8.73.0)をインストール  
composer install  
  
.envの作成  
cp .env.example .env  
vi .env  
  
以下の件今日変数に編集し、  
DB_DATABASE=backenddb  
DB_PASSWORD=root  
QUEUE_CONNECTION=database  
MAIL_MAILER=log  
  
以下の環境変数を追加する  
QUEUE_DRIVER=database  
  
laravel.logを追加  
touch storage/logs/laravel.log
  
JWTの設定  
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"  
php artisan jwt:secret  
  
Storageをリンクさせる  
php artisan storage:link  
  
keyの作成  
php artisan key:generate  
  
キャッシュのクリア  
php artisan config:clear  
  
マイグレーションとシーディングの実行  
php artisan migrate --seed  
  
サーバーを起動  
php artisan serve  
  
最後にキューのワーカを起動します
  
新たにコマンドプロンプト、もしくはターミナルを起動  
ディレクトリ移動
Macの場合  
cd /Applications/MAMP/htdocs/back-end  
Windowsの場合  
cd C:\xampp\mysql\bin\back-end  
  
キューのワーカを実行  
php artisan queue:work  
  