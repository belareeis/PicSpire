let label_nome = document.querySelector("#label_nome");
let label_email = document.querySelector("#label_email");
let label_senha = document.querySelector("#label_senha");

let input_nome = document.querySelector("#username");
let input_email = document.querySelector("#email");
let input_senha = document.querySelector("#password");

let btn_cadastrar = document.querySelector("#btn_cadastrar");

// Função para validar email
function validarEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Validação do nome de usuário em tempo real
input_nome.addEventListener('keyup', () => {
    if (input_nome.value.length <= 2) {
        label_nome.innerHTML = '<label>Nome de usuário *Insira no mínimo 3 caracteres!*</label>';
    } else {
        label_nome.innerHTML = '<label>Nome de usuário</label>';
    }
});

// Evento para validação e submissão do formulário
btn_cadastrar.addEventListener('click', (event) => {
    event.preventDefault(); // Previne o envio padrão para validar primeiro

    let isValid = true;

    // Validação do nome de usuário
    if (input_nome.value.length <= 2) {
        label_nome.innerHTML = '<label>Nome de usuário *Insira no mínimo 3 caracteres!*</label>';
        isValid = false;
    } else {
        label_nome.innerHTML = '<label>Nome de usuário</label>';
    }

    // Validação do email
    const emailValue = input_email.value;
    if (!validarEmail(emailValue)) {
        label_email.innerHTML = '<label>E-mail *Por favor, insira um email válido.*</label>';
        isValid = false;
    } else {
        label_email.innerHTML = '<label>E-mail</label>';
    }

    // Validação da senha (opcional, adicione regras se necessário)
    if (input_senha.value.length < 6) {
        label_senha.innerHTML = '<label>Senha *A senha deve ter no mínimo 6 caracteres!*</label>';
        isValid = false;
    } else {
        label_senha.innerHTML = '<label>Senha</label>';
    }

    // Se tudo estiver válido, submete o formulário
    if (isValid) {
        document.querySelector('form').submit();
    }
});
