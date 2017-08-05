<?php $_SESSION["title"] = organization ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=organization?></a> <i class='fa fa-angle-right'></i> <?=edit?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<form action='<?=url_base.controller?>/edit' method='POST' class='form-horizontal'>
			<input type="hidden" name="event" id="event">
			<div class="form-group">
				<label class="col-md-2 text-right"><?=organization_header?>:</label>
				<div class="col-md-9">
					<img id="header" src="<?=url_base.$d["src_header"]?>" style="border:1px solid #cccccc;width: 100%;height: 100px;" onclick="show_modal(this);" <?=(action=="query")?'disabled':''?> alt="<?=organization_header_title?>" title="<?=organization_header_title?>">
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
					<img id="favicon" src="<?=url_base.$d["src_favicon"]?>" style="border:1px solid #cccccc;width: 100%;height: 50px;" onclick="show_modal(this);" <?=(action=="query")?'disabled':''?> alt="<?=organization_favicon_title?>" title="<?=organization_favicon_title?>">
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
			<div class='form-group'>
				<div class='col-md-2 col-md-offset-5'>
					<button class='btn1' aajs='send'><?=save?></button>
				</div>
			</div>
		</form>
	</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
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
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" id="con" class="btn1" data-dismiss="modal"><?=plugin_gallery_tinymce_close?></button>
			</div>
		</div>
	</div>
</div>
<script>
	$("#image").on("change",function(){
		var formData = new FormData($("#formuploadajax")[0]);
	    var ruta = "<?=url_base?>/gallery/upload";
	    $.ajax({
	        url: ruta,
	        type: "POST",
	        data: formData,
	        contentType: false,
	        processData: false,
	        xhr: function() {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt) {
				  	if (evt.lengthComputable) {
					    var percentComplete = evt.loaded / evt.total;
					    percentComplete = parseInt(percentComplete * 100);
						$(".progressbar").css("width",percentComplete+"%");
						$(".progressbar").html(percentComplete+"%");
					}
				}, false);
				return xhr;
			},
	        success: function(datos){
	            if(new_img=="1"){
	            	$(".gallery").append("<li><a onclick='selected(this);'>"+datos+"</a></li>");
	        	}else if(new_img=="2"){
	        		$(".gallery").append("<li><a onclick='selected_two(this);'>"+datos+"</a></li>");
	        	}
	        }
	    });
	});
	function selected(_this){
		img = _this.getElementsByTagName("img");
		tinymce.activeEditor.execCommand('mceInsertContent', false, "<img src='"+img[0].src+"'>");
	}
	function selected_two(_this,id){
		img = _this.getElementsByTagName("img");
		document.getElementById(id).src = img[0].src;
		document.getElementById("idgallery_"+id).value = img[0].id;
	}
	function show_modal(_this){
		console.log(_this);
		new_img="2";
		$.post("<?=url_base?>gallery/show_ajax",{event:"ajax"},function(data){
			d = JSON.parse(data);
			img = "<ul class='gallery'>";
			for(var i=0;i<d.length;i++){
				img += "<li><a onclick='selected_two(this,\""+_this.id+"\");'><img id='"+d[i]["idgallery"]+"' src='<?=url_base?>"+d[i]["src"]+"' title='"+d[i]["name"]+"'></a></li>";
			}
			img += "</ul>";
			$("#myModal .modal-body").html(img);
		});
		$("#myModal").modal('show');
	}
</script>