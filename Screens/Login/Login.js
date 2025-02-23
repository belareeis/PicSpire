document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); 
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username && password) {
        alert(`Bem-vindo, ${username}!`);
    } else {
        alert("Por favor, preencha todos os campos!");
    }
});