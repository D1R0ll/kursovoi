document.querySelectorAll(".filter_title").forEach((el)=>{
    if (window.getComputedStyle(el.nextElementSibling).display == 'flex'){
        el.isHide = false;
    }
    else{
        el.isHide = true;
    }
    
    const sibling = el.nextElementSibling;
    const arrow = el.querySelector("svg");
    el.addEventListener("click",function (){
        if (this.isHide){
            sibling.style.display = "flex";
            arrow.style.transform = "rotate(180deg)";
            this.isHide = false;
        }
        else{
            arrow.style.transform = "rotate(0deg)";
            sibling.style.display = "none";
            this.isHide = true;
        }
    })
})