<?php

namespace Application\Composer;

use Symfony\Component\ClassLoader\ClassCollectionLoader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\PhpExecutableFinder;
use Composer\Script\CommandEvent;
use Sensio\Bundle\DistributionBundle\Composer\ScriptHandler as SensioScriptHandler;

/**
 * @author Loïs PUIG <lois.puig@kctus.fr>
 */
class ScriptHandler extends SensioScriptHandler
{
    /**
     * Init dbal and assets
     *
     * @param $event CommandEvent A instance
     */
    public static function initDbAssets(CommandEvent $event) {
        $consoleDir = static::getConsoleDir($event, 'create database');
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:init:dbal', 300);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:repository:init', 300);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:fixtures:load', 300);
        static::executeCommand($event, $consoleDir, 'doctrine:schema:update --force', 300);
        static::executeCommand($event, $consoleDir, 'doctrine:fixtures:load', 300);
        static::executeCommand($event, $consoleDir, 'assets:install --symlink', 300);
        static::executeCommand($event, $consoleDir, '--env=prod assetic:dump', 300);
        static::executeCommand($event, $consoleDir, 'cache:clear --no-warmup', 300);
    }
}
