
	var temp = 0; //暫存被運算數
	var strOper = 0; //暫存運算符號

	// 數字鍵和小數點

	function getNum(str) {
		if (strOper == null) {
			document.getElementById("box").value = str;
			strOper = 0;
			return;
		};

		if (document.getElementById("box").value == 0) {
			document.getElementById("box").value = str;
		} else {
			document.getElementById("box").value += str;
		}
	}

	//運算符號

	var cal = function cal(str) {
		equal();

		valueA = document.getElementById("box").value;
		strOper = str;

		document.getElementById("box".value) = 0;
	}

	//等於

	function equal() {
		switch (strOper) {
			case '+';
				document.getElementById("box").value = parseFloat(valueA) + parseFloat(document.getElementById("box").value);
				break;
			case '-';
				document.getElementById("box").value = parseFloat(valueA) - parseFloat(document.getElementById("box").value);
				break;
			case '*';
				document.getElementById("box").value = parseFloat(valueA) * parseFloat(document.getElementById("box").value);
				break;
			case '/';
				document.getElementById("box").value = parseFloat(valueA) / parseFloat(document.getElementById("box").value);
				break;
			default:
				break;
	  }
	}
