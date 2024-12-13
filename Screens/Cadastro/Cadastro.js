// variáveis

let label_nome = document.querySelector("#label_nome");
let label_email = document.querySelector("#label_email");
let label_senha = document.querySelector("#label_senha");

let input_nome = document.querySelector("#username");
let input_email = document.querySelector("#email");
let input_senha = document.querySelector("#password");

let btn_cadastrar = document.querySelector("#btn_cadastrar");

// Funções


input_nome.addEventListener('keyup', () =>{

    if(input_nome.value.length <= 2){

        label_nome.innerHTML = '<label>Nome de usuário *Insira no minimo 3 caracteres!*</label>'
        
    }else{

        label_nome.innerHTML = '<label>Nome de usuário</label>'
        
    }


})

function validarEmail(email) {
    
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return emailRegex.test(email);
}


btn_cadastrar.addEventListener('click', (event) => {

    event.preventDefault();

    const emailValue = input_email.value;

    if (!validarEmail(emailValue)) {

        label_email.innerHTML = '<label>E-mail *Por favor, insira um email válido.*</label>';
        
    } else {

        label_email.innerHTML = '<label>Email</label>';
        
        
    }
});
