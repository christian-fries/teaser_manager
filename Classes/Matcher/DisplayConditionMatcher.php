<?php
namespace CHF\TeaserManager\Matcher;

use TYPO3\CMS\Core\Database\DatabaseConnection;

/**
 * Class DisplayConditionMatcher
 *
 * Decide whether or not to display a field based on the selected teaser type
 *
 * @author Christian Fries <hallo@christian-fries.ch>
 * @package CHF\TeaserManager\Matcher
 */
class DisplayConditionMatcher {
    /**
     * @var DatabaseConnection
     */
    protected $databaseConnection;

    public function __construct()
    {
        $this->databaseConnection = $GLOBALS['TYPO3_DB'];
    }

    /**
     * @param array $params The parameters provided by the displayCond evaluation class
     * @param Object $ref
     * @return bool
     */
    public function checkTeaserField($params, $ref)
    {
        $fieldName = $params['conditionParameters'][0];
        $teaserTypeId = (int) $params['record']['type'][0];

        $result = $this->databaseConnection->exec_SELECTgetSingleRow(
            'fields',
            'tx_teasermanager_domain_model_teasertype',
            'uid = ' . $teaserTypeId
        );

        $fieldNamesToDisplay = explode(',', $result['fields']);
        if (in_array($fieldName, $fieldNamesToDisplay)) {
            return true;
        }
        return false;
    }
}