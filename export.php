<?php

/*
 *   external tool for exporting the magento products and products' data 
 *   by http://elegantxmods.com
 *   FB    http://facebook.com/pages/Modx-support/159804034043556
 *   TW    http://twitter.com/modxdeveloper
 *   UTube https://www.youtube.com/channel/UCcFgHxc6xQizEPzSFyOJHgg/videos
 *   Blog  http://phpcmsmodx.info/
 */

require_once('app/Mage.php');
Mage::app();
 
$collection = Mage::getModel('catalog/product')->getCollection();

$collection->addAttributeToSelect('image');

foreach ($collection as $product) {

    $prod = Mage::helper('catalog/product')->getProduct($product->getId(), null, null);
    echo $product->getSKU() . ',';
    $attributes = $prod->getTypeInstance(true)->getSetAttributes($prod);

    $galleryData = $prod->getData('media_gallery');

    foreach ($galleryData['images'] as &$image) {
        echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA).'catalog/product'. $image['file']; break;
    } 
    echo '<br />';

}