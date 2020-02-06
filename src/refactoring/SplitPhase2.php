<?php


namespace victor\refactoring;


class SplitPhase
{

    // Example 2:
    function priceOrder(Product $product, int $quantity, ShippingMethod $shippingMethod) {
        $basePrice = $product->getBasePrice() * $quantity;
        $discount = max($quantity - $product->getDiscountThreshold(), 0)
            * $product->getBasePrice() * $product->getDiscountRate();
        $shippingPerCase = ($basePrice > $shippingMethod->getDiscountThreshold())
            ? $shippingMethod->getDiscountedFee() : $shippingMethod->getFeePerCase();
        $shippingCost = $quantity * $shippingPerCase;
        $price = $basePrice - $discount + $shippingCost;
        return $price;
    }
}

class Product {
    function getBasePrice() {
    }
    function getDiscountThreshold() {
    }
    function getDiscountRate() {
    }
}
class ShippingMethod {

    public function getDiscountThreshold()
    {
    }

    public function getDiscountedFee()
    {
        return 0;
    }

    public function getFeePerCase()
    {
        return 0;
    }
}