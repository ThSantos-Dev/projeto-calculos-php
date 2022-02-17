<?php
$caminho_base = realpath(__DIR__);

$caminho = $caminho_base . '/../components/header.php';


/**
 * TIPOS DE IMPORTAÇÃO - Importação de arquivos no PHP
 * include ou riquere - permitem fazer a importação de arquivos no PHP
 * Utilizando a opção com _once, o servidor realiza uma restrição para importar somente uma vez o arquivo (melhor opção).
 */
// Imports
require_once('../modules/config.php'); // Arquivo que contém as Mensagens do Sistema
require_once('../modules/calculos.php'); // Arquivo que contém os Cálculos matématicos de todo o Sistema


// Linha de reaciocínio do Professor Marcel
// Declaração de variáveis
$valor1 = (float) 0;
$valor2 = (float) 0;
$resultado = (float) 0;
$operacao = (string) null; // boa prática iniciar o valor em 'null', caso ela ainda não tenha valor definido



//  Validação para verificar se o botão foi clicado
if (isset($_POST['btncalc'])) {
	// Recebe os dados do formulário
	$valor1 = $_POST['txtn1'];
	$valor2 = $_POST['txtn2'];

	// Validação de tratamento de erro para caixa vazia
	if ($_POST['txtn1'] == "" || $_POST['txtn2'] == "")
		echo (ERRO_MSG_CAIXA_VAZIA);
	else {
		// Validação de tratamento de erro para 'rdo' sem escolha
		if (!isset($_POST['rdocalc']))
			echo (ERRO_MSG_OPERACAO_CALCULO);
		else {
			// Validação de tratamento para a entrada de String ao invés de números
			if (!is_numeric($valor1) || !is_numeric($valor2))
				echo (ERRO_MSG_CARACTER_INVALIDO_TEXTO);
			else {
				// Apenas podemos receber o valor do 'rdo' quando ele EXISTIR!
				$operacao = strtoupper($_POST['rdocalc']);

				// Chamada da função de cálculos matemáticos, passamos os valores e o tipo da operação.
				// E então receberemos o valor do resultado do cálculo
				$resultado = operacaoMatematica($valor1, $valor2, $operacao);
			}
		}
	}
}
?>


<html>

<head>
	<title>Calculadora - Simples</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/menu.css">
</head>

<body id="calculadora">
	<?php
	include_once($caminho);
	?>

	<div class="container">
		<div id="conteudo">
			<div id="titulo">
				<h1>Calculadora Simples</h1>
			</div>
			<div id="form">
				<form name="frmcalculadora" method="post" action="calculadora.php">
					<div id="input-text">
						<label for="txtn1"> Valor 1:</label>
						<input type="text" name="txtn1" value="<?= $valor1 ?>"> <br>

						<label for="txtn2">Valor 2:</label>
						<input type="text" name="txtn2" value="<?= $valor2 ?>"> <br>
					</div>
					<div id="container_opcoes">
						<input type="radio" name="rdocalc" value="somar" size="10" <?= $operacao == 'SOMAR' ? 'checked' : null; ?>>Somar <br>
						<input type="radio" name="rdocalc" value="subtrair" <?= $operacao == 'SUBTRAIR' ? 'checked' : null; ?>>Subtrair <br>
						<input type="radio" name="rdocalc" value="multiplicar" <?= $operacao == 'MULTIPLICAR' ? 'checked' : null; ?>>Multiplicar <br>
						<input type="radio" name="rdocalc" value="dividir" <?= $operacao == 'DIVIDIR' ? 'checked' : null; ?>>Dividir <br>
					</div>

					<div id="btnCalc">
						<input type="submit" name="btncalc" value="Calcular">
					</div>

					<div id="resultado">
						<span id="">O Resultado é:<br> <?= $resultado; ?>
							<!-- essa sintaxe é equivalente a <//?php echo $resultado?> -->
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>