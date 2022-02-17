<?php
/**************************************************************************************
 * Objetivo: Arquivo de fuções que alteram o Template, poderá ser utilizado dentro do projeto.
 * Autor: Thales Santos
 * Data: 11/02/2022 | Última modificação: 12/02/2022 | Alterações: função 'geraOption' agora
 *                                                                 deixa selecionado o valor 
 *                                                                 que o usuário escolheu anteriormente.
 * Versão: 1.1
 *************************************************************************************/

// função que gera uma sequência de tags <option></option> com valores numéricos
// seus parâmetros equivalem ao range de números 
function geraOption($numeroInical, $numeroFinal, $selecionado){
    $acumuladora = (string) null;

    for($i = $numeroInical; $i <= $numeroFinal; $i++){
        $selected = $selecionado == $i && $selecionado != 0 ? 'selected' : null;

        $acumuladora .='<option value="'. $i .'"' . $selected  .'>'. $i .'</option>';
    }
    return $acumuladora;   
}

// função que gera uma sequência de tags <span></span> 
// para cada valor do array passado como parâmetro
function imprimeArray($array){
    $acumuladora = (string) null;

    foreach($array as $number){
        $acumuladora.= '<span>'. $number .'</span><br>';
    }

    return $acumuladora;
}



?>