<?php 
    final class TrataeMostra{
        public static function exibirResultado(?string $er, string $oper, ?float $v1, ?float $v2, ?float $resultado){
            echo "<h1>Resultado</h1>";

            if(!empty($er)){
                echo "<p class='error'>" . htmlspecialchars($er, ENT_QUOTES, "UTF-8") . "</p>";
            }else{
                echo "<p>Operação: <strong>" . htmlspecialchars($oper) ."</strong><p>";
                echo "<p>" . htmlspecialchars($v1, ENT_QUOTES, "UTF-8") . " ";

                switch($oper){
                    case "somar":
                        echo "+";
                        break;
                    case "subtrair":
                        echo "-";
                        break;
                    case "multiplicar":
                        echo "x";
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

        public static function parse_num($val) : ?float {
            $s = trim($val);
            $s = str_replace(',', '.', $s);

            if(!preg_match("/^\s*[+-]?\d+(?:[\.,]\d+)?\s*$/", $s)){
                return null;
            }

            return floatval($s);
        }
    }
?>