<title><?=login?></title>
<div class="col-md-4 col-md-offset-4">
	<div class="box">
		<div class="box-tools">
			<div class="box-tool-left">
				<a href="<?=url_base?>"><?=home_title?></a> <i class="fa fa-angle-right"></i> <b><?=login?></b>
			</div>
			<div class="box-tool-right">
				
			</div>
		</div>
		<div class="box-container">
			<form action="<?=url_base?>login" method="POST" class="form-horizontal">
				<div class="form-group">
					<label class="col-md-3 text-right"><?=login_environment?>:</label>
					<div class="col-md-8">
						<select name="environment" id="environment" title="<?=login_environment_title?>">
							<option value="0"><?=login_environment_option_production?></option>
							<option value="1"><?=login_environment_option_test?></option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=login_user?>:</label>
					<div class="col-md-8">
						<input type="text" name="user" id="user" aajs='required' class="width-full" title="<?=login_user_title?>" placeholder="<?=login_user_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=login_password?>:</label>
					<div class="col-md-8">
						<input type="password" name="password" id="password" aajs='required' class="width-full" title="<?=login_password_title?>" placeholder="<?=login_password_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-5 col-md-offset-4">
						<button class="btn1"><?=signin?></button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-8 col-md-offset-3">
						<!--<a href=""><?=login_signup?></a>-->
						<a href="<?=url_base?>forgot-password"><?=login_forgot_password?></a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
