## STRAAM Dashbboard Dev Installation

Prerequisite:
1. PHP v8.1 or higher
2. Composer v2
3. Node v21.1 or higher 
4. NPM v10.2 or higher
5. Docker Desktop


``````
sudo apt-get update
``````

``````
sudo apt-get install composer nginx redis php-fpm php-xml php-curl php-zip php-intl php-mbstring php-pgsql php-pear php-dev libhiredis-dev -y
``````

Install phpredis vi pecl

```
sudo pecl install redis
```

Update php.ini
```
echo "extension=redis.so" | sudo tee -a /etc/php/{your_php_version}/cli/conf.d/20-redis.ini

```

Install NVM
```
curl https://raw.githubusercontent.com/creationix/nvm/master/install.sh | bash 
source .profile

```

copy this to .bashrc

export NVM_DIR="$HOME/.nvm"
[ -s "$NVM_DIR/nvm.sh" ] && \. "$NVM_DIR/nvm.sh"  # This loads nvm

Install Node
```
nvm install 21.2
```

fix permissions on /var/www/html
```
sudo chown -R www-data:www-data /var/www
sudo chmod -R g+w /var/www
```

Add user to www-data group in /etc/group.  You must log out and log back in.


Clone the repository on your local:
```
cd /var/www/; git clone git@github.com:turkois-design/straam-dashboard.git
sudo chown -R www-data:www-data /var/www
sudo chmod -R g+w /var/www
```
Then navigate to the project root copy the environment variables:
```
cd straam-dashboard && cp .env.example .env
```
Run composer
```
composer update; composer i
``````
Create an app key:
```
php artisan key:generate
```
Then install and NPM packages:
```
npm i
npm run Build
```

### Local install with docker

Install docker
```
sudo apt-get install docker.io
sudo usermod -aG docker username
```

Run docker mysql
```

docker run --name postgres -e POSTGRES_PASSWORD=laravel -v postgres:/var/lib/postgres -p 5432:5432 -d postgres

```

Configure nginx
```
       root /var/www/html/straam-dashboard/public;

        # Add index.php to the list if you are using PHP
        #index index.html index.htm index.nginx-debian.html;
        index index.php index.html index.htm index.nginx-debian.html;

        server_name <hostname>;



        location / {
            try_files $uri $uri/ /index.php?$query_string;
        }

        location ~ \.php$ {
            include snippets/fastcgi-php.conf;
            fastcgi_pass unix:/var/run/php/php8.2-fpm.sock; # Adjust the PHP version and socket path
            fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
            fastcgi_param APP_ENV local;
            include fastcgi_params;
            proxy_set_header Host $host;
            proxy_set_header X-Real-IP $remote_addr;
            proxy_set_header X-Forwarded-For $proxy_add_x_forwarded_for;
            proxy_set_header X-Forwarded-Proto $scheme;
        }

```

Restart services

```
sudo systemctl restart php8.1-fpm.service
sudo systemctl restart nginx
```

#### For local dev

Since we're using (Laravel Sail)[https://laravel.com/docs/10.x/sail] for our setup, you can (create an alias)[https://laravel.com/docs/10.x/sail#configuring-a-shell-alias] on your local since `sail` commands are invoked using the `vendor/bin/sail` script.
Once setup build and run the Docker images:
```
sail build --no-cache && sail up -d
```
This should build and start the following images to start dev environment:

<img src="https://github.com/turkois-design/straam-dashboard/assets/140560769/fdc2c73a-b321-4999-8f73-59ebb84e22c5" width="100%" height="100%" />
