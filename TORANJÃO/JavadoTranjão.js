// Fazer esta função 2º (Ela troca a imagem do sorvete grande)
function imgSlider(anything) {
    document.querySelector('.Maçã').src = anything;
}

// Fazer esta função 3º (Ela troca a cor do círculo)
function changeCircleColor(color) {
    const circulo = document.querySelector('.circulo');
    circulo.style.background = color;
}

// Fazer esta função 1º (Ela altera o estado Ativo/Desativo)
function toggleMenu() {
    var menuToogle = document.querySelector('.toggle'); // Cria uma variável e usa o DOM para selecionar a classe (.toggle)
    var links = document.querySelector('.links'); // Cria uma variável e usa o DOM para selecionar a classe (.links)
    menuToogle.classList.toggle('active') // Troca o estado da classe (.toggle) para ativo
    links.classList.toggle('active') // Troca o estado da classe (.links) para ativo
}

// MAÇÂ
function trocarBotao1() {
    let troca = document.getElementById("TextoTroca")


    troca.innerText = "Está é a maça normal do minecraft ajude ela a ganhar dinheiro  para poder comprar ouro e uma golden apple";

}

function trocarBotao2() {
    let troca = document.getElementById("TextoTroca")


    troca.innerText = "Está e a golden apple ajude ela a ganhar dinheiro para ela poder virar uma maçã do capiroto e ficar boa";

}

function trocarBotao3() {
    let troca = document.getElementById("TextoTroca")

    // Função para trocar o texto quando o botão for clicado

    troca.innerText = "Esta é a maçã do capiroto pois ela está sozinha compre mais para ela ter uma irmazinha";

}
