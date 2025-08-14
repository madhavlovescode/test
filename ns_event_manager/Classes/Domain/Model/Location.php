<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Domain\Model;


/**
 * This file is part of the "EventCrud" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2025 
 */

/**
 * Location
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * zipCode
     *
     * @var string
     */
    protected $zipCode = '';

    /**
     * capacity
     *
     * @var int
     */
    protected $capacity = 0;

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
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

    /**
     * Returns the zipCode
     *
     * @return string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * Sets the zipCode
     *
     * @param string $zipCode
     * @return void
     */
    public function setZipCode(string $zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * Returns the capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Sets the capacity
     *
     * @param int $capacity
     * @return void
     */
    public function setCapacity(int $capacity)
    {
        $this->capacity = $capacity;
    }
}
