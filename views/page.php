<?php $_SESSION["title"] = page ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=page?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=page_name?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=page_name?></th><th><?=actions?></th></tfoot>
            </table>
            <script>
	            $(document).ready( function () {
	                $('#datatable').dataTable(
		                {
		                	"language":{
		                    	"url": "<?=url_base?>third_party/datatables/language/es.json"
		                        },
	                        "processing": true,
	                        "serverSide": true,
	                        "ordering": false,
	                        "ajax": { url : "<?=url_base.routerCtrl?>/listt", type : "POST" },
	                        "columns": [
	                            { "data": "idpage" },
	                            { "data": "name" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idpage"]."' method='post' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idpage' id='idpage' value='".$d["idpage"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_name?>:</label>
					<div class="col-md-9">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=page_name_title?>" placeholder="<?=page_name_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_url?>:</label>
					<div class="col-md-6">
						<input type="text" name="url" id="url" value="<?=$d["url"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=page_url_title?>" placeholder="<?=page_url_placeholder?>">
					</div>
					<label for="view_main" class="col-md-2 text-right"><?=page_view_main?>:</label>
					<div class='col-md-2'>
						<input type="checkbox" name="view_main" id="view_main" value="1" <?=(($d["view_main"]=='1')? 'checked' : '')?> title='<?=page_view_main?>'>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_link?>:</label>
					<div class="col-md-4">
						<select name="link" id="link" class="width-full" aajs="required" data-toggle="tooltip" title="<?=page_link_title?>"><option value="0" <?=($d["link"]=="0")?'selected':''?> ><?=no?></option><option value="1" <?=($d["link"]=="1")?'selected':''?> ><?=yes?></option></select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_content?>:</label>
					<div class="col-md-9">
						<textarea name='content' id='content' class="width-full tinymce" <?=(action=="query")?'disabled':''?> style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=page_content_title?>" placeholder="<?=page_content_placeholder?>"><?=$d["content"]?></textarea>
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