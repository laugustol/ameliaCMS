<?php $_SESSION["title"] = person ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=person?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=person_identification_card?><th><?=names?><th><?=last_names?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=person_identification_card?><th><?=names?><th><?=last_names?></th><th><?=actions?></th></tfoot>
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
	                            { "data": "idperson" },
	                            { "data": "nationality_identification_card" },
	                            { "data": "name_complete" },
	                            { "data": "last_name_complete" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form name='hola' action='".url_base.routerCtrl."/".action."/".$d["idperson"]."' method='POST' class='form-horizontal' enctype='multipart/form-data'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<div class="form-group">
					<?php
						if(action!="add")
							echo "<label class='col-md-2 text-right'>".id.":</label>
								<div class='col-md-3'>
									<input type='text' name='idperson' id='idperson' value='".$d["idperson"]."' class='width-full' disabled title='".id_title."'>
								</div>";
					?>
					<label class="col-md-2 text-right"><?=person_charge?>:</label>
					<div class="col-md-3">
						<select name="idcharge" id="idcharge" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=person_charge_title?>">
							<?php
								foreach ($dependencies["charges"] as $charge){
									echo "<option value='".$charge["idcharge"]."' ".(($d["idcharge"]==$charge["idcharge"])? 'selected' : '').">".$charge["name"]."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2"><?=person_image?></label>
					<div class="col-md-2">
						<select name='add_img' id='add_img' class="width-full" data-toggle="tooltip" >
							<option value="1" <?=($d["image"]!="")? 'selected' : ''?>><?=yes?></option>
							<option value="0" <?=($d["image"]=="")? 'selected' : ''?>><?=no?></option>
						</select>
						<input type="hidden" name="image_url" id="image_url" value="<?=$d["image"]?>">
					</div>
					<div class="col-md-2">
						<img src="<?=url_base.$d["image"]?>" width="100%" style="border-radius: 50px 50px;">
					</div>
					<div class="col-md-3">
						<input type='file' name='image' id='image' class="col-md-12" data-toggle="tooltip" title="<?=person_image_title?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_idnationality?>:</label>
					<div class="col-md-4">
						<select name="idnationality" id="idnationality" aajs="required" class="width-full" data-toggle="tooltip" title="<?=person_idnationality_title?>">
							<?php
								foreach($dependencies["nationalitys"] as $n){
									echo '<option value="'.$n["idnationality"].'" '.(($n["idnationality"]==$d["idnationality"])?'selected':'').'>'.$n['name'].'</option>';
								}
							?>
						</select>
					</div>
					<label class="col-md-2 text-right"><?=person_idethnicity?>:</label>
					<div class="col-md-4">
						<input type="text" id="ethnicity" value="<?=$d["ethnicity"]?>" aajs="searchajax{<?=url_base?>ethnicity/search,this},required" class="width-full" data-toggle="tooltip" title="<?=person_idethnicity_title?>" placeholder="<?=person_idethnicity_placeholder?>" autocomplete="off">
						<input type="hidden" name="idethnicity" id="idethnicity" value="<?=$d["idethnicity"]?>" aajs="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_identification_card?>:</label>
					<div class="col-md-4">
						<input type="text" name="identification_card" id="identification_card" value="<?=$d["identification_card"]?>" aajs="required,number,min{7}" class="width-full" data-toggle="tooltip" title="<?=person_identification_card_title?>" placeholder="<?=person_identification_card_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_birth_date?>:</label>
					<div class="col-md-4">
						<input type="text" name="birth_date" id="birth_date" value="<?=$d["birth_date"]?>" aajs="required" class="width-full datepickerx" title="<?=person_birth_date_title?>" placeholder="<?=person_birth_date_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_name_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="name_one" id="name_one" value="<?=$d["name_one"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_name_one_title?>" placeholder="<?=person_name_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_name_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="name_two" id="name_two" value="<?=$d["name_two"]?>" aajs="letter" class="width-full" data-toggle="tooltip" title="<?=person_name_two_title?>" placeholder="<?=person_name_two_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_last_name_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="last_name_one" id="last_name_one" value="<?=$d["last_name_one"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_last_name_one_title?>" placeholder="<?=person_last_name_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_last_name_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="last_name_two" id="last_name_two" value="<?=$d["last_name_two"]?>" aajs="letter" class="width-full" data-toggle="tooltip" title="<?=person_last_name_two_title?>" placeholder="<?=person_last_name_two_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_sex?>:</label>
					<div class="col-md-4">
						<select name="sex" id="sex" class="width-full" aajs="required" data-toggle="tooltip" title="<?=person_sex_title?>"><option value="M" <?=($d["sex"]=="M")?'selected':''?> ><?=person_sex_option_m?></option><option value="F" <?=($d["sex"]=="F")?'selected':''?> ><?=person_sex_option_f?></option></select>
					</div>
					<label class="col-md-2 text-right"><?=person_email?>:</label>
					<div class="col-md-4">
						<input type="text" name="email" id="email" value="<?=$d["email"]?>" aajs="required,email" class="width-full" data-toggle="tooltip" title="<?=person_email_title?>" placeholder="<?=person_email_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_birth_place?>:</label>
					<div class="col-md-10">
						<textarea name="birth_place" id="birth_place" class="width-full" aajs="required" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=person_birth_place_title?>" placeholder="<?=person_birth_place_placeholder?>"><?=$d["birth_place"]?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_idaddress?>:</label>
					<div class="col-md-10">
						<input type="text" id="address" value="<?=$d["full_address"]?>" aajs="searchajax{<?=url_base?>parish/search,this},required" class="width-full" data-toggle="tooltip" title="<?=person_idaddress_title?>" placeholder="<?=person_idaddress_placeholder?>" autocomplete="off">
						<input type="hidden" name="idaddress" id="idaddress" value="<?=$d["idaddress"]?>" aajs="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_address?>:</label>
					<div class="col-md-10">
						<textarea name="address" id="address" class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=person_address_title?>" placeholder="<?=person_address_placeholder?>"><?=$d["address"]?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_phone_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="phone_one" id="phone_one" value="<?=$d["phone_one"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=person_phone_one_title?>" placeholder="<?=person_phone_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_phone_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="phone_two" id="phone_two" value="<?=$d["phone_two"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=person_phone_two_title?>" placeholder="<?=person_phone_two_placeholder?>">
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