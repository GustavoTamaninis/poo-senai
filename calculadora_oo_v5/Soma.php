<?php 
    final class Soma implements IOperacao{
        //Atributos do objeto:
        private float $num1; //atributo do objeto da classe
        private float $num2;

        //Método que permite retornar o valor de $num1 para quem o solicitar.
        public function getNum1(): float{
            return $this->num1;
        }

        //Método que permite receber um número para que este seja armazenado no atributo $num1
        public function setNum1(float $num1): void{ //"void", quer dizer que não retorna nada.
            $this->num1 = $num1;
        }

        //Método que permite retornar o valor de $num1 para quem o solicitar.
        public function getNum2(): float{
            return $this->num2;
        }

        //Método que permite receber um número para que este seja armazenado no atributo $num1
        public function setNum2(float $num2): void{
            $this->num2 = $num2;
        }

        //Método que faz o cálculo de soma dos valores:
        public function calcula(): float{
            return $this->num1 + $this->num2;
        }
    }
?>