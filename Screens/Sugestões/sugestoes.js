document.querySelectorAll('.option').forEach(button => {
    button.addEventListener('click', function() {
        this.classList.toggle('selected');
    });
});

document.getElementById('submit').addEventListener('click', function() {
    const selectedOptions = Array.from(document.querySelectorAll('.option.selected')).map(option => option.dataset.value);
    alert('Opções selecionadas: ' + selectedOptions.join(', '));
});