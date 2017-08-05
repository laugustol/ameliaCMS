<?php $_SESSION["title"] = list_report ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=list_report?></a>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<form action='<?=url_base.controller?>/pdf' method='POST' class='form-horizontal' target='_blank'>
			<input type="hidden" name="event" id="event">
			<div class="form-group">
				<label class="col-md-2 text-right"><?=list_report_list?>:</label>
				<div class="col-md-3">
					<select name='url' id='url' class='width-full' data-toggle='tooltop' title='<?=organization_login_title?>'>
						<?php
							foreach ($d as $val) {
								echo "<option value='".$val["url"]."'>".$val["name"]."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class='form-group'>
				<div class='col-md-2 col-md-offset-5'>
					<button class='btn1' aajs='send'><?=listt?></button>
				</div>
			</div>
		</form>
	</div>
</div>