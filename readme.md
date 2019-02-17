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

The property `size` works the same way.

## Change log

### dev-master
- Use `lib.contentElement` instead of `lib.fluidContent`
- Migrate database requests to doctrine
- Use inject methods instead of annotations
- Add teaser layouts to backend module
- Remove configuration button in backend module
- Adjust file extension for typoscript and tsconfig files

### 1.7.1
- Plugin preview not working in TYPO3 9 LTS

### 1.7.0
- Add new teaser properties person and persons

### 1.6.1
- Display also "name" of teasers in BE page module

### 1.6.0
- Display all selected teasers in BE page module

### 1.5.1
- Bugfix-Release, repair TCA of tt_content override

### 1.5.0
- Display all "core-palettes" (header, behaviour, access, ...)

### 1.4.1
- Don't allow empty size property

### Version 1.4.0
- Add new teaser property "size"

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