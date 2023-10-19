document.addEventListener('DOMContentLoaded', (event) => {
  const rotateCard = () => {
      const cardContainer = document.querySelector('.card-container');
      cardContainer.classList.toggle('rotate');
      
      const body = document.body;
      if (body.classList.contains('body')) {
          body.classList.remove('body');
          body.classList.add('bodyd');
      } else {
          body.classList.remove('bodyd');
          body.classList.add('body');
      }
  }

  const btnSignup = document.querySelector('#btn-signup');
  const btnLogin = document.querySelector('#btn-login');

  btnSignup.addEventListener('click', rotateCard);
  btnLogin.addEventListener('click', rotateCard);
});
var cpf = document.querySelector("#cpf");

function mascara(i){
   
    var v = i.value;
    
    if(isNaN(v[v.length-1])){ // impede entrar outro caractere que não seja número
       i.value = v.substring(0, v.length-1);
       return;
    }
    
    i.setAttribute("maxlength", "14");
    if (v.length == 3 || v.length == 7) i.value += ".";
    if (v.length == 11) i.value += "-";
 
 }

        // Abrir ou criar o banco de dados
        const request = window.indexedDB.open('meuBancoDeDados', 1);

        // Manipuladores de eventos para o banco de dados
        request.onerror = (event) => {
            console.error('Erro ao abrir o banco de dados:', event.target.error);
        };

        request.onupgradeneeded = (event) => {
            const db = event.target.result;

            // Criar uma loja de objetos (tabela)
            const objectStore = db.createObjectStore('usuarios', { keyPath: 'id', autoIncrement: true });

            // Definir índices (caso necessário)
            objectStore.createIndex('nome', 'nome', { unique: false });
            objectStore.createIndex('email', 'email', { unique: true });

            console.log('Banco de dados criado e loja de objetos (tabela) configurada.');
        };

        request.onsuccess = (event) => {
            const db = event.target.result;

            // Manipular o banco de dados aqui
            // Exemplo: Adicionar dados à loja de objetos (tabela)
            const transaction = db.transaction(['usuarios'], 'readwrite');
            const objectStore = transaction.objectStore('usuarios');
            const novoUsuario = { nome: 'João', email: 'joao@email.com' };

            const addRequest = objectStore.add(novoUsuario);

            addRequest.onsuccess = () => {
                console.log('Novo usuário adicionado com sucesso.');
            };

            addRequest.onerror = () => {
                console.error('Erro ao adicionar o usuário:', addRequest.error);
            };
        };

        request.onblocked = () => {
            console.warn('O banco de dados está bloqueado devido a uma conexão ativa. Feche outras abas ou aplicativos que possam estar usando o banco de dados.');
        };

