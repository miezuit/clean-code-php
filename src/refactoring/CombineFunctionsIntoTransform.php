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
        $ticketView = $this->createView($ticket);
        return $this->renderTicket($ticketView);
    }

    public function createView(Ticket $ticket): TicketView // "Transform function"
    {
        $ticketView = new TicketView($ticket);
        $ticketView->qrCode = self::generateQRCode($ticket->getCode());
        $ticketView->address = self::getAddress($ticket->getEventId());
        return $ticketView;
    }

    public function renderTicket(TicketView $ticketView): string
    {
        $invoice = "Invoice for " . $ticketView->ticket->getCustomerName() . "\n";
        $invoice .= "QR Code: " . $ticketView->qrCode . "\n";
        $invoice .= "Address: " . $ticketView->address . "\n";
        $invoice .= "Please arrive 20 minutes before the start of the event\n";
        $invoice .= "In case of emergency, call 0899898989\n";
        return $invoice;
    }
}
class TicketView {
    public Ticket $ticket;
    public string $qrCode;
    public string $address;
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
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