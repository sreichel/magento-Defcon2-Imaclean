# Deprecated

After comments at https://github.com/OpenMage/magento-lts/issues/1475 i'll archive this in favor of https://github.com/fballiano/magento1-image-cleaner.

# Magento: Image Clean

This estension lists all the product images that they find in the directory "media/catalog/product" and that they do not in the database. It allows to select and to erase these files

## Compatible with:
- 1.0
- 1.1
- 1.2
- 1.3
- 1.4
- 1.4.1.1
- 1.4.2
- 1.5
- 1.6
- 1.6.1
- 1.6.2.0
- 1.7
- 1.8
- 1.8.1
- 1.9
- 1.9.1
- 1.9.2

## Magento Connect: 
https://www.magentocommerce.com/magento-connect/image-clean.html

## Installation:

### Via modman
```
modman clone https://github.com/sreichel/magento-Defcon2-Imaclean.git
```
### Via composer:
```
{
    "require": {
        "defcon2/imaclean": "*",
    },
    "repositories": [
        {
            "type": "vcs",
            "url":  "https://github.com/sreichel/magento-Defcon2-Imaclean.git"
        }
    ]
}
