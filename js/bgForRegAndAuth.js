let perlinNoise = new PerlinNoise();
let canvas = document.querySelector('canvas');
    canvas.width = canvas.clientWidth;
    canvas.height = canvas.clientHeight;
let ctx = canvas.getContext('2d');
let size = 5;
let map = {x:canvas.width/size,y:canvas.height/size};
let r_center = {x:map.x/2,y:map.y/2};
let start = 0
ctx.fillStyle = `white`
ctx.fillRect(0,0,canvas.width,canvas.height);
function frame(start){
    // ctx.fillStyle = `white`
    // ctx.fillRect(0,0,canvas.width,canvas.height);
    // start+=1;
    for (let y = 0;y < map.y;y++){
        for (let x = 0;x < map.x;x++){
            let n = perlinNoise.getNoise(x+start,y,3);
            
            // n+=0.9 -Math.pow((Math.sqrt(Math.abs(r_center.x - x) ** 1.6 + Math.abs(r_center.y  - y) ** 1.6)),2)/1000; 
            n-= 1 - Math.pow((Math.sqrt(Math.abs(r_center.x - x) ** 1.6 + Math.abs(r_center.y  - y) ** 1.6)),2)/1000; 
            // if (n < 0.5) n = 0.5;
            if (n > 1) n = 1;
            if (n < .2) n = .2;

            if (n < 0.8){
              rgb = Math.round(255*(n*4.5))
                ctx.fillStyle = `rgb(${rgb},${rgb},${rgb})`
                // if (n > -1){
                    ctx.fillRect(x*size,y*size,size,size);
                // }  
            }
            if (n > 0.2 && n < 0.23){
                rgb = Math.round(255*(n*4.5))
                    ctx.fillStyle = `rgb(${rgb-100},${rgb-100},${rgb-100})`
                    ctx.fillRect(x*size,y*size,size,size);
              }
        }   
    }
}
// frame(rnd(0,10000));