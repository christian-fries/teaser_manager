<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Teaser Manager',
    'description' => 'Manage teaser in one place and use them whereever you want to.',
    'category' => 'plugin',
    'author' => 'Christian Fries',
    'author_email' => 'hallo@christian-fries.ch',
    'state' => 'alpha',
    'clearCacheOnLoad' => 1,
    'version' => '0.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-7.6.99',
            'backend_module' => ''
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => array('Classes')
    ],
];