function printStar(n) {
	var result = []
	for(var i = 1; i <= n; i++) {
		result += ["*"]
	}
		return result
}

function stars(n) {
	var arr = []
	for(var i = 1; i <= n; i++) {
		arr.push(printStar(i))
	}
	return arr
}

module.exports = stars;
