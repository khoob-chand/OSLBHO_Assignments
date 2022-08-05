let array=[1,3,4,5];
let n=array.length;
// console.log(n);


function productofarray(arr,n){
    if(n==0){
        return arr[0];
    }
    return arr[n]*productofarray(arr,n-1);
}
console.log(productofarray(array,n-1));
// console.log(productofarray(array,))
