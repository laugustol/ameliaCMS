<?php $_SESSION["title"] = slider ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=slider?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=slider_name?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=slider_name?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "idslider" },
	                            { "data": "name" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.controller."/".action."/".$d[0]["idslider"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idslider' id='idslider' value='".$d[0]["idslider"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=slider_name?>:</label>
					<div class="col-md-3">
						<input type="text" name="name" id="name" value="<?=$d[0]["name"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=slider_name_title?>" placeholder="<?=slider_name_placeholder?>">
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
				<table class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<th><?=((action!="query")? slider_add_img : slider_imgs)?></th>
						<th></th>
						<?php
							if(action!="query"){
								echo "<th><button class='btn1' aajs='click{add();}' type='button' title='".slider_btn_add."' data-toggle='tooltip'><i class='fa fa-plus'></i></button></th>";
							}
						?>
					</thead>
					<tbody id="add_slider">
						<?php
							foreach ($d["imgs"] as $k => $val) {
								echo "<tr>
										<td>
											<img id='image_two_".$k."' src='".url_base.$val["src"]."'style='border:1px solid #cccccc;width: 300px;height: 200px;' ".((action!="query")? 'onclick="show_gallery_modal(0,this);"' : '')."><input type='hidden' name='idgallery[]' id='idgallery_image_two_".$k."' value='".$val["idgallery"]."'>
										</td>
										<td style='text-align:left;'>
											<div class='row'><div class='col-md-12'>
												<label for='title'>".slider_title."</label>
												<input type='text' name='title[]' value='".$val["title"]."' class='width-full' title='".slider_title_title."' placeholder='".slider_title_placeholder."' ".((action=="query")? 'disabled': '')." data-toggle='tooltip'>
											</div></div>
											<div class='row'><div class='col-md-12'>
												<label for='description'>".slider_description."</label>
												<input type='text' name='description[]' value='".$val["description"]."' class='width-full' title='".slider_description_title."' placeholder='".slider_description_placeholder."' ".((action=="query")? 'disabled': '')." data-toggle='tooltip'>
											</div></div>
											<div class='row'><div class='col-md-12'>
												<label for='title'>".slider_idpage."</label>
												<select name='idpage[]' class='width-full' title='".slider_idpage_title."' data-toggle='tooltip' ".((action=="query")? 'disabled': '').">
													<option value='0'>".slider_idpage_option."</option>";
													for ($i=0; $i < count($dependencies["idpage"]); $i++) { 
														echo "<option value='".$dependencies["idpage"][$i]["idpage"]."'>".$dependencies["idpage"][$i]["name"]."</option>";
													}
												echo "</select>
											</div></div>
										</td>";
										if(action!="query"){
											echo "<td><button type='button' class='btn1' onclick='del(this);' title='".slider_btn_delete."' data-toggle='tooltip'><i class='fa fa-remove'></i></button></td>";
										}
									echo "</tr>";
							}
						?>
					</tbody>
				</table>
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
<script type="text/javascript">
	var length_tr = <?=((count($d["imgs"])>0)? count($d["imgs"]) : 0 )?>;
	function add(){
		var tr = "<tr>"+
			"<td>"+
				"<img id='image_two_"+length_tr+"' src=''style='border:1px solid #cccccc;width: 300px;height: 200px;' onclick='show_gallery_modal(0,this);'><input type='hidden' name='idgallery[]' id='idgallery_image_two_"+length_tr+"'>"+
			"</td>"+
			"<td style='text-align:left;'>"+
				"<div class='row'><div class='col-md-12'>"+
					"<label for='title'><?=slider_title?></label> <input type='text' name='title[]' class='width-full' data-toggle='tooltip' title='<?=slider_title_title?>' placeholder='<?=slider_title_placeholder?>'>"+
				"</div></div>"+
				"<div class='row'><div class='col-md-12'>"+
					"<label for='description'><?=slider_description?></label> <input type='text' name='description[]' class='width-full' data-toggle='tooltip' title='<?=slider_description_title?>' placeholder='<?=slider_description_placeholder?>'>"+
				"</div></div>"+
				"<div class='row'><div class='col-md-12'>"+
					"<label for='title'><?=slider_idpage?></label>"+
					"<select name='idpage[]' class='width-full' title='<?=slider_idpage_title?>'>"+
						"<option value='0'><?=slider_idpage_option?></option>"+ 
					<?php
						for ($i=0; $i < count($dependencies["idpage"]); $i++) { 
							echo "\"<option value='".$dependencies["idpage"][$i]["idpage"]."'>".$dependencies["idpage"][$i]["name"]."</option>\"+";
						}
					?>
					"</select>"+
				"</div></div>"+
			"</td>"+
			"<td>"+
				"<button type='button' class='btn1' onclick='del(this);' title='<?=slider_btn_delete?>' data-toggle='tooltip'><i class='fa fa-remove'></i></button>"+
			"</td>"
		"</tr>";
		$("#add_slider").prepend(tr);
	}
	function del(_this){
		_this.parentNode.parentNode.parentNode.removeChild(_this.parentNode.parentNode);
	}
</script>