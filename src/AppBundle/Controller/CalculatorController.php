<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
    /**
     * @Route("/",name="calculatorForm")
     */
    public function formAction()
    {
        return $this->render('@App/Calculator/form.html.twig');
    }

    /**
     * @Route("/computation",name="calculatorComputation")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function computationAction(Request $request)
    {
        $firstNumber = $request->get("first_number");
        $lastNumber = $request->get("last_number");
        $computation = $request->get("computation");
        $result = 0;
        $symbol = "";
        $message = "";
        switch ($computation){
            case "add":
                $result = $firstNumber +  $lastNumber;
                $symbol = "+";
                break;
            case "subtract":
                $result = $firstNumber -  $lastNumber;
                $symbol = "-";
                break;
            case "multiply":
                $result = $firstNumber *  $lastNumber;
                $symbol = "*";
                break;
            case "divide":
                if ($firstNumber > 0 && $lastNumber > 0){
                    $result = $firstNumber /  $lastNumber;
                }else{
                    $message = "На 0 делить нельзя";
                }
                $symbol = "/";
                break;
            default:
        }

        return $this->render('@App/Calculator/computation.html.twig',[
            'firstNumber'=>$firstNumber,
            'lastNumber'=>$lastNumber,
            'symbol'=>$symbol,
            'result'=>$result,
            'message'=>$message
        ]);
    }

}
