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
        $timeout = 300;
        $consoleDir = static::getConsoleDir($event, 'initiate database');
        static::executeCommand($event, $consoleDir, 'doctrine:database:create --if-not-exists --no-debug', $timeout);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:init:dbal --no-debug', $timeout);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:repository:init', $timeout);
        static::executeCommand($event, $consoleDir, 'doctrine:phpcr:fixtures:load', $timeout);
        static::executeCommand($event, $consoleDir, 'doctrine:schema:update --force', $timeout);
        static::executeCommand($event, $consoleDir, 'doctrine:fixtures:load', $timeout);
        $consoleDir = static::getConsoleDir($event, 'Initiate assets');
        static::executeCommand($event, $consoleDir, 'assets:install --symlink', $timeout);
        static::executeCommand($event, $consoleDir, '--env=prod assetic:dump', $timeout);
    }
}
