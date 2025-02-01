let label_nome = document.querySelector("#label_nome");
let label_email = document.querySelector("#label_email");
let label_senha = document.querySelector("#label_senha");

let input_nome = document.querySelector("#username");
let input_email = document.querySelector("#email");
let input_senha = document.querySelector("#password");

let btn_cadastrar = document.querySelector("#btn_cadastrar");


// Validar campos

input_nome.addEventListener("keyup", () => {
    if (input_nome.value.length <= 2) {
        label_nome.innerHTML = '<label>Nome de usuário *Insira no mínimo 3 caracteres!*</label>';
    } else {
        label_nome.innerHTML = '<label>Nome de usuário</label>';
    }
});


input_nome.addEventListener("keyup", () => {
    if (input_senha.value.length < 6) {
        label_senha.innerHTML = '<label>Senha *A senha deve ter no mínimo 6 caracteres!*</label>';
    } else {
        label_senha.innerHTML = '<label>Senha</label>';
    }
});

input_email.addEventListener("keyup", ()=>{
    if (!validarEmail(emailValue)) {
        label_email.innerHTML = '<label>E-mail *Por favor, insira um email válido.*</label>';
       
    } else {
        label_email.innerHTML = '<label>E-mail</label>';
    }          
        
})

// Salvar dados 


// function salvarDados() {
    
//     const nome = document.getElementById("username").value;
//     const email = document.getElementById("email").value;
//     const idade = document.getElementById("password").value;

//     const dados = {
//         nome: nome,
//         email: email,
//         idade: idade
//     };

//     const dadosJSON = JSON.stringify(dados, null, 4); 


//     const blob = new Blob([dadosJSON], { type: "application/json" });
//     const url = URL.createObjectURL(blob);

//     const a = document.createElement("a");
//     a.href = url;
//     a.download = "dados_cadastro.json";
//     a.click();

//     URL.revokeObjectURL(url);

//     alert("Os dados foram salvos no arquivo JSON.");
// }

