<?php
/**
 * Calculadora de Economia de Energia Liberum
 *
 * Plugin Name: Calculadora Liberum
 * Plugin URI:  https://neighbouring.com.br/
 * Description: Calculadora de Economia de Energia com Shortcode
 * Version:     1.0.0
 * Author:      Flávio Conca / Vanzak Labs / Neighbouring
 * Author URI:  https://neighbouring.com.br/
 * License:     GPLv2 or later
 * Text Domain: calculadora-tarifa-liberum
 * Requires at least: 4.9
 * Tested up to: 5.8
 * Requires PHP: 5.2.4
 *
 * Este programa efetua o cálculo de economia da economia sobre a tarifa de energia do usuário em referência a Liberum Energia.
 */



/* Função Calculo Comum */

// function calcular(){
	
// 	$tarifax = 1;
// 	$tarifay = 2;
// 	$total = $tarifax + $tarifay;

// 	echo $total;

// 	echo '<script>
// 		prompt("';
// 	echo $total;
// 	echo '");
// 	</script>';

// }



/* Calculadora de Economia */
function calcular_economia(){
	
	$concessionaria = 1;
	$tarifay = 2;
	$total = $tarifax + $tarifay;

	echo '<div id="calculadoraEconomia">

    <label for="concessao">Qual a sua concessionária de energia?</label>
        <select
        id="selectConcessao"
        name="concessao"
        oninput="selectConcessao()"
        onchange="selectConcessao()">
            <option disabled selected value> -- Concessionária -- </option>
            <option value="EDP">EDP</option>
            <option value="CEMIG">CEMIG</option>
        </select>

    <label>Em média, quanto você gasta com a conta de luz por mês?</label>
        <input
        id="trfUsuario"
        type="range"
        min="400" max="30000"
        value="100" step="100"
        oninput="valorTarifaUsuario()"
        onchange="valorTarifaUsuario()">
        <div id="trfUsuarioNaConta">R$ 400</div>



	</div>

	<div id="resultadoCalculo">

		<div>
			<h2>Veja AGORA o quanto de dinheiro você tem deixado na mesa…</h2>
			<p>Em 12 meses, você economizará aproximadamente <span id="economiaTotal12">R$ 3.624,84</span> por ano mesmo continuando com a 
				<span id="selectConcessUsuario"></span>
			</p>
			<p>Aproximadamente <span id="economiaTotal01">R$ 20,00</span> por mês.*</p>
			<p>* Essa simulação foi feita considerando uma conexão bifásica. O desconto real pode sofrer alterações.</p>

		</div>

	</div>

	<style>
		label, select, input,
		#trfUsuarioNaConta,
		#resultadoCalculo{
			display: block;
			margin: 25px;
		}
		input#trfUsuario {
		width: -webkit-fill-available;
		}
		select#selectConcessao {
		margin: auto;
		text-align: center;
		width: 50%;
		}
		#resultadoCalculo{
			display: none;
		}
		div#calculadoraEconomia,
		div#resultadoCalculo {
			text-align: center;
		}
	</style>

	<script>

		// Função #selectConcessao
		function selectConcessao(){
			var selConcessionaria = document.getElementById("selectConcessao").value;
			document.getElementById("selectConcessUsuario").innerHTML = selConcessionaria;
			document.getElementById("resultadoCalculo").style.display = "block";
		}

		// Função de Cálculo
		function valorTarifaUsuario() {

			// Desconto
			var desconto = 0.15;
			// Impostos
			var impPISCOFINS = 0.04;
			var impICMS = 0.25;
			// Tarifas
			var trfIDP = 0.61051;
			var trfCEMIG = 0.61805;
			// Descontos
			var descEDP = 0.15;
			var descCEMIG = 0.18;

			// Selecionar valor do Range #trfUsuario
			var trfUsr = document.getElementById("trfUsuario").value;
			// Insere na div #trfUsuarioNaConta o valor declarado na variável trfUsr
			document.getElementById("trfUsuarioNaConta").innerHTML = "R$ " + trfUsr; 

			// Calcular Economia
			var economia = (trfUsr - ( 100 * ( trfIDP / (1-impPISCOFINS)/(1-impICMS) ) + 40 )) / (trfIDP /(1-impPISCOFINS)/(1-impICMS)) * trfIDP * desconto;
			var economiaAno = economia * 12;
			// console.log(economia*12);

			// ExibirEconomia
		}

	</script>
			
	';

}

add_shortcode('economia-liberum', 'calcular_economia');

