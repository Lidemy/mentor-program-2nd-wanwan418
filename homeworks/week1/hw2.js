xfunction capitalize(str) {
	return str.charAt(0).toUpperCase() + str.slice(1);
};

console.log(capitalize('nick'));
console.log(capitalize('Nick'));
console.log(capitalize(',hello'));