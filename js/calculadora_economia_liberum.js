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
    document.getElementById("economiaTotal01").innerHTML = economia.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
        document.getElementById("economiaTotal12").innerHTML = economiaAno.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
}