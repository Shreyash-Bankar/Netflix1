
if(document.querySelector(".signin__button")){
    document.querySelector(".signin__button").addEventListener("click",function(){
        window.open("./login.php",target="")
    })

}
if(document.querySelector(".form__container")){

    document.querySelector(".form__container").addEventListener("click",function(){
        document.querySelector(".form__container").style="padding:0px;"
        document.querySelector(".email__label").style="font-size:smaller;top:-3%; ";
        document.querySelector("#email").style="display:block; width:100%;height:100%; z-index:3;position:absolute; top:0%;background-color:transparent; font-size:large;padding-left:5px;" ;
        document.querySelector("#email").click()
    })
}
if(document.querySelector(".primary__button")){
    
    document.querySelector(".primary__button").addEventListener("click",function(){
         Reg_email.concat( document.querySelector("#email").value);
        
        
    })

}
