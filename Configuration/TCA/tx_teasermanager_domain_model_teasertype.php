<?php

$fieldItems = [
    ['Title', 'title'],
    ['Subtitle', 'subtitle'],
    ['Link', 'link'],
    ['Date', 'date'],
    ['Text', 'text'],
    ['Icon', 'icon'],
    ['Image', 'image'],
];

// Add field 'color' if extension color_manager is loaded
$colorManagerLoaded = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded('color_manager');
if ($colorManagerLoaded)
{
    $fieldItems[] = ['Color', 'color'];
}

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teasertype',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
		'delete' => 'deleted',
        'searchFields' => 'title,fields,',
        'iconfile' => 'EXT:teaser_manager/Resources/Public/Icons/tx_teasermanager_domain_model_teasertype.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'title, fields',
    ],
    'types' => [
        '1' => ['showitem' => 'title, fields, '],
    ],
    'columns' => [
	    'title' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teasertype.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	        
	    ],
	    'fields' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teasertype.fields',
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
        
    ],
];
