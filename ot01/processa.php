<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        function somar($a, $b){
            return $a + $b;
        }
    
        function subtrair($a, $b){
            return $a - $b;
        }
    
        function multiplicar($a, $b){
            return $a * $b;
        }
    
        function dividir($a, $b){
            if($b == 0){
                return null;
            }else{
                return $a / $b;
            }
        }
    
        function parse_num($val){
            $s = trim($val); // remove espaços
            $s = str_replace(",", ".", $s); // troca vírgulas por pontos.
            if(!preg_match("/^s*[+-]?\d+(?:[\.,]\d+)?\s*$/", $s)){
                return null;
            }else{
                return floatval($s);
            }
        }
    
        // Recebendo dados:
        $valor1 = $_POST['valor1'] ?? "";
        $valor2 = $_POST['valor2'] ?? "";
        $operacao = $_POST['operacao'] ?? "";
        
        $val1 = parse_num($valor1);
        $val2 = parse_num($valor2);

        $result = null;
        $error = null;

        if($val1 == null || $val2 == null){
            $error = 'Entrada Inválida. Certifique-se de informar números válidos.';
        }else{
            switch($operacao){
                case 'somar':
                    $result = somar($val1, $val2);
                    break;
                case 'subtrair':
                    $result = subtrair($val1, $val2);
                    break;
                case 'multiplicar':
                    $result = multiplicar($val1, $val2);
                    break;
                case 'dividir':
                    if($val2 == 0){
                        $error = 'Divisão por zero não permitida.';
                    }else{
                        $result = dividir($val1, $val2);
                    }
                    break;
                default:
                    $error = 'Operação desconhecida.';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Calculadora</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <main class="container">
        <h1>Resultado</h1>

        <?php if($error !== null): ?>
            <p class="error"><?php echo htmlspecialchars($error, ENT_QUOTES, "UTF-8")?></p>
        <?php else:?>
            <p>Operação: <strong><?php echo htmlspecialchars($operacao); ?></strong></p>
            <p><?php echo htmlspecialchars($val1); ?>
                <?php 
                    switch($operacao){
                        case 'somar': echo '+'; break;
                        case 'subtrair': echo '-'; break;
                        case 'multiplicar': echo 'X'; break;
                        case 'dividir': echo '÷'; break;
                    }
                ?>
                <?php echo htmlentities($val2); ?> =
                <strong><?php echo htmlspecialchars($result); ?></strong>
            </p>
        <?php endif; ?>
        <p><a href="index.html">Voltar</a></p>
    </main>
</body>
</html>