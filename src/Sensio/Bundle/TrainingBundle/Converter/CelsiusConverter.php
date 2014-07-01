<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CelsiusConverter
 *
 * @author stefan
 */

namespace Sensio\Bundle\TrainingBundle\Converter;

class CelsiusConverter {

    private $value;
    
    public function __construct($value) {
        $this->value = (float)$value;
    }
    
    public function toFahrenheit()
    {
        return ($this->value*9)/5+32;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
}

?>
