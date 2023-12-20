<?php

namespace App\DeliveryCost;
class DeliveryCost
{
    protected float $weight;
    protected float $height;
    protected float $width;
    protected float $length;
    protected ?float $priceSeller;
    protected float $priceFinal;
    protected string $priceType;

    public function __construct(float $weight, float $height, float $width, float $length, ?float $priceSeller = null)
    {
        $this->setWeight($weight);
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
        $this->setPriceSeller($priceSeller);
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     * @return void
     */
    public function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @return void
     */
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @return void
     */
    public function setWidth(float $width): void
    {
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @return void
     */
    public function setLength(float $length): void
    {
        $this->length = $length;
    }

    /**
     * @return float|null
     */
    public function getPriceSeller(): float|null
    {
        return $this->priceSeller;
    }

    /**
     * @param float|null $priceSeller
     * @return void
     */
    public function setPriceSeller(?float $priceSeller): void
    {
        $this->priceSeller = $priceSeller;
    }

    /**
     * @return string
     */
    public function getPriceType(): string
    {
        return $this->priceType;
    }

    /**
     * @return float
     */
    public function calculateDelivery(): float
    {
        $weightPrice = $this->getWeight() * 50;
        $volumePrice = ($this->getLength() * $this->getWidth() * $this->getHeight() / 1000) * 50;

        $this->priceFinal = max($weightPrice, $volumePrice);

        if ($this->priceFinal === $weightPrice) {
            $this->priceType = 'вартість доставки за вагу';
        } else {
            $this->priceType = 'вартість доставки за обʼєм';
        }

        if ($this->getPriceSeller() && $this->getPriceSeller() > $this->priceFinal) {
            $this->priceFinal = $this->getPriceSeller();
            $this->priceType = 'вартість доставки зазначена продавцем';
        }

        return $this->priceFinal;
    }

}
