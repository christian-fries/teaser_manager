<?php
namespace CHF\TeaserManager\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Christian Fries <hallo@christian-fries.ch>
 */
class TeaserControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CHF\TeaserManager\Controller\TeaserController
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = $this->getMock(\CHF\TeaserManager\Controller\TeaserController::class, ['redirect', 'forward', 'addFlashMessage'], [], '', false);
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllTeasersFromRepositoryAndAssignsThemToView()
    {

        $allTeasers = $this->getMock(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class, [], [], '', false);

        $teaserRepository = $this->getMock(\CHF\TeaserManager\Domain\Repository\TeaserRepository::class, ['findAll'], [], '', false);
        $teaserRepository->expects(self::once())->method('findAll')->will(self::returnValue($allTeasers));
        $this->inject($this->subject, 'teaserRepository', $teaserRepository);

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $view->expects(self::once())->method('assign')->with('teasers', $allTeasers);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenTeaserToView()
    {
        $teaser = new \CHF\TeaserManager\Domain\Model\Teaser();

        $view = $this->getMock(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class);
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('teaser', $teaser);

        $this->subject->showAction($teaser);
    }
}
