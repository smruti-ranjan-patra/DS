// Currying in Javascript

// Eager evaluation. Every time the sum is evaluated and displayed at the end
sum = el => {
	let result = el;
	const f = (el) => {
		result += el;
		return f;
	};

	f.valueOf = () => result;

	return f;
};

console.log(+sum(4)(5)(6));
console.log(+sum(4));




// Lazy evaluation. The sum is evaluated at the end when the value is expected
sum = el => {
	let input = [el];
	const f = (el) => {
		input.push(el);
		return f;
	};

	f.valueOf = () => input.reduce((acc, current) => acc += current, 0);

	return f;
};

console.log(+sum(2)(3)(9));
console.log(+sum(5));
