# EXT:teaser_manager

This TYPO3 extension provides a backend module that allows you to manage teasers in a central place and use them wherever you need them.

## Icon provider

To provide icons to the icon selector, define them in the Page TS of your site package:
```
tx_teasermanager.icons {
    icon-mail = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang_db.xlf:teasermanager.icon.mail
    icon-phone = LLL:EXT:my_sitepackage/Resources/Private/Language/locallang_db.xlf:teasermanager.icon.phone
}
```

## Change log

### Version 1.3.0
- Add layouts to teaser type for different representations of the same teaser type

### Version 1.2.0
- Add new teaser property "icon selector" to choose an icon from a predefined set

### Version 1.1.0
- Add new property name to teaser for better identification in backend
- Add filter to teaser selector
- Automatically reload teasers when teaser type changes

### Version 1.0.3
- Replace rest of module icons

### Version 1.0.2
- Adjust classname from "teaser-type-{teaser.type}" to "teaser-type-{teaser.type.uid}" 

### Version 1.0.1
- Replace backend module icon 

### Version 1.0.0

- First stable release