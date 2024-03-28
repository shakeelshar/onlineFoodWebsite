let menu = document.querySelector('#bars-m');
let navbar = document.querySelector('.navebar');


menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');

}

let section = document.querySelectorAll('section');
let navelinks = document.querySelectorAll('header .navebar a');


window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');



    section.forEach( sec =>{

        let top = window.scrollY;
        let height = sec.offsetHeight;
        let offset = sec.offsetTop -150;
        let id = sec.getAttribute('id');
    
        if( top => offset && top < offset + height){
            navelinks.forEach(link =>{
            link.classList.remove('active');
          document.querySelectorAll('header .navebar a[href*='+ id +']').forEach(link => {
                link.classList.add('active');
            });
          
    
    });
    

}
    })};
document.querySelector('#search-icon').onclick = () => {
    document.querySelector('#search-form').classList.toggle('active');

}

document.querySelector('#close').onclick = () => {
    document.querySelector('#search-form').classList.remove('active');

}


var swiper = new Swiper(".home-slider", {
    spaceBetween: 30,
    centeredSlides: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
     loop:true,
  });

  
var swiper = new Swiper(".review-slider", {
    spaceBetween: 20,
    centeredSlides: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
     loop:true,
     breakpoints: {
        0:{
            slidePerView: 1,
        },
        640:{
            slidePerView :2,
        },
        768:{
            slidePerView :2,
        },
        1024:{
            slidePerView :3,
        },
     },

  });
  function loader(){
    document.querySelector('.loader-container').classList.add('fade-out');
  }
  function fadeOut(){
    setInterval(loader,3000);
  }
window.onload = fadeOut;





