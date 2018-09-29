function isPalindromes(str) {
  for(var i = 0; i <= str.length - 1; i++) {
  	console.log(str[i])
  }
  for(var n = str.length; n >= 0; n--) {
  	console.log(str[n])
  }
  if(str[i] === str[n]) {
  	return true
  }	else {
  	return false
  }
}

module.exports = isPalindromes