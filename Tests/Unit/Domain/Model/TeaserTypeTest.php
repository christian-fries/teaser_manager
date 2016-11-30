<?php
namespace CHF\TeaserManager\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Christian Fries <hallo@christian-fries.ch>
 */
class TeaserTypeTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \CHF\TeaserManager\Domain\Model\TeaserType
     */
    protected $subject = null;

    protected function setUp()
    {
        $this->subject = new \CHF\TeaserManager\Domain\Model\TeaserType();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getTitle()
        );

    }

    /**
     * @test
     */
    public function setTitleForStringSetsTitle()
    {
        $this->subject->setTitle('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }

    /**
     * @test
     */
    public function getFieldsReturnsInitialValueForInt()
    {
    }

    /**
     * @test
     */
    public function setFieldsForIntSetsFields()
    {
    }
}
