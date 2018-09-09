function join(str, concatStr) {
 	var str1 = str[0];
 	for(i = 0; i < str.length; i++) {
 		str1 += concatStr + str[i]
 	}
 	return str1
}
console.log(join([1,2,3],'!'))
console.log(join([1,2,3],'a')) 	
  



function repeat(str, times) {
	var result = str[0];
	for(i = 0; i < times; i++) {
		result += str
	}
	return result
}

console.log(repeat('a',5))
console.log(repeat('yoyoyo',5))