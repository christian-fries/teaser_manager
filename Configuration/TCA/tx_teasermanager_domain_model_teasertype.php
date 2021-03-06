<?php

$fieldItems = [
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.title', 'title'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.subtitle', 'subtitle'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.link', 'link'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.link_text', 'link_text'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.date', 'date'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.text', 'text'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.icon', 'icon'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.selected_icon', 'selected_icon'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.person', 'person'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.persons', 'persons'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.image', 'image'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.images', 'images'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.size', 'size'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.style', 'style'],
];

// Add field 'color' if extension color_manager is loaded
$colorManagerLoaded = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('color_manager');
if ($colorManagerLoaded) {
    $fieldItems[] = ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.color', 'color'];
}

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'delete' => 'deleted',
        'searchFields' => 'title,',
        'iconfile' => 'EXT:teaser_manager/Resources/Public/Icons/tx_teasermanager_domain_model_teasertype.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'title, fields, layouts',
    ],
    'types' => [
        '1' => ['showitem' => 'title, fields, layouts, '],
    ],
    'columns' => [
        'title' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype.title',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim,required'
            ],

        ],
        'fields' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype.fields',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'items' => $fieldItems,
                'size' => 10,
                'minitems' => 1,
                'maxitems' => 99,
                'eval' => ''
            ],

        ],
        'layouts' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype.layouts',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_teasermanager_domain_model_teaserlayout',
                'MM' => 'tx_teasermanager_teasertype_teaserlayout_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'enableMultiSelectFilterTextfield' => true,
                'fieldControl' => [
                    'addRecord' => [
                        'disabled' => false,
                        'options' => [
                            'title' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype.layouts.add',
                            'pid' => '###CURRENT_PID###',
                            'table' => 'tx_teasermanager_domain_model_teaserlayout',
                        ],
                    ],
                    'editPopup' => [
                        'disabled' => false,
                        'options' => [
                            'title' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype.layouts.edit',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
