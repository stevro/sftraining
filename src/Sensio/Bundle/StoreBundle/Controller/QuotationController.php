<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of QuotationController
 *
 * @author stefan
 */
namespace Sensio\Bundle\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\StoreBundle\Model\Quotation\Quotation;
use Sensio\Bundle\StoreBundle\Form\Quotation\QuotationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

class QuotationController extends Controller{
    /**
     * @Route("/quotation/new",name="new_quotation")
     * @Template()
     */
    public function indexAction(Request $request){
        $quotation = new Quotation();
        $form = $this->createForm(new QuotationType(), $quotation);
        
        $form->handleRequest($request);
        if($form->isValid()){
            return $this->redirect($this->generateUrl('quotation_success'));
        }
        
        return array('form'=>$form->createView());
    }
    
    /**
     * @Route("/quotation/success", name="quotation_success")
     * @Template()
     */
    public function successAction(){
        return array();
    }
}

?>
