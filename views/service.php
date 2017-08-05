<?php $_SESSION["title"] = service ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=service?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=service_name?></th><th><?=service_father?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=service_name?></th><th><?=service_father?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "idservice" },
	                            { "data": "name" },
	                            { "data": "father" },
	                            { "data": "btn" }
	                        ],
	                    },
	                );
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.controller."/".action."/".$d[0]["idservice"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<div class="row">
					<div class="col-md-6">
						<input type="hidden" name="event" id="event">
						<?php
							if(action!="add")
								echo "<div class='form-group'>
									<label class='col-md-2 text-right'>".id.":</label>
									<div class='col-md-3'>
										<input type='text' name='idservice' id='idservice' value='".$d[0]["idservice"]."' class='width-full' disabled title='".id_title."'>
									</div>
								</div>";
						?>
						<style>
							.optionGroup {
								font-weight: bold;
								font-style: italic;
							}
						</style>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=service_father?>:</label>
							<div class="col-md-10">
								<select name="idfather" id="idfather" aajs='required' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=service_father_title?>">
									<option value='0'><?=service_father_opt?></option>
									<?php
										foreach ($dependencies["fathers"] as $father){
											echo "<option value='".$father["idservice"]."' ".(($d[0]["idfather"]==$father["idservice"])? 'selected' : '')." class='optionGroup'>".$father["name"]."</option>";
											foreach ($father["childrens"] as  $child) {
												echo "<option value='".$child["idservice"]."' ".(($d[0]["idfather"]==$child["idservice"])? 'selected' : '').">".$child["name"]."</option>";
											}
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=service_name?>:</label>
							<div class="col-md-10">
								<input type="text" name="name" id="name" value="<?=$d[0]["name"]?>" aajs='required' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=service_name_title?>" placeholder="<?=service_name_placeholder?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=service_url?>:</label>
							<div class="col-md-10">
								<input type="text" name="url" id="url" value="<?=$d[0]["url"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=service_url_title?>" placeholder="<?=service_url_placeholder?>">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=service_icon?>:</label>
							<div class="col-md-10">
								<select name="idicon" id="idicon" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=service_icon_title?>">
									<?php
										foreach ($dependencies["icons"] as $icon){
											echo "<option value='".$icon["idicon"]."' data-content='<i class=\"".$icon["class"]." ".$icon["name"]."\"></i> ".$icon["name"]."' ".(($d[0]["idicon"]==$icon["idicon"])? 'selected' : '')."></option>";
										}
									?>
								</select>

							</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 text-right"><?=service_color?>:</label>
							<div class="col-md-10">
								<input type="text" name="color" id="color" aajs='required' value="<?=(empty($d[0]["color"]))?'F5F5F5':$d[0]["color"]?>" class="width-full jscolor" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=service_color_title?>" placeholder="<?=service_color_placeholder?>">
							</div>
						</div>
						<?php
							if(action!="query")
								echo"<div class='form-group'>
									<div class='col-md-2 col-md-offset-5'>
										<button class='btn1'>".save."</button>
									</div>
								</div>";
						?>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<b><?=service_actions?></b>
						</div>
						<?php
							for($i=0;$i<count($dependencies["actions"]);$i++){
								$actions .= "<div class='form-group'>";
								$actions .= "<label>";
								if($d["actions"]!=""){
									if($d["actions"][$dependencies["actions"][$i]["idaction"]]==$dependencies["actions"][$i]["idaction"]){
										$actions .= "<input type='checkbox' name='nodeleteactions[]' value='".$dependencies["actions"][$i]["idaction"]."' checked>";
									}else{
										$actions .= "<input type='checkbox' name='actions[]' value='".$dependencies["actions"][$i]["idaction"]."'>";
									}
								}else{
									$actions .= "<input type='checkbox' name='actions[]' value='".$dependencies["actions"][$i]["idaction"]."'>";
								}
								$actions .= "<b>".$dependencies["actions"][$i]["name"]."</b>";
								$actions .= "</label>";
								$actions .= "</div>";
							}
							echo $actions;
						?>	
					</div>
				</div>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>