export default function search(){
    const button = document.getElementById('fdSearchButton');
    const form = document.getElementById('fdSearchContainer');
    

    button.addEventListener('click', ()=>{
        form.classList.toggle('search-active');
        button.classList.toggle('open')
    } )
}