<?php

namespace CHF\TeaserManager\Hook;

use TYPO3\CMS\Backend\View\PageLayoutView;
use TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Contains a preview rendering for the teaser_manager page module
 */
class PluginPreview implements PageLayoutViewDrawItemHookInterface
{

    /**
     * @var array
     */
    protected $row = [];

    /**
     * @var string
     */
    protected $templatePathAndFile = 'EXT:teaser_manager/Resources/Private/Templates/Hook/PluginPreview.html';

    /**
     * Preprocesses the preview rendering of a content element
     *
     * @param PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     * @return void
     */
    public function preProcess(
        PageLayoutView &$parentObject,
        &$drawItem,
        &$headerContent,
        &$itemContent,
        array &$row
    )
    {
        if ($row['CType'] === 'teasermanager_teaser') {

            $headerContent = '';
            $drawItem = false;
            $itemContent = $this->getPluginInformation($row);
        }
    }

    /**
     * @param array $row
     * @return string
     */
    protected function getPluginInformation($row)
    {
        $standaloneView = new StandaloneView;
        $standaloneView->setTemplatePathAndFilename(GeneralUtility::getFileAbsFileName($this->templatePathAndFile));
        $standaloneView->assignMultiple(
            [
                'teaserType' => $this->readTeaserType($row['teaser_type']),
                'selectedTeasers' => $this->readSelectedTeasers($row['uid']),
            ]
        );
        return $standaloneView->render();
    }

    /**
     * @param int $teaserType
     * @return mixed
     */
    private function readTeaserType($teaserType)
    {
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            'title',
            'tx_teasermanager_domain_model_teasertype',
            'uid = '.$teaserType,
            $groupBy = '',
            $orderBy = '',
            $limit = ''
        );
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $teaserType = $row['title'];
        }
        return $teaserType;
    }

    /**
     * @param int $contentElement
     * @return array
     */
    private function readSelectedTeasers($contentElement)
    {
        $teasers = [];
        $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery(
            'teaser.title',
            'tx_teasermanager_domain_model_teaser AS teaser, tx_teasermanager_ttcontent_teaser_mm AS mm',
            'mm.uid_local = '.$contentElement.' AND mm.uid_foreign = teaser.uid',
            $groupBy = '',
            $orderBy = '',
            $limit = ''
        );
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
            $teasers[] = $row['title'];
        }
        return $teasers;
    }
}
