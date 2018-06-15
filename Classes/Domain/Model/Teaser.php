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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Teaser
 */
class Teaser extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     * @validate NotEmpty
     */
    protected $title = '';

    /**
     * @var int
     */
    protected $hidden = 0;

    /**
     * @var string
     */
    protected $subtitle = '';

    /**
     * @var string
     */
    protected $linkText = '';

    /**
     * @var string
     */
    protected $link = '';

    /**
     * @var string
     */
    protected $text = '';

    /**
     * @var \DateTime
     */
    protected $date = null;

    /**
     * @var string
     */
    protected $icon = '';

    /**
     * @var string
     */
    protected $selectedIcon = '';

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $image = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $images = null;

    /**
     * @var \CHF\ColorManager\Domain\Model\Color
     * @lazy
     */
    protected $color = null;

    /**
     * @var \CHF\TeaserManager\Domain\Model\TeaserType
     * @lazy
     */
    protected $type = null;

    /**
     * Teaser constructor.
     */
    public function __construct()
    {
        $this->initializeObjectStorages();
    }

    public function initializeObjectStorages()
    {
        $this->images = new ObjectStorage();
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

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
     * @return int
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param int $hidden
     * @return void
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
    }

    /**
     * Returns the subtitle
     *
     * @return string subtitle
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }

    /**
     * Returns the link text
     *
     * @return string
     */
    public function getLinkText()
    {
        return $this->linkText;
    }

    /**
     * Sets the link text
     *
     * @param string $linkText
     * @return void
     */
    public function setLinkText($linkText)
    {
        $this->linkText = $linkText;
    }

    /**
     * Returns the icon
     *
     * @return string icon
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Sets the icon
     *
     * @param string $icon
     * @return void
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * Returns the selected icon
     *
     * @return string icon
     */
    public function getSelectedIcon()
    {
        return $this->selectedIcon;
    }

    /**
     * Sets the selected icon
     *
     * @param string $selectedIcon
     * @return void
     */
    public function setSelectedIcon($selectedIcon)
    {
        $this->selectedIcon = $selectedIcon;
    }

    /**
     * Returns the type
     *
     * @return \CHF\TeaserManager\Domain\Model\TeaserType type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets the type
     *
     * @param \CHF\TeaserManager\Domain\Model\TeaserType $type
     * @return void
     */
    public function setType(\CHF\TeaserManager\Domain\Model\TeaserType $type)
    {
        $this->type = $type;
    }

    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }

    /**
     * Returns the text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Sets the text
     *
     * @param string $text
     * @return void
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $images
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $images)
    {
        $this->images = $images;
    }

    /**
     * @return \CHF\ColorManager\Domain\Model\Color
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param \CHF\ColorManager\Domain\Model\Color $color
     * @return void
     */
    public function setColor($color)
    {
        $this->color = $color;
    }
}
