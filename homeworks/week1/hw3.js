function reverse(str) {
	if(str.length === 0) {
			return null;
	} else {
			var dstr = " ";
			var i = str.length;
			i = i - 1;
			for(var x = i; x >= 0; x--) {
				dstr += str.charAt(x);
			}
			console.log(dstr);
			
	}
}

reverse("abcdef")



