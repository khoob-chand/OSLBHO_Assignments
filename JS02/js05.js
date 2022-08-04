var classname=hello;
document.addEventListener("click",function(event){
    console.log(object.values(event.target.classList));
    if(object.values(event.target.classList).include(classname)){
        event.target.classList.add("found");
    }
    console.log(object.values(event.target.classList));
})