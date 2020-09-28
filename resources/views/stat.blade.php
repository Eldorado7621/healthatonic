<!doctype html>
<html>
	<head>
		<script src="js/canvasjs.min.js"></script>
	
		<script>
			window.onload=function(){
				var chart=new CanvasJS.Chart("chartContainer",{
					title:{
						text:"Graph of total amount for orders"
					},
					data:[
					  {
						type:"column",
						dataPoints:[
						{label:"apple",y:10},
						{label:"orange",y:15},
						{label:"banana",y:25},
						{label:"mango",y:30},
						{label:"orange",y:20}
						]
					}
					]
				});
				chart.render();
			}
		</script>
	</head>
	<body>
	  <div id="chartConatiner" style="height:270px; width:40px;"></div>
	</body>


</html>