<?php $_SESSION["title"] = contact ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=contact?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=contact_name?></th><th><?=actions?></th><th><?=contact_status?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idcontact"]."</td><td>".$val["email"]."</td><td>".$val["btn"]."</td><td>".$val["status"]."</td></tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=contact_name?></th><th><?=actions?></th><th><?=contact_status?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idcontact"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idcontact' id='idcontact' value='".$d["idcontact"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=contact_name?>:</label>
					<div class="col-md-3">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=contact_name_title?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=contact_email?>:</label>
					<div class="col-md-3">
						<input type="text" name="email" id="email" value="<?=$d["email"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=contact_email_title?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=contact_phone?>:</label>
					<div class="col-md-3">
						<input type="text" name="phone" id="phone" value="<?=$d["phone"]?>" aajs="required" class="width-full" data-toggle="tooltip" title="<?=contact_phone_title?>" disabled>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=contact_message?>:</label>
					<div class="col-md-8">
						<textarea name="message" id="message" class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=contact_message_title?>" disabled><?=$d["message"]?></textarea>
					</div>
				</div>
				<?php
					if(!empty($d["uname"])){
						echo "<div class='form-group'>
								<label class='col-md-6 text-right'>".contact_user.": ".$d["uname"]."</label>
							</div>";
					}
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=contact_response?>:</label>
					<div class="col-md-8">
						<textarea name="response" id="response" class="width-full" style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=contact_response_title?>" placeholder="<?=contact_response_placeholder?>" <?=(action=="query")?'disabled':''?>><?=$d["response"]?></textarea>
					</div>
				</div>
				<?php
					if(action!="query"){
						echo"<div class='form-group'>
							<div class='col-md-2 col-md-offset-5'>
								<button class='btn1' aajs='send'>".save."</button>
							</div>
						</div>";
					}
				?>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>