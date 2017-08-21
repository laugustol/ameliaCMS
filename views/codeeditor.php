<?php $_SESSION["title"] = charge ?>
<div class="row">
	<div class="col-md-9">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=charge?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<form name="frm" id="frm" action="<?=url_base?>codeeditor/edit" method="POST">
					<div class="row">
						<div class='col-md-2 col-md-offset-5'>
							<button class='btn1' aajs='click{sending();}'><?=save?></button>
						</div>
					</div>
					<input type="hidden" name="url" id="url">
					<textarea name="code" id="code"></textarea>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="box">
			<div class="box-tools">
				<div class="box-tool-left">
					<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.controller?>"><?=charge?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
				</div>
				<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
			</div>
			<div class="box-container">
				<div id="jstree1">
					<ul>
						<li class='jstree-open'><?=getcwd()?>
							<?=$dependencies["folders"]?>	
						</li>
					</ul>
				</div>		
			</div>
		</div>	
	</div>
</div>
<script>
	var editor = "";
	$(document).ready(function(){
		$('#jstree1').jstree({
            'core' : {
                'check_callback' : true
            },
            'plugins' : [ 'types', 'dnd' ],
            'types' : {
                'default' : {
                    'icon' : 'fa fa-folder'
                },
                'php' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'html' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'svg' : {
                    'icon' : 'fa fa-file-picture-o'
                },
                'ttf' : {
                    'icon' : 'fa fa-font'
                },
                'eot' : {
                    'icon' : 'fa fa-font'
                },
                'woff' : {
                    'icon' : 'fa fa-font'
                },
                'otf' : {
                    'icon' : 'fa fa-font'
                },
                'css' : {
                    'icon' : 'fa fa-file-code-o'
                },
                'png' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'jpg' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'gif' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'jpeg' : {
                    'icon' : 'fa fa-file-image-o'
                },
                'js' : {
                    'icon' : 'fa fa-file-text-o'
                },
                'txt' : {
                    'icon' : 'fa fa-file-text-o'
                },
                'htaccess' : {
                    'icon' : 'fa fa-file-text-o'
                },
                'sql' : {
                    'icon' : 'fa fa-database'
                },
                'git' : {
                    'icon' : 'fa fa-code-fork'
                },
                'gitignore' : {
                    'icon' : 'fa fa-code-fork'
                },
                'rar' : {
                    'icon' : 'fa fa-file-zip-o'
                },
                'zip' : {
                    'icon' : 'fa fa-file-zip-o'
                }
            }
        });
		editor = CodeMirror.fromTextArea(document.getElementById("code"), {
			lineNumbers: true,
			matchBrackets: true,
			styleActiveLine: true
		});
		editor.setSize("auto","490px");
	});
	function file(url){
		$.post("<?=url_base?>codeeditor/search",{url:url},function(data){
			$("#url").val(url);
			editor.setValue(data);
		});
	}
	function sending(){
		$("#code").val(editor.getValue());
		document.frm.submit();

	}
</script>