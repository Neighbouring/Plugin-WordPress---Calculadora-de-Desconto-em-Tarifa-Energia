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



/* Calculadora de Economia */
function calcular_economia(){

	echo '<section id="sec-calculadora-desconto">
    <div id="calculadoraEconomia">

	<h2>Veja o quanto de DINHEIRO poderá economizar com a Liberum!</h2>

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

    <div id="div-trfUsuario">
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

</div>

	

<div id="resultadoCalculo">

		<div>

			<p id="p-txt-01">Em 12 meses, você economizará aproximadamente
                <span id="economiaTotal12">R$ 3.624,84</span>
                diretamente na fatura da
			    <span id="selectConcessUsuario"></span>.
			</p>

			<p id="p-txt-02">Aproximadamente* <span id="economiaTotal01">R$ 20,00</span> por mês.</p>

			<p id="p-txt-03">*Essa simulação foi feita considerando uma conexão bifásica.<br>O desconto real pode sofrer alterações.</p>

		<div>
			<button id="btn-queroEconomizar" onclick="abreFormularioLead()">Quero economizar</button>
		</div>

</div>

</section>
	';
}



// Registrar Javascript
function script_path_calculadora() {

	// Internal Javascript file
    wp_enqueue_script( 'liberum-js', plugins_url('/js/calculadora_economia_liberum.js', __FILE__ ));

	// // External Javascript file
    // wp_enqueue_script( 'tryvary-script', 'https://site.com.br/assets/css/style.js', array(), '1.6.0', true );

}
// Registrar Action para Script
add_action('wp_enqueue_scripts', 'script_path_calculadora');



// Registrar Style Sheet
function estilo_calculadora() {

    wp_register_style( 'my-plugin', plugins_url( 'calculadora-economia-liberum/assets/css/style.css' ) );
    wp_enqueue_style( 'my-plugin' );

}
// Registrar Action para Style Sheet CSS
add_action( 'wp_enqueue_scripts', 'estilo_calculadora' );



// Adicionar Shortcode
add_shortcode('calcular-economia-liberum', 'calcular_economia');