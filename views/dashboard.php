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
					<a href="<?=url_base?>home/dashboard"><?=ameliacms_noticies?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container api_news"></div>
		</div>
	</div>
</div>
<script>
	$.get("<?=url_api?>api/news",function(datas){ 
		var data = $.parseJSON(datas);
		var html = "";
		for(var d in data){
			html+="<div class='api_news_title'><a href='"+data[d]["url"]+"'>"+data[d]["title"]+"</a></div>";
			html+="<div class='api_news_date'>"+data[d]["date_created"]+"</div>";
			html+="<div class='api_news_content'>"+data[d]["content"]+"</div>";
		}
		$(".api_news").html(html);
	});
</script>
<div class="row">
	<div class="col-md-12">	
		<div class="box">
				<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container"></div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard?></a>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container"></div>
		</div>
	</div>
</div>
