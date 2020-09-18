<?php
namespace victor\refactoring\videostore;

class Movie
{
    public const PRICE_CODE_NEW_RELEASE = "NEW_RELEASE";
    public const PRICE_CODE_REGULAR = "REGULAR";
    public const PRICE_CODE_CHILDREN = "CHILDRENS";

    private string $title;

    private string $priceCode;

    public function __construct(string $title, string $priceCode)
    {
        $this->title = $title;
        $this->priceCode = $priceCode;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPriceCode(): string
    {
        return $this->priceCode;
    }

}