export function isPalindrome(word) {
	let charArr = word.split('');
	let isPalindromeFlag = true;
	for(let i=0, j=charArr.length-1; i<charArr.length, j>=0; i++, j--) {
		if(i > j) { break; }
		console.log(i, "-", j);
		console.log("-->", charArr[i], charArr[j]);

		if(charArr[i] != charArr[j]) {
			isPalindromeFlag = false;
			break;
		}
	}

	return isPalindromeFlag;
}

export function obfuscateRight(num, str) {
	// take first num char and append at the end
	let first = str.substr(0, num);
	let last = str.substr(num);

	return last + first;
}

export function obfuscateLeft(num, str) {
	// take first num char and append at the end
	let last = str.substr(num+1);
	let first = str.substr(0, num+1);

	return last + first;
}

export function camelize(str) {
	let cleanStr = str.replaceAll('_', ' ');
	cleanStr = cleanStr.replaceAll('-', ' ');

	let wordsArr = cleanStr.split(' ');

	wordsArr.forEach(function(word, i){
		let tmpArr = word.split('');
		tmpArr.forEach(function(letter, k) {
			if(k==0) {
				tmpArr[k] = letter.toUpperCase();
			}
			else {
				tmpArr[k] = letter.toLowerCase();
			}
		});
		wordsArr[i] = tmpArr.join('');
	});

	return wordsArr.join('');
}

export function longestWord(sentence) {
	let wordsArr = sentence.split(' ');
	let longestWord = '';
	let length = 0;

	wordsArr.forEach(function(word) {
		if(word.length > length) {
			longestWord = word;
			length = word.length;
		}
	});

	return longestWord;
}