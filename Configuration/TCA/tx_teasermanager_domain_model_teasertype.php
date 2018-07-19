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
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.image', 'image'],
    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.images', 'images'],
];

// Add field 'color' if extension color_manager is loaded
$colorManagerLoaded = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('color_manager');
if ($colorManagerLoaded)
{
    $fieldItems[] = ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaser.color', 'color'];
}

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teasertype',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
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
            'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tt_content.layouts',
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
                'wizards' => array(
                    '_VERTICAL' => 1,
                    'edit' => array(
                        'type' => 'popup',
                        'title' => 'Edit layout',
                        'module' => array(
                            'name' => 'wizard_edit',
                        ),
                        'popup_onlyOpenIfSelected' => 1,
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_edit.gif',
                        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1'
                    ),
                    'add' => array(
                        'type' => 'script',
                        'title' => 'Add layout',
                        'icon' => 'EXT:backend/Resources/Public/Images/FormFieldWizard/wizard_add.gif',
                        'params' => array(
                            'table' => 'tx_teasermanager_domain_model_teaserlayout',
                            'pid' => '###CURRENT_PID###',
                            'setValue' => 'prepend'
                        ),
                        'module' => array(
                            'name' => 'wizard_add'
                        )
                    )
                )

            ],
        ],
    ],
];
