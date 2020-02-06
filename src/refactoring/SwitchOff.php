<?php


namespace victor\refactoring;


class SwitchOff
{

    function f($messageType): bool {
        echo "Cod inainte";
        $result = $this->handleMessage($messageType);
        echo "Cod inainte";
        return  $result;
    }

    public function handlePlaceOrder(): bool
    {
        echo "Marcel: pun #sieu aici ceva \n";
        if (true) {
            try {
                echo "Maricica: pun #sieu aici ceva \n";
            } catch (
            \Exception $e) {
            }
        }

        echo "Florin: pun #sieu aici ceva \n";
        echo "Marcel: pun #sieu aici ceva \n";
        echo "COD\n";
    }

    /**
     * @param $messageType
     * @return bool
     * @throws \Exception
     */
    public function handleMessage($messageType): bool
    {
        switch ($messageType) {
            case 'PLACE_ORDER':
                return $this->handlePlaceOrder();
            case 'CANCEL_ORDER':
                echo "COD2\n";
                break;
            case 'SHIP_ORDER':
                echo "COD3\n";
                break;
            default:
                throw new \Exception('Unexpected value' . $messageType);
        }
//        return $result;
    }
}