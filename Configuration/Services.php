<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use Passionweb\BayernportalApi\Service\BayernportalService;
use Passionweb\BayernportalApi\Controller\BayernportalController;
use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator, ContainerBuilder $containerBuilder): void {
    $services = $containerConfigurator->services();
    $services->defaults()
        ->private()
        ->autowire()
        ->autoconfigure();

    $services->load('Passionweb\\BayernportalApi\\', __DIR__ . '/../Classes/')
        ->exclude([
            __DIR__ . '/../Classes/Domain/Model',
        ]);

    $services->set('ExtConf.bayernportal_api', 'array')
        ->factory(
            [
                service(ExtensionConfiguration::class),
                'get'
            ]
        )
        ->args([
            'bayernportal_api'
        ]);

    $services->set(BayernportalService::class)
        ->arg('$extConf', service('ExtConf.bayernportal_api'));

    $services->set(BayernportalController::class)
        ->arg('$bayernportalService', service(BayernportalService::class));
};
