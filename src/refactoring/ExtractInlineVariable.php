<?php


namespace video\refactoring;


class ExtractInlineVariable
{
    function computePrice(Order $order): float
    {
        $result = $order->quantity * $order->itemPrice -
            max(0, $order->quantity - 500) * $order->itemPrice * 0.05 +
            min($order->quantity * $order->itemPrice * 0.1, 100);
        return $result;
    }
}

class Order {
    public $quantity;
    public $itemPrice;
}