<?php $_SESSION["title"] = configuration ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=configuration?></a> <i class='fa fa-angle-right'></i> <?=edit?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<form action='<?=url_base.controller?>/edit' method='POST' class='form-horizontal'>
			<input type="hidden" name="event" id="event">
			<div class="form-group">
				<label class="col-md-2 text-right"><?=configuration_number_question_answer?>:</label>
				<div class="col-md-3">
					<input type="text" name="number_question_answer" id="number_question_answer" value="<?=$d["number_question_answer"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_number_question_answer_title?>" placeholder="<?=configuration_number_question_answer_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=configuration_login?>:</label>
				<div class="col-md-3">
					<select name="login" id="login" class="width-full" data-toggle="tooltip" title="<?=configuration_login_title?>">
						<option value='1' <?=(($d["login"]=='1')? 'selected' : '')?> ><?=yes?></option>
						<option value='0' <?=(($d["login"]=='0')? 'selected' : '')?> ><?=no?></option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=configuration_new_password_sent_email?>:</label>
				<div class="col-md-3">
					<select name="new_password_sent_email" id="new_password_sent_email" class="width-full" data-toggle="tooltip" title="<?=configuration_new_password_sent_email_title?>">
						<option value='1' <?=(($d["new_password_sent_email"]=='1')? 'selected' : '')?> ><?=yes?></option>
						<option value='0' <?=(($d["new_password_sent_email"]=='0')? 'selected' : '')?> ><?=no?></option>
					</select>
				</div>
				<label class="col-md-2 text-right"><?=configuration_number_days_password_diferrence?>:</label>
				<div class="col-md-3">
					<input type="text" name="number_days_password_diferrence" id="number_days_password_diferrence" value="<?=$d["number_days_password_diferrence"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_number_days_password_diferrence_title?>" placeholder="<?=configuration_number_days_password_diferrence_placeholder?>">					
				</div>
			</div>
			<div id="config_email" <?=($d["new_password_sent_email"]=='0')?"style='display:none;'":''?> >
				<div class="form-group">
					<label class="col-md-2 text-right"><?=configuration_email_host?>:</label>
					<div class="col-md-3">
						<input type="text" name="email_host" id="email_host" value="<?=$d["email_host"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_email_host_title?>" placeholder="<?=configuration_email_host_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=configuration_email_port?>:</label>
					<div class="col-md-3">
						<input type="text" name="email_port" id="email_port" value="<?=$d["email_port"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_email_port_title?>" placeholder="<?=configuration_email_port_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=configuration_email_security_smtp?>:</label>
					<div class="col-md-3">
						<select name="email_security_smtp" id="email_security_smtp" class="width-full" data-toggle="tooltip" title="<?=configuration_email_security_smtp_title?>">
							<option value='1' <?=(($d["email_security_smtp"]=='1')? 'selected' : '')?> ><?=yes?></option>
							<option value='0' <?=(($d["email_security_smtp"]=='0')? 'selected' : '')?> ><?=no?></option>
						</select>
					</div>
					<label class="col-md-2 text-right"><?=configuration_email_type_security_smtp?>:</label>
					<div class="col-md-3">
						<select name="email_type_security_smtp" id="email_type_security_smtp" class="width-full" data-toggle="tooltip" title="<?=configuration_email_type_security_smtp_title?>">
							<option value='TLS' <?=(($d["email_type_security_smtp"]=='TLS')? 'selected' : '')?> >TLS</option>
							<option value='SSL' <?=(($d["email_type_security_smtp"]=='SSL')? 'selected' : '')?> >SSL</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=configuration_email_user?>:</label>
					<div class="col-md-3">
						<input type="text" name="email_user" id="email_user" value="<?=$d["email_user"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_email_user_title?>" placeholder="<?=configuration_email_user_placeholder?>">
					</div>
					<label class="col-md-2 text-right"><?=configuration_email_password?>:</label>
					<div class="col-md-3">
						<input type="text" name="email_password" id="email_password" value="<?=$d["email_password"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_email_password_title?>" placeholder="<?=configuration_email_password_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=configuration_email_subject?>:</label>
					<div class="col-md-8">
						<input type="text" name="email_subject" id="email_subject" value="<?=$d["email_subject"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_email_subject_title?>" placeholder="<?=configuration_email_subject_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=configuration_email_message?>:</label>
					<div class="col-md-8">
						<textarea name='email_message' id='email_message' class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=configuration_email_message_title?>" placeholder="<?=configuration_email_message_placeholder?>"><?=$d["email_message"]?></textarea>
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-md-2 text-right"><?=configuration_number_answer_allowed?>:</label>
				<div class="col-md-3">
					<input type="text" name="number_answer_allowed" id="number_answer_allowed" value="<?=$d["number_answer_allowed"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=configuration_number_answer_allowed_title?>" placeholder="<?=configuration_number_answer_allowed_placeholder?>">
				</div>
			</div>
			<div class='form-group'>
				<div class='col-md-2 col-md-offset-5'>
					<button class='btn1' aajs='send'><?=save?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<script>
	$("#new_password_sent_email").on("change",function(){
		$("#config_email").fadeToggle();
	});
</script>