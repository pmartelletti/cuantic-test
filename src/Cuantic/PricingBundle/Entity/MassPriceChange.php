<?php

namespace Cuantic\PricingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use OroB2B\Bundle\ProductBundle\Entity\Product;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\Config;
use Oro\Bundle\EntityConfigBundle\Metadata\Annotation\ConfigField;

/**
 * MassPriceChange
 *
 * @ORM\Table()
 * @ORM\Entity
 * @Config(
 *      defaultValues={
 *          "dataaudit"={
 *              "auditable"=true
 *          }
 *      }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
class MassPriceChange
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=200)
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    private $subject;

    /**
     * @var float
     *
     * @ORM\Column(name="percentage", type="float")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    private $percentage;

    /**
     * @var float
     *
     * @ORM\Column(name="referenceExchangeRate", type="float")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    private $referenceExchangeRate;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3)
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    private $currency;

    /**
     * @var Product
     *
     * @ORM\ManyToMany(targetEntity="OroB2B\Bundle\ProductBundle\Entity\Product")
     * @ConfigField(
     *      defaultValues={
     *          "dataaudit"={
     *              "auditable"=true
     *          }
     *      }
     * )
     */
    private $products;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set subject
     *
     * @param string $subject
     *
     * @return MassPriceChange
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set percentage
     *
     * @param float $percentage
     *
     * @return MassPriceChange
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return float
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * Set referenceExchangeRate
     *
     * @param float $referenceExchangeRate
     *
     * @return MassPriceChange
     */
    public function setReferenceExchangeRate($referenceExchangeRate)
    {
        $this->referenceExchangeRate = $referenceExchangeRate;

        return $this;
    }

    /**
     * Get referenceExchangeRate
     *
     * @return float
     */
    public function getReferenceExchangeRate()
    {
        return $this->referenceExchangeRate;
    }

    /**
     * @return Product
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param Product $products
     * @return $this
     */
    public function setProducts($products)
    {
        $this->products = $products;
        return $this;
    }
}
