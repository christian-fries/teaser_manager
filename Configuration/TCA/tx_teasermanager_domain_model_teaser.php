<?php
return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
		'versioningWS' => 2,
        'versioning_followPages' => true,
        'requestUpdate' => 'type',

        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
        'enablecolumns' => [
			'disabled' => 'hidden',
			'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'title,subtitle,link,text,date,icon,image,type,',
        'iconfile' => 'EXT:teaser_manager/Resources/Public/Icons/tx_teasermanager_domain_model_teaser.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, title, subtitle, link, text, date, icon, image, type',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, type, title, subtitle, link, text, date, icon, image, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
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
                'foreign_table' => 'tx_teasermanager_domain_model_teaser',
                'foreign_table_where' => 'AND tx_teasermanager_domain_model_teaser.pid=###CURRENT_PID### AND tx_teasermanager_domain_model_teaser.sys_language_uid IN (-1,0)',
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
        'hidden' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],
        'endtime' => [
            'exclude' => 1,
            'l10n_mode' => 'mergeIfNotBlank',
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'size' => 13,
                'max' => 20,
                'eval' => 'datetime',
                'checkbox' => 0,
                'default' => 0,
                'range' => [
                    'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
                ],
            ],
        ],

	    'title' => [
	        'exclude' => 0,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.title',
            'displayCond' => 'FIELD:type:REQ:true',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	        
	    ],
	    'subtitle' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.subtitle',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:subtitle',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'link' => [
	        'exclude' => 0,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.link',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:link',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'text' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.text',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:text',
	        'config' => [
			    'type' => 'text',
			    'cols' => 40,
			    'rows' => 15,
			    'eval' => 'trim'
			]
	        
	    ],
	    'date' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.date',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:date',
	        'config' => [
			    'type' => 'input',
			    'size' => 10,
			    'eval' => 'datetime',
			    'checkbox' => 1,
			    'default' => time()
			],
	        
	    ],
	    'icon' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.icon',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:icon',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim'
			],
	        
	    ],
	    'image' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.image',
            'displayCond' => 'USER:CHF\TeaserManager\Matcher\DisplayConditionMatcher->checkTeaserField:image',
	        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
			    'image',
			    [
			        'appearance' => [
			            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
			        ],
			        'foreign_types' => [
			            '0' => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ],
			            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
			                'showitem' => '
			                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
			                --palette--;;filePalette'
			            ]
			        ],
			        'maxitems' => 1
			    ],
			    $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
			),
	        
	    ],
	    'type' => [
	        'exclude' => 0,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.type',
	        'config' => [
			    'type' => 'select',
			    'renderType' => 'selectSingle',
                'items' => [
                    ['LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:tx_teasermanager_domain_model_teaser.type.choose', '']
                ],
			    'foreign_table' => 'tx_teasermanager_domain_model_teasertype',
			    'minitems' => 1,
			    'maxitems' => 1,
                'eval' => 'required'
			],
	    ],
        
    ],
];
