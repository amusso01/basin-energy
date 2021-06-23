export default function postFilter(){
    const catMenu = document.getElementById('categoryMenu');
    const links = document.querySelectorAll('#categoryMenu .cat-link a');
    const news = document.querySelectorAll('.fd-single-news');
    const catTitle = document.getElementById('pageTitle');

    news.forEach(item=>{
        if(!item.classList.contains('category-all-news')){
            item.classList.remove('active');
        }
    })
    
    catMenu.addEventListener('click', e=>{
        let link = e.target;
        let selectedCat = e.target.dataset.slug;
        let catName =  e.target.dataset.name;
        e.preventDefault();

        catTitle.innerHTML = catName;
    
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