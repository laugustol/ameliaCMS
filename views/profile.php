<?php $_SESSION["title"] = profile ?>
<?php if($_SESSION["initiated"]=="1"){ ?>
<div class="box col-md-6" style="margin-right: 50px;">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=user?></a> <i class='fa fa-angle-right'></i> <?=profile?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<form action='<?=url_base.routerCtrl?>' method='POST' class='form-horizontal' enctype='multipart/form-data'>
				<input type="hidden" name="event" id="event">
				<div class='form-group'>
					<label class='col-md-2 text-right'><?=user_name_two?>:</label>
					<div class='col-md-3'>
						<input type='text' value='<?=$_SESSION["uname"]?>' class='width-full' disabled title='"<?=id_title?>"'>
					</div>
					<label class="col-md-2 text-right"><?=person_charge?>:</label>
					<div class="col-md-5">
						<select name="idcharge" id="idcharge" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=person_charge_title?>">
							<?php
								foreach ($dependencies["charges"] as $charge){
									echo "<option value='".$charge["idcharge"]."' ".(($d[0]["idcharge"]==$charge["idcharge"])? 'selected' : '').">".$charge["name"]."</option>";
								}
							?>
						</select>
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
						<input type="text" id="ethnicity" value="<?=$d[0]["ethnicity"]?>" aajs="searchajax{<?=url_base?>ethnicity/search,this},required" class="width-full" data-toggle="tooltip" title="<?=person_idethnicity_title?>" placeholder="<?=person_idethnicity_placeholder?>" autocomplete="off">
						<input type="hidden" name="idethnicity" id="idethnicity" value="<?=$d[0]["idethnicity"]?>" aajs="required">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_identification_card?>:</label>
					<div class="col-md-4">
						<input type="text" name="identification_card" id="identification_card" value="<?=$d[0]["identification_card"]?>" aajs="required,number,min7" class="width-full" data-toggle="tooltip" title="<?=person_identification_card_title?>" placeholder="<?=person_identification_card_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_birth_date?>:</label>
					<div class="col-md-4">
						<input type="text" name="birth_date" id="birth_date" value="<?=$d[0]["birth_date"]?>" aajs="required" class="width-full datepickerx" title="<?=person_birth_date_title?>" placeholder="<?=person_birth_date_placeholder?>">
					</div>
					<script>
						$('.datepickerx').datepicker({format: 'mm-dd-yyyy',language: "es",minDate: new Date()});
					</script>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_name_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="name_one" id="name_one" value="<?=$d[0]["name_one"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_name_one_title?>" placeholder="<?=person_name_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_name_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="name_two" id="name_two" value="<?=$d[0]["name_two"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_name_two_title?>" placeholder="<?=person_name_two_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_last_name_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="last_name_one" id="last_name_one" value="<?=$d[0]["last_name_one"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_last_name_one_title?>" placeholder="<?=person_last_name_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_last_name_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="last_name_two" id="last_name_two" value="<?=$d[0]["last_name_two"]?>" aajs="required,letter" class="width-full" data-toggle="tooltip" title="<?=person_last_name_two_title?>" placeholder="<?=person_last_name_two_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_sex?>:</label>
					<div class="col-md-4">
						<select name="sex" id="sex" aajs="required" class="width-full" data-toggle="tooltip" title="<?=person_sex_title?>"><option value="M" <?=($d[0]["sex"]=="M")?'selected':''?> ><?=person_sex_option_m?></option><option value="F" <?=($d[0]["sex"]=="F")?'selected':''?> ><?=person_sex_option_f?></option></select>
					</div>
					<label class="col-md-2 text-right"><?=person_email?>:</label>
					<div class="col-md-4">
						<input type="text" name="email" id="email" value="<?=$d[0]["email"]?>" aajs="required,email" class="width-full" data-toggle="tooltip" title="<?=person_email_title?>" placeholder="<?=person_email_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_birth_place?>:</label>
					<div class="col-md-10">
						<textarea name="birth_place" id="birth_place" class="width-full" aajs="required" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=person_birth_place_title?>" placeholder="<?=person_birth_place_placeholder?>"><?=$d[0]["birth_place"]?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_idaddress?>:</label>
					<div class="col-md-5">
						<input type="text" id="idaddress" value="<?=$d[0]["full_address"]?>" aajs="searchajax{<?=url_base?>/parish/search,this},required" class="width-full" data-toggle="tooltip" title="<?=person_idaddress_title?>" placeholder="<?=person_idaddress_placeholder?>" autocomplete="off">
						<input type="hidden" name="idaddress" id="idaddress" value="<?=$d[0]["idaddress"]?>">
					</div>
					<label class="col-md-2"><?=person_image?></label>
					<div class="col-md-2">
						<select name='add_img' id='add_img' class="width-full" data-toggle="tooltip">
							<option value="1" <?=($d[0]["image"]!="")? 'selected' : ''?>><?=yes?></option>
							<option value="0" <?=($d[0]["image"]=="")? 'selected' : ''?>><?=no?></option>
						</select>
						<input type="hidden" name="image_url" id="image_url" value="<?=$d[0]["image"]?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_address?>:</label>
					<div class="col-md-5">
						<textarea name="address" id="address" class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=person_address_title?>" placeholder="<?=person_address_placeholder?>"><?=$d[0]["address"]?></textarea>
					</div>
					<div class="col-md-2">
						<img src="<?=url_base.$d[0]["image"]?>" width="100%" style="border-radius: 50px 50px;">
					</div>
					<div class="col-md-3">
						<input type='file' name='image' id='image' class="col-md-12" data-toggle="tooltip" title="<?=person_image_title?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=person_phone_one?>:</label>
					<div class="col-md-4">
						<input type="text" name="phone_one" id="phone_one" value="<?=$d[0]["phone_one"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=person_phone_one_title?>" placeholder="<?=person_phone_one_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=person_phone_two?>:</label>
					<div class="col-md-4">
						<input type="text" name="phone_two" id="phone_two" value="<?=$d[0]["phone_two"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=person_phone_two_title?>" placeholder="<?=person_phone_two_placeholder?>">
					</div>
				</div>
				<div class='form-group'>
					<div class='col-md-2 col-md-offset-5'>
						<button class='btn1' aajs="send"><?=save?></button>
					</div>
				</div>
		</form>
	</div>
</div>
<div class="col-md-5">
	<div class="row">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=user?></a> <i class='fa fa-angle-right'></i> <?=profile_password?>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<form action='<?=url_base.routerCtrl?>/new-password' method='POST' class='form-horizontal'>
					<input type="hidden" name="event" id="event">
					<div class="form-group">
						<label class="col-md-2 text-right"><?=profile_new_password?>:</label>
						<div class="col-md-4">
							<input type="password" name="password" id="password" class="width-full" data-toggle="tooltip" title="<?=profile_new_password_title?>" placeholder="<?=profile_new_password_placeholder?>">
						</div>
						<label class="col-md-2 text-right"><?=profile_new_password_repeat?>:</label>
						<div class="col-md-4">
							<input type="password" name="password_repeat" id="password_repeat" class="width-full" data-toggle="tooltip" title="<?=profile_new_password_repeat_title?>" placeholder="<?=profile_new_password_repeat_placeholder?>">
						</div>
					</div>
					<div class='form-group'>
						<div class='col-md-2 col-md-offset-5'>
							<button type='button' class='btn1 required_password' id="required_password_new_password"><?=save?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=user?></a> <i class='fa fa-angle-right'></i> <?=profile_question_answer_secrets?>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<form action='<?=url_base.routerCtrl?>/question-answer' method='POST' class='form-horizontal'>
					<input type="hidden" name="event" id="event">
					<?php
						for($a=0;$a<$dependencies["organization"][0]["number_question_answer"];$a++){
							echo "<div class='form-group'>
									<label class='col-md-2 text-right'>".profile_question." ".($a+1).":</label>
									<div class='col-md-4'>
										<input type='text' name='questions[]' id='question' value='".$d[$a]["question"]."' class='width-full' data-toggle='tooltip' title='".profile_question_title."' placeholder='".profile_question_placeholder."'>
									</div>
									<label class='col-md-2 text-right'>".profile_answer." ".($a+1).":</label>
									<div class='col-md-4'>
										<input type='password' name='answers[]' id='answer' value='' class='width-full' data-toggle='tooltip' title='".profile_answer_title."' placeholder='".profile_answer_placeholder."'>
									</div>
								</div>";
						}
					?>
					<div class='form-group'>
						<div class='col-md-2 col-md-offset-5'>
							<button type="button" class='btn1 required_password' id="required_password_question"><?=save?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div> 
</div>
<?php }else{ ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=user?></a> <i class='fa fa-angle-right'></i> <?=profile_password?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<form action='<?=url_base.routerCtrl?>/initiated' method='POST' class='form-horizontal'>
			<input type="hidden" name="event" id="event">
			<div class="form-group">
				<label class="col-md-2 text-right"><?=profile_new_password?>:</label>
				<div class="col-md-4">
					<input type="password" name="password" id="password" aajs='required' class="width-full" data-toggle="tooltip" title="<?=profile_new_password_title?>" placeholder="<?=profile_new_password_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=profile_new_password_repeat?>:</label>
				<div class="col-md-4">
					<input type="password" name="password_repeat" id="password_repeat" aajs='required' class="width-full" data-toggle="tooltip" title="<?=profile_new_password_repeat_title?>" placeholder="<?=profile_new_password_repeat_placeholder?>">
				</div>
			</div>
			<?php
				for($a=0;$a<$dependencies["organization"][0]["number_question_answer"];$a++){
					echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".profile_question." ".($a+1).":</label>
							<div class='col-md-4'>
								<input type='text' name='questions[]' id='question' aajs='required' class='width-full' data-toggle='tooltip' title='".profile_question_title."' placeholder='".profile_question_placeholder."'>
							</div>
							<label class='col-md-2 text-right'>".profile_answer." ".($a+1).":</label>
							<div class='col-md-4'>
								<input type='password' name='answers[]' id='answer' aajs='required' class='width-full' data-toggle='tooltip' title='".profile_answer_title."' placeholder='".profile_answer_placeholder."'>
							</div>
						</div>";
				}
			?>
			<div class='form-group'>
				<div class='col-md-2 col-md-offset-5'>
					<button class='btn1' aajs='send'><?=save?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<?php } ?>
<script>
	$(document).ready(function(){
		$("#required_password_new_password").click(function(){
			var aux = true;
			if( !vEmpty(document.getElementById("password")) ){
				toastr.error('<?=profile_new_password_empty?>','',{progressBar:true});
				aux=false;
			}
			if($("#password").val() != $("#password_repeat").val()){
				toastr.error('<?=profile_new_password_no_repeat?>','',{progressBar:true});
				aux=false;	
			}
			if(aux){
				password_confirm(0);
			}
		});
		$("#required_password_question").click(function(){
			var aux = true;
			$("#required_password_question").parent().parent().parent().find("input").each(function(id,element){
				if(this.id!="event"){
					if( !vEmpty(this) ){
						toastr.error('<?=profile_question_answer_empty?>','',{progressBar:true});
						aux = false;
						return false;
					}
				}
			});
			if(aux){
				password_confirm(1);
			}
		});
		function password_confirm(num){
			$.confirm({
				title: '<?=profile_confirm_title?>',
				content: "<input type='password' id='required_password_text' class='width-full'>",
				draggable: true,
				buttons: {
					enviar: {
						text: "<?=profile_send?>",
						action: function(){
							$.post("<?=url_base?>user/required-password",{password:$("#required_password_text").val()},function(data){
								if(data == '1'){
									$(".required_password").parent().parent().parent()[num].submit();
								}else{
									toastr.error('<?=profile_password_incorrect?>','',{progressBar:true});
								}
							});
						}
					},
					<?=btn_logout_btn_cancel?>: function () { }	
				}
			});
		}
	});
</script>