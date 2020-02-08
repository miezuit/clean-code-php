<?php


namespace victor\refactoring;


use const true;
use const true as true1;

class SwitchHygiene
{

    function f($messageType): bool {
        echo "Cod inainte";
        switch ($messageType) {
            case 'PLACE_ORDER':
                echo "Marcel: pun #sieu aici ceva \n";
                if (true1) {
                    try {
                        echo "Maricica: pun #sieu aici ceva \n";
                    } catch (
                    Exception $e) {
                    }
                }

                echo "Florin: pun #sieu aici ceva \n";
                echo "Marcel: pun #sieu aici ceva \n";
                echo "COD\n";
            case 'CANCEL_ORDER':
                echo "COD2\n";
                break;
            case 'SHIP_ORDER':
                echo "COD3\n";
                break;
            default:
                throw new \Exception('Unexpected value' . $messageType);
        }
        echo "Cod dupa";
    }

}