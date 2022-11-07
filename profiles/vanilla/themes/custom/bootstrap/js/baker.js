(function($){
    $(document).ready(function(){
        // $(window).scroll(function(){
        //     $('#header ').css("opacity", 0+ $(window).scrollTop() / 1)
        // })
        // $(window).scroll(function(){
        //     $('#header .region-header').css("opacity", 0.5+ $(window).scrollTop() / 1000)
        // })

        
        $(".link_1 .field__item a").attr("href","#aling");
     

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
              mybutton.style.display = "block";
            } else {
              mybutton.style.display = "none";
            }
        }    
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
          }
          
        
          window.onscroll = function() {scrollFunction()};
          let mybutton = document.getElementById("myBtn");

       

        
        
        var m=document.getElementById('displaying');
        
        // var p=document.getElementsByClassName('child_para');
        // var i=document.getElementById('disp');
        
        // var n=i.document.getElementsByClassName("field__item")
        m.onclick=myfunc;
        // p.onclick=show;
        // m.onclick=onctive;
       
       
            function myfunc(){
                // var i=document.getElementsByClassName('siblings');
            //    var z= i.classList.add(sib);

                
                var i=document.getElementById('disp');
                // var m=document.getElementById('disp');
                // var i=document.getElementsByClassName("siblings");

                // i.classList.toggle
                // var w=i.document.getElementsByClassName("field__item");
                
             i.classList.toggle("sib");
             m.classList.toggle("sib");
             
            }
        //    document.getElementById("displaying").;





            let counts=setInterval(updatedfunc1);
        let upto=0;
        function updatedfunc1(){
            var count= document.getElementById("num_1");
            count.innerHTML=++upto;
            if(upto===246)
            {
                clearInterval(counts);
            }
        }
        // var get=document.getElementById("num_2").value;
        // console.log(get);
        // var convert=parseInt(get);
        let counts2=setInterval(updatedfun2);
        let upto2=0;
        function updatedfun2(){
            var count2= document.getElementById("num_2");
            count2.innerHTML=++upto2;
            if(upto2===545)
            {
                clearInterval(counts2);
           
        } }
        let counts3=setInterval(updated);
        let upto3=0;
        function updated(){
            var count3= document.getElementById("num_3");
            count3.innerHTML=++upto3;
            if(upto3===756)
            {
                clearInterval(counts3);
            }
        }
            // myVar();
            window.onload=counts;
            window.onload=counts2;
            window.onload=counts3;


            //  }

            //  function myfunc(){
            //     // var i=document.getElementById('disp');
            //  p.classList.toggle("sib");
            //  }
             
             
     
    //   function show(){
    //     var p=document.getElementsByClassName('child_para');
    //     p.toggle(".paragraph--type--downparagraph .field__item p")

    //   }

    // var count=document.getElementsByClassName("div_count");
    // var count_num=count.document.getElementByTagsname
     // Define selector for selecting
        // anchor links with the hash
        let anchorSelector = 'a[href^="#"]';
     
        $(anchorSelector).on('click', function (e) {
         
            // Prevent scrolling if the
            // hash value is blank
            e.preventDefault();
     
            // Get the destination to scroll to
            // using the hash property
            let destination = $(this.hash);
     
            // Get the position of the destination
            // using the coordinates returned by
            // offset() method
            let scrollPosition
                = destination.offset().top;
     
            // Specify animation duration
            let animationDuration = 3000;
     
            // Animate the html/body with
            // the scrollTop() method
            $('html, body').animate({
                scrollTop: scrollPosition
            }, animationDuration);
        });

    });

   

}(jQuery));

document.addEventListener("DOMContentLoaded", () => {
    var loader = document.getElementById("load");
    window.addEventListener("load", function() {
        loader.style.display = "none";
    })
  });
