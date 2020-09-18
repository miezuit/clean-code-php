<?php
namespace victor\refactoring\videostore;

class Movie
{
    public const NEW_RELEASE = "NEW_RELEASE";
    public const REGULAR = "REGULAR";
    public const CHILDREN = "CHILDRENS";

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