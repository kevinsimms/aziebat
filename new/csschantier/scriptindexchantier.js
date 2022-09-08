
var tog=0;


function toggle(){

    if(tog==0){

        var toggled= document.getElementById("togglemenu");
        
        toggled.style.display="block";
        
        tog=1;
    }
    else{
        var toggled= document.getElementById("togglemenu");
        toggled.style.display="none";
        tog=0;
    }


}







/* mouse over menu */


function peinture0(){

    
    var one = document.getElementById("entrepriseline0");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="60px";

}


function outpeinture0(){
    var one = document.getElementById("entrepriseline0");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="30px";
}


function peinture(){

    
    var one = document.getElementById("entrepriseline1");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="70px";

}


function outpeinture(){
    var one = document.getElementById("entrepriseline1");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="33px";
}


function peinture2(){

    
    var one = document.getElementById("entrepriseline2");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="90px";

}


function outpeinture2(){
    var one = document.getElementById("entrepriseline2");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="45px";
    
}

function peinture3(){

    
    var one = document.getElementById("entrepriseline3");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="150px";

}


function outpeinture3(){
    var one = document.getElementById("entrepriseline3");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="75px";
}



function peinture4(){

    
    var one = document.getElementById("entrepriseline4");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="150px";

}


function outpeinture4(){
    var one = document.getElementById("entrepriseline4");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="75px";

}



function peinture5(){

    
    var one = document.getElementById("entrepriseline5");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="150px";

}


function outpeinture5(){
    var one = document.getElementById("entrepriseline5");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="75px";
}





function peinture7(){

    
    var one = document.getElementById("entrepriseline7");
    //one.style.display="block";
    

   one.style.transitionDuration= "1s";
   one.style.transitionProperty= "width marginLeft";

   one.style.marginLeft="0px";
   one.style.width="70px";

}


function outpeinture7(){
    var one = document.getElementById("entrepriseline7");
    //one.style.display="none";
    one.style.width="0px";
    one.style.marginLeft="35px";
}













window.onresize = resizing; 


function resizing(){

   /*  var size=document.getElementById("siret");
    
    size.style.marginLeft=(window.innerWidth/3)+"px"; */


    if(window.innerWidth>849){
        document.getElementById("togglemenu").style.display="none";
    }



}

resizing();