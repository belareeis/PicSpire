const button = document.getElementById("Criar");
const modal = document.querySelector("dialog");



button.onclick = function(){
    modal.showModal()
}

butttonClose.onclick = function(){
    modal.close()
}

const openButton = document.getElementById("Criar");
const popupDialog = document.getElementById("popupDialog");

openButton.addEventListener("click", () => {
    popupDialog.showModal();
});


const closeButton = document.getElementById("closePopup");

closeButton.addEventListener("click", () => {
    popupDialog.close();
});


const pictureInput = document.getElementById("picture__input");
const previewImage = document.getElementById("preview-image");

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