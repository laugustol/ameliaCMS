<?php $_SESSION["title"] = gallery ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=gallery?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php
			if(!empty($dependencies['add'])){
				echo "<form enctype='multipart/form-data' id='formuploadajax' method='post'>
			        <input  type='file' id='image' name='image'>
			    </form>
			    <div class='progress'>
			    	<div class='progressbar'></div>
			    </div>";
			}
		?>
		<script>
			$(document).ready(function(){
				$("#image").attr("onchange","upload('2','');");	
			});
		</script>
		<style>
			.gallery>li:hover{
				border:3px solid #242834;
			}
			.gallery_selected{
				border:3px solid #242834;	
			}
		</style>
		<ul class="gallery">
		<?php 
			foreach ($dependencies["images"] as $k1 => $image) {
				echo "<li><a href='javascript:void(0);' onclick='show_img(this);' ><img src='".url_base.$image["src"]."' ></a></li>";
			}
		?>
		</ul>
		<div id="gallery_modal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<?php
							if(!empty($dependencies["actions"][2])){
								echo "<form id='form_modal' action='' method='POST' class='form-horizontal'>";
							}else{
								echo "<div class='form-horizontal'>";
							}
						?>
							<input type="hidden" name="event" id="event">
							<div class="row">
								<div class="col-md-7" style="margin-left:5px;border:1px solid #CCCCCC; height:500px;width:800px;display: flex;flex-wrap: wrap;justify-content: space-around;">
									<img id="image_preview" src="" style="max-height: 500px;max-width: 800px;">
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="col-md-3 text-right"><?=gallery_src?></label>
										<div class="col-md-8">
											<input type="text" name="src" id="src" class="width-full" disabled data-toggle="tooltip" title="<?=gallery_src_title?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 text-right"><?=gallery_title?></label>
										<div class="col-md-8">
											<input type="text" name="title" id="title" class="width-full" data-toggle="tooltip" title="<?=gallery_title_title?>" placeholder="<?=gallery_title_placeholder?>"<?=(empty($dependencies["actions"][2]))? 'disabled' : ''?> >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 text-right"><?=gallery_legend?></label>
										<div class="col-md-8">
											<input type="text" name="legend" id="legend" class="width-full" data-toggle="tooltip" title="<?=gallery_legend_title?>" placeholder="<?=gallery_legend_placeholder?>"<?=(empty($dependencies["actions"][2]))? 'disabled' : ''?> >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 text-right"><?=gallery_alternative?></label>
										<div class="col-md-8">
											<input type="text" name="alternative" id="alternative" class="width-full" data-toggle="tooltip" title="<?=gallery_alternative_title?>" placeholder="<?=gallery_alternative_placeholder?>"<?=(empty($dependencies["actions"][2]))? 'disabled' : ''?> >
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 text-right"><?=gallery_description?></label>
										<div class="col-md-8">
											<textarea name="description" id="description" class="width-full" data-toggle="tooltip" title="<?=gallery_description_title?>" placeholder="<?=gallery_description_placeholder?>"<?=(empty($dependencies["actions"][2]))? 'disabled' : ''?> ></textarea>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<p id="created"></p>
										</div>
									</div>
									<div class="form-group">
										<?php										
											if(!empty($dependencies["actions"][2])){
												echo "<div class='col-md-2 col-md-offset-2'><button class='btn1' aajs='send'>".save."</button></div>";
											}
											if(!empty($dependencies["actions"][7])){
												echo "<div class='col-md-3'><a id='img_delete' href=''><button type='button' class='btn1' title='".delete."'><i class='glyphicon glyphicon-trash'></i></button></a></div>";
											}
										?>
									</div>
								</div>
							</div>
						<?php
							if(!empty($dependencies["actions"][2])){
								echo "</form>";
							}else{
								echo "</div>";
							}
						?>
					</div>
					<div class="modal-footer">
						<button type="button" id="con" class="btn1" data-dismiss="modal"><?=plugin_gallery_tinymce_close?></button>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>
