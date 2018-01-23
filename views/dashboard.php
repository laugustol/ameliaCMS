<?php $_SESSION["title"] = '' ?>
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard_note?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<form action="<?=url_base?>user/note" method="POST" class='form-horizontal'>
					<div class="form-group">
						<label class="col-md-12"><?=dashboard_note?>:
							<textarea name="note" id="note" class="width-full" style="height: 80px;resize: none;font-weight: normal;"><?=$dependencies["note"][0]?></textarea>
						</label>
					</div>
					<div class="form-group">
						<div class='col-md-2 col-md-offset-5'>
							<button class='btn1'><?=save?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard_log_access?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<div id="canvas-holder" style="width:100%">
					<canvas id="chart1" width="300" height="300"/>
				</div>
				<script>
					$.get("<?=url_base?>log-access/graph",function(datas){
						var data = $.parseJSON(datas);
						var arr = new Array();
						for(var i=0;i<data.length;i++){
							if(i>0){
								arr.push({value:data[i][0],color:'#F7464A',highlight:'#FF5A5E',label:data[i][1]});
							}else{
								arr.push({value:data[i][0],color:'#242834',highlight:'#242834',label:data[i][1]});	
							}
						}
						var ctx = document.getElementById("chart1").getContext("2d");
						window.myPolarArea = new Chart(ctx).PolarArea(arr, {
							responsive:true
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard_log_movement?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<div id="canvas-holder" style="width:100%">
					<canvas id="chart2" width="300" height="300"/>
				</div>
				<script>
					$.get("<?=url_base?>log-movement/graph",function(datas){
						var data = $.parseJSON(datas);
						var lineChartData = {
							labels : [],
							datasets : [
								{
									label: "My Second dataset",
									fillColor : "rgba(151,187,205,0.2)",
									strokeColor : "rgba(151,187,205,1)",
									pointColor : "rgba(151,187,205,1)",
									pointStrokeColor : "#fff",
									pointHighlightFill : "#fff",
									pointHighlightStroke : "rgba(151,187,205,1)",
									data : []
								}
							]
						}
						for(var i=0;i<data.length;i++){
							lineChartData.labels.push(data[i][1]);
							lineChartData.datasets[0].data.push(data[i][0]);
						}
						var ctx = document.getElementById("chart2").getContext("2d");
						window.myLine = new Chart(ctx).Line(lineChartData, {
							responsive: true
						});
					});
				</script>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard_log_report?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<div id="canvas-holder" style="width:100%">
					<canvas id="chart3" width="300" height="300"/>
				</div>

				<script>
					$.get("<?=url_base?>log-report/graph",function(datas){
						var data = $.parseJSON(datas);						
						var radarChartData = {
							labels: [],
							datasets: [
								{
									label: "My Second dataset",
									fillColor: "rgba(151,187,205,0.2)",
									strokeColor: "rgba(151,187,205,1)",
									pointColor: "rgba(151,187,205,1)",
									pointStrokeColor: "#fff",
									pointHighlightFill: "#fff",
									pointHighlightStroke: "rgba(151,187,205,1)",
									data: []
								}
							]
						};
						for(var i=0;i<data.length;i++){
							radarChartData.labels.push(data[i][1]);
							radarChartData.datasets[0].data.push(data[i][0]);
						}
						var ctx = document.getElementById("chart3").getContext("2d");
						window.myPolarArea = new Chart(ctx).Radar(radarChartData, {
							responsive:true
						});
					});
				</script>
			</div>
		</div>
	</div>
</div>
