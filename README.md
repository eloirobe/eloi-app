
#Eloi Framework App

## Start using

<pre><code>
git clone https://github.com/eloirobe/eloi-app.git
composer update
</code></pre>

## Apache Configuration

- Apache Production Configuration file:

```apacheconf
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
```

- Apache Development Configuration fil:

```apacheconf
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
```

## Database

- Download sakila database
```bash
wget http://downloads.mysql.com/docs/sakila-db.tar.gz
```

- Uncompress
```bash
tar -xzvf sakila-db.tar.gz
```

- Copy to mysql
```bash
mysql -u root -p
mysql> SOURCE ./sakila-db/sakila-schema.sql;
mysql> SOURCE ./sakila-db/sakila-data.sql;
```

- For dev you can copy this database to dev database
```bash
mysqldump -u root -p sakila > dump.sql
mysqladmin -u root -p create sakila_dev
mysqldump -u root -p sakila_dev < dump.sql 
```

## Demo web app

http://eloi.fw/index.php/some-page

http://eloi.fw/index.php/some/theuser/page/3

