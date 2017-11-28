<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Teaser Manager',
    'description' => 'Manage teaser in one place and use them whereever you want to.',
    'category' => 'plugin',
    'author' => 'Christian Fries',
    'author_email' => 'hallo@christian-fries.ch',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '0.2.6',
    'constraints' => [
        'depends' => [
            'typo3' => '7.6.0-8.7.99',
            'backend_module' => '0.7.3-0.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => array('Classes')
    ],
];