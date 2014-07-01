<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Contact
 *
 * @author stefan
 */

namespace Sensio\Bundle\TrainingBundle\Contact;

use Symfony\Component\Validator\Constraints as Assert;

class Contact {
    /**
     *
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    public $sender;
    
    /**
     *
     * @Assert\NotBlank()
     * @Assert\Length(min=10, max=50)
     */
    public $subject;
    
    /**
     * @author Stefan Matei
     * @var String
     * 
     * @Assert\NotBlank()
     */
    
    public $message;
    
    public function send($recipient){
        $headers[]=sprintf('From: %s',$this->sender);
        $headers[]=sprintf('Reply-To: %s',$this->sender);
        
        return mail($recipient,
                $this->subject,
                $this->message,
                implode("\r\n",$headers)
                );
                
    }
}

?>
