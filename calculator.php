<html>
	<head>
		<script type="text/javascript" src="lib/js/Solver.js"></script>
		<script type="text/javascript">
			function calculate(){
				var equation = document.getElementById("equation").value;
				var result = document.getElementById("result");
				var test = new Solver();
				var answer = test.calculate2(equation);
				result.innerHTML = answer;
			}
		</script>
	</head>
	<body>
		
		<br/>
		<textarea id="equation">(1+5(2-1^-12^2))(2*12)/4^-2</textarea>
		<br/>
		<button  type="button" onclick="calculate();">Submit</button>
		<div id="result">
		
		</div>
	</body>
</html>