<?php
namespace Subrata\ConfigurableProduct\Block\Product\Renderer;

class Configurable extends \Magento\Swatches\Block\Product\Renderer\Configurable
{
    /**
     * Get Allowed Products
     *
     * @return \Magento\Catalog\Model\Product[]
     */
    public function getAllowProducts()
    {
        $products = $this->getProduct()->getTypeInstance()->getUsedProducts($this->getProduct(), null);
        $this->setAllowProducts($products);

        return $this->getData('allow_products');
    }
}
