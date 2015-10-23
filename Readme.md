# mySong, a Symfony CMS attempt

## INSTALLATION

1. Clone the repository

```
git clone https://github.com/loispuig/mysong.git mysong && cd mysong
```

2. Install packages using composer

```
composer self-update && composer install
```

Then answer the setup questions.
If you plan to use mysql :

```
> database_driver: pdo_mysql
> database_path: null
```

4. URLs

* SonataAdmin : /admin
* SonataUserProfile : /profile