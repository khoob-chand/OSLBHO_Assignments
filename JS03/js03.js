
function replicate(a,b){
    if(a<=0){
        return [];

    }
    return [b].concat(replicate(a-1,b));

}
console.log(replicate(3,5));


//OR

function replicate(a,b){
    array=[];
    
    for(let i=0;i<a;i++){
        array.push(b);
        
    }
    console.log(array);

}
replicate(3,5);