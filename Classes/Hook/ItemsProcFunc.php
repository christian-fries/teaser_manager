<?php

namespace CHF\TeaserManager\Hook;

/***
 *
 * This file is part of the "Teaser Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2018 Christian Fries <hello@christian-fries.ch>, CF Webworks
 *
 ***/

use CHF\TeaserManager\Utility\ItemProvider;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ItemsProcFunc
{
    /**
     * @var ItemProvider
     */
    protected $itemProvider;

    public function __construct()
    {
        $this->itemProvider = GeneralUtility::makeInstance(ItemProvider::class);
    }

    /**
     * Itemsproc function to provide icons to the icon selector
     *
     * @param array &$config configuration array
     */
    public function icons(array &$config)
    {
        $pageId = $config['row']['pid'];
        $pluginName = 'tx_teasermanager.';
        $items = $this->itemProvider->getAvailableItems($pageId, 'icons', $pluginName);

        foreach ($items as $icon) {
            $icons = [
                htmlspecialchars($icon[0]),
                $icon[1]
            ];
            array_push($config['items'], $icons);
        }
    }

    /**
     * Itemsproc function to provide sizes to the size selector
     *
     * @param array &$config configuration array
     */
    public function sizes(array &$config)
    {
        $pageId = $config['row']['pid'];
        $pluginName = 'tx_teasermanager.';
        $items = $this->itemProvider->getAvailableItems($pageId, 'sizes', $pluginName);

        foreach ($items as $size) {
            $sizes = [
                htmlspecialchars($size[0]),
                $size[1]
            ];
            array_push($config['items'], $sizes);
        }
    }
}
