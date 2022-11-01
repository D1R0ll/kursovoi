class WaveElement{
	constructor(x,y,size,h){
		this.size = size;
		this.x = x;
		this.y = y;
		this.h = h;
	}
	draw(canvas,ctx,dir=1){
		ctx.fillStyle = `#141414`
        if (dir == 1){
            ctx.fillRect(this.x*this.size,this.y*this.size,this.size,(this.size*this.h*100 + 50) * dir);
        }
		else{
            ctx.fillRect(this.x*this.size,this.y*this.size + canvas.height,this.size, (canvas.height - this.size*this.h*100 - 50 )  * dir);
        }
	}
}