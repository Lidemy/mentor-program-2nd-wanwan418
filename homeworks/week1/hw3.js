function reverse(str) {
	var dstr = ' ';
	var i = str.length - 1;
	for(var x = i; x >= 0; x--) {
		dstr += str.charAt(x);
	}
	console.log(dstr);
}

reverse("abcdef")



