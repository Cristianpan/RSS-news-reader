import '../components/filter';

const searchBar = document.querySelector('.search-bar'); 
let queryParams; 

document.addEventListener('DOMContentLoaded', ()=> {
    searchBar.addEventListener('submit', search); 
}); 


function search(e) {
    e.preventDefault(); 
    const {search:{name, value}} = e.target;
    const url = new URLSearchParams(window.location.search); 

    if (value) {
        url.set(name, value); 
    } else {
        url.delete(name); 
    }

    window.location.href = `/?${url.toString()}`  
}