function AvisoToranja() {
  var numeroDigitado = parseFloat(document.getElementById('resultado1').value);
  var resultado = numeroDigitado * (20999);
  document.getElementById('resultado').innerText = `Os ${numeroDigitado} deu um valor de R$${resultado},99 Boa Compra :)`
}
  function trocarComImagemPrincipal(imagemClicada) {
    // Obtém a URL da imagem clicada
    var urlImagemClicada = imagemClicada.src;

    // Obtém a URL da imagem principal
    var urlImagemPrincipal = document.getElementById('imagem1').src;

    // Define a URL da imagem clicada como a nova imagem principal
    document.getElementById('imagem1').src = urlImagemClicada;

    // Define a URL da imagem principal como a imagem clicada
    imagemClicada.src = urlImagemPrincipal;
}
