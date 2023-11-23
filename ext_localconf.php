<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'BayernportalApi',
    'ExampleApirequest',
    [
        \Passionweb\BayernportalApi\Controller\BayernportalController::class => 'list, '
    ],
    // non-cacheable actions
    [
        \Passionweb\BayernportalApi\Controller\BayernportalController::class => 'list, '
    ]
);

// wizards
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
        wizards.newContentElement.wizardItems.plugins {
            elements {
                exampleapirequest {
                    iconIdentifier = bayernportal-example-api-request
                    title = LLL:EXT:bayernportal_api/Resources/Private/Language/locallang_db.xlf:plugin_bayernportal_api_exampleapirequest.name
                    description = LLL:EXT:bayernportal_api/Resources/Private/Language/locallang_db.xlf:plugin_bayernportal_api_exampleapirequest.description
                    tt_content_defValues {
                        CType = list
                        list_type = bayernportalapi_exampleapirequest
                    }
                }
            }
            show = *
        }
   }'
);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon(
    'bayernportal-example-api-request',
    \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
    ['source' => 'EXT:bayernportal_api/Resources/Public/Icons/Extension.png']
);

