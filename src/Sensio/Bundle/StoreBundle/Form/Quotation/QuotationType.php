<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuotationType
 *
 * @author stefan
 */

namespace Sensio\Bundle\StoreBundle\Form\Quotation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Sensio\Bundle\StoreBundle\Form\CustomerType;
use Sensio\Bundle\StoreBundle\Form\Quotation\EntryType;

class QuotationType extends AbstractType {
    public function getName(){
        return 'quotation';
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('customer', new CustomerType())
                ->add('amount','money')
                ->add('entries','collection',array('type'=>new EntryType(),'allow_add'=>true))
                ->add('vat','money')
                ->add('total','money')
                ->add('createTheQuotation','submit');        
    }
}

?>
