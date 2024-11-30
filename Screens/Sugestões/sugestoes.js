// Alterna a seleção de uma categoria
function toggleSelection(button) {
    button.classList.toggle('selected');
}

// Envia as preferências selecionadas
function submitPreferences() {
    const selectedCategories = document.querySelectorAll('.category.selected');
    if (selectedCategories.length === 0) {
        alert('Por favor, selecione ao menos uma categoria!');
    } else {
        const preferences = Array.from(selectedCategories).map(btn => btn.innerText);
        alert(`Suas preferências foram salvas: ${preferences.join(', ')}`);
    }
}
