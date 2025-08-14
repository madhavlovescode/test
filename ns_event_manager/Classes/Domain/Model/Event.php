<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Domain\Model;

use TYPO3\CMS\Core\Resource\FileReference;

/**
 * This file is part of the "EventCrud" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 
 */

/**
 * text
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = null;
      /**
     * name
     *
     * @var string
     */
    protected $name = '';
    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * description
     *
     * @var string
     */
    protected $description = null;

    /**
     * organizerName
     *
     * @var string
     */
    protected $organizerName = null;
    public function getName()
    {
        return $this->name;
    }

    /**
     * mode
     *
     * @var string
     */
    protected $mode = null;

    /**
     * location
     *
     * @var \NITSAN\NsEventManager\Domain\Model\Location
     */
    protected $location = null;

    /**
     * Returns the title
     *
     * @return string
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
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Returns the description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Returns the organizerName
     *
     * @return string
     */
    public function getOrganizerName()
    {
        return $this->organizerName;
    }

    /**
     * Sets the organizerName
     *
     * @param string $organizerName
     * @return void
     */
    public function setOrganizerName(string $organizerName)
    {
        $this->organizerName = $organizerName;
    }
    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $image = null;
    

    /**
     * Returns the mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Sets the mode
     *
     * @param string $mode
     * @return void
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * Returns the location
     *
     * @return \NITSAN\NsEventManager\Domain\Model\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Sets the location
     *
     * @param \NITSAN\NsEventManager\Domain\Model\Location $location
     * @return void
     */
    public function setLocation(\NITSAN\NsEventManager\Domain\Model\Location $location)
    {
        $this->location = $location;
    }
     /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
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


    public function addImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image): void
    {
        $this->image->attach($image);
    }

    public function removeImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image): void
    {
        $this->image->detach($image);
    }

}
