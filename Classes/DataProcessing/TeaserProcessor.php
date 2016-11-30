<?php
namespace CHF\TeaserManager\DataProcessing;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentDataProcessor;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 * Class for data processing for the content element "Teaser"
 */
class TeaserProcessor implements DataProcessorInterface
{
    /**
     * @var ContentDataProcessor
     */
    protected $contentDataProcessor;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contentDataProcessor = GeneralUtility::makeInstance(ContentDataProcessor::class);
    }

    /**
     * Process data for the content element "Teaser"
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(
        ContentObjectRenderer $cObj,
        array $contentObjectConfiguration,
        array $processorConfiguration,
        array $processedData
    )
    {
        // Attach teaser data
        $records = $cObj->getRecords('tx_teasermanager_domain_model_teaser', [
            'selectFields' => 'tx_teasermanager_domain_model_teaser.*',
            'pidInList' => 4,
            'join' => 'tx_teasermanager_ttcontent_teaser_mm ON tx_teasermanager_ttcontent_teaser_mm.uid_foreign = tx_teasermanager_domain_model_teaser.uid',
            'where.' => [
                'data' => 'field:uid',
                'intval' => 1,
                'wrap' => 'tx_teasermanager_ttcontent_teaser_mm.uid_local=|'
            ],
            'orderBy' => 'tx_teasermanager_ttcontent_teaser_mm.sorting'
        ]);
        $processedRecordVariables = array();
        foreach ($records as $key => $record) {
            /** @var ContentObjectRenderer $recordContentObjectRenderer */
            $recordContentObjectRenderer = GeneralUtility::makeInstance(ContentObjectRenderer::class);
            $recordContentObjectRenderer->start($record, 'tx_teasermanager_domain_model_teaser');
            $processedRecordVariables[$key] = array('data' => $record);
            $processedRecordVariables[$key] = $this->contentDataProcessor->process($recordContentObjectRenderer, $processorConfiguration, $processedRecordVariables[$key]);
        }

        $processedData['teaserItems'] = $processedRecordVariables;

        // Attach teaser type data
        $teaserTypeRecords = $cObj->getRecords('tx_teasermanager_domain_model_teasertype', [
            'selectFields' => 'tx_teasermanager_domain_model_teasertype.fields',
            'pidInList' => 4,
            'where.' => [
                'data' => 'field:teaser_type',
                'intval' => 1,
                'wrap' => 'tx_teasermanager_domain_model_teasertype.uid=|'
            ]
        ]);

        $teaserFields = [];
        if (count($teaserTypeRecords) === 1)
        {
            $teaserFieldsList = $teaserTypeRecords[0]['fields'];
            foreach(explode(',', $teaserFieldsList) as $field)
            {
                $teaserFields[$field] = 1;
            }
        }
        $processedData['teaserFields'] = $teaserFields;

        return $processedData;
    }
}