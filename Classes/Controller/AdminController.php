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
use TYPO3\CMS\Backend\Template\Components\ButtonBar;
use TYPO3\CMS\Backend\View\BackendTemplateView;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
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
     * @var \CHF\BackendModule\Domain\Session\BackendSession
     * @inject
     */
    protected $backendSession = null;

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

        $this->pageRenderer->loadRequireJsModule('TYPO3/CMS/TeaserManager/AdministrationModule');
    }

    /**
     * Function will be called before every other action
     *
     * @return void
     */
    public function initializeAction() {
        // Initialize configuration
        $this->extKey = 'teaser_manager';
        $this->moduleName = 'web_TeaserManagerAdmin';
        $this->showConfigurationButton = true;

        $this->backendSession->setStorageKey('teaser_manager');

        $extConf = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['teaser_manager']);
        $this->pageUid = intval($extConf['globalStoragePid']);

        parent::initializeAction();

        // Define menu items
        $this->setMenuIdentifier('teaserMenu');
        $menuItems = [
            [
                'label' => $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teaser.teasers'),
                'action' => 'listTeaser',
                'controller' => 'Admin'
            ]
        ];

        if (GeneralUtility::inList($this->getBackendUser()->groupData['tables_modify'], 'tx_teasermanager_domain_model_teasertype') || $this->getBackendUser()->isAdmin()) {
            $menuItems[] = [
                'label' => $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teasertype.teasertypes'),
                'action' => 'listTeaserType',
                'controller' => 'Admin'
            ];
        }
        $this->setMenuItems($menuItems);

        // Define toolbar buttons
        $buttons = [
            $this->createNewRecordButton(
                'tx_teasermanager_domain_model_teaser',
                $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teaser.new'),
                [
                    'Admin' => ['listTeaser']
                ]
            ),
            $this->createJsButton(
                $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:administration.toggleForm'),
                $this->iconFactory->getIcon('actions-filter', Icon::SIZE_SMALL),
                [
                    'togglelink' => '1',
                    'toggle' => 'tooltip',
                    'placement' => 'bottom',
                ],
                [
                    'Admin' => ['listTeaser']
                ]
            ),
            $this->createNewRecordButton(
                'tx_teasermanager_domain_model_teasertype',
                $this->getLanguageService()->sL('LLL:EXT:teaser_manager/Resources/Private/Language/locallang.xlf:teasertype.new'),
                [
                    'Admin' => ['listTeaserType']
                ],
                [
                    'action' => 'listTeaserType',
                    'controller' => 'Admin'
                ]
            ),
            $this->createClipboardButton('tx_teasermanager_domain_model_teaser')
        ];
        $this->setButtons($buttons);
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
        // Add filtering to records
        if ($filter === null) {
            // Get filter from session if available
            $filter = $this->backendSession->get('filter');
            if (!$filter instanceof Filter) {
                // No filter available, create new one
                $filter = new Filter();
            }
        }
        else {
            $this->backendSession->store('filter', $filter);
        }
        $this->view->assign('filter', $filter);

        if ($filter->getType()) {
            $teasers = $this->teaserRepository->findByType($filter->getType(), 'Backend');
        }
        else {
            $teasers = $this->teaserRepository->findAll('Backend');
        }
        $this->view->assign('teasers', $teasers);

        $teaserTypes = $this->teaserTypeRepository->findAll('Backend');
        $this->view->assign('teaserTypes', $teaserTypes);
    }
}
