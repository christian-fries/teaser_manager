<?php

$EM_CONF['teaser_manager'] = [
    'title' => 'Teaser Manager',
    'description' => 'Manage teasers in one place and use them wherever you want to.',
    'category' => 'plugin',
    'author' => 'Christian Fries',
    'author_email' => 'hello@christian-fries.ch',
    'state' => 'stable',
    'clearCacheOnLoad' => 1,
    'version' => '3.0.0-dev',
    'constraints' => [
        'depends' => [
            'typo3' => '9.5.0-10.4.99',
            'backend_module' => '1.0.0-2.99.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'autoload' => [
        'psr-4' => [
            'CHF\\TeaserManager\\' => 'Classes',
        ],
    ],
];
