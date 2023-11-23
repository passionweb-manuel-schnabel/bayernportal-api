<?php
defined('TYPO3') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'BayernportalApi',
    'ExampleApirequest',
    'Example API request'
);

$pluginSignature = 'bayernportalapi_exampleapirequest';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature,
    'FILE:EXT:bayernportal_api/Configuration/FlexForms/ExampleApiRequest.xml'
);
