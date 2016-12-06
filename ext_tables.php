<?php
defined('TYPO3_MODE') || die('Access denied.');

// Load extension configuration
$extensionConfiguration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['teaser_manager']);
$navigationComponent = (!$extensionConfiguration['globalStoragePid']) ? 'typo3-pagetree' : '';

call_user_func(
    function($extKey, $navigationComponent)
    {
        $settings = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['color_manager']);

        if (TYPO3_MODE === 'BE') {
            if ($settings['showAdministrationModule']) {

                \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                    'CHF.TeaserManager',
                    'web', // Make module a submodule of 'web'
                    'admin', // Submodule key
                    '', // Position
                    [
                        'Admin' => 'listTeaser, listTeaserType',
                    ],
                    [
                        'access' => 'user,group',
                        'icon'   => 'EXT:' . $extKey . '/Resources/Public/Icons/module-admin.png',
                        'labels' => 'LLL:EXT:' . $extKey . '/Resources/Private/Language/locallang_admin.xlf',
                        'navigationComponentId' => $navigationComponent,
                    ]
                );
            }
        }

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Teaser Manager');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_teasermanager_domain_model_teaser', 'EXT:teaser_manager/Resources/Private/Language/locallang_csh_tx_teasermanager_domain_model_teaser.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_teasermanager_domain_model_teaser');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_teasermanager_domain_model_teasertype', 'EXT:teaser_manager/Resources/Private/Language/locallang_csh_tx_teasermanager_domain_model_teasertype.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_teasermanager_domain_model_teasertype');

    },
    $_EXTKEY, $navigationComponent
);
