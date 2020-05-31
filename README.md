# DocCloud
Final degree project of the higher degree course of Web Application Development.

## Built With

* [Laravel](https://laravel.com/) 
* [Boostrap](https://getbootstrap.com/)
* [ChartJs](https://www.chartjs.org/)
* [Viewer JS](http://viewerjs.org/)
* [jQuery](https://jquery.com/)
* [AdminLte](https://adminlte.io/themes/AdminLTE/index2.html)
* [ElaAdmin](https://github.com/puikinsh/ElaAdmin)
* [Telegram](https://core.telegram.org/)
* [Paypal](https://developer.paypal.com/docs/api/overview/)

## Deployment
### With Docker & Laradock

Install Laradock.
<pre><code class="language-shell">git clone https://github.com/Laradock/laradock.git</code></pre>

Install Doccloud.
<pre><code class="language-shell">git clone https://github.com/apozo93/DocCloud.git</code></pre>

Up necessary containers.
<pre><code class="language-shell">cd laradock
docker-compose up nginx mysql workspace
</code></pre>

Configure Database. Enter in mysql container.
<pre><code class="language-shell">docker exec -it laradock_mysql_1 mysql -u root -p</code></pre>
The default root password in laradock is 'root'.

Create user. Give user privileges on doocloud database.
<pre><code class="language-sql">CREATE DATABASE doccloud;
CREATE USER 'user'@'localhost' IDENTIFIED BY 'secret';
GRANT ALL PRIVILEGES ON doccloud.* TO 'user'@'localhost' WITH GRANT OPTION;
</code></pre>

Add servername to your host file /etc/hosts.
<pre><code class="language-shell">sudo 127.0.0.1  doccloud.com;</code></pre>

Add .conf file to nginx.
<pre><code class="language-shell">cd laradock/nginx/sites/
cp laravel.conf.example doccloud.conf
</code></pre>

Edit doccloud.conf and replace the following lines
<pre><code class="language-shell">server_name doccloud.com www.doccloud.com;
root /var/www/doccloud/public;
</code></pre>

Restart containers in laradock directory root.
<pre><code class="language-shell">docker-compose stop;
docker-compose up nginx mysql workspace;
</code></pre>

### Laravel Migrate & Seeding Doccloud Database
Go inside workspace
<pre><code class="language-shell">docker-compose exec --user=laradock workspace bash</code></pre>
<pre><code class="language-shell">cd doccloud
cp env-example .env
php artisan migrate:fresh --seed
</code></pre>

## Authors

* **Alfonso Pozo** - *Initial work* [apozo93](https://github.com/apozo93)
https://www.linkedin.com/in/alfonso-pozo/

## ScreenShots

### Admin Panel
<img src="/storage/images/3.png">
<img src="/storage/images/4.png">
<img src="/storage/images/7.png">

### Graphs
<img src="/storage/images/9.png">
<img src="/storage/images/11.png">

### Mailing
<img src="/storage/images/12.png">
<img src="/storage/images/13.png">

### Timeline
<img src="/storage/images/14.png">