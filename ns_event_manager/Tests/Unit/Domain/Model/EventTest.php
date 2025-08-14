<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 */
class EventTest extends UnitTestCase
{
    /**
     * @var \NITSAN\NsEventManager\Domain\Model\Event|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \NITSAN\NsEventManager\Domain\Model\Event::class,
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
    public function getTitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );
    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle(): void
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('title'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getOrganizerNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getOrganizerName()
        );
    }

    /**
     * @test
     */
    public function setOrganizerNameForStringSetsOrganizerName(): void
    {
        $this->subject->setOrganizerName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('organizerName'));
    }

    /**
     * @test
     */
    public function getModeReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getMode()
        );
    }

    /**
     * @test
     */
    public function setModeForStringSetsMode(): void
    {
        $this->subject->setMode('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('mode'));
    }

    /**
     * @test
     */
    public function getLocationReturnsInitialValueForLocation(): void
    {
        self::assertEquals(
            null,
            $this->subject->getLocation()
        );
    }

    /**
     * @test
     */
    public function setLocationForLocationSetsLocation(): void
    {
        $locationFixture = new \NITSAN\NsEventManager\Domain\Model\Location();
        $this->subject->setLocation($locationFixture);

        self::assertEquals($locationFixture, $this->subject->_get('location'));
    }
}
