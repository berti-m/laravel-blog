<h1 style="text-align: center;">Laravel blog</h1>
<p>This is a Laravel Blog which is made as a template to build on.</p>
<p>How to get it working:</p>
<ul>
<li>Install <a href="https://getcomposer.org/" target="_blank">Composer</a></li>
<li>Clone this repo</li>
<li>Enter to local repo clone folder and run: <strong>composer install</strong></li>
<li>It runs by default with <span style="color: #ff0000;"><a style="color: #ff0000;" href="https://www.sqlite.org/index.html" target="_blank"><strong>SqLite</strong></a></span> so if you want to use it first <strong>install it</strong>
<ul>
<li>Create new empty file <strong>/database/database.sqlite</strong></li>
<li>Change database path in your .env file to be full path to your local file (<strong>ex. DB_DATABASE=/home/berti/laravel-development/blog/database/database.sqlite</strong>)</li>
</ul>
</li>
<li>Nothing stops you from using some other database (refer to laravel manual)</li>
<li>To init posts in database run: <strong>php artisan migrate:fresh</strong></li>
<li>To make storage available for uploading thumbnails run: <strong>php artisan storage:link</strong></li>
<li>To start development server: <strong>php artisan serve</strong></li>
</ul>

<p>To make some user <strong>admin</strong> (can publish posts, create categories etc.) go to root folder, run <strong>php artisan tinker</strong> and then run: <strong>User::where('username', '#enterhereyourusername')->increment('is_admin', 1)</strong></p>
