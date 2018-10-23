<?php
/**
 * YAWIK
 *
 * @filesource
 * @copyright (c) 2013 - 2017 Cross Solution (http://cross-solution.de)
 * @license   MIT
 * @author    @author Carsten Bleek <bleek@cross-solution.de>
 */

namespace SimpleImport;

use Core\ModuleManager\ModuleConfigLoader;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;

/**
 * Bootstrap module
 */
class Module implements DependencyIndicatorInterface, ConsoleUsageProviderInterface, ConsoleBannerProviderInterface
{

    /**
     * Loads module specific configuration.
     *
     * @return array
     */
    public function getConfig()
    {
        return ModuleConfigLoader::load(__DIR__ . '/../config');
    }

    /**
     * {@inheritDoc}
     * @see DependencyIndicatorInterface::getModuleDependencies()
     */
    public function getModuleDependencies()
    {
        return ['Jobs'];
    }

    /**
     * Loads module specific autoloader configuration.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                    __NAMESPACE__ . 'Test' => __DIR__ . '/test/' . __NAMESPACE__ . 'Test',
                ),
            ),
        );
    }

    public function getConsoleBanner(Console $console)
    {
        return __NAMESPACE__ . ' 0.2.1';
    }


    /**
     * {@inheritDoc}
     * @see ConsoleUsageProviderInterface::getConsoleUsage()
     */
    public function getConsoleUsage(Console $console)
    {
        return [
            'Simple import operations',
            'simpleimport import [--limit] [--name] [--id]'  => 'Executes a data import for all registered crawlers',
            'simpleimport add-crawler --name --organization --feed-uri [--runDelay] [--type] [--jobInitialState] [--jobRecoverState]'  => 'Adds a new import crawler',
            ['--limit=INT', 'Number of crawlers to check per run. Default 3. 0 means no limit'],
            ['--name=STRING', 'The name of a crawler'],
            ['--id=STRING', 'The Mongo object id of a crawler'],
            ['--organization==STRING', 'The ID of an organization'],
            ['--feed-uri=STRING', 'The URI pointing to a data to import'],
            ['--runDelay=INT', 'The number of minutes the next import run will be proceeded again'],
            ['--type=STRING', 'The type of an import (e.g. job)'],
            ['--jobInitialState=STRING', 'The initial state of an imported job'],
            ['--jobRecoverState=STRING', 'The state a job gets, if it was deleted, but found again in later runs.'],
            '',
            'simpleimport info' => 'Displays a list of all available crawlers.',
            'simpleimport info [--id] <name>' => 'Shows information for a crawler',
            'simpleimport update-crawler [--id] <name> [--rename] [--limit] [--organization] [--feed-uri] [--runDelay] [--type] [--jobInitalState] [--jobRecoverState]'
                => 'Updates configuration for a crawler. ',
            'simpleimport delete-crawler [--id] <name>' => 'Deletes an import crawler',
            ['<name>', 'The name of the crawler to delete.'],
            ['--id', 'Treat <name> as the MongoID of the crawler'],
            ['--rename=STRING', 'Set a new name for the crawler.'],
        ];
    }
}
