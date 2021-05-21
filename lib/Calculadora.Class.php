<?php
    class Calculadora {
        public function calc($num1 = 1, $operation, $num2 = 1) {
            switch ($operation) {
                case '-':
                    return ($num1 - $num2);
                    break;
                case '+':
                    return ($num1 + $num2);
                    break;

                case '*':
                    return ($num1 * $num2);
                    break;
                case '/':
                    return ($num1 / $num2);
                    break; 
                default:
                    return 0;
                    break;
            }
        }
        public function ValorZerado($var)
        {
            return ((isset($var)) && (empty($var)));
        }
        public function ValorInformadoNaoZerado($var)
        {
            return ((isset($var)) && (!empty($var)));
        }
    }
?>