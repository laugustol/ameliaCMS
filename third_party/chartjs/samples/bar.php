<?php 
require_once('../php/connection.php');
?>
<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<script src="../Chart.js"></script>
	</head>
	<body>
		<div style="width: 50%">
			<canvas id="canvas" height="450" width="600"></canvas>
		</div>


	<script>
	var randomScalingFactor = function(){ return Math.round(Math.random()*100)};

	var barChartData = {
		labels : [
		<?php 
		$sql = "SELECT * FROM paginas_vistas";
		$result = mysqli_query($connection,$sql);
		while ($registros = mysqli_fetch_array($result))
		{
			'echo $registros["titulo_noticia"];',
		}
		?>
		],
		datasets : [
			{
				fillColor : "rgba(220,220,220,0.5)",
				strokeColor : "rgba(220,220,220,0.8)",
				highlightFill: "rgba(220,220,220,0.75)",
				highlightStroke: "rgba(220,220,220,1)",
				data : 
				<?php 
				$sql = "SELECT * FROM paginas_vistas";
				$result = mysqli_query($connection,$sql);
				?>
				[<?php while ($registros = mysqli_fetch_array($result)){ ?><?php echo $registros["cantidad"] ?>, <?php }?>]
			}
		]

	}
	window.onload = function(){
		var ctx = document.getElementById("canvas").getContext("2d");
		window.myBar = new Chart(ctx).Bar(barChartData, {
			responsive : true
		});
	}

	</script>
	</body>
</html>
