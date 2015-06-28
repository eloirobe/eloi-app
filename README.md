
#Eloi Framework App

## Start using

<pre><code>
git clone https://github.com/eloirobe/eloi-app.git
composer update
</code></pre>

## Apache Configuration

- Apache Production Configuration file:


    <pre><code>
     <VirtualHost *:80>
         ServerName eloi.fw
         ServerAlias www.eloi.fw
         DocumentRoot /var/www/mpwar2015/eloi-app/web
         <Directory /var/www/mpwar2015/eloi-app/web/>
             Options Indexes FollowSymLinks MultiViews
             AllowOverride None
             Order allow,deny
             allow from all
             <IfModule mod_rewrite.c>
                 RewriteEngine On
                 RewriteCond %{REQUEST_FILENAME} !-f
                 RewriteRule ^(.*)$ /index.php [QSA,L]
                 RewriteEngine On
                 SetEnv ENV "PROD"
            </IfModule>
         </Directory>
     </VirtualHost>
     </code>
    </pre>

- Apache Development Configuration file:

    <pre><code>
     <VirtualHost *:80>
         ServerName eloidev.fw
         ServerAlias www.eloidev.fw
         DocumentRoot /var/www/mpwar2015/eloi-app/web
         <Directory /var/www/mpwar2015/eloi-app/web/>
             Options Indexes FollowSymLinks MultiViews
             AllowOverride None
             Order allow,deny
             allow from all
             <IfModule mod_rewrite.c>
                 RewriteEngine On
                 RewriteCond %{REQUEST_FILENAME} !-f
                 RewriteRule ^(.*)$ /index_dev.php [QSA,L]
                 RewriteEngine On
            </IfModule>
         </Directory>
     </VirtualHost>
     </code>
    </pre>

## Database

- Download sakila database
<pre><code>
wget http://downloads.mysql.com/docs/sakila-db.tar.gz
</pre></code>

- Uncompress
<pre><code>
tar -xzvf sakila-db.tar.gz
</pre></code>

- Copy to mysql
<pre><code>
mysql -u root -p
mysql> SOURCE ./sakila-db/sakila-schema.sql;
mysql> SOURCE ./sakila-db/sakila-data.sql;
</code></pre>

- For dev you can copy this database to dev database
<pre><code>
mysqldump -u root -p sakila > dump.sql
mysqladmin -u root -p create sakila_dev
mysqldump -u root -p sakila_dev < dump.sql 
</code></pre>

## Demo web app
<pre><code>
http://eloi.fw/index.php/some-page
http://eloi.fw/index.php/some/theuser/page/3
</code></pre>
