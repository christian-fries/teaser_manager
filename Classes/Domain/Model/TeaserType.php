<?php

namespace CHF\TeaserManager\Domain\Model;

/***
 *
 * This file is part of the "Teaser Manager" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2016 Christian Fries <hallo@christian-fries.ch>, CF Webworks
 *
 ***/

class TeaserType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var int
     */
    protected $hidden = 0;

    /**
     * @var string
     */
    protected $fields = '';

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return int
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param int $hidden
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * @return string
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @return string
     */
    public function getFieldsList()
    {
        $fields = explode(',', $this->fields);
        $fieldsArray = array_map(function ($word) {
            return \TYPO3\CMS\Extbase\Utility\LocalizationUtility::translate('teaser.' . $word, 'teaser_manager');
        }, $fields);

        return implode(', ', $fieldsArray);
    }

    /**
     * @param string $fields
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }
}
