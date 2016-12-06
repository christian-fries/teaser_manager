<?php
namespace CHF\TeaserManager\Domain\Model;

/***
 *
 * This file is part of the "Teasertest" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2016 Christian Fries <hallo@christian-fries.ch>, CF Webworks
 *
 ***/

/**
 * TeaserType
 */
class TeaserType extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * fields
     *
     * @var string
     */
    protected $fields = '';

    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the fields
     *
     * @return string fields
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * Returns the fields
     *
     * @return string fields
     */
    public function getFieldsList()
    {
        $fields = explode(',', $this->fields);
        $fieldsArray = array_map(function($word) {
            return ucwords($word);
        }, $fields);

        return implode(', ', $fieldsArray);
    }

    /**
     * Sets the fields
     *
     * @param string $fields
     * @return void
     */
    public function setFields($fields)
    {
        $this->fields = $fields;
    }
}
