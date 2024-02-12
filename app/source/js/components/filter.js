const selectElement = document.getElementById('news-filter__select');

document.addEventListener('DOMContentLoaded', function() {
    const options = Array.from(selectElement.options);
    
    options.forEach(option => {
        if(option.selected){
            option.textContent = 'Ordenar por: ' + option.textContent;
        }
    });
});

selectElement.addEventListener('change', function() {
    const selectedOption = this.options[this.selectedIndex];
    const selectedText = selectedOption.textContent;
    
    selectedOption.textContent = `Ordenar por: ${selectedText}`;

    Array.from(this.options).
        forEach(option => {  
            if (option !== selectedOption){  
                option.textContent = option.textContent.replace('Ordenado por:', ""); 
            }  
    });
});