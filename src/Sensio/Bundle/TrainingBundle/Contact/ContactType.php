<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactType
 *
 * @author stefan
 */

namespace Sensio\Bundle\TrainingBundle\Contact;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ContactType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('sender')
                ->add('subject')
                ->add('message', 'textarea')
                ->add('sendMyMessage', 'submit');        
    }
    
    public function getName()
    {
        return 'contact';
    }
    
}

?>
