<?php $_SESSION["title"] = theme ?>
<style>
	.plugins_title{
		font-size: 30px;
	}
	.options_btn{
		height: 63px;
		overflow-y: auto;
	}
	.nav-tabs li a{
		border-radius:0 !important;
	}
</style>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=theme?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<ul class="nav nav-tabs nav-justified">
			<li class="active"><a data-toggle="tab" href="#new_themes"><?=theme_new_themes?></a></li>
			<li><a data-toggle="tab" href="#themes_old"><?=theme_themes_old?></a></li>
		</ul>
	</div>
</div>
<style>
	.img_themes{
		width:180px;
		height:140px;
	}
</style>
<div class="tab-content">
	<input type="hidden" name="pagination" value="0">
	<div id="new_themes" class="tab-pane fade in active"></div>
	<div id="themes_old" class="tab-pane fade">
		<?php
			foreach ($dependencies["themes_installed"] as $k => $val) {
				echo "<div class='box'>
						<div class='box-container' style='padding-top:20px;'>
							<form action='".url_base."theme/activate/".$val["idtheme"]."' method='POST'>
								<div class='row'>
									<div class='col-md-2'>
										<img src='".$val["src"].$val["img"]."' atl='image' class='img_themes'>
									</div>
									<div class='col-md-10'>
										<div class='row'>
											<div class='col-md-12 plugins_title'>".$val["name"]."</div>
										</div>
										<div class='row'>
											<div class='col-md-12 options_btn'>".$val["description"]."</div>
										</div>
										<div class='row'>
											<div class='col-md-12'>
												".(($val["status"]=='0')? "<button class='btn1'>".theme_themes_btn_active."</button>" : '')."
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>";
			}
		?>
	</div>
</div>
<script>
	var arrayx = new Array();
	<?php foreach($dependencies["themes_ids"] as $val){ echo "arrayx.push(".$val["idtheme"].");\n"; }?>
	$.post("<?=url_api?>api/themes",{ids: arrayx,pagination:$("#pagination").val()},function(datas){
		var data = JSON.parse(datas);
		var div = "";
		for(d in data){
			div +="<form action='<?=url_base?>theme/add/"+data[d]["src"]+"' method='POST'>";
				div += "<div class='box' style='opacity:1;'>";
					div += "<div class='box-container' style='padding-top:20px;'>";
						div += "<div class='row'>";
							div += "<div class='col-md-2'>";
								div += "<img src='"+data[d]["img"]+"' atl='image' style='width:180px;height:140px;'>";
							div += "</div>";
							div += "<div class='col-md-10'>";
								div += "<div class='row'>";
									div += "<div class='col-md-12 plugins_title'>";
										div += data[d]["name"];
									div += "</div>";
								div += "</div>";
								div += "<div class='row'>";
									div += "<div class='col-md-12 options_btn'>";
										div += data[d]["description"];
									div += "</div>";
								div += "</div>";
								div += "<div class='row'>";
									div += "<div class='col-md-12'>";
										div += "<button class='btn1'><?=theme_themes_btn_install?></button>";
									div += "</div>";
								div += "</div>";
							div += "</div>";
						div += "</div>";
					div += "</div>";
				div += "</div>";
			div +="</form>";
		}
		$("#new_themes").append(div);
		$("#pagination").val(data[0]["pagination"]);
	});

</script>