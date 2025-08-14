<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class LocationTest extends UnitTestCase
{
    /**
     * @var \NITSAN\NsEventManager\Domain\Model\Location|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \NITSAN\NsEventManager\Domain\Model\Location::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getCityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCity()
        );
    }

    /**
     * @test
     */
    public function setCityForStringSetsCity(): void
    {
        $this->subject->setCity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('city'));
    }

    /**
     * @test
     */
    public function getZipCodeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getZipCode()
        );
    }

    /**
     * @test
     */
    public function setZipCodeForStringSetsZipCode(): void
    {
        $this->subject->setZipCode('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('zipCode'));
    }

    /**
     * @test
     */
    public function getCapacityReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getCapacity()
        );
    }

    /**
     * @test
     */
    public function setCapacityForIntSetsCapacity(): void
    {
        $this->subject->setCapacity(12);

        self::assertEquals(12, $this->subject->_get('capacity'));
    }
}
