# magento2-configurable-product
### A Magento 2 extension to customise configurable product price and swatch option

Whenever all associated items of a configurable products are out of stock, the Price and Item Options are not shown in Magento 2
This feature is was there in Magento 1.x and is still carried on in Magento 2
But in most cases seller doesn't want that. Even though the product is out of stock we still need to show price and available options.

If your store needs that feature you can install this module.

 ## How to install
 
 ### Composer method
 Install the module via composer.
 
 **Install Extension**:
 
 ```
 composer require subrata/configurableproduct:*
 php bin/magento cache:clean
 php bin/magento setup:static-content:deploy en_US
 php bin/magento indexer:reindex
 php bin/magento cache:clean
 php bin/magento cache:flush
 
 ```
 
 
 **Update Extension**:
 
 ```
 composer update subrata/configurableproduct:*
 php bin/magento cache:clean
 php bin/magento setup:static-content:deploy en_US
 php bin/magento indexer:reindex
 php bin/magento cache:clean
 php bin/magento cache:flush
 
 ```
 
 #### Authentication required (Optional)
 
 ![Authentication required](https://i.imgur.com/dmryiPk.png)
 
 If you have not added this authentication, you can follow [this guide](http://devdocs.magento.com/guides/v2.0/install-gde/prereq/connect-auth.html)
 

