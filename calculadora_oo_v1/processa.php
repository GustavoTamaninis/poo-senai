<?php
    final class Calculadora
    {
        public static function somar(float $a, float $b) : float{
            return $a + $b;
        }
        public static function subtrair(float $a, float $b) : float{
            return $a - $b;
        }
        public static function multiplicar(float $a, float $b) : float{
            return $a * $b;
        }
        public static function dividir(float $a, float $b){
            if($b == 0){
                return "Erro: divisão por zero.";
            }
            return $a / $b;
        }

        public static function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado){
            echo "<h1>Resultado</h1>";

            if(!empty($er)){
                echo "<p class='error'>" . htmlspecialchars($er, ENT_QUOTES, "UTF-8") . "</p>";
            }else{
                echo "<p>Operação: <strong>" . htmlspecialchars($oper) ."</strong><p>";
                echo "<p>" . htmlspecialchars($v1, ENT_QUOTES, "UTF-8");

                switch($oper){
                    case "somar":
                        echo "+";
                        break;
                    case "subtrair":
                        echo "-";
                        break;
                    case "multiplicar":
                        echo "X";
                        break;
                    case "dividir":
                        echo "÷";
                        break;
                }
                echo " " . htmlspecialchars($v2, ENT_QUOTES, "UTF-8");
                echo " = <strong>" . htmlspecialchars($resultado, ENT_QUOTES, "UTF-8") . "</strong></p>";
            }

            echo "<p><a href='index.html'>Voltar</a></p>";
        }

        public static function parse_num($val) : ?float{
            $s = trim($val);
            $s = str_replace(',', '.', $s);

            if(!preg_match("/^s*[+-]?\d+(?:[\.,]\d+)?\s*$/", $s)){
                return null;
            }

            return floatval($s);
        }
    }

    //recebendo os dados:
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $valor1 = $_POST["valor1"] ?? "";
        $valor2 = $_POST["valor2"] ?? "";
        $operacao = $_POST["operacao"] ?? "";

        $result = null;
        $error = null;

        $val1 = Calculadora::parse_num($valor1);
        $val2= Calculadora::parse_num($valor2);

        //validando:
        if($val1 == null || $val2 == null){
            $error = "Entrada inválida. Certifique-se de informar números válidos.";
        }else{
            switch($operacao){
                case 'somar':
                    $result = Calculadora::somar($val1, $val2); //estou passando os dois valores como argumentos para o método somar, que está no objeto Calculadora. O retorno será o resultado da soma.
                    break;
                case 'subtrair':
                    $result = Calculadora::subtrair($val1, $val2);
                    break;
                case 'multiplicar':
                    $result = Calculadora::multiplicar($val1, $val2);
                    break;
                case 'dividir':
                    if($val2 == 0){
                        $error = "Divisão por zero.";
                    }else{
                        $result = Calculadora::dividir($val1, $val2);
                    }
                    break;
                default:
                    $error = "Operação desconhecida.";
            }
        }

        Calculadora::exibirResultado($error, $operacao, $val1, $val2, $result);
    }
?>