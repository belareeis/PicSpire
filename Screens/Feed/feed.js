const button = document.getElementById("Criar");
const modal = document.querySelector("dialog");

const openButton = document.getElementById("Criar");
const popupDialog = document.getElementById("popupDialog");

const closeButton = document.getElementById("closePopup");

const pictureInput = document.getElementById("picture__input");
const previewImage = document.getElementById("preview-image");


button.onclick = function(){
    modal.showModal()
}

butttonClose.onclick = function(){
    modal.close()
}


openButton.addEventListener("click", () => {
    popupDialog.showModal();
});



closeButton.addEventListener("click", () => {
    popupDialog.close();
});


pictureInput.addEventListener("change", (event) => {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result; 
            previewImage.style.display = "block"; 
        };
        reader.readAsDataURL(file); 
        
    }
});