<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entry
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Model\Quotation;
use Symfony\Component\Validator\Constraints as Assert;

class Entry {
    /**
     * @Assert\NotBlank()
     */
    private $designation;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="float", message="Unit price must be a number")
     */
    private $unitPrice;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Regex(pattern="/\d+/", message="Quantity must be an integer")
     * @ Assert\Min(1)
     * @Assert\Range(min = "1")
     */
    private $quantity;
    
    public function __construct() {
        $this->quantity = 1;
    }
    public function getDesignation() {
        return $this->designation;
    }

    public function setDesignation($designation) {
        $this->designation = $designation;
    }

    public function getUnitPrice() {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice) {
        $this->unitPrice = $unitPrice;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }


}

?>
