const selectElement = document.getElementById('news-filter__select');

document.addEventListener('DOMContentLoaded', function() {
    var options = selectElement.options;

    for (var i = 0; i < options.length; i++) {
        if (options[i].hasAttribute('selected')) {
            options[i].textContent = `Ordenado por: ${options[i].textContent}`;
        }
    }
});

selectElement.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const selectedText = selectedOption.textContent;

    selectedOption.textContent = `Ordenado por: ${selectedText}`;

    for (let i = 0; i < this.options.length; i++) {
        if(this.options[i] !== selectedOption){

            this.options[i].textContent = this.options[i].textContent.replace("Ordenado por:", "");
        }
    }
});