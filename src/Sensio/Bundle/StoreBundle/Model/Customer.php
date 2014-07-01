<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Customer
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Model;
use Symfony\Component\Validator\Constraints as Assert;

class Customer {
   /**
    * @Assert\NotBlank()
    * @Assert\Length(min=2,max=30)
    */
    private $name;
    
    /**
     * @Assert\NotBlank()
     * @Assert\Email)_
     */
    private $email;
    /**
     * @Assert\NotBlank()
     *
     */
    private $address;
    /**
     * @Assert\NotBlank()
     *
     */
    private $zipCode;
    /**
     * @Assert\NotBlank()
     *
     */
    private $city;
    /**
     * @Assert\NotBlank()
     * @Assert\Country()
     */
    private $country;
    
    private $company;
    
    public function __construct() {
        $this->country = "RO";
        $this->name = "My Name";
    }
    
    public function getCity() {
        return $this->city;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setCountry($country) {
        $this->country = $country;
    }
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCompany() {
        return $this->company;
    }

    public function setCompany($company) {
        $this->company = $company;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function getZipCode() {
        return $this->zipCode;
    }

    public function setZipCode($zipCode) {
        $this->zipCode = $zipCode;
    }
}

?>
