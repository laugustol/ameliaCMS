<?php $_SESSION["title"] = portfolio ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=portfolio?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=portfolio_title?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=portfolio_title?></th><th><?=actions?></th></tfoot>
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
	                        "ajax": { url : "<?=url_base.controller?>/listt", type : "POST" },
	                        "columns": [
	                            { "data": "idportfolio" },
	                            { "data": "title" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.controller."/".action."/".$d["idportfolio"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idportfolio' id='idportfolio' value='".$d["idportfolio"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=portfolio_title?>:</label>
					<div class="col-md-3">
						<input type="text" name="title" id="title" value="<?=$d["title"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=portfolio_title_title?>" placeholder="<?=portfolio_title_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=portfolio_description?>:</label>
					<div class="col-md-3">
						<input type="text" name="description" id="description" value="<?=$d["description"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=portfolio_description_title?>" placeholder="<?=portfolio_description_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=portfolio_img?>:</label>
					<div class="col-md-9">
						<img id="image_two" src="<?=url_base.$d["src"]?>" style="border:1px solid #cccccc;width: 120px;height: 100px;" <?=(action!="query")? 'onclick="show_gallery_modal(0,this);"':''?> >
						<input type="hidden" name="idgallery" id="idgallery_image_two" value="<?=$d["idgallery"]?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=portfolio_idpage?>:</label>
					<div class="col-md-3">
						<select name="idpage" id="idpage" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=portfolio_idpage_title?>">
							<option value='0' <?=(($d["idpage"] == "0")? 'selected' : '')?> ><?=portfolio_idpage_option?></option>
							<?php
								foreach ($dependencies["idpage"] as $page){
									echo "<option value='".$page["idpage"]."' data-content='".$page["name"]."' ".(($d["idpage"]==$page["idpage"])? 'selected' : '')."></option>";
								}
							?>
						</select>

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