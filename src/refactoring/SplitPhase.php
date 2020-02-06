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
}

echo (new SplitPhase())->calculateOrderPrice('Chair-CHR 4', ["CHR" => 5]);