<?php
/*
 * @author  Dierk Landmann <dierk@landmann.tv>
 * inspired by Ivica Tadić <ivica.tadic@ymail.com>
 */

class Landmann_ProductPreview_Block_Adminhtml_Catalog_Product_Edit extends Mage_Adminhtml_Block_Catalog_Product_Edit
{

	public function getHeader()
	{
		$header = parent::getHeader();

		if ($this->getProduct()->getId()) {
            $productUrl = $this->getProduct()->getUrlInStore();
            $previewUrl = $this->getUrl('landmann_productpreview/product/preview', array(
                'id' => $this->getProductId(),
                'key' => Mage::helper('landmann_productpreview/catalog_product')->getHashForProduct($this->getProductId()),
                '_store' => $this->getProduct()->getStoreId(),
            ));
			$header .= "&nbsp&nbsp<a href='$productUrl' target='_blank'>view</a>";
            $header .= "&nbsp&nbsp<a href='$previewUrl' target='_blank'>preview</a>";
		}

		return $header;
	}

}