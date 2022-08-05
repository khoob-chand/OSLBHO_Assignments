
function fact(a){
    if(a==1){
        return a;
    }
    return a*fact(a-1);
}
console.log(fact(5));
