<?php $_SESSION["title"] = user ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=user?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) )."" : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=user_name?></th><th><?=personu?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=user_name?></th><th><?=personu?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "iduser" },
	                            { "data": "name" },
	                            { "data": "person" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["iduser"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='iduser' id='iduser' value='".$d["iduser"]."' class='width-full' disabled title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=user_name?>:</label>
					<div class="col-md-3">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs='required,letter' class="width-full" <?=(action!="add")?'disabled':''?> title="<?=user_name_title?>" placeholder="<?=user_name_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=personu?>:</label>
					<div class="col-md-3">
						<select name="idperson" id="idperson" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=user_person_title?>">
							<?php
								if(action=="add")
									foreach ($dependencies["persons_not_user"] as $person){
										echo "<option value='".$person["idperson"]."'>".$person["person"]."</option>";
									}
								else
									foreach ($dependencies["persons"] as $person){
										echo "<option value='".$person["idperson"]."' ".(($d["idperson"]==$person["idperson"])? 'selected' : '').">".$person["person"]."</option>";
									}
							?>
						</select>
					</div>
				</div>
				<?php
					if(action!="query"){
						echo"<div class='form-group'>";
							if(action=="edit"){
								echo "<div class='col-md-2'>
									<button type='button' id='reset_password' class='btn1' title='".user_reset_password_title."' data-toggle='tooltip'>".user_reset_password."</button>	
								</div>";
							}
							echo"<div class='col-md-2 col-md-offset-5'>
								<button class='btn1' aajs='send'>".save."</button>
							</div>
						</div>";
					}
				?>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>
<script>
	$("#reset_password").click(function(){
		$("form")[0].action = "<?=url_base.routerCtrl."/reset-password/".$d["iduser"]?>";
		$("form")[0].submit();
	});
</script>