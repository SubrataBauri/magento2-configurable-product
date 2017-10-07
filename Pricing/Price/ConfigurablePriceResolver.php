<?php
/**
 * @author: Subrata Bauri
 */

namespace Subrata\ConfigurableProduct\Pricing\Price;

use Magento\ConfigurableProduct\Model\Product\Type\Configurable;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class ConfigurablePriceResolver implements \Magento\ConfigurableProduct\Pricing\Price\PriceResolverInterface
{
    /**
     * @var LowestPriceOptionsProviderInterface
     */
    private $lowestPriceOptionsProvider;

    /**
     * @param PriceResolverInterface $priceResolver
     * @param Configurable $configurable
     * @param PriceCurrencyInterface $priceCurrency
     * @param LowestPriceOptionsProviderInterface $lowestPriceOptionsProvider
     */
    public function __construct(
        \Magento\ConfigurableProduct\Pricing\Price\PriceResolverInterface $priceResolver,
        Configurable $configurable,
        PriceCurrencyInterface $priceCurrency,
        \Magento\ConfigurableProduct\Pricing\Price\LowestPriceOptionsProviderInterface $lowestPriceOptionsProvider = null
    ) {
        $this->priceResolver = $priceResolver;
        $this->configurable = $configurable;
        $this->priceCurrency = $priceCurrency;
        $this->lowestPriceOptionsProvider = $lowestPriceOptionsProvider ?:
            ObjectManager::getInstance()->get(\Magento\ConfigurableProduct\Pricing\Price\LowestPriceOptionsProviderInterface::class);
    }
    /**
     * @param \Magento\Framework\Pricing\SaleableInterface|\Magento\Catalog\Model\Product $product
     * @return float|null
     */
    public function resolvePrice(\Magento\Framework\Pricing\SaleableInterface $product)
    {
        $price = null;

        foreach ($this->lowestPriceOptionsProvider->getProducts($product) as $subProduct) {
            $productPrice = $this->priceResolver->resolvePrice($subProduct);
            $price = $price ? min($price, $productPrice) : $productPrice;
        }

        $price = $price ?: $product->getData('price');

        return $price === null ? null : (float)$price;
    }
}
