<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Teaser Manager',
    'description' => 'Manage teaser in one place and use them wherever you want to.',
    'category' => 'plugin',
    'author' => 'Christian Fries',
    'author_email' => 'hallo@christian-fries.ch',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '1.7.1',
    'constraints' => [
        'depends' => [
            'typo3' => '8.7.0-9.5.99',
            'backend_module' => '0.7.3-0.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'classmap' => ['Classes']
    ],
];
