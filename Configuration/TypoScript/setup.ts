# Module configuration
module.tx_teasermanager_web_teasermanageradmin {
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
lib.fluidContent.partialRootPaths.268 = EXT:teaser_manager/Resources/Private/Partials/

tt_content.teasermanager_teaser < lib.fluidContent
tt_content.teasermanager_teaser {
  templateName = Teaser/List.html
  dataProcessing {
    1 = CHF\TeaserManager\DataProcessing\TeaserProcessor
    1 {
      dataProcessing {
        10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
        10 {
          references.fieldName = image
        }
      }
    }

  }
}