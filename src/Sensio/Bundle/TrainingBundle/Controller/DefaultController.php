<?php

namespace Sensio\Bundle\TrainingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Session;
use Sensio\Bundle\TrainingBundle\Converter;

class DefaultController extends Controller
{
    
    /**
     * @Route("/convert/{celsius}/fahrenheit/{_format}",
     *        requirements={
     *              "celsius"="\d+",
     *              "_format" = "xml|json"
     *          })
     * 
     * @Template()
     */
    public function celsiusAction($celsius)
    {
        $celsius = (float)$celsius;
        
        $rsp = new Converter\CelsiusConverter($celsius);
        
    
        return array('fahrenheit'=>$rsp->toFahrenheit(),
                    'celsius'=>$rsp->getValue()
            );
    }
           
            
    
    /*
     * render Lesson
     */
    
    public function counterAction()
    {
        $counter = rand(1, 9999);
        
        return new Response($counter.' people online');
    }
    
    /*
     * end of render lesson
     */
    
    /*
     * Session lesson
     */
    /**
     * @Route("/hello/{name}", name="greet")
     * @Template("SensioTrainingBundle:Default:index.html.twig")
     */
    public function indexAction(Request $request, $name)
    {
       
        //$name = $request->attributes->get('name');
        
        $session = $request->getSession();
        $session->set('username',$name);
        
        return $this->redirect($this->generateUrl('hello'));
    }
    
    /**
     * @Route("/hello", name="hello")
     * @Template("SensioTrainingBundle:Default:index.html.twig")
     */
    public function helloAction(Request $request)
    {
    if(!$name = $request->getSession()->get('username')){
        throw $this->createNotFoundException('Not Found!!! Write your damn name in the URL to put it in the session!!!');
    } 
        return array('name'=>$name);
    }
    
    /*
     * End of session lesson
     */
    
    
    
    /*
     * Cookie lesson
     */
    /**
     * @Route("/hello/{name}", name="greet")
     * @Template("SensioTrainingBundle:Default:index.html.twig")
     */
//    public function indexAction($name)
//    {
//       
//        $expires = new \DateTime('+30 days');
//        $cookie = new Cookie('username', $name, $expires);
//        $response = $this->redirect($this->generateUrl('hello'));
//        $response->headers->setCookie($cookie);
//        
//        return $response;
//    }
    
    /**
     * @Route("/hello", name="hello")
     * @Template("SensioTrainingBundle:Default:index.html.twig")
     */
//    public function helloAction(Request $request)
//    {
//    if(!$name = $request->cookies->get('username')){
//        throw $this->createNotFoundException('Not Found!!! Write your damn name in the URL!!!');
//    } 
//        return array('name'=>$name);
//    }
    
    /*
     * End of cookie lesson
     */
    
    
}
