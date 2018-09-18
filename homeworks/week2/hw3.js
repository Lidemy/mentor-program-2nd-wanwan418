function isPrime(n) {
	if(n < 2) return false
	for(var i  = 2; i * i <= n; i++) {
		if(n % i == 0) {
			return false
		} else {
			return true
		}
	}
}

module.exports = isPrime