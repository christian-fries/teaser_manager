<?php
// Flexform for plugin "Teaser"
/*$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase('teaser_manager'));
$pluginName = strtolower('Teaser');
$pluginSignature = $extensionName.'_'.$pluginName;

$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    $pluginSignature, 'FILE:EXT:teaser_manager/Configuration/FlexForms/Teaser.xml');*/

$teaser_columns = [
    'teaser_type' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tt_content.teaser_type',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tt_content.teaser_type.choose', '']
            ],
            'foreign_table' => 'tx_teasermanager_domain_model_teasertype',
            'minitems' => 1,
            'maxitems' => 1,
            'eval' => 'required'
        ],
    ],
    'teaser_items' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tt_content.teaser_items',
        'displayCond' => 'FIELD:teaser_type:REQ:true',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectMultipleSideBySide',
            'foreign_table' => 'tx_teasermanager_domain_model_teaser',
            'foreign_table_where' => ' AND tx_teasermanager_domain_model_teaser.type = ###REC_FIELD_teaser_type###',
            'MM' => 'tx_teasermanager_ttcontent_teaser_mm',
            'size' => 10,
            'autoSizeMax' => 30,
            'maxitems' => 9999,
            'multiple' => 0,
            /*'wizards' => [
                '_PADDING' => 1,
                '_VERTICAL' => 1,
                'edit' => [
                    'module' => [
                        'name' => 'wizard_edit',
                    ],
                    'type' => 'popup',
                    'title' => 'Edit', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.edit
                    'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                    'popup_onlyOpenIfSelected' => 1,
                    'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
                ],
                'add' => [
                    'module' => [
                        'name' => 'wizard_add',
                    ],
                    'type' => 'script',
                    'title' => 'Create new', // todo define label: LLL:EXT:.../Resources/Private/Language/locallang_tca.xlf:wizard.add
                    'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                    'params' => [
                        'table' => 'tx_teasertest_domain_model_teaser',
                        'pid' => '###CURRENT_PID###',
                        'setValue' => 'prepend'
                    ],
                ],
            ],*/
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $teaser_columns);

// Request update when changing teaser_type
$requestUpdate = $GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'];
$GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] = !empty($requestUpdate) ? $GLOBALS['TCA']['tt_content']['ctrl']['requestUpdate'] . ',teaser_type' : '';

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    [
        'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tt_content.ce.title',
        'teasermanager_teaser',
        'content-table'
    ],
    'CType',
    'teaser_manager'
);

// Define fields to show
$GLOBALS['TCA']['tt_content']['types']['teasermanager_teaser']['showitem'] = '--palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.general;general, --palette--;LLL:EXT:cms/locallang_ttc.xlf:palette.headers;header,';
$GLOBALS['TCA']['tt_content']['types']['teasermanager_teaser']['showitem'] .= 'teaser_type, teaser_items';