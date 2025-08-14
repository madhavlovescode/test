<?php

declare(strict_types=1);

namespace NITSAN\NsEventManager\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 */
class LocationControllerTest extends UnitTestCase
{
    /**
     * @var \NITSAN\NsEventManager\Controller\LocationController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\NITSAN\NsEventManager\Controller\LocationController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenLocationToView(): void
    {
        $location = new \NITSAN\NsEventManager\Domain\Model\Location();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('location', $location);

        $this->subject->showAction($location);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenLocationToLocationRepository(): void
    {
        $location = new \NITSAN\NsEventManager\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('add')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->createAction($location);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenLocationToView(): void
    {
        $location = new \NITSAN\NsEventManager\Domain\Model\Location();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('location', $location);

        $this->subject->editAction($location);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenLocationInLocationRepository(): void
    {
        $location = new \NITSAN\NsEventManager\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('update')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->updateAction($location);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenLocationFromLocationRepository(): void
    {
        $location = new \NITSAN\NsEventManager\Domain\Model\Location();

        $locationRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $locationRepository->expects(self::once())->method('remove')->with($location);
        $this->subject->_set('locationRepository', $locationRepository);

        $this->subject->deleteAction($location);
    }
}
