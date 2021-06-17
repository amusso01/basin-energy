export default function share(){
    const shareBtn = document.getElementById('share');
    const shareIcon = document.getElementById('shareIcon');

    shareBtn.addEventListener('click', e=>{
        shareIcon.classList.toggle('active');
    })
}