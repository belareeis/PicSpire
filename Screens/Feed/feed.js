const button = document.getElementById("Criar");
const modal = document.querySelector("dialog");
const butttonClose = document.getElementById("btnFechar");

button.onclick = function(){
    modal.showModal()
}

butttonClose.onclick = function(){
    modal.close()
}