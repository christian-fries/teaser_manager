<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teasertype',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
		'versioningWS' => 2,
        'versioning_followPages' => true,

        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
        'enablecolumns' => [

        ],
        'searchFields' => 'title,fields,',
        'iconfile' => 'EXT:teaser_manager/Resources/Public/Icons/tx_teasermanager_domain_model_teasertype.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, fields',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, title, fields, '],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages'
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_teasermanager_domain_model_teasertype',
                'foreign_table_where' => 'AND tx_teasermanager_domain_model_teasertype.pid=###CURRENT_PID### AND tx_teasermanager_domain_model_teasertype.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],

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
                'items' => [
                    ['Subtitle', 'subtitle'],
                    ['Link', 'link'],
                    ['Date', 'date'],
                    ['Text', 'text'],
                    ['Icon', 'icon'],
                    ['Image', 'image'],
                ],
                'size' => 10,
                'minitems' => 1,
                'maxitems' => 99,
			    'eval' => ''
			],
	        
	    ],
        
    ],
];
