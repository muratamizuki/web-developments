function isConsecutive(arr){
    for (let x = 1; x < arr.length; x++) {
        if (arr[x] !== arr[x - 1] - 1) {
            return false
        }
    }
    return true
}
console.log(isConsecutive([1, 2, 3, 4, 5]));
console.log(isConsecutive([5, 4, 3, 2, 1]));
console.log(isConsecutive([1, 3, 2, 4, 5]));