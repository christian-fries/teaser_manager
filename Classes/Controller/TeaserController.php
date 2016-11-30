<?php
namespace CHF\TeaserManager\Controller;

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
 * TeaserController
 */
class TeaserController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * teaserRepository
     *
     * @var \CHF\TeaserManager\Domain\Repository\TeaserRepository
     * @inject
     */
    protected $teaserRepository = null;

    /**
     * action list
     *
     * @param CHF\TeaserManager\Domain\Model\Teaser
     * @return void
     */
    public function listAction()
    {
        $teasers = $this->teaserRepository->findAll();
        $this->view->assign('teasers', $teasers);
    }

    /**
     * action show
     *
     * @param CHF\TeaserManager\Domain\Model\Teaser
     * @return void
     */
    public function showAction(\CHF\TeaserManager\Domain\Model\Teaser $teaser)
    {
        $this->view->assign('teaser', $teaser);
    }
}
