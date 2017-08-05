<?php $_SESSION["title"] = page ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=page?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=page_name?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=page_name?></th><th><?=actions?></th></tfoot>
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
	                        "ajax": { url : "<?=url_base.controller?>/listt", type : "page" },
	                        "columns": [
	                            { "data": "idpage" },
	                            { "data": "name" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.controller."/".action."/".$d["idpage"]."' method='post' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idpage' id='idpage' value='".$d["idpage"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_name?>:</label>
					<div class="col-md-9">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=page_name_title?>" placeholder="<?=page_name_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_url?>:</label>
					<div class="col-md-9">
						<input type="text" name="url" id="url" value="<?=$d["url"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=page_url_title?>" placeholder="<?=page_url_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_link?>:</label>
					<div class="col-md-4">
						<select name="link" id="link" class="width-full" aajs="required" data-toggle="tooltip" title="<?=page_link_title?>"><option value="0" <?=($d["link"]=="0")?'selected':''?> ><?=no?></option><option value="1" <?=($d["link"]=="1")?'selected':''?> ><?=yes?></option></select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=page_content?>:</label>
					<div class="col-md-9">
						<textarea name='content' id='content' class="width-full tinymce" <?=(action=="query")?'disabled':''?> style="height: 80px;resize: none;" data-toggle="tooltip" title="<?=page_content_title?>" placeholder="<?=page_content_placeholder?>"><?=$d["content"]?></textarea>
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
	new_img="";
	tinymce.init({ 
		selector:'.tinymce',
		plugins: [
			'advlist autolink lists link image charmap print preview hr anchor pagebreak',
			'searchreplace wordcount visualblocks visualchars code fullscreen',
			'insertdatetime media nonbreaking save table contextmenu directionality',
			'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
		],
		language: "es",
		toolbar1: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent ',
  		toolbar2: 'print preview media | forecolor backcolor emoticons | imageplus code',
		height : "350", 
		
		toolbar_items_size: 'small',
		file_browser_callback: function(field_name, url, type, win){
			win.document.getElementById(field_name).value = 'my browser value';
		}, 
		relative_urls : false,
		convert_urls : true,
		setup: function(editor) {
	        editor.addButton('imageplus', {
	            type: 'button',
	            title: 'Insert image',
	            icon: 'image',
	            id: 'imageplus', 
				onclick: function() {
	            	editor.focus();
	            	//new_img="1";
	            	$.post("<?=url_base?>gallery/show_ajax",{event:"ajax"},function(data){
	            		d = JSON.parse(data);
	            		img = "<ul class='gallery'>";
	            		for(var i=0;i<d.length;i++){
	            			img += "<li><a onclick='selected(this);'><img src='<?=url_base?>"+d[i]["src"]+"' title='"+d[i]["name"]+"'></a></li>";
	            		}
	            		img += "</ul>";
	            		$("#myModal .modal-body").html(img);
	            	});
	            	$("#myModal").modal('show');
		        }
		    });
		}
	});
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
                $(".gallery").append("<li><a onclick='selected(this);'>"+datos+"</a></li>");
            }
        });
	});
	function selected(_this){
		img = _this.getElementsByTagName("img");
		tinymce.activeEditor.execCommand('mceInsertContent', false, "<img src='"+img[0].src+"'>");
	}
</script>