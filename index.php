<?php
    require('autoload.php');

    if (!isset($_SESSION)) {
        session_start();
    };

    $metaCharset = new Meta("UTF-8");
    $metaHttpEquiv = new Meta(null, null, "X-UA-Compatible", "IE=edge");
    $metaName = new Meta(null, "viewport", null, "width=device-width, initial-scale=1.0");

    $linkBootstrap = new LinkCss("https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css","stylesheet", "sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl","anonymous");

    $title = new Title("Calculadora");

    $head = new Head();
    $head->addElement($metaCharset);
    $head->addElement($metaHttpEquiv);
    $head->addElement($metaName);
    $head->addElement($linkBootstrap);
    $head->addElement($title);

    $body = new Body('');

    $container = new Div('container bg-light col-3');

    $calc = new Calculadora();
    
    if (isset($_POST['value'])) {
        switch ($_POST['value']) {
            case 'C':
                $_SESSION['num1'] = '';
                $_SESSION['operation'] = '';
                $_SESSION['num2'] = '';
                $_SESSION['screen'] = '0';
                break;
            case '=':
                $_SESSION['screen'] = $calc->calc($_SESSION['num1'], $_SESSION['operation'], $_SESSION['num2']);
                break;
            case '/':
                $_SESSION['num1'] = $_SESSION['screen'];
                $_SESSION['operation'] = $_POST['value'];
                $_SESSION['num2'] = '';
                $_SESSION['screen'] = $_SESSION['num1'];
                break;
            case '*':
                $_SESSION['num1'] = $_SESSION['screen'];
                $_SESSION['operation'] = $_POST['value'];
                $_SESSION['num2'] = '';
                $_SESSION['screen'] = $_SESSION['num1'];
                break;
            case '+':
                $_SESSION['num1'] = $_SESSION['screen'];
                $_SESSION['operation'] = $_POST['value'];
                $_SESSION['num2'] = '';
                $_SESSION['screen'] = $_SESSION['num1'];
                break;
            case '-':
                $_SESSION['num1'] = $_SESSION['screen'];
                $_SESSION['operation'] = $_POST['value'];
                $_SESSION['num2'] = '';
                $_SESSION['screen'] = $_SESSION['num1'];
                break;
            default:
                if (isset($_POST['value']) && (!empty($_POST['value']))) {
                    if (($calc->ValorZerado($_SESSION['num2'])) && // num2 nao informado e operacao informada entao tem que receber o segundo valor
                       ((isset($_SESSION['operation'])) && (!empty($_SESSION['operation'])))) {
                        $_SESSION['screen'] = $_POST['value'];
                        $_SESSION['num2'] = $_SESSION['screen'];
                    } elseif ((isset($_SESSION['operation'])) && (!empty($_SESSION['operation']))) {
                        $_SESSION['screen'] .= $_POST['value'];
                        $_SESSION['num2'] = $_SESSION['screen'];
                    } else {
                        if ($calc->ValorZerado($_SESSION['screen'])) {
                            $_SESSION['screen'] = $_POST['value'];
                        } else {
                            $_SESSION['screen'] .= $_POST['value'];
                        }
                    }
                } elseif ($calc->ValorZerado($_POST['value'])) {
                    if (($calc->ValorZerado($_SESSION['num2'])) && // num2 nao informado e operacao informada entao tem que receber o segundo valor
                       ((isset($_SESSION['operation'])) && (!empty($_SESSION['operation'])))) {
                        $_SESSION['screen'] = $_POST['value'];
                        $_SESSION['num2'] = $_SESSION['screen'];
                    } elseif ((isset($_SESSION['operation'])) && (!empty($_SESSION['operation']))) {
                        $_SESSION['screen'] .= $_POST['value'];
                        $_SESSION['num2'] = $_SESSION['screen'];
                    } else {
                        if ($calc->ValorZerado($_SESSION['screen'])) {
                            $_SESSION['screen'] = $_POST['value'];
                        } else {
                            $_SESSION['screen'] .= $_POST['value'];
                        }
                    } 
                }
                break;
        }
    }

    if (isset($_SESSION['screen']) && (!empty($_SESSION['screen']))) {
        $expression = $_SESSION['screen'];    
    } elseif (isset($_SESSION['screen']) && (empty($_SESSION['screen']))) {
        $expression = '0';
    }

    $table = new Table('table table-bordered');
    $Tr0 = new Tr();
    $Td01 = new Th('row', '4');
    $Td01Button = new Input('text', 'form-control', '1', '', 'true', $expression);
    $Td01->addElement($Td01Button);

    $Tr0->addElement([$Td01]);

    $Tr1 = new Tr();
    $Td11 = new Th('row');
    $Td11Button = new Button('btn btn-success', 'submit', '1', 'value', '1');
    $Td11Button->addElement('1');
    $Td11->addElement($Td11Button);

    $Td12 = new Td();
    $Td12Button = new Button('btn btn-success', 'submit', '2', 'value', '2');
    $Td12Button->addElement('2');
    $Td12->addElement($Td12Button);

    $Td13 = new Td();
    $Td13Button = new Button('btn btn-success', 'submit', '3', 'value', '3');
    $Td13Button->addElement('3');
    $Td13->addElement($Td13Button);

    $Td14 = new Td();
    $Td14Button = new Button('btn btn-success', 'submit', '+', 'value', '+');
    $Td14Button->addElement('+');
    $Td14->addElement($Td14Button);

    $Tr1->addElement([$Td11,$Td12,$Td13,$Td14]);
    
    $Tr2 = new Tr();
    $Td21 = new Th('row');
    $Td21Button = new Button('btn btn-success', 'submit', '4', 'value', '4');
    $Td21Button->addElement('4');
    $Td21->addElement($Td21Button);

    $Td22 = new Td();
    $Td22Button = new Button('btn btn-success', 'submit', '5', 'value', '5');
    $Td22Button->addElement('5');
    $Td22->addElement($Td22Button);

    $Td23 = new Td();
    $Td23Button = new Button('btn btn-success', 'submit', '6', 'value', '6');
    $Td23Button->addElement('6');
    $Td23->addElement($Td23Button);

    $Td24 = new Td();
    $Td24Button = new Button('btn btn-success', 'submit', '-', 'value', '-');
    $Td24Button->addElement('-');
    $Td24->addElement($Td24Button);

    $Tr2->addElement([$Td21,$Td22,$Td23,$Td24]);

    $Tr3 = new Tr();
    $Td31 = new Th('row');
    $Td31Button = new Button('btn btn-success', 'submit', '7', 'value', '7');
    $Td31Button->addElement('7');
    $Td31->addElement($Td31Button);

    $Td32 = new Td();
    $Td32Button = new Button('btn btn-success', 'submit', '8', 'value', '8');
    $Td32Button->addElement('8');
    $Td32->addElement($Td32Button);

    $Td33 = new Td();
    $Td33Button = new Button('btn btn-success', 'submit', '9', 'value', '9');
    $Td33Button->addElement('9');
    $Td33->addElement($Td33Button);

    $Td34 = new Td();
    $Td34Button = new Button('btn btn-success', 'submit', '*', 'value', '*');
    $Td34Button->addElement('*');
    $Td34->addElement($Td34Button);
    
    $Tr3->addElement([$Td31,$Td32,$Td33,$Td34]);

    $Tr4 = new Tr();
    $Td41 = new Th('row');
    $Td41Button = new Button('btn btn-success', 'submit', '0', 'value', '0');
    $Td41Button->addElement('0');
    $Td41->addElement($Td41Button);

    $Td42 = new Td();
    $Td42Button = new Button('btn btn-success', 'submit', 'C', 'value', 'C');
    $Td42Button->addElement('C');
    $Td42->addElement($Td42Button);

    $Td43 = new Td();
    $Td43Button = new Button('btn btn-success', 'submit', '/', 'value', '/');
    $Td43Button->addElement('/');
    $Td43->addElement($Td43Button);

    $Td44 = new Td();
    $Td44Button = new Button('btn btn-success', 'submit', '=', 'value', '=');
    $Td44Button->addElement('=');
    $Td44->addElement($Td44Button);

    $Tr4->addElement([$Td41,$Td42,$Td43,$Td44]);

    $table->tbody->addElement([$Tr0,$Tr1,$Tr2,$Tr3,$Tr4]);

    $form = new Form('', 'POST', 'form-group');

    $form->addForm($table);

    $container->addElement($form);
    
    $body->addElement($container);

    $html = new Html("pt-br", $head, $body);

    echo $html;
?>