function printStars(n) {
  var result = ' ';
  for(var i = 1; i <= n; i++) {
  	result += '*'
  }
  console.log(result)
}

function stars(n) {
	for(var i = 1; i <= n; i++) {
		printStars(1)
	}
}

stars(1)
console.log('')
stars(3)
console.log('')
stars(6)
console.log('')
