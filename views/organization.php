<?php $_SESSION["title"] = organization ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=organization?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=organization_name?></th><th><?=actions?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idorganization"]."</td><td>".$val["name_two"]."</td>".$val["btn"]."</tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=organization_name?></th><th><?=actions?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idorganization"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idorganization' id='idorganization' value='".$d["idorganization"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<input type="hidden" name="event" id="event">
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_header?>:</label>
				<div class="col-md-9">
					<img id="header" src="<?=url_base.$d["src_header"]?>" style="border:1px solid #cccccc;width: 100%;height: 100px;" onclick="show_gallery_modal(0,this);" <?=(action=="query")?'disabled':''?> alt="<?=organization_header_title?>" title="<?=organization_header_title?>">
					<input type="hidden" name="idgallery_header" id="idgallery_header" value="<?=$d["idgallery_header"]?>">
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-2 col-md-offset-2">
					<a href="javascript:void(0);" id="delete_header"><?=gallery_delete_img?></a>
				</div>
			</div>
			<script>
				$("#delete_header").click(function(){
					$("#header").attr("src","");
					$("#idgallery_header").val("");
				});
			</script>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_name_one?>:</label>
				<div class="col-md-3">
					<input type="text" name="name_one" id="name_one" value="<?=$d["name_one"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=organization_name_one_title?>" placeholder="<?=organization_name_one_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=organization_name_two?>:</label>
				<div class="col-md-3">
					<input type="text" name="name_two" id="name_two" value="<?=$d["name_two"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=organization_name_two_title?>" placeholder="<?=organization_name_two_placeholder?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_email?>:</label>
				<div class="col-md-3">
					<input type="text" name="email" id="email" value="<?=$d["email"]?>" aajs="required,email" class="width-full" data-toggle="tooltip" title="<?=organization_email_title?>" placeholder="<?=organization_email_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=organization_favicon?>:</label>
				<div class="col-md-1">
					<img id="favicon" src="<?=url_base.$d["src_favicon"]?>" style="border:1px solid #cccccc;width: 100%;height: 50px;" onclick="show_gallery_modal(0,this);" <?=(action=="query")?'disabled':''?> alt="<?=organization_favicon_title?>" title="<?=organization_favicon_title?>">
					<input type="hidden" name="idgallery_favicon" id="idgallery_favicon" value="<?=$d["idgallery_favicon"]?>">
				</div>
				<div class="col-md-2">
					<a href="javascript:void(0);" id="delete_favicon"><?=gallery_delete_img?></a>
				</div>
			</div>
			<script>
				$("#delete_favicon").click(function(){
					$("#favicon").attr("src","");
					$("#idgallery_favicon").val("");
				});
			</script>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_description?>:</label>
				<div class="col-md-8">
					<textarea name='description' id='description' class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=organization_description_title?>" placeholder="<?=organization_description_placeholder?>"><?=$d["description"]?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_address?>:</label>
				<div class="col-md-8">
					<textarea name='address' id='address' class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=organization_address_title?>" placeholder="<?=organization_address_placeholder?>"><?=$d["address"]?></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_rights?>:</label>
				<div class="col-md-3">
					<input type="text" name="rights" id="rights" value="<?=$d["rights"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=organization_rights_title?>" placeholder="<?=organization_rights_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=organization_phone_one?>:</label>
				<div class="col-md-3">
					<input type="text" name="phone_one" id="phone_one" value="<?=$d["phone_one"]?>" aajs="required,number" class="width-full" data-toggle="tooltip" title="<?=organization_phone_one_title?>" placeholder="<?=organization_phone_one_placeholder?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_phone_two?>:</label>
				<div class="col-md-3">
					<input type="text" name="phone_two" id="phone_two" value="<?=$d["phone_two"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=organization_phone_two_title?>" placeholder="<?=organization_phone_two_placeholder?>">
				</div>
				<label class="col-md-2 text-right"><?=organization_phone_three?>:</label>
				<div class="col-md-3">
					<input type="text" name="phone_three" id="phone_three" value="<?=$d["phone_three"]?>" aajs="number" class="width-full" data-toggle="tooltip" title="<?=organization_phone_three_title?>" placeholder="<?=organization_phone_three_placeholder?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_skip_homepage?>:</label>
				<div class="col-md-3">
					<select name="skip_homepage" id="skip_homepage" class="width-full" data-toggle="tooltip" title="<?=organization_skip_homepage_title?>">
						<option value='1' <?=(($d["skip_homepage"]=='1')? 'selected' : '')?> ><?=yes?></option>
						<option value='0' <?=(($d["skip_homepage"]=='0')? 'selected' : '')?> ><?=no?></option>
					</select>
				</div>
				<label class="col-md-2 text-right"><?=organization_type_web?>:</label>
				<div class="col-md-3">
					<select name="type_web" id="type_web" class="width-full" data-toggle="tooltip" title="<?=organization_type_web_title?>">
						<option value='1' <?=(($d["type_web"]=='1')? 'selected' : '')?> ><?=organization_type_web_option_one?></option>
						<option value='0' <?=(($d["type_web"]=='0')? 'selected' : '')?> ><?=organization_type_web_option_two?></option>
					</select>
				</div>
			</div>
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
			<script>
				$("#new_password_sent_email").on("change",function(){
					$("#config_email").toggle();
				});
			</script>
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