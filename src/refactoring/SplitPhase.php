<?php


namespace victor\refactoring;


class SplitPhase
{

    // TODO: pass individual pieces
    // Example 1
    function calculateOrderPrice(string $orderString, array $priceList): float {
        $orderData = preg_split('/\s+/', $orderString);
        $productPrice = $priceList[preg_split('/-/', $orderData[0])[1]];
        $orderPrice = $orderData[1] * $productPrice;
        return $orderPrice;
    }

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

echo (new SplitPhase())->calculateOrderPrice('Chair-CHR 4', ["CHR" => 5]);