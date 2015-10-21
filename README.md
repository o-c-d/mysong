# Symfony CMF Standard Edition

[![Build Status](https://secure.travis-ci.org/symfony-cmf/standard-edition.png)](http://travis-ci.org/symfony-cmf/standard-edition)
[![Latest Stable Version](https://poser.pugx.org/symfony-cmf/standard-edition/version.png)](https://packagist.org/packages/symfony-cmf/standard-edition)
[![Total Downloads](https://poser.pugx.org/symfony-cmf/standard-edition/d/total.png)](https://packagist.org/packages/symfony-cmf/standard-edition)

The Symfony CMF Standard Edition (SE) is a distribution of the
[Symfony Content Management Framework (CMF)](http://cmf.symfony.com/)
and licensed under the [MIT License](LICENSE).

This distribution is based on all the main CMF components needed for most common
use cases, and can be used to create a new Symfony/CMF project from scratch.


## Requirements

* Symfony 2.3.x
* See also the `require` section of [composer.json](composer.json)


## Documentation

For the install guide and reference, see:

* [Symfony CMF standard edition documentation](http://symfony.com/doc/master/cmf/book/installation.html)

See also:

* [All Symfony CMF documentation](http://symfony.com/doc/master/cmf/index.html) - complete Symfony CMF reference
* [Symfony CMF Website](http://cmf.symfony.com/) - introduction, live demo, support and community links


## Contributing

Pull requests are welcome. Please see our [CONTRIBUTING](CONTRIBUTING.md) guide.

Unit and/or functional tests exist for this bundle. See the
[Testing documentation](http://symfony.com/doc/master/cmf/components/testing.html)
for a guide to running the tests.

Thanks to
[everyone who has contributed](https://github.com/symfony-cmf/standard-edition/contributors) already.



## INSTALL CMF

$ composer create-project symfony-cmf/standard-edition symfony-cmf "~1.2"

> database_driver: pdo_mysql
> database_path: null

php app/console doctrine:database:create
php app/console doctrine:phpcr:init:dbal
php app/console doctrine:phpcr:repository:init
php app/console doctrine:phpcr:fixtures:load

php app/console --env=prod assetic:dump
php app/console assets:install

## Clear cache
php app/console cache:clear --no-warmup

## INSTALL SONATA ADMIN : https://sonata-project.org/bundles/admin/2-3/doc/getting_started/installation.html

composer require sonata-project/admin-bundle "2.3.*"
composer require sonata-project/doctrine-orm-admin-bundle "2.3.*"
bower install ./vendor/sonata-project/admin-bundle/bower.json