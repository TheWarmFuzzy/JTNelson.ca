function Solver(){

}

Solver.prototype.calculate = function(a){
	if(typeof a != "string"){
		return 0;
	}
	if(a.length <= 1){
		return 0;
	}
	var bracket = this.brackets(a);
	return bracket;
}

Solver.prototype.findVariable = function(a){
	return 0;
}

Solver.prototype.calculate2 = function(a){
	//Brackets
	var start = 0;
	var level = 0;
	var end = 0;
	for(i=0;i<a.length;i++){
		if(a.charAt(i) == '(' && level == 0){
			start = i;
			level++;
		}
		if(a.charAt(i) == ')' && level == 1){
			end = i;
			i = a.length + 1;
		}
	}
	console.log("" + start + " & " + end);
	return a.slice(start,end);
}

Solver.prototype.brackets = function(a){
	var bracketLevel = 0;
	var highestBracket = 0;
	var highestBracketPosition = 0;
	
	for(i = 0; i < a.length; i++){
		if(a.charAt(i) == '('){
			bracketLevel++;
			if(bracketLevel > highestBracket){
				highestBracket = bracketLevel;
				highestBracketPosition = i;
			}
		}
		if(a.charAt(i) == ')'){
			bracketLevel--;
		}
	}
	if(highestBracket != 0){
		var start = highestBracketPosition;
		var i = highestBracketPosition + 1;
		var result = "";
		while(a.charAt(i) != ')'){
			result += a.charAt(i);
			i++;
		}
		var end = i + 1;
	}
	
	//result = test.exec(a);
	a = a.replace(result, this.decideProcess(result));
	return a;
}

Solver.prototype.decideProcess = function(a){
	//Regular expression for commands
	var regexCommand = /[-+^*()]/i;
	
	//Exponents
	var i = a.length - 1;
	while(i >= 0){
		if(a.charAt(i) == '^'){
			var lefttemp = "";
			var left = "";
			var right = "";
			//Find right side
			for(j = i + 1; j < a.length; j++){
				right += a.charAt(j);
				
			}
			//Find resersed left side
			for(j = i - 1; j >= 0; j--){
				lefttemp += a.charAt(j);
			}
			
			//Apply regular expression to the right side
			var regexRight = /-?[a-z0-9]+/i;
			right = regexRight.exec(right);
			right = right[0];
			
			//Apply regular expression to the left side
			var regexLeft = /[a-z0-9]+/i;
			lefttemp = regexLeft.exec(lefttemp);
			lefttemp = lefttemp[0];
			 
			//reverse left side
			for(j = lefttemp.length; j >= 0; j--){
				left += lefttemp.charAt(j);
			}
			
			//Checks for an applicable negative
			var negPos = i - left.length - 1;
			//If there is a minus beside a command it is a negative number
			if(negPos >= 0){
				if(a.charAt(negPos) == '-' && regexCommand.exec(a.charAt(negPos - 1))){
					left = "-" + left;
				}
			}
			
			console.log("Original: " + left+"^"+right);
			console.log("Replace: " + this.power(left,right));
			
			//Replace solved equation with result
			a = a.replace(left+"^"+right, this.power(left,right));
			
			//Restart scan
			i = a.length;
		}
		
		i--;
	}
	console.log(a);
	return a;
}

Solver.prototype.addition = function(a,b){
	return 0;
}

Solver.prototype.subtraction = function(a,b){
	return 0;
}

Solver.prototype.multiply = function(a,b){
	return 0;
}

Solver.prototype.division = function(a,b){
	return 0;
}

Solver.prototype.power = function(a,b){
	return Math.pow(a,b);
}