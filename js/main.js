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
  
// testimonial cards

const reviewCardList = document.querySelector('.review-list');
const reviewCards = reviewCardList.querySelectorAll('.review-card');
const cardDots = document.querySelectorAll('.card-dot');

let currentCardIndex = 0;

function nextCard(){
    if(currentCardIndex < 2){
        currentCardIndex += 1;
        reviewCards[currentCardIndex].style.transform = 'translateX(0px)';
        reviewCards[currentCardIndex-1].style.transform = 'translateX(-800px)';
        cardDots.forEach(cardDots => cardDots.classList.remove('active-dot'));
        cardDots[currentCardIndex].classList.add('active-dot');
    }
}
function prevCard(){
    if(currentCardIndex >0 && currentCardIndex <= 2){
        currentCardIndex -= 1;
        reviewCards[currentCardIndex].style.transform = 'translateX(0px)';
        reviewCards[currentCardIndex+1].style.transform = 'translateX(800px)';
        cardDots.forEach(cardDots => cardDots.classList.remove('active-dot'));
        cardDots[currentCardIndex].classList.add('active-dot');
    }
}

// **************



function select_tab(selected_tab){
    const tab_btn_list = document.querySelector('.tab-list');
    const tab_btn = tab_btn_list.querySelectorAll('.tab-button');

    tab_btn.forEach(tab_btn => tab_btn.classList.remove('tab-btn-active'));
    tab_btn[selected_tab].classList.add('tab-btn-active');

    const tab_list = document.querySelector('.tab-pages');
    const tab = tab_list.querySelectorAll('.tab-page');

    tab.forEach(tab => tab.classList.remove('active-tab-page'));
    tab[selected_tab].classList.add('active-tab-page');
}

// *********************
function form_selection(selected_form){
    const form_list = document.querySelector('.details-form-list');
    const details_form = form_list.querySelectorAll('.details-form');

    details_form.forEach(details_form => details_form.classList.remove('active-details-form'));
    details_form[selected_form].classList.add('active-details-form');

    let animation = document.getElementById("done-animation");
    animation.stop();
    if(selected_form == 3){
        
        animation.play();
    }
}

function customer_details_validation(){
    var customer_name = document.getElementById("customer_name").value;
    var customer_email = document.getElementById("customer_email").value;
    var customer_phone = document.getElementById("customer_phone").value;
    
    if(customer_name!="" && customer_email!="" && customer_phone!=""){
        form_selection(1);
    }else{
        alert("Please enter your details");
    }
}
function company_details_validation(){
    var company_name = document.getElementById("company_name").value;
    var budget = document.getElementById("budget").value;
    var service = document.getElementById("service").value;
    
    if(company_name!="" && budget!="" && service!=""){
        form_selection(2);
    }else{
        alert("Please enter your company details");
    }
}

function message_validation(){
    var more_message = document.getElementById("more_message").value;
    
    if(more_message!=""){
        service_request_form_submit()
    }else{
        alert("Please give some more details");
    }
}

function service_request_form_submit(){
    var customer_name = document.getElementById("customer_name").value;
    var customer_email = document.getElementById("customer_email").value;
    var customer_phone = document.getElementById("customer_phone").value;
    var company_name = document.getElementById("company_name").value;
    var budget = document.getElementById("budget").value;
    var service = document.getElementById("service").value;
    var more_message = document.getElementById("more_message").value;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            clearInputs();
        }
    };

    xmlhttp.open("POST", "./php/sendMessage.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send(
        "customer_name=" + customer_name +"&"+ 
        "customer_email=" + customer_email +"&"+ 
        "customer_phone=" + customer_phone +"&"+ 
        "company_name=" + company_name +"&"+ 
        "budget=" +budget +"&"+ 
        "service=" +service +"&"+ 
        "more_message=" + more_message
        );
  
    form_selection(3);
}
