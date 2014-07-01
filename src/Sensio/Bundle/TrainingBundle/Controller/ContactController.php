<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactController
 *
 * @author stefan
 */
namespace Sensio\Bundle\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\TrainingBundle\Contact\Contact;
use Sensio\Bundle\TrainingBundle\Contact\ContactType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
#use Symfony\Component\HttpKernel\Exception;

class ContactController extends Controller{
    /**
     * @Route("/contact",name="contact")
     * @Template()     
     */    
    public function indexAction(Request $request){
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);
      
        for($i=0;$i<100000;$i++)
        {
            ;
        }
        
        $form->handleRequest($request);
        
        if($form->isValid()){
            //send mail
            $sent = $contact->send('stev.matei@gmail.com');
            
            if(!$sent){
                throw new \Exception("Mail not sent!");
            }
            
            $url = $this->generateUrl('success');
            return $this->redirect($url);
        }
        
        return array('form'=>$form->createView());
    }

    /**
    * @Route("/contact/thank-you", name="success")
    * @Template()
    */
    
    public function successAction(){
    
        return array();
        
    }
    
}

?>
