<?php $_SESSION["title"] = actions ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=actions?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=action_name?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=action_name?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "idaction" },
	                            { "data": "name" },
	                            { "data": "btn" }
	                        ],
	                    },
	                );
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idaction"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idaction' id='idaction' value='".$d["idaction"]."' class='width-full' disabled title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=action_name?>:</label>
					<div class="col-md-3">
						<input type="text" name="name" id="name" aajs="required" value="<?=$d["name"]?>" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=action_name_title?>" placeholder="<?=action_name_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=action_function?>:</label>
					<div class="col-md-3">
						<select name="function" id="function" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=action_function_title?>">
							<option value="1" <?=($d["function"]=='1')? 'selected' : ''?> ><?=action_function_opt1?></option>
							<option value="2" <?=($d["function"]=='2')? 'selected' : ''?> ><?=action_function_opt2?></option>
							<option value="3" <?=($d["function"]=='3')? 'selected' : ''?> ><?=action_function_opt3?></option>
							<option value="4" <?=($d["function"]=='4')? 'selected' : ''?> ><?=action_function_opt4?></option>
							<option value="5" <?=($d["function"]=='5')? 'selected' : ''?> ><?=action_function_opt5?></option>
							<option value="6" <?=($d["function"]=='6')? 'selected' : ''?> ><?=action_function_opt6?></option>
							<option value="7" <?=($d["function"]=='7')? 'selected' : ''?> ><?=action_function_opt7?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=action_icon?>:</label>
					<div class="col-md-3">
						<select name="idicon" id="idicon" aajs="required" data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=action_icon_title?>">
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
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>