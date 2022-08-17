
function replicate(a,b){
    if(a<=0){
        return [];

    }
   
    return [b].concat(replicate(a-1,b));

}



//OR

function replicate1(a,b){
    array=[];
    
    for(let i=0;i<a;i++){
        array.push(b);
        
    }
  
    return array;

}
console.log(replicate(3,5));
console.log(replicate1(3,5));