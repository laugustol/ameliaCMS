<title><?=forgot_password?></title>
<div class="col-md-6 col-md-offset-3">
	<div class="box">
		<div class="box-tools">
			<div class="box-tool-left">
				<a href="<?=url_base?>home/login"><?=login?></a> <i class="fa fa-angle-right"></i> <b><?=forgot_password?></b>
			</div>
			<div class="box-tool-right">
				
			</div>
		</div>
		<div class="box-container">
			<form action="<?=url_base?>home/forgot_password" method="POST" class="form-horizontal">
				<div class="form-group">
					<label class="col-md-2 text-right"><?=forgot_password_user_email?>:</label>
					<div class="col-md-7">
						<input type="text" name="user" id="user" aajs='required' class="width-full" title="<?=forgot_password_user_email_title?>" placeholder="<?=forgot_password_user_email_placeholder?>">
					</div>
					<div class="col-md-2">
						<button type='button' class="btn1" onclick='search_questions_answers()'><?=forgot_password_search?></button>
					</div>
				</div>
				<div id="questions_answers">
					
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function search_questions_answers(){
		$.post("<?=url_base?>user/query_questions_answers",{name:$("#user").val()},function(datas){
			var data = $.parseJSON(datas);
			var content = "";
			var a=1;
			console.log(data);
			for(var b in data){
				content += "<div class='form-group'><label class='col-md-2'>"+data[b][0]+"</label><div class='col-md-8'><input type='text' name='answers[]' id='answer-"+a+"' class='width-full' title='<?=profile_answer_title?> "+a+"' placeholder='<?=profile_answer_placeholder?> "+a+"'></div></div>";
				a++;
			}
			content += "<div class='form-group'><div class='col-md-3 col-md-offset-5'><button class='btn1'><?=forgot_password_rescue?></button></div></div>";
			document.getElementById("questions_answers").innerHTML=content;
		});
	}
</script>