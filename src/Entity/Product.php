<?php

namespace WorldOfWonders\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Column;

/**
 * Product entity
 *
 * @Entity
 */
class Product
{
    /**
     * @Id
     * @GeneratedValue
     * @Column(type="integer")
     */
    protected int $id;

    /**
     * @Column(type="string")
     */
    protected string $name;

    /**
     * @Column(type="string")
     */
    protected ?string $imageUrl;

    /**
     * @Column(type="text")
     */
    protected ?string $description;

    /**
     * @Column(type="integer")
     */
    protected int $price;

    /**
     * @Column(type="float")
     */
    protected float $taxRate;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): Product
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): Product
    {
        $this->description = $description;
        return $this;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice(int $price): Product
    {
        $this->price = $price;
        return $this;
    }

    public function getTaxRate(): float
    {
        return $this->taxRate;
    }

    public function setTaxRate(float $taxRate): Product
    {
        $this->taxRate = $taxRate;
        return $this;
    }
}
