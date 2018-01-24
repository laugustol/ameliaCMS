<style>
	.gallery>li:hover{
		border:3px solid #242834;
	}
	.gallery_selected{
		border:3px solid #242834;	
	}
</style>
<?php $_SESSION["title"] = post ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=post?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=post_name?></th><th><?=post_created_by?></th><th><?=actions?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idpost"]."</td><td>".$val["name"]."</td><td>".$val["person"]."</td><td>".$val["btn"]."</td></tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=post_name?></th><th><?=post_created_by?></th><th><?=actions?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idpost"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idpost' id='idpost' value='".$d["idpost"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-2 text-right'>".post_created_by.":</label>
							<div class='col-md-3'>
								<input type='text' name='idpost' id='idpost' value='".$d["person"]."' class='width-full' disabled data-toggle='tooltip' title='".post_created_by_title."'>
							</div>
						</div>
						<div class='form-group'>
							<label class='col-md-2 text-right'>".post_date_created.":</label>
							<div class='col-md-3'>
								<input type='text' name='idpost' id='idpost' value='".$d["date_created"]."' class='width-full' disabled data-toggle='tooltip' title='".post_date_created_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=post_name?>:</label>
					<div class="col-md-9">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=post_name_title?>" placeholder="<?=post_name_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=post_color?>:</label>
					<div class="col-md-9">
						<input type="text" name="color" id="color" aajs='required' value="<?=(empty($d["color"]))?'F5F5F5':$d["color"]?>" class="width-full jscolor" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=post_color_title?>" placeholder="<?=post_color_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=post_url?>:</label>
					<div class="col-md-9">
						<input type="text" name="url" id="url" value="<?=$d["url"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=post_url_title?>" placeholder="<?=post_url_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=post_img?>:</label>
					<div class="col-md-9">
						<img id="image_two" src="<?=url_base.$d["src"]?>" style="border:1px solid #cccccc;width: 100%;height: 200px;"  <?=(action!="query")? 'onclick="show_gallery_modal(0,this);"':''?> >
						<input type="hidden" name="idgallery" id="idgallery_image_two" value="<?=$d["idgallery"]?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-2 col-md-offset-2">
						<a href="javascript:void(0);" id="delete"><?=gallery_delete_img?></a>
					</div>
				</div>
				<script>
					$("#delete").click(function(){
						$("#image_two").attr("src","");
						$("#idgallery").val("");
					});
				</script>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=post_content?>:</label>
					<div class="col-md-9">
						<textarea name='content' id='content' class="width-full tinymce" <?=(action=="query")?'disabled':''?> style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=post_content_title?>" placeholder="<?=post_content_placeholder?>"><?=$d["content"]?></textarea>
					</div>
				</div>
				<?php
					if(action!="query")
						echo"<div class='form-group'>
							<div class='col-md-2 col-md-offset-5'>
								<button class='btn1' aajs='send'>".save."</button>
							</div>
						</div>";
				?>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>
<div id="gallery_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<form enctype="multipart/form-data" id="formuploadajax" method="post">
			        <input  type="file" id="image" name="image"/>
			    </form>
			    <div class='progress'>
			    	<div class="progressbar"></div>
			    </div>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" id="con" class="btn1" data-dismiss="modal"><?=plugin_gallery_tinymce_close?></button>
			</div>
		</div>
	</div>
</div>