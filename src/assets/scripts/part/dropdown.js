
export default function dropdown(){
    let showDelay = 100, hideDelay = 200;
    let menuEnterTimer, menuLeaveTimer;

    const parent = document.querySelectorAll('#menu_main .menu-item-has-children');


    parent.forEach((link)=>{
        let firstAnchor = link.querySelector('a');
        firstAnchor.addEventListener('click', e=>{
            e.preventDefault();
        } )
        
        link.addEventListener('mouseenter', (el)=>{
            clearTimeout(menuLeaveTimer);
            let submenu = link.querySelector('.sub-menu');
            for (let j = 0; j < parent.length; j++) {
                let innerEl = parent[j].querySelector('.sub-menu');
                if(parent[j]!==link){
                    innerEl.classList.remove('open')
                }
			}
            menuEnterTimer = setTimeout(function() {
				submenu.classList.add('open');
			}, showDelay);
          
         
        })

        link.addEventListener('mouseleave', (el)=>{
            let submenu = link.querySelector('.sub-menu');
            clearTimeout(menuEnterTimer);
            menuLeaveTimer = setTimeout(function() {
                submenu.classList.remove('open')
            }, hideDelay);
      
        })

        link.addEventListener('touchstart', (el)=>{
            
            let submenu = link.querySelector('.sub-menu');
            if(!el.path.includes(submenu)){
                link.classList.toggle('sub-menu-open')
                let submenu = link.querySelector('.sub-menu');
                submenu.classList.toggle('open')
            }
            
        })
       
    })

}