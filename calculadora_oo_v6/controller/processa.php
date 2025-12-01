<?php
    require_once "../model/IOperacao.php";
    require_once "../model/Operacoes.php";
    require_once "../model/Soma.php";
    require_once "../model/Subtracao.php";
    require_once "../model/Multiplicacao.php";
    require_once "../model/Divisao.php";
    require_once "TrataeMostra.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $valor1 = $_POST["valor1"] ?? "";
        $valor2 = $_POST["valor2"] ?? "";
        $operacao = $_POST["operacao"] ?? "";

        $val1 = TrataeMostra::parse_num($valor1);
        $val2 = TrataeMostra::parse_num($valor2);

        $result = null;
        $error = null;

        $oper = null;

        //validando:
        if($val1 == null || $val2 == null){
            $error = "Entrada inválida. Certifique-se de informar números válidos.";
        }else{
            switch($operacao){
                case 'somar':
                    $oper = new Soma();
                    break;
                case 'subtrair':
                    $oper = new Subtracao();
                    break;
                case 'multiplicar':
                    $oper = new Multiplicacao();
                    break;
                case 'dividir':
                    if($val2 == 0){
                        $error = "Divisão por zero.";
                    }else{
                        $oper = new Divisao();
                    }
                    break;
                default:
                    $error = "Operação desconhecida.";
            }
            $oper->setNum1($val1);
            $oper->setNum2($val2);
            $result = $oper->calcula();
        }

        TrataeMostra::exibirResultado($error, $operacao, $val1, $val2, $result);
    }
?>