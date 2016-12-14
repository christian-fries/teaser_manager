<?php
namespace CHF\TeaserManager\Controller;

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

use CHF\BackendModule\Controller\BackendModuleActionController;
use CHF\TeaserManager\Domain\Dto\Filter;
use TYPO3\CMS\Backend\View\BackendTemplateView;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;

/**
 * TeaserController
 */
class AdminController extends BackendModuleActionController
{
    /**
     * @var \CHF\TeaserManager\Domain\Repository\TeaserTypeRepository
     * @inject
     */
    protected $teaserTypeRepository = null;

    /**
     * @var \CHF\TeaserManager\Domain\Repository\TeaserRepository
     * @inject
     */
    protected $teaserRepository = null;

    /**
     * Set up the doc header properly here
     *
     * @param ViewInterface $view
     * @return void
     */
    protected function initializeView(ViewInterface $view)
    {
        /** @var BackendTemplateView $view */
        parent::initializeView($view);
    }

    /**
     * Function will be called before every other action
     *
     * @return void
     */
    public function initializeAction() {
        parent::initializeAction();

        $this->extKey = 'teaser_manager';
        $this->moduleName = 'web_TeaserManagerAdmin';
        $this->showConfigurationButton = true;

        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['teaser_manager']);
        $this->pageUid = intval($extConf['globalStoragePid']);

        $this->setMenuIdentifier('teaserMenu');
        $this->setMenuItems([
            [
                'label' => 'Teasers',
                'action' => 'listTeaser',
                'controller' => 'Admin'
            ],
            [
                'label' => 'Teaser Types',
                'action' => 'listTeaserType',
                'controller' => 'Admin'
            ]
        ]);

        $this->setButtons([
            $this->createNewRecordButton(
                'tx_teasermanager_domain_model_teaser',
                $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teaser.new'),
                [
                    'Admin' => ['listTeaser']
                ]
            ),
            $this->createNewRecordButton(
                'tx_teasermanager_domain_model_teasertype',
                $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teasertype.new'),
                [
                    'Admin' => ['listTeaserType']
                ]
            )
        ]);

        if ($this->pageUid == 0) {
            $message = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                $this->getLanguageService()->sL('LLL:EXT:color_manager/Resources/Private/Language/locallang.xlf:configuration.pid.description'),
                $this->getLanguageService()->sL('LLL:EXT:color_manager/Resources/Private/Language/locallang.xlf:configuration.pid.title'),
                \TYPO3\CMS\Core\Messaging\FlashMessage::WARNING,
                TRUE
            );

            $flashMessageService = $this->objectManager->get(\TYPO3\CMS\Core\Messaging\FlashMessageService::class);
            $messageQueue = $flashMessageService->getMessageQueueByIdentifier();
            $messageQueue->addMessage($message);
        }
    }

    /**
     * @return void
     */
    public function listTeaserTypeAction()
    {
        $teaserTypes = $this->teaserTypeRepository->findAll();
        $this->view->assign('teaserTypes', $teaserTypes);
    }

    /**
     * @param CHF\TeaserManager\Domain\Dto\Filter $filter
     * @return void
     */
    public function listTeaserAction($filter = null)
    {
        if ($filter === null) {
            $filter = new Filter();
        }
        $this->view->assign('filter', $filter);

        if ($filter->getType()) {
            $teasers = $this->teaserRepository->findByType($filter->getType());
        }
        else {
            $teasers = $this->teaserRepository->findAll();
        }
        $this->view->assign('teasers', $teasers);

        $teaserTypes = $this->teaserTypeRepository->findAll();
        $this->view->assign('teaserTypes', $teaserTypes);
    }
}
