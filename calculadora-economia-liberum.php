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
	
	// $concessionaria = 1;
	// $tarifay = 2;
	// $total = $tarifax + $tarifay;

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
	';
}


add_action('wp_enqueue_scripts', 'script_path_calculadora');

function script_path_calculadora() {

	// // External Javascript file
    // wp_enqueue_script( 'tryvary-script', 'https://site.com.br/assets/css/style.js', array(), '1.6.0', true );

    // Internal Javascript file
    wp_enqueue_script( 'liberum-js', plugins_url('/js/calculadora_economia_liberum.js', __FILE__ ));

    // //External CSS file
    // wp_register_style( 'calculadora-economia-liberum-external-css', "http://localhost:8888/area51/liberum-energia/wp-content/plugins/calculadora-economia-liberum/assets/css/style.css" );

    // //Internal CSS file
    // wp_register_style( 'liberum-css', plugins_url('/assets/css/style.css',__FILE__ ) );

}


/**
 * Registers a stylesheet.
 */
function estilo_calculadora() {
    wp_register_style( 'my-plugin', plugins_url( 'calculadora-economia-liberum/assets/css/style.css' ) );
    wp_enqueue_style( 'my-plugin' );
}
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'estilo_calculadora' );



// Shortcode
add_shortcode('calcular-economia-liberum', 'calcular_economia');