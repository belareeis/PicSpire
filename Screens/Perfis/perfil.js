// Pop-Up Criar Pasta

const btn_abrir_criar_pasta = document.getElementById("btn_abrir_criar_pasta")
const btn_criar_pasta = document.getElementById("btn_criar_pasta")
const btn_fechar_pasta = document.getElementById("btn_fechar_pasta")

const input_nome_da_pasta = document.getElementById("input_nome_da_pasta")
const pop_up_criar_pasta = document.getElementById("pop_up_criar_pasta")

btn_abrir_criar_pasta.onclick = function(){

    pop_up_criar_pasta.showModal()
}

btn_fechar_pasta.onclick = function(){

    pop_up_criar_pasta.close()

}


























// Pop-Up Criar

const button = document.getElementById("Criar");
const modal_pop_up = document.querySelector("dialog");

const openButton = document.getElementById("Criar");
const popupDialog = document.getElementById("popupDialog");

const buttonClose = document.getElementById("closePopup");

const pictureInput = document.getElementById("picture__input");
const previewImage = document.getElementById("preview-image");


button.onclick = function(){
    modal_pop_up.showModal()
}

buttonClose.onclick = function(){
    modal_pop_up.close()
}


openButton.addEventListener("click", () => {
    popupDialog.showModal();
});



buttonClose.addEventListener("click", () => {
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

// Mostrar o Pop-Up das fotos 

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
                margin-left:170px;
                margin-bottom:10px;
                padding:10px 20px;
                background:#e99bb2;
                color:#fff;
                border:none;
                border-radius:50px;
                cursor:pointer;
                font-weight:bolder;
                "
                
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
