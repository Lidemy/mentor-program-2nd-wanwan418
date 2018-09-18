function add(a, b) {
 // var result = []
 // var a = ''
 // var b = ''
 // for(var i = 1 , i < a.length, i++) {
 // 	carry = result[i] / 10
 // 	result = a[i] + b[i] + carry
 // 	result[i]% = 10

 // }
  var carry = 0, result = [],
      len = Math.max(a.length, b.length), i = len;
  while (i--) {
    var sum = (+a[i - len + a.length]||0) + (+b[i - len + b.length]||0) + carry;
    carry = parseInt(sum / 10);
    result.unshift(sum % 10);
  }
  // if (carry) result.unshift(carry);
  // return result.join('');
}


for(var i = 0; i = a.length - 1; i++) {
	var result = a[i] + b[i]
	if (result >= 10) {
		result.split(1)
	} 

}
console.log(result)

module.exports = add;