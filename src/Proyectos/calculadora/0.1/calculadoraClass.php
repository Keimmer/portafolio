<?php

class Calculator
{
    //attributes for the values
    public int $number1, $number2;
    public $operator;
    public $result;

    //calculator function the one who gets the result
    function returnOperation($oper)
    {
        //switch case to get the correct operation
        switch ($oper) {
            case 'x' || '*':
                $this->result = $this->number1 * $this->number2;
                break;
            case '/':
                $this->result = $this->number1 / $this->number2;
                break;
            case '+':
                $this->result = $this->number1 + $this->number2;
                break;
            case '-':
                $this->result = $this->number1 - $this->number2;
                break;
            default:
                return 'invalid operator';
        }

        return $this->result;
    }

    //I couldn't find a better way to call this function
    function sendValues($num1, $num2, $oper)
    {
        //cheking if the values entered in the input form are integers
        if ((float)$num1) {
            $this->number1 = $num1;
        } else {
            return 'invalid number 1';
        }
        if ((float)$num2) {
            $this->number2 = $num2;
        } else {
            return 'invalid number 2';
        }
        //returning the operation
        return $this->returnOperation($oper);
    }
}

$newCalc = new Calculator;
if (isset($_POST['submit'])) {
    echo "<div class='result'> El resultado es: " . $result = $newCalc->sendValues($_POST['number1'], $_POST['number2'], $_POST['operator']) . "<div>"
        . "<a href='calculadora.html'>Volver</a>";
}
