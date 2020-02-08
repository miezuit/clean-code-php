<?php


namespace victor\refactoring;

class CombineFunctionsIntoTransform
{
    static function generateQRCode(string $code): string
    {
        return "QR" . $code;
    }

    static function getAddress(int $eventId): string
    {
        return "In vale";
    }

    // ----------- a line -------------

    public function generateTicket(Ticket $ticket)
    {
        $invoice = "Invoice for " . $ticket->getCustomerName() . "\n";

        $invoice .= "QR Code: " . self::generateQRCode($ticket->getCode()) . "\n";
        $invoice .= "Address: " . self::getAddress($ticket->getEventId()) . "\n";
        $invoice .= "Please arrive 20 minutes before the start of the event\n";
        $invoice .= "In case of emergency, call 0899898989\n";
        return $invoice;
    }
}

// ----- SUPPORTING, DUMMY CODE ------

class Ticket
{

    public function getCustomerName()
    {
        return "EU";
    }

    public function getCode()
    {
        return "12313213214";
    }

    public function getEventId()
    {
        return "1351";
    }
}