<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EntryType
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Form\Quotation;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntryType extends AbstractType{
    public function getName(){
        return 'entry';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class'=>'Sensio\Bundle\StoreBundle\Model\Quotation\Entry'));
    }
    
     public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('designation')
                ->add('unitPrice','money', array('label'=>'Unit price'))
                ->add('quantity','integer');
              
    }
}

?>
