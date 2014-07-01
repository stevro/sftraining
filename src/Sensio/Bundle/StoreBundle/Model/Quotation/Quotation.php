<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Quotation
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Model\Quotation;

use Symfony\Component\Validator\Constraints as Assert;
use Sensio\Bundle\StoreBundle\Model\Customer;

class Quotation {
    /**
     * @Assert\Valid()
     */
    private $customer;
    /**
     * @Assert\Valid()
     */
    private $entries;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="float", message="Amount must be a valid number.")
     */
    private $amount;
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="float", message="VAT must be a valid number.")
     */
    private $vat;
    /**
     * @Assert\NotBlank()
     * @Assert\Type(type="float", message="Total must be a valid number.")
     */
    private $total;
    
    public function __construct() {
        
        $this->amount = 0;
        $this->vat = 0;
        $this->total = 0;
        
        $this->setEntries(array(
            new Entry(), new Entry(), new Entry(), new Entry(), new Entry()
        ));
    }
    
    /**
     * Assert\True(message="Name is mandatory for non registred")
     * 
     */
//    public function isName(){
//        if(true){
//            return true;
//        }else{
//            return false;
//        }
//    }
    
    public function setEntries($entries){
        $this->entries = array();
        foreach($entries as $entry){
            $this->entries[]=$entry;
        }
    }
    
    public function getEntries(){
        return $this->entries;
    }
    
    public function setCustomer(Customer $customer){
        $this->customer = $customer;
    }
    public function getCustomer(){
        return $this->customer;
    }
    public function getAmount() {
        return $this->amount;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function getVat() {
        return $this->vat;
    }

    public function setVat($vat) {
        $this->vat = $vat;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    
   


}

?>
