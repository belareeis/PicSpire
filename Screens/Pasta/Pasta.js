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
                
                >Excluir Pic</button>

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
