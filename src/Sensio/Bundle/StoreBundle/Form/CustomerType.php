<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CustomerType
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomerType extends AbstractType{
    public function getName(){
        return 'customer';
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class'=>'Sensio\Bundle\StoreBundle\Model\Customer'));
    }
    
     public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('name')
                ->add('company','text', array('required'=>false))
                ->add('email','email')
                ->add('address','textarea')
                ->add('zipCode','text',array('label'=>'Zip code'))
                ->add('city')
                ->add('country','country');
              
    }
}

?>
