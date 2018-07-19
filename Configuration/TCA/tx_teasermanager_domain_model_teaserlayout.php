<?php

return [
    'ctrl' => [
        'title'	=> 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaserlayout',
        'label' => 'title',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'dividers2tabs' => 1,
		'delete' => 'deleted',
        'searchFields' => 'title,',
        'iconfile' => 'EXT:teaser_manager/Resources/Public/Icons/tx_teasermanager_domain_model_teaserlayout.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'title',
    ],
    'types' => [
        '1' => ['showitem' => 'title, '],
    ],
    'columns' => [
	    'title' => [
	        'exclude' => 1,
	        'label' => 'LLL:EXT:teaser_manager/Resources/Private/Language/locallang_db.xlf:teaserlayout.title',
	        'config' => [
			    'type' => 'input',
			    'size' => 30,
			    'eval' => 'trim,required'
			],
	        
	    ],
    ],
];
