
document.querySelectorAll('.card').forEach(card => {

    card.addEventListener('click', () => {

        const modal = document.createElement('div');

        modal.innerHTML = 

        ` <div 
            
            style="
            position:fixed;
            top:50%;left:50%;
            transform:translate(-50%,-50%);
            background:#fff;
            padding:20px;
            width:270px;
            height:auto;
            border-radius:8px;
            box-shadow:0 4px 8px rgba(0,0,0,0.2);
            z-index:1000;">
            
                <button 
                
                style="
                
                display:flex;
                justify-content:right;
                margin:5px;
                padding:10px 20px;
                background:#e99bb2;
                color:#fff;
                border:none;
                border-radius:50px;
                cursor:pointer;"
                
                >X</button>
                
                <img src="${card.querySelector('img').src}" style="width:100%;border-radius:8px;"/>

                <p style="text-align:left;margin-top:10px;color:black">${card.querySelector('p').textContent}</p>


                <button 
                
                style="
                display:block; 
                margin:15px auto;
                padding:10px 20px;
                background:#e99bb2;
                color:#fff;
                border:none;
                border-radius:4px;
                cursor:pointer;"
                
                >Salvar Pic</button>

            </div>

            <div 
            style="
            position:fixed;
            top:0;left:0;
            width:100%;
            height:100%;
            background:rgba(0,0,0,0.5);
            z-index:999;"
            ></div>
        `;
        document.body.appendChild(modal);

        modal.querySelector('button').addEventListener('click', () => modal.remove());
        modal.querySelector('div:last-child').addEventListener('click', () => modal.remove());
    });
});



// Configurações do Pop-Up

const button = document.getElementById("Criar");
const modal_pop_up = document.querySelector("dialog");

const openButton = document.getElementById("Criar");
const popupDialog = document.getElementById("popupDialog");

const ButtonClose = document.getElementById("closePopup");

const pictureInput = document.getElementById("picture__input");
const previewImage = document.getElementById("preview-image");


button.onclick = function(){
    modal_pop_up.showModal()
}

ButtonClose.onclick = function(){
    modal_pop_up.close()
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