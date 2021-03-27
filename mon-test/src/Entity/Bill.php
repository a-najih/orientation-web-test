<?php

namespace App\Entity;

use App\Repository\BillRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BillRepository::class)
 */
class Bill
{
    const TVA = 0.2;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * ®@var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(type="decimal", precision=7, scale=2)
     */
    private $priceHt;

    /**
     * @var float
     */
    private $priceTtc;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    /**
     * @param string $designation
     *
     * @return $this
     */
    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPriceHt(): ?float
    {
        return $this->priceHt;
    }

    /**
     * @param float $priceHt
     *
     * @return $this
     */
    public function setPriceHt(float $priceHt): self
    {
        $this->priceHt = $priceHt;

        return $this;
    }

    /**
     * The Price TTC is calculated automatically from Price HT.
     * The formula is  : Price TTC = Price HT + 20% Price HT (TVA = 20%)
     *
     * @return float
     */
    public function getPriceTtc(): float
    {
        return $this->priceHt + self::TVA * $this->priceHt;
    }
}
