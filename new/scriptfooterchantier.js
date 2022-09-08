window.onresize = resizing; 


function resizing(){
    
   


     if(window.innerWidth>849){
        document.getElementById("togglemenu").style.display="none";
    }



    var imagesize=document.querySelector(".image2").offsetWidth;
    document.querySelector(".image2").style.width=imagesize+"px";
    document.querySelector(".image2").style.marginLeft="auto";
    document.querySelector(".image2").style.marginRight="auto";


    /* if(window.innerWidth>800){
        var chantierpara=document.getElementById("textpara"); 
        chantierpara.style.marginLeft=(window.innerWidth/3)+"px";
     }




    if(window.innerWidth>1450){

        document.querySelector(".image2").style.height="600px";
        var chantierpara=document.getElementById("textpara"); 
        chantierpara.style.marginTop="650px";


var imagesize=document.querySelector(".image2").offsetWidth;
    var imagepos=document.querySelector(".image2");
    if(imagesize>700){
    imagepos.style.marginLeft=(imagesize)*(1/4)+"px";
    }else{
        imagepos.style.marginLeft=600+"px";
    }
    
} 

if(window.innerWidth<1450&&window.innerWidth>800){

    document.querySelector(".image2").style.height="400px";

    var imagesize=document.querySelector(".image2").offsetWidth;
    var imagepos=document.querySelector(".image2");
    if(imagesize>600){
        imagepos.style.marginLeft=(imagesize)*(1/2)+"px";
        }else{
            imagepos.style.marginLeft="40%";
        }

        var chantierpara=document.getElementById("textpara"); 
        chantierpara.style.marginTop="500px";


}  */
 



}

resizing();