const menuBtn = document.querySelector('.menu-btn');

let menuOpen = false;
menuBtn.addEventListener('click',()=>{
    if(!menuOpen){
        menuBtn.classList.add('open');
        menuOpen = true;
        document.querySelector("ul").style.right="0%";
    }else{
        menuBtn.classList.remove('open');
        menuOpen = false;
        document.querySelector("ul").style.right="-100%";
    }
});

// ------- back to top -------
let scrollAnimation = () => {
    var progressBar = document.getElementById("scroll_progress");
    var scrollTop = document.documentElement.scrollTop;
    var scrollHeight = document.documentElement.scrollHeight;
    var clientHeight = document.documentElement.clientHeight;
    var scrollPercentage = Math.round((scrollTop / (scrollHeight - clientHeight)) * 100);
  
    if(scrollPercentage>15){
      progressBar.style.visibility='visible';
      progressBar.style.opacity='1';
      progressBar.style.background = 'conic-gradient(var(--primary-color) '+scrollPercentage+'%,transparent '+scrollPercentage+'%)';
    
    }else{
      progressBar.style.visibility='hidden';
      progressBar.style.opacity='0';
    }
  
  };
  
  window.onscroll = scrollAnimation;
  
  
  function toTop(){
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }


  // scroll reveal
window.addEventListener('scroll',reveal);

function reveal(){
    var reveals = document.querySelectorAll('.page-section');

    for(var i =0; i<reveals.length; i++){
        var windowHeight = window.innerHeight;
        var revealTop = reveals[i].getBoundingClientRect().top;
        var revealPoint = windowHeight*0.2;
        
        if(revealTop<windowHeight-revealPoint){
            reveals[i].classList.add('active');
        }
        else{
            reveals[i].classList.remove('active');
       }
    }
}
// ****************
  