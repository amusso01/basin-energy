export default function postFilter(){
    const catMenu = document.getElementById('categoryMenu');
    const links = document.querySelectorAll('#categoryMenu .cat-link a');
    const news = document.querySelectorAll('.fd-single-news');
    
    catMenu.addEventListener('click', e=>{
        let link = e.target;
        let selectedCat = e.target.dataset.slug;
        e.preventDefault();
    
        links.forEach(el=>{
            el.classList.remove('active');
        })
        link.classList.add('active');

        news.forEach(article=>{
            if(article.classList.contains(selectedCat)){
                article.classList.add('active');
            }else if(selectedCat === 'all'){
                article.classList.add('active');
            }else{
                article.classList.remove('active');
            }
        })

    })

}