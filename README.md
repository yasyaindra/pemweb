# STEP MAKE A FOLDER

# HOW TO RUN

```zsh
docker-compose up -d --build
```

# EXECUTE CONTAINER

```zsh
docker exec -it pemweb bash
```

# HOW TO MAKE A PROJECT IN SRC

```php
composer install
```

# SETTING UP .ENV

```zsh
cp .env.example .env
```

```txt
DB_CONNECTION=mysql
DB_HOST=nama container di docker
DB_PORT=3306
DB_DATABASE=buat dulu databasenya
DB_USERNAME=
DB_PASSWORD=
```

```php
php artisan migrate:fresh --seed
```

# GENERATE KEY

```php
php artisan key:generate
```
