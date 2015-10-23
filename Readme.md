# mySong, a Symfony CMS attempt

## INSTALLATION

1. Clone the repository

```
git clone https://github.com/loispuig/mysong.git mysong && cd mysong
```

2. Answer the setup questions

If you plan to use mysql

```
> database_driver: pdo_mysql
> database_path: null
```

3. Initiate the project

```
php app/console doctrine:database:create
php app/console doctrine:phpcr:init:dbal
php app/console doctrine:phpcr:repository:init
php app/console doctrine:phpcr:fixtures:load
php app/console doctrine:schema:update --force
php app/console doctrine:fixtures:load
php app/console assets:install --symlink
php app/console --env=prod assetic:dump
php app/console cache:clear --no-warmup
```

4. URLs

* SonataAdmin : /admin
* SonataUserProfile : /profile