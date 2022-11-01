let slides_image = document.querySelectorAll('.slide')
let activeSlide = 1;
let y = -100;
let canList = true;
for (let i=0;i<slides_image.length;i++){
    slides_image[i].y = y;
    slides_image[i].id = i;
    slides_image[i].style.left = y+"%";
    y+=100;
}
function moveDown(targets=[]){
    targets.forEach((el)=>{
        el.y += 100;
        if (el.y >= 100 * (targets.length-1)){
            el.y = -100;
        }
        if (el.y/100 == 0 || el.y/100 == 1) {
            el.classList = "animation slide"
            el.style.visibility = "visible"
        }
        else{
            el.classList = "slide"
            el.style.visibility = "hidden"
        }
        
        el.style.left = el.y + "%";
    })
}
function moveUp(targets=[]){
    targets.forEach((el)=>{
        el.y -= 100;
        if (el.y <= -200){
            el.y = 100 * (targets.length-2);
        }
        if (el.y/100 == -1 || el.y/100 == 0) {
            el.classList = "animation slide";
            el.style.visibility = "visible";
        }
        else{
            el.classList = "slide"
            el.style.visibility = "hidden"
        }
        el.style.left = el.y + "%";
    })
}
function next(){
    if (canList){
        activeSlide++;
        if (activeSlide >= slides_image.length) activeSlide = 0;
        moveDown(slides_image);
        canList = false;
        setTimeout(listUp,900);
    }
}
function pre(){
    
    if (canList){
        activeSlide--;
        if (activeSlide < 0) activeSlide = slides_image.length-1;
        moveUp(slides_image);
        canList = false;
        setTimeout(listUp,900);
    }
}
function listUp(){
    canList = true
}
