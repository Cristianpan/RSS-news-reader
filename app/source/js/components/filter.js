const selectElement = document.getElementById('news-filter__select');
const url = new URLSearchParams(window.location.search); 

document.addEventListener('DOMContentLoaded', function() {
    initSelect(); 
    selectElement.addEventListener('change', updateQuery); 
});

function initSelect() {
    const orderType = url.get('order') ?? 'date'; 
    const optionSelected = selectElement.querySelector(`option[value="${orderType}"]`); 
    selectElement.querySelector('#news-filter__label').textContent += optionSelected.textContent; 
   
    optionSelected.remove(); 
}

function updateQuery(e) {
    const {name, value} = e.target;
    url.set(name, value); 
    window.location.href = `/?${url.toString()}`    
}