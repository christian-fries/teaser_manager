<?php

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