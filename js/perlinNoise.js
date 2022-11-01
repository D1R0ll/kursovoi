class Vector2{
    constructor(x=0,y=0){
        this.x = x;
        this.y = y;
    }
}
class PerlinNoise {
    #pemutationTable;
    constructor(){
        this.#pemutationTable = this.MakePermutation();
    }
    MakePermutation(){
        let P = [];
        for(let i = 0; i < 512; i++){
            P.push(i);
        }
        for(let i = 0; i < 512; i++){
            let n1 = rnd(0,512);
            let n2 = rnd(0,512);
            let t = P[n1];
            P[n1] = P[n2];
            P[n2] = t;
        }
        P = P.concat(P);
        return P;
    }
    Dot(point_1,point_2){
        return point_1.x*point_2.x + point_1.y*point_2.y;
    }
    GetRandomVector(v){
        switch(v & 3){
            case 0: return new Vector2(1, 1);
            case 1: return new Vector2(-1, 1);
            case 2: return new Vector2(-1, -1);
            case 3: return new Vector2(1, -1);
        }
    }
    Curve(t){
        return ((6*t - 15)*t + 10)*t*t*t;
    }
    LinearInterpolate(t, a1, a2){
        return a1 + t*(a2-a1);
    }
    Noise2D(x, y){
        let X = Math.floor(x) & 511;
        let Y = Math.floor(y) & 511;
        
        let xf = x-Math.floor(x);
        let yf = y-Math.floor(y);
    
        let topRight = new Vector2(xf-1, yf-1);
        let topLeft = new Vector2(xf, yf-1);
        let bottomRight = new Vector2(xf-1, yf);
        let bottomLeft = new Vector2(xf, yf);
        
        let dotTopRight = this.Dot(topRight,this.GetRandomVector(this.#pemutationTable[this.#pemutationTable[X+1]+Y+1]));
        let dotTopLeft = this.Dot(topLeft,this.GetRandomVector(this.#pemutationTable[this.#pemutationTable[X]+Y+1]));
        let dotBottomRight = this.Dot(bottomRight,this.GetRandomVector(this.#pemutationTable[this.#pemutationTable[X+1]+Y]));
        let dotBottomLeft = this.Dot(bottomLeft,this.GetRandomVector(this.#pemutationTable[this.#pemutationTable[X]+Y]));
        
        let u = this.Curve(xf);
        let v = this.Curve(yf);
    
        return this.LinearInterpolate(u,
            this.LinearInterpolate(v, dotBottomLeft, dotTopLeft),
            this.LinearInterpolate(v, dotBottomRight, dotTopRight),
        );
    }
    getNoise(x,y,octaves=1){
        let n = 0;
        let a = 1;
        let f = 0.005;
        for(let o = 0; o < octaves; o++){
            let v = a*this.Noise2D(x*f, y*f);
            n += v;
            a *= 0.6;
            f *= 2;
        }
        n += 1;
        n *= 0.5;
        return n;
    }
}