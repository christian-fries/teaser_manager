
# Module configuration
module.tx_teasermanager_web_teasermanageradmin {
  persistence {
    storagePid = {$module.tx_teasermanager_admin.persistence.storagePid}
  }
  view {
    templateRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Templates/
    templateRootPaths.1 = {$module.tx_teasermanager_admin.view.templateRootPath}
    partialRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Partials/
    partialRootPaths.1 = {$module.tx_teasermanager_admin.view.partialRootPath}
    layoutRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Layouts/
    layoutRootPaths.1 = {$module.tx_teasermanager_admin.view.layoutRootPath}
  }
}
# Plugin configuration
module.tx_teasermanager {
  persistence {
    storagePid = {$module.tx_teasermanager_admin.persistence.storagePid}
  }
  view {
    templateRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Templates/
    templateRootPaths.1 = {$module.tx_teasermanager_admin.view.templateRootPath}
    partialRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Partials/
    partialRootPaths.1 = {$module.tx_teasermanager_admin.view.partialRootPath}
    layoutRootPaths.0 = EXT:teaser_manager/Resources/Private/Backend/Layouts/
    layoutRootPaths.1 = {$module.tx_teasermanager_admin.view.layoutRootPath}
  }
}

lib.fluidContent.templateRootPaths.268 = EXT:teaser_manager/Resources/Private/Templates/

tt_content.teasermanager_teaser < lib.fluidContent
tt_content.teasermanager_teaser {
  templateName = Teaser.html
  dataProcessing {
    #1 = CHF\TeaserManager\DataProcessing\TeaserProcessor
    #1 {
    #  useHere = theConfigurationOfTheDataProcessor
    #}


    10 = TYPO3\CMS\Frontend\DataProcessing\DatabaseQueryProcessor
    10 {
      table = tx_teasermanager_domain_model_teaser
      selectFields = tx_teasermanager_domain_model_teaser.*
      pidInList = 4
      join = tx_teasermanager_ttcontent_teaser_mm ON tx_teasermanager_ttcontent_teaser_mm.uid_foreign = tx_teasermanager_domain_model_teaser.uid
      where.data = field:uid
      where.intval = 1
      where.wrap = tx_teasermanager_ttcontent_teaser_mm.uid_local=|
      orderBy = tx_teasermanager_ttcontent_teaser_mm.sorting_foreign
      as = items
    }
  }
}