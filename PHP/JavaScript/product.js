var navImages=['https://www.neptun-ks.com/2020/03/10/artikl869050695.jpeg',
               'https://www.neptun-ks.com/2020/03/13/ultra.b.jpg',
               'https://www.neptun-ks.com/2020/03/13/ultra.b1.jpg',
                'https://www.neptun-ks.com/2020/03/13/ultra.b3.jpg' ];
   
$(function(){
    $('.nav li').mouseover(function(e){
        e.preventDefault();
       
        $('.main-image img').attr('src',navImages[$(this).index()]);
        
    });
    $('.nav').mouseleave((e)=>{
        e.preventDefault();
        $('.main-image img').attr('src',navImages[0]);
    });
});

var product={
    name: 'ex',
    company: 'Samsung',
    desc: 'lorem ipsum ',
    price:1000
}



