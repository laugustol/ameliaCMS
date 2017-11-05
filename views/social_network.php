<?php $_SESSION["title"] = social_network ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=social_network?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=social_network_name?></th><th><?=social_network_icon?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=social_network_name?></th><th><?=social_network_icon?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "idsocial_network" },
	                            { "data": "name" },
	                            { "data": "iname" },
	                            { "data": "btn" }
	                        ],
	                    },
	                );
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idsocial_network"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="event" id="event">
						<?php
							if(action!="add")
								echo "<div class='form-group'>
									<label class='col-md-2 text-right'>".id.":</label>
									<div class='col-md-3'>
										<input type='text' name='idsocial_network' id='idsocial_network' value='".$d["idsocial_network"]."' class='width-full' disabled title='".id_title."'>
									</div>
								</div>";
						?>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=social_network_name?>:</label>
							<div class="col-md-10">
								<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs='required' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=social_network_name_title?>" placeholder="<?=social_network_name_placeholder?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=social_network_url?>:</label>
							<div class="col-md-10">
								<input type="text" name="url" id="url" value="<?=$d["url"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=social_network_url_title?>" placeholder="<?=social_network_url_placeholder?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=social_network_icon?>:</label>
							<div class="col-md-10">
								<select name="idicon" id="idicon" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=social_network_icon_title?>">
									<?php
										foreach ($dependencies["icons"] as $icon){
											echo "<option value='".$icon["idicon"]."' data-content='<i class=\"".$icon["class"]." ".$icon["name"]."\"></i> ".$icon["name"]."' ".(($d["idicon"]==$icon["idicon"])? 'selected' : '')."></option>";
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
					</div>
				</div>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>