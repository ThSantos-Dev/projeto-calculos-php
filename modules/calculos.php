<?php
/**************************************************************************************
 * Objetivo: Arquivo de fuções matemáticas que poderá ser utilizado dentro do projeto.
 * Autor: Thales Santos
 * Data: 04/02/2022 | Última modificação: 11/02 | Alterações: implementação das funções
 *                                                              classificaNumero e 
 *                                                              calculaTabuada
 * Versão: 1.3
 *************************************************************************************/

// função para cálculos matemáticos
// recebe como parâmetro 2 números e uma operação a calcular
function operacaoMatematica($numero1, $numero2, $operacao) {
    // Declaração de variáveis locais da função (todas as variáveis recebem os dados do parâmetro da function)
    $num1 = (double) $numero1;
    $num2 = (double) $numero2;
    $tipoCalculo = (String) $operacao;
    $result = (double) 0;

    // Processamento do cálculo das operações
    switch($tipoCalculo) {
        case 'SOMAR': 
            $result = $num1 + $num2;
            break;
        case 'SUBTRAIR':
            $result = $num1 - $num2;
            break;
        case 'MULTIPLICAR':
            $result = $num1 * $num2;
            break;
        case 'DIVIDIR':
            if($num2 == 0)
                echo(ERRO_MSG_DIVISAO_POR_ZERO);
            else
                $result = $num1 / $num2;					
            break;			
        default: 
            echo(ERRO_MSG_OPERACAO_INVALIDA);
    }
        
        $result = round($result, 2);
        return $result;
}

// função para cálculo de média para N valores
function calculaMedia(...$campos) {
    // Somando todas as notas e divindo pela quantidade da mesma
    return array_sum($campos) / count($campos);
}

// função que classifica um número como Par ou Impar
// recebe como parâmetro o range de números para classificação
function classificaNumero($numInical, $numFinal){
    // Declaração do array utilizado para receber os valores 
    //  classificados como Pares e Impares, respectivamente em suas Chaves
    $array = [
        'Pares' => [],
        'Impares' => []
    ];

    // Laço que permite a classificação dos valores
    foreach(range($numInical, $numFinal) as $numero){
        $numero % 2 == 0 ? array_push($array['Pares'], $numero) : array_push($array['Impares'], $numero) ;
    }
    // retorna o array com os números devidamente classificados 
    return $array;
}

function calculaTabuada($tabuada, $contador) {
    // variavel que conterá os valores gerados pelo laço
    $acumuladora = (string) null;

    // laço que a cada loop gera uma tag <span></span> para cada elemento da tabuada
    for($i = 0; $i <= $contador; $i++){
        $acumuladora.= "<span>{$tabuada} x {$i} = " . ($tabuada * $i) . "</span><br>";
    }
    //  retorna o valor da tabuada composta por N tags <span></span>
    return $acumuladora;
}

?>