const sliderSide =document.querySelector('.in-side');

const imageSlider=document.querySelector('.image-slider');
const images=document.querySelectorAll('.image-slider img');
const bulletPoint=document.querySelector('.bullet-points');
const bullets=document.querySelectorAll('.bullet-points span');

 //button
 const prevbtn=document.getElementById('prevbtn');
 const nextbtn=document.getElementById('nextbtn');
 

//counter


var counter=0;
var size= images[0].clientWidth;

imageSlider.style.transform='translateX('+(-size*counter)+'px)';
bullets[counter].style.backgroundColor='rgb(116, 116, 233)';
bulletPoint.style.left=((sliderSide.clientWidth-bulletPoint.clientWidth)/2)+'px';
nextbtn.style.top=((imageSlider.clientHeight-nextbtn.clientHeight)/2)+'px';
prevbtn.style.top=((imageSlider.clientHeight-prevbtn.clientHeight)/2)+'px';

window.addEventListener('resize',()=>{
    size= images[0].clientWidth;
    imageSlider.style.transform='translateX('+(-size*counter)+'px)';

    bulletPoint.style.left=((sliderSide.clientWidth-bulletPoint.clientWidth)/2)+'px';
nextbtn.style.top=((imageSlider.clientHeight-nextbtn.clientHeight)/2)+'px';
prevbtn.style.top=((imageSlider.clientHeight-prevbtn.clientHeight)/2)+'px';
});

nextbtn.addEventListener('click',()=>{
    next();
});

prevbtn.addEventListener('click',()=>{
    prev();
});


function next(){
    if(counter<images.length-1){
    counter++;
    imageSlider.style.transform='translateX('+(-size*counter)+'px)';
    }else{
       
        return;
    }
}
function prev(){
    if(counter>0){
        counter--;
        imageSlider.style.transform='translateX('+(-size*counter)+'px)';
        }else{
           
            return;
        }
}


imageSlider.addEventListener('transitionstart',()=>{
    for (let index = 0; index < bullets.length; index++) {
        bullets[index].style.background='none';
        
    }
    bullets[counter].style.backgroundColor='rgb(116, 116, 233)';
});


var autoslide=setInterval(() => {
    if(counter>=0&&counter<images.length-1){
    next();
    }else{
    clearInterval(autoslide);
    }
}, '2000');
    
$(()=>{
    $(sliderSide).mouseleave(function(){
            
            prevbtn.style.opacity='0';
            nextbtn.style.opacity='0';
        
    });
    $(sliderSide).mouseenter(function(){
       
           
            prevbtn.style.opacity='1';
        
      
           
            nextbtn.style.opacity='1';
        
    });


});

function moveSlide(index){
    counter=index;
    imageSlider.style.transform='translateX('+(-size*counter)+'px)';
}


