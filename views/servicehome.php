<?php $_SESSION["title"] = servicehome ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=servicehome?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
                <thead><th><?=id?></th><th><?=servicehome_title?></th><th><?=actions?></th></thead>
                <tfoot><th><?=id?></th><th><?=servicehome_title?></th><th><?=actions?></th></tfoot>
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
	                        "ajax": { url : "<?=url_base.routerCtrl?>/listt", type : "POST" },
	                        "columns": [
	                            { "data": "idservicehome" },
	                            { "data": "title" },
	                            { "data": "btn" }
	                        ]
	                    }
	                );
	                
	            });
	        </script>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idservicehome"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idservicehome' id='idservicehome' value='".$d["idservicehome"]."' class='width-full' disabled data-toggle='tooltip' title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=servicehome_title?>:</label>
					<div class="col-md-3">
						<input type="text" name="title" id="title" value="<?=$d["title"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=servicehome_title_title?>" placeholder="<?=servicehome_title_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=servicehome_description?>:</label>
					<div class="col-md-3">
						<input type="text" name="description" id="description" value="<?=$d["description"]?>" aajs="required" class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=servicehome_description_title?>" placeholder="<?=servicehome_description_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=servicehome_icon?>:</label>
					<div class="col-md-3">
						<select name="idicon" id="idicon" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=servicehome_icon_title?>">
							<option value="glyphicon glyphicon-asterisk" data-content="<i class='glyphicon glyphicon-asterisk'></i> glyphicon glyphicon-asterisk" <?=(($d[0]["idicon"]=="glyphicon glyphicon-asterisk")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-plus" data-content="<i class='glyphicon glyphicon-plus'></i> glyphicon glyphicon-plus" <?=(($d[0]["idicon"]=="glyphicon glyphicon-plus")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-euro" data-content="<i class='glyphicon glyphicon-euro'></i> glyphicon glyphicon-euro" <?=(($d[0]["idicon"]=="glyphicon glyphicon-euro")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-eur" data-content="<i class='glyphicon glyphicon-eur'></i> glyphicon glyphicon-eur" <?=(($d[0]["idicon"]=="glyphicon glyphicon-eur")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-minus" data-content="<i class='glyphicon glyphicon-minus'></i> glyphicon glyphicon-minus" <?=(($d[0]["idicon"]=="glyphicon glyphicon-minus")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cloud" data-content="<i class='glyphicon glyphicon-cloud'></i> glyphicon glyphicon-cloud" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cloud")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-envelope" data-content="<i class='glyphicon glyphicon-envelope'></i> glyphicon glyphicon-envelope" <?=(($d[0]["idicon"]=="glyphicon glyphicon-envelope")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-pencil" data-content="<i class='glyphicon glyphicon-pencil'></i> glyphicon glyphicon-pencil" <?=(($d[0]["idicon"]=="glyphicon glyphicon-pencil")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-glass" data-content="<i class='glyphicon glyphicon-glass'></i> glyphicon glyphicon-glass" <?=(($d[0]["idicon"]=="glyphicon glyphicon-glass")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-music" data-content="<i class='glyphicon glyphicon-music'></i> glyphicon glyphicon-music" <?=(($d[0]["idicon"]=="glyphicon glyphicon-music")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-search" data-content="<i class='glyphicon glyphicon-search'></i> glyphicon glyphicon-search" <?=(($d[0]["idicon"]=="glyphicon glyphicon-search")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-heart" data-content="<i class='glyphicon glyphicon-heart'></i> glyphicon glyphicon-heart" <?=(($d[0]["idicon"]=="glyphicon glyphicon-heart")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-star" data-content="<i class='glyphicon glyphicon-star'></i> glyphicon glyphicon-star" <?=(($d[0]["idicon"]=="glyphicon glyphicon-star")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-star-empty" data-content="<i class='glyphicon glyphicon-star-empty'></i> glyphicon glyphicon-star-empty" <?=(($d[0]["idicon"]=="glyphicon glyphicon-star-empty")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-user" data-content="<i class='glyphicon glyphicon-user'></i> glyphicon glyphicon-user" <?=(($d[0]["idicon"]=="glyphicon glyphicon-user")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-film" data-content="<i class='glyphicon glyphicon-film'></i> glyphicon glyphicon-film" <?=(($d[0]["idicon"]=="glyphicon glyphicon-film")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-th-large" data-content="<i class='glyphicon glyphicon-th-large'></i> glyphicon glyphicon-th-large" <?=(($d[0]["idicon"]=="glyphicon glyphicon-th-large")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-th" data-content="<i class='glyphicon glyphicon-th'></i> glyphicon glyphicon-th" <?=(($d[0]["idicon"]=="glyphicon glyphicon-th")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-th-list" data-content="<i class='glyphicon glyphicon-th-list'></i> glyphicon glyphicon-th-list" <?=(($d[0]["idicon"]=="glyphicon glyphicon-th-list")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ok" data-content="<i class='glyphicon glyphicon-ok'></i> glyphicon glyphicon-ok" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ok")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-remove" data-content="<i class='glyphicon glyphicon-remove'></i> glyphicon glyphicon-remove" <?=(($d[0]["idicon"]=="glyphicon glyphicon-remove")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-zoom-in" data-content="<i class='glyphicon glyphicon-zoom-in'></i> glyphicon glyphicon-zoom-in" <?=(($d[0]["idicon"]=="glyphicon glyphicon-zoom-in")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-zoom-out" data-content="<i class='glyphicon glyphicon-zoom-out'></i> glyphicon glyphicon-zoom-out" <?=(($d[0]["idicon"]=="glyphicon glyphicon-zoom-out")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-off" data-content="<i class='glyphicon glyphicon-off'></i> glyphicon glyphicon-off" <?=(($d[0]["idicon"]=="glyphicon glyphicon-off")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-signal" data-content="<i class='glyphicon glyphicon-signal'></i> glyphicon glyphicon-signal" <?=(($d[0]["idicon"]=="glyphicon glyphicon-signal")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cog" data-content="<i class='glyphicon glyphicon-cog'></i> glyphicon glyphicon-cog" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cog")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-trash" data-content="<i class='glyphicon glyphicon-trash'></i> glyphicon glyphicon-trash" <?=(($d[0]["idicon"]=="glyphicon glyphicon-trash")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-home" data-content="<i class='glyphicon glyphicon-home'></i> glyphicon glyphicon-home" <?=(($d[0]["idicon"]=="glyphicon glyphicon-home")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-file" data-content="<i class='glyphicon glyphicon-file'></i> glyphicon glyphicon-file" <?=(($d[0]["idicon"]=="glyphicon glyphicon-file")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-time" data-content="<i class='glyphicon glyphicon-time'></i> glyphicon glyphicon-time" <?=(($d[0]["idicon"]=="glyphicon glyphicon-time")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-road" data-content="<i class='glyphicon glyphicon-road'></i> glyphicon glyphicon-road" <?=(($d[0]["idicon"]=="glyphicon glyphicon-road")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-download-alt" data-content="<i class='glyphicon glyphicon-download-alt'></i> glyphicon glyphicon-download-alt" <?=(($d[0]["idicon"]=="glyphicon glyphicon-download-alt")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-download" data-content="<i class='glyphicon glyphicon-download'></i> glyphicon glyphicon-download" <?=(($d[0]["idicon"]=="glyphicon glyphicon-download")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-upload" data-content="<i class='glyphicon glyphicon-upload'></i> glyphicon glyphicon-upload" <?=(($d[0]["idicon"]=="glyphicon glyphicon-upload")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-inbox" data-content="<i class='glyphicon glyphicon-inbox'></i> glyphicon glyphicon-inbox" <?=(($d[0]["idicon"]=="glyphicon glyphicon-inbox")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-play-circle" data-content="<i class='glyphicon glyphicon-play-circle'></i> glyphicon glyphicon-play-circle" <?=(($d[0]["idicon"]=="glyphicon glyphicon-play-circle")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-repeat" data-content="<i class='glyphicon glyphicon-repeat'></i> glyphicon glyphicon-repeat" <?=(($d[0]["idicon"]=="glyphicon glyphicon-repeat")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-refresh" data-content="<i class='glyphicon glyphicon-refresh'></i> glyphicon glyphicon-refresh" <?=(($d[0]["idicon"]=="glyphicon glyphicon-refresh")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-list-alt" data-content="<i class='glyphicon glyphicon-list-alt'></i> glyphicon glyphicon-list-alt" <?=(($d[0]["idicon"]=="glyphicon glyphicon-list-alt")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-lock" data-content="<i class='glyphicon glyphicon-lock'></i> glyphicon glyphicon-lock" <?=(($d[0]["idicon"]=="glyphicon glyphicon-lock")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-flag" data-content="<i class='glyphicon glyphicon-flag'></i> glyphicon glyphicon-flag" <?=(($d[0]["idicon"]=="glyphicon glyphicon-flag")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-headphones" data-content="<i class='glyphicon glyphicon-headphones'></i> glyphicon glyphicon-headphones" <?=(($d[0]["idicon"]=="glyphicon glyphicon-headphones")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-volume-off" data-content="<i class='glyphicon glyphicon-volume-off'></i> glyphicon glyphicon-volume-off" <?=(($d[0]["idicon"]=="glyphicon glyphicon-volume-off")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-volume-down" data-content="<i class='glyphicon glyphicon-volume-down'></i> glyphicon glyphicon-volume-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-volume-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-volume-up" data-content="<i class='glyphicon glyphicon-volume-up'></i> glyphicon glyphicon-volume-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-volume-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-qrcode" data-content="<i class='glyphicon glyphicon-qrcode'></i> glyphicon glyphicon-qrcode" <?=(($d[0]["idicon"]=="glyphicon glyphicon-qrcode")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-barcode" data-content="<i class='glyphicon glyphicon-barcode'></i> glyphicon glyphicon-barcode" <?=(($d[0]["idicon"]=="glyphicon glyphicon-barcode")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tag" data-content="<i class='glyphicon glyphicon-tag'></i> glyphicon glyphicon-tag" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tag")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tags" data-content="<i class='glyphicon glyphicon-tags'></i> glyphicon glyphicon-tags" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tags")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-book" data-content="<i class='glyphicon glyphicon-book'></i> glyphicon glyphicon-book" <?=(($d[0]["idicon"]=="glyphicon glyphicon-book")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bookmark" data-content="<i class='glyphicon glyphicon-bookmark'></i> glyphicon glyphicon-bookmark" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bookmark")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-print" data-content="<i class='glyphicon glyphicon-print'></i> glyphicon glyphicon-print" <?=(($d[0]["idicon"]=="glyphicon glyphicon-print")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-camera" data-content="<i class='glyphicon glyphicon-camera'></i> glyphicon glyphicon-camera" <?=(($d[0]["idicon"]=="glyphicon glyphicon-camera")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-font" data-content="<i class='glyphicon glyphicon-font'></i> glyphicon glyphicon-font" <?=(($d[0]["idicon"]=="glyphicon glyphicon-font")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bold" data-content="<i class='glyphicon glyphicon-bold'></i> glyphicon glyphicon-bold" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bold")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-italic" data-content="<i class='glyphicon glyphicon-italic'></i> glyphicon glyphicon-italic" <?=(($d[0]["idicon"]=="glyphicon glyphicon-italic")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-text-height" data-content="<i class='glyphicon glyphicon-text-height'></i> glyphicon glyphicon-text-height" <?=(($d[0]["idicon"]=="glyphicon glyphicon-text-height")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-text-width" data-content="<i class='glyphicon glyphicon-text-width'></i> glyphicon glyphicon-text-width" <?=(($d[0]["idicon"]=="glyphicon glyphicon-text-width")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-align-left" data-content="<i class='glyphicon glyphicon-align-left'></i> glyphicon glyphicon-align-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-align-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-align-center" data-content="<i class='glyphicon glyphicon-align-center'></i> glyphicon glyphicon-align-center" <?=(($d[0]["idicon"]=="glyphicon glyphicon-align-center")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-align-right" data-content="<i class='glyphicon glyphicon-align-right'></i> glyphicon glyphicon-align-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-align-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-align-justify" data-content="<i class='glyphicon glyphicon-align-justify'></i> glyphicon glyphicon-align-justify" <?=(($d[0]["idicon"]=="glyphicon glyphicon-align-justify")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-list" data-content="<i class='glyphicon glyphicon-list'></i> glyphicon glyphicon-list" <?=(($d[0]["idicon"]=="glyphicon glyphicon-list")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-indent-left" data-content="<i class='glyphicon glyphicon-indent-left'></i> glyphicon glyphicon-indent-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-indent-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-indent-right" data-content="<i class='glyphicon glyphicon-indent-right'></i> glyphicon glyphicon-indent-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-indent-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-facetime-video" data-content="<i class='glyphicon glyphicon-facetime-video'></i> glyphicon glyphicon-facetime-video" <?=(($d[0]["idicon"]=="glyphicon glyphicon-facetime-video")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-picture" data-content="<i class='glyphicon glyphicon-picture'></i> glyphicon glyphicon-picture" <?=(($d[0]["idicon"]=="glyphicon glyphicon-picture")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-map-marker" data-content="<i class='glyphicon glyphicon-map-marker'></i> glyphicon glyphicon-map-marker" <?=(($d[0]["idicon"]=="glyphicon glyphicon-map-marker")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-adjust" data-content="<i class='glyphicon glyphicon-adjust'></i> glyphicon glyphicon-adjust" <?=(($d[0]["idicon"]=="glyphicon glyphicon-adjust")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tint" data-content="<i class='glyphicon glyphicon-tint'></i> glyphicon glyphicon-tint" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tint")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-edit" data-content="<i class='glyphicon glyphicon-edit'></i> glyphicon glyphicon-edit" <?=(($d[0]["idicon"]=="glyphicon glyphicon-edit")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-share" data-content="<i class='glyphicon glyphicon-share'></i> glyphicon glyphicon-share" <?=(($d[0]["idicon"]=="glyphicon glyphicon-share")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-check" data-content="<i class='glyphicon glyphicon-check'></i> glyphicon glyphicon-check" <?=(($d[0]["idicon"]=="glyphicon glyphicon-check")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-move" data-content="<i class='glyphicon glyphicon-move'></i> glyphicon glyphicon-move" <?=(($d[0]["idicon"]=="glyphicon glyphicon-move")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-step-backward" data-content="<i class='glyphicon glyphicon-step-backward'></i> glyphicon glyphicon-step-backward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-step-backward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-fast-backward" data-content="<i class='glyphicon glyphicon-fast-backward'></i> glyphicon glyphicon-fast-backward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-fast-backward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-backward" data-content="<i class='glyphicon glyphicon-backward'></i> glyphicon glyphicon-backward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-backward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-play" data-content="<i class='glyphicon glyphicon-play'></i> glyphicon glyphicon-play" <?=(($d[0]["idicon"]=="glyphicon glyphicon-play")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-pause" data-content="<i class='glyphicon glyphicon-pause'></i> glyphicon glyphicon-pause" <?=(($d[0]["idicon"]=="glyphicon glyphicon-pause")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-stop" data-content="<i class='glyphicon glyphicon-stop'></i> glyphicon glyphicon-stop" <?=(($d[0]["idicon"]=="glyphicon glyphicon-stop")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-forward" data-content="<i class='glyphicon glyphicon-forward'></i> glyphicon glyphicon-forward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-forward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-fast-forward" data-content="<i class='glyphicon glyphicon-fast-forward'></i> glyphicon glyphicon-fast-forward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-fast-forward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-step-forward" data-content="<i class='glyphicon glyphicon-step-forward'></i> glyphicon glyphicon-step-forward" <?=(($d[0]["idicon"]=="glyphicon glyphicon-step-forward")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-eject" data-content="<i class='glyphicon glyphicon-eject'></i> glyphicon glyphicon-eject" <?=(($d[0]["idicon"]=="glyphicon glyphicon-eject")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-chevron-left" data-content="<i class='glyphicon glyphicon-chevron-left'></i> glyphicon glyphicon-chevron-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-chevron-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-chevron-right" data-content="<i class='glyphicon glyphicon-chevron-right'></i> glyphicon glyphicon-chevron-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-chevron-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-plus-sign" data-content="<i class='glyphicon glyphicon-plus-sign'></i> glyphicon glyphicon-plus-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-plus-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-minus-sign" data-content="<i class='glyphicon glyphicon-minus-sign'></i> glyphicon glyphicon-minus-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-minus-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-remove-sign" data-content="<i class='glyphicon glyphicon-remove-sign'></i> glyphicon glyphicon-remove-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-remove-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ok-sign" data-content="<i class='glyphicon glyphicon-ok-sign'></i> glyphicon glyphicon-ok-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ok-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-question-sign" data-content="<i class='glyphicon glyphicon-question-sign'></i> glyphicon glyphicon-question-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-question-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-info-sign" data-content="<i class='glyphicon glyphicon-info-sign'></i> glyphicon glyphicon-info-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-info-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-screenshot" data-content="<i class='glyphicon glyphicon-screenshot'></i> glyphicon glyphicon-screenshot" <?=(($d[0]["idicon"]=="glyphicon glyphicon-screenshot")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-remove-circle" data-content="<i class='glyphicon glyphicon-remove-circle'></i> glyphicon glyphicon-remove-circle" <?=(($d[0]["idicon"]=="glyphicon glyphicon-remove-circle")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ok-circle" data-content="<i class='glyphicon glyphicon-ok-circle'></i> glyphicon glyphicon-ok-circle" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ok-circle")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ban-circle" data-content="<i class='glyphicon glyphicon-ban-circle'></i> glyphicon glyphicon-ban-circle" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ban-circle")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-arrow-left" data-content="<i class='glyphicon glyphicon-arrow-left'></i> glyphicon glyphicon-arrow-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-arrow-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-arrow-right" data-content="<i class='glyphicon glyphicon-arrow-right'></i> glyphicon glyphicon-arrow-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-arrow-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-arrow-up" data-content="<i class='glyphicon glyphicon-arrow-up'></i> glyphicon glyphicon-arrow-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-arrow-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-arrow-down" data-content="<i class='glyphicon glyphicon-arrow-down'></i> glyphicon glyphicon-arrow-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-arrow-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-share-alt" data-content="<i class='glyphicon glyphicon-share-alt'></i> glyphicon glyphicon-share-alt" <?=(($d[0]["idicon"]=="glyphicon glyphicon-share-alt")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-resize-full" data-content="<i class='glyphicon glyphicon-resize-full'></i> glyphicon glyphicon-resize-full" <?=(($d[0]["idicon"]=="glyphicon glyphicon-resize-full")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-resize-small" data-content="<i class='glyphicon glyphicon-resize-small'></i> glyphicon glyphicon-resize-small" <?=(($d[0]["idicon"]=="glyphicon glyphicon-resize-small")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-exclamation-sign" data-content="<i class='glyphicon glyphicon-exclamation-sign'></i> glyphicon glyphicon-exclamation-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-exclamation-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-gift" data-content="<i class='glyphicon glyphicon-gift'></i> glyphicon glyphicon-gift" <?=(($d[0]["idicon"]=="glyphicon glyphicon-gift")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-leaf" data-content="<i class='glyphicon glyphicon-leaf'></i> glyphicon glyphicon-leaf" <?=(($d[0]["idicon"]=="glyphicon glyphicon-leaf")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-fire" data-content="<i class='glyphicon glyphicon-fire'></i> glyphicon glyphicon-fire" <?=(($d[0]["idicon"]=="glyphicon glyphicon-fire")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-eye-open" data-content="<i class='glyphicon glyphicon-eye-open'></i> glyphicon glyphicon-eye-open" <?=(($d[0]["idicon"]=="glyphicon glyphicon-eye-open")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-eye-close" data-content="<i class='glyphicon glyphicon-eye-close'></i> glyphicon glyphicon-eye-close" <?=(($d[0]["idicon"]=="glyphicon glyphicon-eye-close")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-warning-sign" data-content="<i class='glyphicon glyphicon-warning-sign'></i> glyphicon glyphicon-warning-sign" <?=(($d[0]["idicon"]=="glyphicon glyphicon-warning-sign")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-plane" data-content="<i class='glyphicon glyphicon-plane'></i> glyphicon glyphicon-plane" <?=(($d[0]["idicon"]=="glyphicon glyphicon-plane")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-calendar" data-content="<i class='glyphicon glyphicon-calendar'></i> glyphicon glyphicon-calendar" <?=(($d[0]["idicon"]=="glyphicon glyphicon-calendar")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-random" data-content="<i class='glyphicon glyphicon-random'></i> glyphicon glyphicon-random" <?=(($d[0]["idicon"]=="glyphicon glyphicon-random")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-comment" data-content="<i class='glyphicon glyphicon-comment'></i> glyphicon glyphicon-comment" <?=(($d[0]["idicon"]=="glyphicon glyphicon-comment")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-magnet" data-content="<i class='glyphicon glyphicon-magnet'></i> glyphicon glyphicon-magnet" <?=(($d[0]["idicon"]=="glyphicon glyphicon-magnet")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-chevron-up" data-content="<i class='glyphicon glyphicon-chevron-up'></i> glyphicon glyphicon-chevron-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-chevron-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-chevron-down" data-content="<i class='glyphicon glyphicon-chevron-down'></i> glyphicon glyphicon-chevron-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-chevron-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-retweet" data-content="<i class='glyphicon glyphicon-retweet'></i> glyphicon glyphicon-retweet" <?=(($d[0]["idicon"]=="glyphicon glyphicon-retweet")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-shopping-cart" data-content="<i class='glyphicon glyphicon-shopping-cart'></i> glyphicon glyphicon-shopping-cart" <?=(($d[0]["idicon"]=="glyphicon glyphicon-shopping-cart")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-folder-close" data-content="<i class='glyphicon glyphicon-folder-close'></i> glyphicon glyphicon-folder-close" <?=(($d[0]["idicon"]=="glyphicon glyphicon-folder-close")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-folder-open" data-content="<i class='glyphicon glyphicon-folder-open'></i> glyphicon glyphicon-folder-open" <?=(($d[0]["idicon"]=="glyphicon glyphicon-folder-open")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-resize-vertical" data-content="<i class='glyphicon glyphicon-resize-vertical'></i> glyphicon glyphicon-resize-vertical" <?=(($d[0]["idicon"]=="glyphicon glyphicon-resize-vertical")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-resize-horizontal" data-content="<i class='glyphicon glyphicon-resize-horizontal'></i> glyphicon glyphicon-resize-horizontal" <?=(($d[0]["idicon"]=="glyphicon glyphicon-resize-horizontal")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hdd" data-content="<i class='glyphicon glyphicon-hdd'></i> glyphicon glyphicon-hdd" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hdd")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bullhorn" data-content="<i class='glyphicon glyphicon-bullhorn'></i> glyphicon glyphicon-bullhorn" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bullhorn")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bell" data-content="<i class='glyphicon glyphicon-bell'></i> glyphicon glyphicon-bell" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bell")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-certificate" data-content="<i class='glyphicon glyphicon-certificate'></i> glyphicon glyphicon-certificate" <?=(($d[0]["idicon"]=="glyphicon glyphicon-certificate")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-thumbs-up" data-content="<i class='glyphicon glyphicon-thumbs-up'></i> glyphicon glyphicon-thumbs-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-thumbs-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-thumbs-down" data-content="<i class='glyphicon glyphicon-thumbs-down'></i> glyphicon glyphicon-thumbs-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-thumbs-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hand-right" data-content="<i class='glyphicon glyphicon-hand-right'></i> glyphicon glyphicon-hand-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hand-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hand-left" data-content="<i class='glyphicon glyphicon-hand-left'></i> glyphicon glyphicon-hand-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hand-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hand-up" data-content="<i class='glyphicon glyphicon-hand-up'></i> glyphicon glyphicon-hand-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hand-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hand-down" data-content="<i class='glyphicon glyphicon-hand-down'></i> glyphicon glyphicon-hand-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hand-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-circle-arrow-right" data-content="<i class='glyphicon glyphicon-circle-arrow-right'></i> glyphicon glyphicon-circle-arrow-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-circle-arrow-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-circle-arrow-left" data-content="<i class='glyphicon glyphicon-circle-arrow-left'></i> glyphicon glyphicon-circle-arrow-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-circle-arrow-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-circle-arrow-up" data-content="<i class='glyphicon glyphicon-circle-arrow-up'></i> glyphicon glyphicon-circle-arrow-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-circle-arrow-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-circle-arrow-down" data-content="<i class='glyphicon glyphicon-circle-arrow-down'></i> glyphicon glyphicon-circle-arrow-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-circle-arrow-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-globe" data-content="<i class='glyphicon glyphicon-globe'></i> glyphicon glyphicon-globe" <?=(($d[0]["idicon"]=="glyphicon glyphicon-globe")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-wrench" data-content="<i class='glyphicon glyphicon-wrench'></i> glyphicon glyphicon-wrench" <?=(($d[0]["idicon"]=="glyphicon glyphicon-wrench")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tasks" data-content="<i class='glyphicon glyphicon-tasks'></i> glyphicon glyphicon-tasks" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tasks")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-filter" data-content="<i class='glyphicon glyphicon-filter'></i> glyphicon glyphicon-filter" <?=(($d[0]["idicon"]=="glyphicon glyphicon-filter")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-briefcase" data-content="<i class='glyphicon glyphicon-briefcase'></i> glyphicon glyphicon-briefcase" <?=(($d[0]["idicon"]=="glyphicon glyphicon-briefcase")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-fullscreen" data-content="<i class='glyphicon glyphicon-fullscreen'></i> glyphicon glyphicon-fullscreen" <?=(($d[0]["idicon"]=="glyphicon glyphicon-fullscreen")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-dashboard" data-content="<i class='glyphicon glyphicon-dashboard'></i> glyphicon glyphicon-dashboard" <?=(($d[0]["idicon"]=="glyphicon glyphicon-dashboard")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-paperclip" data-content="<i class='glyphicon glyphicon-paperclip'></i> glyphicon glyphicon-paperclip" <?=(($d[0]["idicon"]=="glyphicon glyphicon-paperclip")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-heart-empty" data-content="<i class='glyphicon glyphicon-heart-empty'></i> glyphicon glyphicon-heart-empty" <?=(($d[0]["idicon"]=="glyphicon glyphicon-heart-empty")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-link" data-content="<i class='glyphicon glyphicon-link'></i> glyphicon glyphicon-link" <?=(($d[0]["idicon"]=="glyphicon glyphicon-link")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-phone" data-content="<i class='glyphicon glyphicon-phone'></i> glyphicon glyphicon-phone" <?=(($d[0]["idicon"]=="glyphicon glyphicon-phone")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-pushpin" data-content="<i class='glyphicon glyphicon-pushpin'></i> glyphicon glyphicon-pushpin" <?=(($d[0]["idicon"]=="glyphicon glyphicon-pushpin")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-usd" data-content="<i class='glyphicon glyphicon-usd'></i> glyphicon glyphicon-usd" <?=(($d[0]["idicon"]=="glyphicon glyphicon-usd")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-gbp" data-content="<i class='glyphicon glyphicon-gbp'></i> glyphicon glyphicon-gbp" <?=(($d[0]["idicon"]=="glyphicon glyphicon-gbp")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort" data-content="<i class='glyphicon glyphicon-sort'></i> glyphicon glyphicon-sort" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-alphabet" data-content="<i class='glyphicon glyphicon-sort-by-alphabet'></i> glyphicon glyphicon-sort-by-alphabet" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-alphabet")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-alphabet-alt>" data-content="<i class='glyphicon glyphicon-sort-by-alphabet-alt>'></i> glyphicon glyphicon-sort-by-alphabet-alt>" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-alphabet-alt>")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-order" data-content="<i class='glyphicon glyphicon-sort-by-order'></i> glyphicon glyphicon-sort-by-order" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-order")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-order-alt" data-content="<i class='glyphicon glyphicon-sort-by-order-alt'></i> glyphicon glyphicon-sort-by-order-alt" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-order-alt")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-attributes" data-content="<i class='glyphicon glyphicon-sort-by-attributes'></i> glyphicon glyphicon-sort-by-attributes" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-attributes")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sort-by-attributes-altoption>" data-content="<i class='glyphicon glyphicon-sort-by-attributes-altoption>'></i> glyphicon glyphicon-sort-by-attributes-altoption>" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sort-by-attributes-altoption>")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-unchecked" data-content="<i class='glyphicon glyphicon-unchecked'></i> glyphicon glyphicon-unchecked" <?=(($d[0]["idicon"]=="glyphicon glyphicon-unchecked")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-expand" data-content="<i class='glyphicon glyphicon-expand'></i> glyphicon glyphicon-expand" <?=(($d[0]["idicon"]=="glyphicon glyphicon-expand")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-collapse-down" data-content="<i class='glyphicon glyphicon-collapse-down'></i> glyphicon glyphicon-collapse-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-collapse-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-collapse-up" data-content="<i class='glyphicon glyphicon-collapse-up'></i> glyphicon glyphicon-collapse-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-collapse-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-log-in" data-content="<i class='glyphicon glyphicon-log-in'></i> glyphicon glyphicon-log-in" <?=(($d[0]["idicon"]=="glyphicon glyphicon-log-in")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-flash" data-content="<i class='glyphicon glyphicon-flash'></i> glyphicon glyphicon-flash" <?=(($d[0]["idicon"]=="glyphicon glyphicon-flash")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-log-out" data-content="<i class='glyphicon glyphicon-log-out'></i> glyphicon glyphicon-log-out" <?=(($d[0]["idicon"]=="glyphicon glyphicon-log-out")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-new-window" data-content="<i class='glyphicon glyphicon-new-window'></i> glyphicon glyphicon-new-window" <?=(($d[0]["idicon"]=="glyphicon glyphicon-new-window")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-record" data-content="<i class='glyphicon glyphicon-record'></i> glyphicon glyphicon-record" <?=(($d[0]["idicon"]=="glyphicon glyphicon-record")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-save" data-content="<i class='glyphicon glyphicon-save'></i> glyphicon glyphicon-save" <?=(($d[0]["idicon"]=="glyphicon glyphicon-save")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-open" data-content="<i class='glyphicon glyphicon-open'></i> glyphicon glyphicon-open" <?=(($d[0]["idicon"]=="glyphicon glyphicon-open")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-saved" data-content="<i class='glyphicon glyphicon-saved'></i> glyphicon glyphicon-saved" <?=(($d[0]["idicon"]=="glyphicon glyphicon-saved")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-import" data-content="<i class='glyphicon glyphicon-import'></i> glyphicon glyphicon-import" <?=(($d[0]["idicon"]=="glyphicon glyphicon-import")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-export" data-content="<i class='glyphicon glyphicon-export'></i> glyphicon glyphicon-export" <?=(($d[0]["idicon"]=="glyphicon glyphicon-export")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-send" data-content="<i class='glyphicon glyphicon-send'></i> glyphicon glyphicon-send" <?=(($d[0]["idicon"]=="glyphicon glyphicon-send")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-floppy-disk" data-content="<i class='glyphicon glyphicon-floppy-disk'></i> glyphicon glyphicon-floppy-disk" <?=(($d[0]["idicon"]=="glyphicon glyphicon-floppy-disk")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-floppy-saved" data-content="<i class='glyphicon glyphicon-floppy-saved'></i> glyphicon glyphicon-floppy-saved" <?=(($d[0]["idicon"]=="glyphicon glyphicon-floppy-saved")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-floppy-remove" data-content="<i class='glyphicon glyphicon-floppy-remove'></i> glyphicon glyphicon-floppy-remove" <?=(($d[0]["idicon"]=="glyphicon glyphicon-floppy-remove")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-floppy-save" data-content="<i class='glyphicon glyphicon-floppy-save'></i> glyphicon glyphicon-floppy-save" <?=(($d[0]["idicon"]=="glyphicon glyphicon-floppy-save")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-floppy-open" data-content="<i class='glyphicon glyphicon-floppy-open'></i> glyphicon glyphicon-floppy-open" <?=(($d[0]["idicon"]=="glyphicon glyphicon-floppy-open")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-credit-card" data-content="<i class='glyphicon glyphicon-credit-card'></i> glyphicon glyphicon-credit-card" <?=(($d[0]["idicon"]=="glyphicon glyphicon-credit-card")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-transfer" data-content="<i class='glyphicon glyphicon-transfer'></i> glyphicon glyphicon-transfer" <?=(($d[0]["idicon"]=="glyphicon glyphicon-transfer")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cutlery" data-content="<i class='glyphicon glyphicon-cutlery'></i> glyphicon glyphicon-cutlery" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cutlery")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-header" data-content="<i class='glyphicon glyphicon-header'></i> glyphicon glyphicon-header" <?=(($d[0]["idicon"]=="glyphicon glyphicon-header")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-compressed" data-content="<i class='glyphicon glyphicon-compressed'></i> glyphicon glyphicon-compressed" <?=(($d[0]["idicon"]=="glyphicon glyphicon-compressed")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-earphone" data-content="<i class='glyphicon glyphicon-earphone'></i> glyphicon glyphicon-earphone" <?=(($d[0]["idicon"]=="glyphicon glyphicon-earphone")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-phone-alt" data-content="<i class='glyphicon glyphicon-phone-alt'></i> glyphicon glyphicon-phone-alt" <?=(($d[0]["idicon"]=="glyphicon glyphicon-phone-alt")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tower" data-content="<i class='glyphicon glyphicon-tower'></i> glyphicon glyphicon-tower" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tower")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-stats" data-content="<i class='glyphicon glyphicon-stats'></i> glyphicon glyphicon-stats" <?=(($d[0]["idicon"]=="glyphicon glyphicon-stats")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sd-video" data-content="<i class='glyphicon glyphicon-sd-video'></i> glyphicon glyphicon-sd-video" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sd-video")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hd-video" data-content="<i class='glyphicon glyphicon-hd-video'></i> glyphicon glyphicon-hd-video" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hd-video")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-subtitles" data-content="<i class='glyphicon glyphicon-subtitles'></i> glyphicon glyphicon-subtitles" <?=(($d[0]["idicon"]=="glyphicon glyphicon-subtitles")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sound-stereo" data-content="<i class='glyphicon glyphicon-sound-stereo'></i> glyphicon glyphicon-sound-stereo" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sound-stereo")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sound-dolby" data-content="<i class='glyphicon glyphicon-sound-dolby'></i> glyphicon glyphicon-sound-dolby" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sound-dolby")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sound-5-1" data-content="<i class='glyphicon glyphicon-sound-5-1'></i> glyphicon glyphicon-sound-5-1" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sound-5-1")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sound-6-1" data-content="<i class='glyphicon glyphicon-sound-6-1'></i> glyphicon glyphicon-sound-6-1" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sound-6-1")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sound-7-1" data-content="<i class='glyphicon glyphicon-sound-7-1'></i> glyphicon glyphicon-sound-7-1" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sound-7-1")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-copyright-mark" data-content="<i class='glyphicon glyphicon-copyright-mark'></i> glyphicon glyphicon-copyright-mark" <?=(($d[0]["idicon"]=="glyphicon glyphicon-copyright-mark")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-registration-mark" data-content="<i class='glyphicon glyphicon-registration-mark'></i> glyphicon glyphicon-registration-mark" <?=(($d[0]["idicon"]=="glyphicon glyphicon-registration-mark")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cloud-download" data-content="<i class='glyphicon glyphicon-cloud-download'></i> glyphicon glyphicon-cloud-download" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cloud-download")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cloud-upload" data-content="<i class='glyphicon glyphicon-cloud-upload'></i> glyphicon glyphicon-cloud-upload" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cloud-upload")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tree-conifer" data-content="<i class='glyphicon glyphicon-tree-conifer'></i> glyphicon glyphicon-tree-conifer" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tree-conifer")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tree-deciduous" data-content="<i class='glyphicon glyphicon-tree-deciduous'></i> glyphicon glyphicon-tree-deciduous" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tree-deciduous")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-cd" data-content="<i class='glyphicon glyphicon-cd'></i> glyphicon glyphicon-cd" <?=(($d[0]["idicon"]=="glyphicon glyphicon-cd")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-save-file" data-content="<i class='glyphicon glyphicon-save-file'></i> glyphicon glyphicon-save-file" <?=(($d[0]["idicon"]=="glyphicon glyphicon-save-file")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-open-file" data-content="<i class='glyphicon glyphicon-open-file'></i> glyphicon glyphicon-open-file" <?=(($d[0]["idicon"]=="glyphicon glyphicon-open-file")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-level-up" data-content="<i class='glyphicon glyphicon-level-up'></i> glyphicon glyphicon-level-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-level-up")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-copy" data-content="<i class='glyphicon glyphicon-copy'></i> glyphicon glyphicon-copy" <?=(($d[0]["idicon"]=="glyphicon glyphicon-copy")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-paste" data-content="<i class='glyphicon glyphicon-paste'></i> glyphicon glyphicon-paste" <?=(($d[0]["idicon"]=="glyphicon glyphicon-paste")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-alert" data-content="<i class='glyphicon glyphicon-alert'></i> glyphicon glyphicon-alert" <?=(($d[0]["idicon"]=="glyphicon glyphicon-alert")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-equalizer" data-content="<i class='glyphicon glyphicon-equalizer'></i> glyphicon glyphicon-equalizer" <?=(($d[0]["idicon"]=="glyphicon glyphicon-equalizer")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-king" data-content="<i class='glyphicon glyphicon-king'></i> glyphicon glyphicon-king" <?=(($d[0]["idicon"]=="glyphicon glyphicon-king")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-queen" data-content="<i class='glyphicon glyphicon-queen'></i> glyphicon glyphicon-queen" <?=(($d[0]["idicon"]=="glyphicon glyphicon-queen")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-pawn" data-content="<i class='glyphicon glyphicon-pawn'></i> glyphicon glyphicon-pawn" <?=(($d[0]["idicon"]=="glyphicon glyphicon-pawn")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bishop" data-content="<i class='glyphicon glyphicon-bishop'></i> glyphicon glyphicon-bishop" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bishop")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-knight" data-content="<i class='glyphicon glyphicon-knight'></i> glyphicon glyphicon-knight" <?=(($d[0]["idicon"]=="glyphicon glyphicon-knight")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-baby-formula" data-content="<i class='glyphicon glyphicon-baby-formula'></i> glyphicon glyphicon-baby-formula" <?=(($d[0]["idicon"]=="glyphicon glyphicon-baby-formula")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-tent" data-content="<i class='glyphicon glyphicon-tent'></i> glyphicon glyphicon-tent" <?=(($d[0]["idicon"]=="glyphicon glyphicon-tent")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-blackboard" data-content="<i class='glyphicon glyphicon-blackboard'></i> glyphicon glyphicon-blackboard" <?=(($d[0]["idicon"]=="glyphicon glyphicon-blackboard")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bed" data-content="<i class='glyphicon glyphicon-bed'></i> glyphicon glyphicon-bed" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bed")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-apple" data-content="<i class='glyphicon glyphicon-apple'></i> glyphicon glyphicon-apple" <?=(($d[0]["idicon"]=="glyphicon glyphicon-apple")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-erase" data-content="<i class='glyphicon glyphicon-erase'></i> glyphicon glyphicon-erase" <?=(($d[0]["idicon"]=="glyphicon glyphicon-erase")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-hourglass" data-content="<i class='glyphicon glyphicon-hourglass'></i> glyphicon glyphicon-hourglass" <?=(($d[0]["idicon"]=="glyphicon glyphicon-hourglass")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-lamp" data-content="<i class='glyphicon glyphicon-lamp'></i> glyphicon glyphicon-lamp" <?=(($d[0]["idicon"]=="glyphicon glyphicon-lamp")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-duplicate" data-content="<i class='glyphicon glyphicon-duplicate'></i> glyphicon glyphicon-duplicate" <?=(($d[0]["idicon"]=="glyphicon glyphicon-duplicate")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-piggy-bank" data-content="<i class='glyphicon glyphicon-piggy-bank'></i> glyphicon glyphicon-piggy-bank" <?=(($d[0]["idicon"]=="glyphicon glyphicon-piggy-bank")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-scissors" data-content="<i class='glyphicon glyphicon-scissors'></i> glyphicon glyphicon-scissors" <?=(($d[0]["idicon"]=="glyphicon glyphicon-scissors")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-bitcoin" data-content="<i class='glyphicon glyphicon-bitcoin'></i> glyphicon glyphicon-bitcoin" <?=(($d[0]["idicon"]=="glyphicon glyphicon-bitcoin")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-yen" data-content="<i class='glyphicon glyphicon-yen'></i> glyphicon glyphicon-yen" <?=(($d[0]["idicon"]=="glyphicon glyphicon-yen")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ruble" data-content="<i class='glyphicon glyphicon-ruble'></i> glyphicon glyphicon-ruble" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ruble")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-scale" data-content="<i class='glyphicon glyphicon-scale'></i> glyphicon glyphicon-scale" <?=(($d[0]["idicon"]=="glyphicon glyphicon-scale")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ice-lolly" data-content="<i class='glyphicon glyphicon-ice-lolly'></i> glyphicon glyphicon-ice-lolly" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ice-lolly")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-ice-lolly-tasted" data-content="<i class='glyphicon glyphicon-ice-lolly-tasted'></i> glyphicon glyphicon-ice-lolly-tasted" <?=(($d[0]["idicon"]=="glyphicon glyphicon-ice-lolly-tasted")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-education" data-content="<i class='glyphicon glyphicon-education'></i> glyphicon glyphicon-education" <?=(($d[0]["idicon"]=="glyphicon glyphicon-education")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-option-horizontal" data-content="<i class='glyphicon glyphicon-option-horizontal'></i> glyphicon glyphicon-option-horizontal" <?=(($d[0]["idicon"]=="glyphicon glyphicon-option-horizontal")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-option-vertical" data-content="<i class='glyphicon glyphicon-option-vertical'></i> glyphicon glyphicon-option-vertical" <?=(($d[0]["idicon"]=="glyphicon glyphicon-option-vertical")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-menu-hamburger" data-content="<i class='glyphicon glyphicon-menu-hamburger'></i> glyphicon glyphicon-menu-hamburger" <?=(($d[0]["idicon"]=="glyphicon glyphicon-menu-hamburger")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-modal-window" data-content="<i class='glyphicon glyphicon-modal-window'></i> glyphicon glyphicon-modal-window" <?=(($d[0]["idicon"]=="glyphicon glyphicon-modal-window")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-oil" data-content="<i class='glyphicon glyphicon-oil'></i> glyphicon glyphicon-oil" <?=(($d[0]["idicon"]=="glyphicon glyphicon-oil")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-grain" data-content="<i class='glyphicon glyphicon-grain'></i> glyphicon glyphicon-grain" <?=(($d[0]["idicon"]=="glyphicon glyphicon-grain")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-sunglasses" data-content="<i class='glyphicon glyphicon-sunglasses'></i> glyphicon glyphicon-sunglasses" <?=(($d[0]["idicon"]=="glyphicon glyphicon-sunglasses")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-text-size" data-content="<i class='glyphicon glyphicon-text-size'></i> glyphicon glyphicon-text-size" <?=(($d[0]["idicon"]=="glyphicon glyphicon-text-size")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-text-color" data-content="<i class='glyphicon glyphicon-text-color'></i> glyphicon glyphicon-text-color" <?=(($d[0]["idicon"]=="glyphicon glyphicon-text-color")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-text-background" data-content="<i class='glyphicon glyphicon-text-background'></i> glyphicon glyphicon-text-background" <?=(($d[0]["idicon"]=="glyphicon glyphicon-text-background")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-top" data-content="<i class='glyphicon glyphicon-object-align-top'></i> glyphicon glyphicon-object-align-top" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-top")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-bottom" data-content="<i class='glyphicon glyphicon-object-align-bottom'></i> glyphicon glyphicon-object-align-bottom" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-bottom")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-horizontaloption>" data-content="<i class='glyphicon glyphicon-object-align-horizontaloption>'></i> glyphicon glyphicon-object-align-horizontaloption>" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-horizontaloption>")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-left" data-content="<i class='glyphicon glyphicon-object-align-left'></i> glyphicon glyphicon-object-align-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-verticaloption>" data-content="<i class='glyphicon glyphicon-object-align-verticaloption>'></i> glyphicon glyphicon-object-align-verticaloption>" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-verticaloption>")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-object-align-right" data-content="<i class='glyphicon glyphicon-object-align-right'></i> glyphicon glyphicon-object-align-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-object-align-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-triangle-right" data-content="<i class='glyphicon glyphicon-triangle-right'></i> glyphicon glyphicon-triangle-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-triangle-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-triangle-left" data-content="<i class='glyphicon glyphicon-triangle-left'></i> glyphicon glyphicon-triangle-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-triangle-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-triangle-bottom" data-content="<i class='glyphicon glyphicon-triangle-bottom'></i> glyphicon glyphicon-triangle-bottom" <?=(($d[0]["idicon"]=="glyphicon glyphicon-triangle-bottom")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-triangle-top" data-content="<i class='glyphicon glyphicon-triangle-top'></i> glyphicon glyphicon-triangle-top" <?=(($d[0]["idicon"]=="glyphicon glyphicon-triangle-top")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-console" data-content="<i class='glyphicon glyphicon-console'></i> glyphicon glyphicon-console" <?=(($d[0]["idicon"]=="glyphicon glyphicon-console")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-superscript" data-content="<i class='glyphicon glyphicon-superscript'></i> glyphicon glyphicon-superscript" <?=(($d[0]["idicon"]=="glyphicon glyphicon-superscript")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-subscript" data-content="<i class='glyphicon glyphicon-subscript'></i> glyphicon glyphicon-subscript" <?=(($d[0]["idicon"]=="glyphicon glyphicon-subscript")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-menu-left" data-content="<i class='glyphicon glyphicon-menu-left'></i> glyphicon glyphicon-menu-left" <?=(($d[0]["idicon"]=="glyphicon glyphicon-menu-left")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-menu-right" data-content="<i class='glyphicon glyphicon-menu-right'></i> glyphicon glyphicon-menu-right" <?=(($d[0]["idicon"]=="glyphicon glyphicon-menu-right")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-menu-down" data-content="<i class='glyphicon glyphicon-menu-down'></i> glyphicon glyphicon-menu-down" <?=(($d[0]["idicon"]=="glyphicon glyphicon-menu-down")?'selected':'')?>></option>
									<option value="glyphicon glyphicon-menu-up" data-content="<i class='glyphicon glyphicon-menu-up'></i> glyphicon glyphicon-menu-up" <?=(($d[0]["idicon"]=="glyphicon glyphicon-menu-up")?'selected':'')?>></option>
									<option value="fa fa-american-sign-language-interpreting" data-content="<i class='fa fa-american-sign-language-interpreting'></i> fa fa-american-sign-language-interpreting"><?=(($d[0]["idicon"]=="fa fa-american-sign-language-interpreting")?'selected':'')?>></option>
									<option value="fa fa-assistive-listening-systems" data-content="<i class='fa fa-assistive-listening-systems'></i> fa fa-assistive-listening-systems" <?=(($d[0]["idicon"]=="fa fa-assistive-listening-systems")?'selected':'')?>></option>
									<option value="fa fa-glass" data-content="<i class='fa fa-glass'></i> fa fa-glass" <?=(($d[0]["idicon"]=="fa fa-glass")?'selected':'')?>></option>
									<option value="fa fa-music" data-content="<i class='fa fa-music'></i> fa fa-music" <?=(($d[0]["idicon"]=="fa fa-music")?'selected':'')?>></option>
									<option value="fa fa-search" data-content="<i class='fa fa-search'></i> fa fa-search" <?=(($d[0]["idicon"]=="fa fa-search")?'selected':'')?>></option>
									<option value="fa fa-envelope-o" data-content="<i class='fa fa-envelope-o'></i> fa fa-envelope-o" <?=(($d[0]["idicon"]=="fa fa-envelope-o")?'selected':'')?>></option>
									<option value="fa fa-heart" data-content="<i class='fa fa-heart'></i> fa fa-heart" <?=(($d[0]["idicon"]=="fa fa-heart")?'selected':'')?>></option>
									<option value="fa fa-star" data-content="<i class='fa fa-star'></i> fa fa-star" <?=(($d[0]["idicon"]=="fa fa-star")?'selected':'')?>></option>
									<option value="fa fa-star-o" data-content="<i class='fa fa-star-o'></i> fa fa-star-o" <?=(($d[0]["idicon"]=="fa fa-star-o")?'selected':'')?>></option>
									<option value="fa fa-user" data-content="<i class='fa fa-user'></i> fa fa-user" <?=(($d[0]["idicon"]=="fa fa-user")?'selected':'')?>></option>
									<option value="fa fa-film" data-content="<i class='fa fa-film'></i> fa fa-film" <?=(($d[0]["idicon"]=="fa fa-film")?'selected':'')?>></option>
									<option value="fa fa-th-large" data-content="<i class='fa fa-th-large'></i> fa fa-th-large" <?=(($d[0]["idicon"]=="fa fa-th-large")?'selected':'')?>></option>
									<option value="fa fa-th" data-content="<i class='fa fa-th'></i> fa fa-th" <?=(($d[0]["idicon"]=="fa fa-th")?'selected':'')?>></option>
									<option value="fa fa-th-list" data-content="<i class='fa fa-th-list'></i> fa fa-th-list" <?=(($d[0]["idicon"]=="fa fa-th-list")?'selected':'')?>></option>
									<option value="fa fa-check" data-content="<i class='fa fa-check'></i> fa fa-check" <?=(($d[0]["idicon"]=="fa fa-check")?'selected':'')?>></option>
									<option value="fa fa-remove" data-content="<i class='fa fa-remove'></i> fa fa-remove" <?=(($d[0]["idicon"]=="fa fa-remove")?'selected':'')?>></option>
									<option value="fa fa-close" data-content="<i class='fa fa-close'></i> fa fa-close" <?=(($d[0]["idicon"]=="fa fa-close")?'selected':'')?>></option>
									<option value="fa fa-times" data-content="<i class='fa fa-times'></i> fa fa-times" <?=(($d[0]["idicon"]=="fa fa-times")?'selected':'')?>></option>
									<option value="fa fa-search-plus" data-content="<i class='fa fa-search-plus'></i> fa fa-search-plus" <?=(($d[0]["idicon"]=="fa fa-search-plus")?'selected':'')?>></option>
									<option value="fa fa-search-minus" data-content="<i class='fa fa-search-minus'></i> fa fa-search-minus" <?=(($d[0]["idicon"]=="fa fa-search-minus")?'selected':'')?>></option>
									<option value="fa fa-power-off" data-content="<i class='fa fa-power-off'></i> fa fa-power-off" <?=(($d[0]["idicon"]=="fa fa-power-off")?'selected':'')?>></option>
									<option value="fa fa-signal" data-content="<i class='fa fa-signal'></i> fa fa-signal" <?=(($d[0]["idicon"]=="fa fa-signal")?'selected':'')?>></option>
									<option value="fa fa-gear" data-content="<i class='fa fa-gear'></i> fa fa-gear" <?=(($d[0]["idicon"]=="fa fa-gear")?'selected':'')?>></option>
									<option value="fa fa-cog" data-content="<i class='fa fa-cog'></i> fa fa-cog" <?=(($d[0]["idicon"]=="fa fa-cog")?'selected':'')?>></option>
									<option value="fa fa-trash-o" data-content="<i class='fa fa-trash-o'></i> fa fa-trash-o" <?=(($d[0]["idicon"]=="fa fa-trash-o")?'selected':'')?>></option>
									<option value="fa fa-home" data-content="<i class='fa fa-home'></i> fa fa-home" <?=(($d[0]["idicon"]=="fa fa-home")?'selected':'')?>></option>
									<option value="fa fa-file-o" data-content="<i class='fa fa-file-o'></i> fa fa-file-o" <?=(($d[0]["idicon"]=="fa fa-file-o")?'selected':'')?>></option>
									<option value="fa fa-clock-o" data-content="<i class='fa fa-clock-o'></i> fa fa-clock-o" <?=(($d[0]["idicon"]=="fa fa-clock-o")?'selected':'')?>></option>
									<option value="fa fa-road" data-content="<i class='fa fa-road'></i> fa fa-road" <?=(($d[0]["idicon"]=="fa fa-road")?'selected':'')?>></option>
									<option value="fa fa-download" data-content="<i class='fa fa-download'></i> fa fa-download" <?=(($d[0]["idicon"]=="fa fa-download")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-o-down" data-content="<i class='fa fa-arrow-circle-o-down'></i> fa fa-arrow-circle-o-down" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-o-down")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-o-up" data-content="<i class='fa fa-arrow-circle-o-up'></i> fa fa-arrow-circle-o-up" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-o-up")?'selected':'')?>></option>
									<option value="fa fa-inbox" data-content="<i class='fa fa-inbox'></i> fa fa-inbox" <?=(($d[0]["idicon"]=="fa fa-inbox")?'selected':'')?>></option>
									<option value="fa fa-play-circle-o" data-content="<i class='fa fa-play-circle-o'></i> fa fa-play-circle-o" <?=(($d[0]["idicon"]=="fa fa-play-circle-o")?'selected':'')?>></option>
									<option value="fa fa-rotate-right" data-content="<i class='fa fa-rotate-right'></i> fa fa-rotate-right" <?=(($d[0]["idicon"]=="fa fa-rotate-right")?'selected':'')?>></option>
									<option value="fa fa-repeat" data-content="<i class='fa fa-repeat'></i> fa fa-repeat" <?=(($d[0]["idicon"]=="fa fa-repeat")?'selected':'')?>></option>
									<option value="fa fa-refresh" data-content="<i class='fa fa-refresh'></i> fa fa-refresh" <?=(($d[0]["idicon"]=="fa fa-refresh")?'selected':'')?>></option>
									<option value="fa fa-list-alt" data-content="<i class='fa fa-list-alt'></i> fa fa-list-alt" <?=(($d[0]["idicon"]=="fa fa-list-alt")?'selected':'')?>></option>
									<option value="fa fa-lock" data-content="<i class='fa fa-lock'></i> fa fa-lock" <?=(($d[0]["idicon"]=="fa fa-lock")?'selected':'')?>></option>
									<option value="fa fa-flag" data-content="<i class='fa fa-flag'></i> fa fa-flag" <?=(($d[0]["idicon"]=="fa fa-flag")?'selected':'')?>></option>
									<option value="fa fa-headphones" data-content="<i class='fa fa-headphones'></i> fa fa-headphones" <?=(($d[0]["idicon"]=="fa fa-headphones")?'selected':'')?>></option>
									<option value="fa fa-volume-off" data-content="<i class='fa fa-volume-off'></i> fa fa-volume-off" <?=(($d[0]["idicon"]=="fa fa-volume-off")?'selected':'')?>></option>
									<option value="fa fa-volume-down" data-content="<i class='fa fa-volume-down'></i> fa fa-volume-down" <?=(($d[0]["idicon"]=="fa fa-volume-down")?'selected':'')?>></option>
									<option value="fa fa-volume-up" data-content="<i class='fa fa-volume-up'></i> fa fa-volume-up" <?=(($d[0]["idicon"]=="fa fa-volume-up")?'selected':'')?>></option>
									<option value="fa fa-qrcode" data-content="<i class='fa fa-qrcode'></i> fa fa-qrcode" <?=(($d[0]["idicon"]=="fa fa-qrcode")?'selected':'')?>></option>
									<option value="fa fa-barcode" data-content="<i class='fa fa-barcode'></i> fa fa-barcode" <?=(($d[0]["idicon"]=="fa fa-barcode")?'selected':'')?>></option>
									<option value="fa fa-tag" data-content="<i class='fa fa-tag'></i> fa fa-tag" <?=(($d[0]["idicon"]=="fa fa-tag")?'selected':'')?>></option>
									<option value="fa fa-tags" data-content="<i class='fa fa-tags'></i> fa fa-tags" <?=(($d[0]["idicon"]=="fa fa-tags")?'selected':'')?>></option>
									<option value="fa fa-book" data-content="<i class='fa fa-book'></i> fa fa-book" <?=(($d[0]["idicon"]=="fa fa-book")?'selected':'')?>></option>
									<option value="fa fa-bookmark" data-content="<i class='fa fa-bookmark'></i> fa fa-bookmark" <?=(($d[0]["idicon"]=="fa fa-bookmark")?'selected':'')?>></option>
									<option value="fa fa-print" data-content="<i class='fa fa-print'></i> fa fa-print" <?=(($d[0]["idicon"]=="fa fa-print")?'selected':'')?>></option>
									<option value="fa fa-camera" data-content="<i class='fa fa-camera'></i> fa fa-camera" <?=(($d[0]["idicon"]=="fa fa-camera")?'selected':'')?>></option>
									<option value="fa fa-font" data-content="<i class='fa fa-font'></i> fa fa-font" <?=(($d[0]["idicon"]=="fa fa-font")?'selected':'')?>></option>
									<option value="fa fa-bold" data-content="<i class='fa fa-bold'></i> fa fa-bold" <?=(($d[0]["idicon"]=="fa fa-bold")?'selected':'')?>></option>
									<option value="fa fa-italic" data-content="<i class='fa fa-italic'></i> fa fa-italic" <?=(($d[0]["idicon"]=="fa fa-italic")?'selected':'')?>></option>
									<option value="fa fa-text-height" data-content="<i class='fa fa-text-height'></i> fa fa-text-height" <?=(($d[0]["idicon"]=="fa fa-text-height")?'selected':'')?>></option>
									<option value="fa fa-text-width" data-content="<i class='fa fa-text-width'></i> fa fa-text-width" <?=(($d[0]["idicon"]=="fa fa-text-width")?'selected':'')?>></option>
									<option value="fa fa-align-left" data-content="<i class='fa fa-align-left'></i> fa fa-align-left" <?=(($d[0]["idicon"]=="fa fa-align-left")?'selected':'')?>></option>
									<option value="fa fa-align-center" data-content="<i class='fa fa-align-center'></i> fa fa-align-center" <?=(($d[0]["idicon"]=="fa fa-align-center")?'selected':'')?>></option>
									<option value="fa fa-align-right" data-content="<i class='fa fa-align-right'></i> fa fa-align-right" <?=(($d[0]["idicon"]=="fa fa-align-right")?'selected':'')?>></option>
									<option value="fa fa-align-justify" data-content="<i class='fa fa-align-justify'></i> fa fa-align-justify" <?=(($d[0]["idicon"]=="fa fa-align-justify")?'selected':'')?>></option>
									<option value="fa fa-list" data-content="<i class='fa fa-list'></i> fa fa-list" <?=(($d[0]["idicon"]=="fa fa-list")?'selected':'')?>></option>
									<option value="fa fa-dedent" data-content="<i class='fa fa-dedent'></i> fa fa-dedent" <?=(($d[0]["idicon"]=="fa fa-dedent")?'selected':'')?>></option>
									<option value="fa fa-outdent" data-content="<i class='fa fa-outdent'></i> fa fa-outdent" <?=(($d[0]["idicon"]=="fa fa-outdent")?'selected':'')?>></option>
									<option value="fa fa-indent" data-content="<i class='fa fa-indent'></i> fa fa-indent" <?=(($d[0]["idicon"]=="fa fa-indent")?'selected':'')?>></option>
									<option value="fa fa-video-camera" data-content="<i class='fa fa-video-camera'></i> fa fa-video-camera" <?=(($d[0]["idicon"]=="fa fa-video-camera")?'selected':'')?>></option>
									<option value="fa fa-photo" data-content="<i class='fa fa-photo'></i> fa fa-photo" <?=(($d[0]["idicon"]=="fa fa-photo")?'selected':'')?>></option>
									<option value="fa fa-image" data-content="<i class='fa fa-image'></i> fa fa-image" <?=(($d[0]["idicon"]=="fa fa-image")?'selected':'')?>></option>
									<option value="fa fa-picture-o" data-content="<i class='fa fa-picture-o'></i> fa fa-picture-o" <?=(($d[0]["idicon"]=="fa fa-picture-o")?'selected':'')?>></option>
									<option value="fa fa-pencil" data-content="<i class='fa fa-pencil'></i> fa fa-pencil" <?=(($d[0]["idicon"]=="fa fa-pencil")?'selected':'')?>></option>
									<option value="fa fa-map-marker" data-content="<i class='fa fa-map-marker'></i> fa fa-map-marker" <?=(($d[0]["idicon"]=="fa fa-map-marker")?'selected':'')?>></option>
									<option value="fa fa-adjust" data-content="<i class='fa fa-adjust'></i> fa fa-adjust" <?=(($d[0]["idicon"]=="fa fa-adjust")?'selected':'')?>></option>
									<option value="fa fa-tint" data-content="<i class='fa fa-tint'></i> fa fa-tint" <?=(($d[0]["idicon"]=="fa fa-tint")?'selected':'')?>></option>
									<option value="fa fa-edit" data-content="<i class='fa fa-edit'></i> fa fa-edit" <?=(($d[0]["idicon"]=="fa fa-edit")?'selected':'')?>></option>
									<option value="fa fa-pencil-square-o" data-content="<i class='fa fa-pencil-square-o'></i> fa fa-pencil-square-o" <?=(($d[0]["idicon"]=="fa fa-pencil-square-o")?'selected':'')?>></option>
									<option value="fa fa-share-square-o" data-content="<i class='fa fa-share-square-o'></i> fa fa-share-square-o" <?=(($d[0]["idicon"]=="fa fa-share-square-o")?'selected':'')?>></option>
									<option value="fa fa-check-square-o" data-content="<i class='fa fa-check-square-o'></i> fa fa-check-square-o" <?=(($d[0]["idicon"]=="fa fa-check-square-o")?'selected':'')?>></option>
									<option value="fa fa-arrows" data-content="<i class='fa fa-arrows'></i> fa fa-arrows" <?=(($d[0]["idicon"]=="fa fa-arrows")?'selected':'')?>></option>
									<option value="fa fa-step-backward" data-content="<i class='fa fa-step-backward'></i> fa fa-step-backward" <?=(($d[0]["idicon"]=="fa fa-step-backward")?'selected':'')?>></option>
									<option value="fa fa-fast-backward" data-content="<i class='fa fa-fast-backward'></i> fa fa-fast-backward" <?=(($d[0]["idicon"]=="fa fa-fast-backward")?'selected':'')?>></option>
									<option value="fa fa-backward" data-content="<i class='fa fa-backward'></i> fa fa-backward" <?=(($d[0]["idicon"]=="fa fa-backward")?'selected':'')?>></option>
									<option value="fa fa-play" data-content="<i class='fa fa-play'></i> fa fa-play" <?=(($d[0]["idicon"]=="fa fa-play")?'selected':'')?>></option>
									<option value="fa fa-pause" data-content="<i class='fa fa-pause'></i> fa fa-pause" <?=(($d[0]["idicon"]=="fa fa-pause")?'selected':'')?>></option>
									<option value="fa fa-stop" data-content="<i class='fa fa-stop'></i> fa fa-stop" <?=(($d[0]["idicon"]=="fa fa-stop")?'selected':'')?>></option>
									<option value="fa fa-forward" data-content="<i class='fa fa-forward'></i> fa fa-forward" <?=(($d[0]["idicon"]=="fa fa-forward")?'selected':'')?>></option>
									<option value="fa fa-fast-forward" data-content="<i class='fa fa-fast-forward'></i> fa fa-fast-forward" <?=(($d[0]["idicon"]=="fa fa-fast-forward")?'selected':'')?>></option>
									<option value="fa fa-step-forward" data-content="<i class='fa fa-step-forward'></i> fa fa-step-forward" <?=(($d[0]["idicon"]=="fa fa-step-forward")?'selected':'')?>></option>
									<option value="fa fa-eject" data-content="<i class='fa fa-eject'></i> fa fa-eject" <?=(($d[0]["idicon"]=="fa fa-eject")?'selected':'')?>></option>
									<option value="fa fa-chevron-left" data-content="<i class='fa fa-chevron-left'></i> fa fa-chevron-left" <?=(($d[0]["idicon"]=="fa fa-chevron-left")?'selected':'')?>></option>
									<option value="fa fa-chevron-right" data-content="<i class='fa fa-chevron-right'></i> fa fa-chevron-right" <?=(($d[0]["idicon"]=="fa fa-chevron-right")?'selected':'')?>></option>
									<option value="fa fa-plus-circle" data-content="<i class='fa fa-plus-circle'></i> fa fa-plus-circle" <?=(($d[0]["idicon"]=="fa fa-plus-circle")?'selected':'')?>></option>
									<option value="fa fa-minus-circle" data-content="<i class='fa fa-minus-circle'></i> fa fa-minus-circle" <?=(($d[0]["idicon"]=="fa fa-minus-circle")?'selected':'')?>></option>
									<option value="fa fa-times-circle" data-content="<i class='fa fa-times-circle'></i> fa fa-times-circle" <?=(($d[0]["idicon"]=="fa fa-times-circle")?'selected':'')?>></option>
									<option value="fa fa-check-circle" data-content="<i class='fa fa-check-circle'></i> fa fa-check-circle" <?=(($d[0]["idicon"]=="fa fa-check-circle")?'selected':'')?>></option>
									<option value="fa fa-question-circle" data-content="<i class='fa fa-question-circle'></i> fa fa-question-circle" <?=(($d[0]["idicon"]=="fa fa-question-circle")?'selected':'')?>></option>
									<option value="fa fa-info-circle" data-content="<i class='fa fa-info-circle'></i> fa fa-info-circle" <?=(($d[0]["idicon"]=="fa fa-info-circle")?'selected':'')?>></option>
									<option value="fa fa-crosshairs" data-content="<i class='fa fa-crosshairs'></i> fa fa-crosshairs" <?=(($d[0]["idicon"]=="fa fa-crosshairs")?'selected':'')?>></option>
									<option value="fa fa-times-circle-o" data-content="<i class='fa fa-times-circle-o'></i> fa fa-times-circle-o" <?=(($d[0]["idicon"]=="fa fa-times-circle-o")?'selected':'')?>></option>
									<option value="fa fa-check-circle-o" data-content="<i class='fa fa-check-circle-o'></i> fa fa-check-circle-o" <?=(($d[0]["idicon"]=="fa fa-check-circle-o")?'selected':'')?>></option>
									<option value="fa fa-ban" data-content="<i class='fa fa-ban'></i> fa fa-ban" <?=(($d[0]["idicon"]=="fa fa-ban")?'selected':'')?>></option>
									<option value="fa fa-arrow-left" data-content="<i class='fa fa-arrow-left'></i> fa fa-arrow-left" <?=(($d[0]["idicon"]=="fa fa-arrow-left")?'selected':'')?>></option>
									<option value="fa fa-arrow-right" data-content="<i class='fa fa-arrow-right'></i> fa fa-arrow-right" <?=(($d[0]["idicon"]=="fa fa-arrow-right")?'selected':'')?>></option>
									<option value="fa fa-arrow-up" data-content="<i class='fa fa-arrow-up'></i> fa fa-arrow-up" <?=(($d[0]["idicon"]=="fa fa-arrow-up")?'selected':'')?>></option>
									<option value="fa fa-arrow-down" data-content="<i class='fa fa-arrow-down'></i> fa fa-arrow-down" <?=(($d[0]["idicon"]=="fa fa-arrow-down")?'selected':'')?>></option>
									<option value="fa fa-mail-forward" data-content="<i class='fa fa-mail-forward'></i> fa fa-mail-forward" <?=(($d[0]["idicon"]=="fa fa-mail-forward")?'selected':'')?>></option>
									<option value="fa fa-share" data-content="<i class='fa fa-share'></i> fa fa-share" <?=(($d[0]["idicon"]=="fa fa-share")?'selected':'')?>></option>
									<option value="fa fa-expand" data-content="<i class='fa fa-expand'></i> fa fa-expand" <?=(($d[0]["idicon"]=="fa fa-expand")?'selected':'')?>></option>
									<option value="fa fa-compress" data-content="<i class='fa fa-compress'></i> fa fa-compress" <?=(($d[0]["idicon"]=="fa fa-compress")?'selected':'')?>></option>
									<option value="fa fa-plus" data-content="<i class='fa fa-plus'></i> fa fa-plus" <?=(($d[0]["idicon"]=="fa fa-plus")?'selected':'')?>></option>
									<option value="fa fa-minus" data-content="<i class='fa fa-minus'></i> fa fa-minus" <?=(($d[0]["idicon"]=="fa fa-minus")?'selected':'')?>></option>
									<option value="fa fa-asterisk" data-content="<i class='fa fa-asterisk'></i> fa fa-asterisk" <?=(($d[0]["idicon"]=="fa fa-asterisk")?'selected':'')?>></option>
									<option value="fa fa-exclamation-circle" data-content="<i class='fa fa-exclamation-circle'></i> fa fa-exclamation-circle" <?=(($d[0]["idicon"]=="fa fa-exclamation-circle")?'selected':'')?>></option>
									<option value="fa fa-gift" data-content="<i class='fa fa-gift'></i> fa fa-gift" <?=(($d[0]["idicon"]=="fa fa-gift")?'selected':'')?>></option>
									<option value="fa fa-leaf" data-content="<i class='fa fa-leaf'></i> fa fa-leaf" <?=(($d[0]["idicon"]=="fa fa-leaf")?'selected':'')?>></option>
									<option value="fa fa-fire" data-content="<i class='fa fa-fire'></i> fa fa-fire" <?=(($d[0]["idicon"]=="fa fa-fire")?'selected':'')?>></option>
									<option value="fa fa-eye" data-content="<i class='fa fa-eye'></i> fa fa-eye" <?=(($d[0]["idicon"]=="fa fa-eye")?'selected':'')?>></option>
									<option value="fa fa-eye-slash" data-content="<i class='fa fa-eye-slash'></i> fa fa-eye-slash" <?=(($d[0]["idicon"]=="fa fa-eye-slash")?'selected':'')?>></option>
									<option value="fa fa-warning" data-content="<i class='fa fa-warning'></i> fa fa-warning" <?=(($d[0]["idicon"]=="fa fa-warning")?'selected':'')?>></option>
									<option value="fa fa-exclamation-triangle" data-content="<i class='fa fa-exclamation-triangle'></i> fa fa-exclamation-triangle" <?=(($d[0]["idicon"]=="fa fa-exclamation-triangle")?'selected':'')?>></option>
									<option value="fa fa-plane" data-content="<i class='fa fa-plane'></i> fa fa-plane" <?=(($d[0]["idicon"]=="fa fa-plane")?'selected':'')?>></option>
									<option value="fa fa-calendar" data-content="<i class='fa fa-calendar'></i> fa fa-calendar" <?=(($d[0]["idicon"]=="fa fa-calendar")?'selected':'')?>></option>
									<option value="fa fa-random" data-content="<i class='fa fa-random'></i> fa fa-random" <?=(($d[0]["idicon"]=="fa fa-random")?'selected':'')?>></option>
									<option value="fa fa-comment" data-content="<i class='fa fa-comment'></i> fa fa-comment" <?=(($d[0]["idicon"]=="fa fa-comment")?'selected':'')?>></option>
									<option value="fa fa-magnet" data-content="<i class='fa fa-magnet'></i> fa fa-magnet" <?=(($d[0]["idicon"]=="fa fa-magnet")?'selected':'')?>></option>
									<option value="fa fa-chevron-up" data-content="<i class='fa fa-chevron-up'></i> fa fa-chevron-up" <?=(($d[0]["idicon"]=="fa fa-chevron-up")?'selected':'')?>></option>
									<option value="fa fa-chevron-down" data-content="<i class='fa fa-chevron-down'></i> fa fa-chevron-down" <?=(($d[0]["idicon"]=="fa fa-chevron-down")?'selected':'')?>></option>
									<option value="fa fa-retweet" data-content="<i class='fa fa-retweet'></i> fa fa-retweet" <?=(($d[0]["idicon"]=="fa fa-retweet")?'selected':'')?>></option>
									<option value="fa fa-shopping-cart" data-content="<i class='fa fa-shopping-cart'></i> fa fa-shopping-cart" <?=(($d[0]["idicon"]=="fa fa-shopping-cart")?'selected':'')?>></option>
									<option value="fa fa-folder" data-content="<i class='fa fa-folder'></i> fa fa-folder" <?=(($d[0]["idicon"]=="fa fa-folder")?'selected':'')?>></option>
									<option value="fa fa-folder-open" data-content="<i class='fa fa-folder-open'></i> fa fa-folder-open" <?=(($d[0]["idicon"]=="fa fa-folder-open")?'selected':'')?>></option>
									<option value="fa fa-arrows-v" data-content="<i class='fa fa-arrows-v'></i> fa fa-arrows-v" <?=(($d[0]["idicon"]=="fa fa-arrows-v")?'selected':'')?>></option>
									<option value="fa fa-arrows-h" data-content="<i class='fa fa-arrows-h'></i> fa fa-arrows-h" <?=(($d[0]["idicon"]=="fa fa-arrows-h")?'selected':'')?>></option>
									<option value="fa fa-bar-chart-o" data-content="<i class='fa fa-bar-chart-o'></i> fa fa-bar-chart-o" <?=(($d[0]["idicon"]=="fa fa-bar-chart-o")?'selected':'')?>></option>
									<option value="fa fa-bar-chart" data-content="<i class='fa fa-bar-chart'></i> fa fa-bar-chart" <?=(($d[0]["idicon"]=="fa fa-bar-chart")?'selected':'')?>></option>
									<option value="fa fa-twitter-square" data-content="<i class='fa fa-twitter-square'></i> fa fa-twitter-square" <?=(($d[0]["idicon"]=="fa fa-twitter-square")?'selected':'')?>></option>
									<option value="fa fa-facebook-square" data-content="<i class='fa fa-facebook-square'></i> fa fa-facebook-square" <?=(($d[0]["idicon"]=="fa fa-facebook-square")?'selected':'')?>></option>
									<option value="fa fa-camera-retro" data-content="<i class='fa fa-camera-retro'></i> fa fa-camera-retro" <?=(($d[0]["idicon"]=="fa fa-camera-retro")?'selected':'')?>></option>
									<option value="fa fa-key" data-content="<i class='fa fa-key'></i> fa fa-key" <?=(($d[0]["idicon"]=="fa fa-key")?'selected':'')?>></option>
									<option value="fa fa-gears" data-content="<i class='fa fa-gears'></i> fa fa-gears" <?=(($d[0]["idicon"]=="fa fa-gears")?'selected':'')?>></option>
									<option value="fa fa-cogs" data-content="<i class='fa fa-cogs'></i> fa fa-cogs" <?=(($d[0]["idicon"]=="fa fa-cogs")?'selected':'')?>></option>
									<option value="fa fa-comments" data-content="<i class='fa fa-comments'></i> fa fa-comments" <?=(($d[0]["idicon"]=="fa fa-comments")?'selected':'')?>></option>
									<option value="fa fa-thumbs-o-up" data-content="<i class='fa fa-thumbs-o-up'></i> fa fa-thumbs-o-up" <?=(($d[0]["idicon"]=="fa fa-thumbs-o-up")?'selected':'')?>></option>
									<option value="fa fa-thumbs-o-down" data-content="<i class='fa fa-thumbs-o-down'></i> fa fa-thumbs-o-down" <?=(($d[0]["idicon"]=="fa fa-thumbs-o-down")?'selected':'')?>></option>
									<option value="fa fa-star-half" data-content="<i class='fa fa-star-half'></i> fa fa-star-half" <?=(($d[0]["idicon"]=="fa fa-star-half")?'selected':'')?>></option>
									<option value="fa fa-heart-o" data-content="<i class='fa fa-heart-o'></i> fa fa-heart-o" <?=(($d[0]["idicon"]=="fa fa-heart-o")?'selected':'')?>></option>
									<option value="fa fa-sign-out" data-content="<i class='fa fa-sign-out'></i> fa fa-sign-out" <?=(($d[0]["idicon"]=="fa fa-sign-out")?'selected':'')?>></option>
									<option value="fa fa-linkedin-square" data-content="<i class='fa fa-linkedin-square'></i> fa fa-linkedin-square" <?=(($d[0]["idicon"]=="fa fa-linkedin-square")?'selected':'')?>></option>
									<option value="fa fa-thumb-tack" data-content="<i class='fa fa-thumb-tack'></i> fa fa-thumb-tack" <?=(($d[0]["idicon"]=="fa fa-thumb-tack")?'selected':'')?>></option>
									<option value="fa fa-external-link" data-content="<i class='fa fa-external-link'></i> fa fa-external-link" <?=(($d[0]["idicon"]=="fa fa-external-link")?'selected':'')?>></option>
									<option value="fa fa-sign-in" data-content="<i class='fa fa-sign-in'></i> fa fa-sign-in" <?=(($d[0]["idicon"]=="fa fa-sign-in")?'selected':'')?>></option>
									<option value="fa fa-trophy" data-content="<i class='fa fa-trophy'></i> fa fa-trophy" <?=(($d[0]["idicon"]=="fa fa-trophy")?'selected':'')?>></option>
									<option value="fa fa-github-square" data-content="<i class='fa fa-github-square'></i> fa fa-github-square" <?=(($d[0]["idicon"]=="fa fa-github-square")?'selected':'')?>></option>
									<option value="fa fa-upload" data-content="<i class='fa fa-upload'></i> fa fa-upload" <?=(($d[0]["idicon"]=="fa fa-upload")?'selected':'')?>></option>
									<option value="fa fa-lemon-o" data-content="<i class='fa fa-lemon-o'></i> fa fa-lemon-o" <?=(($d[0]["idicon"]=="fa fa-lemon-o")?'selected':'')?>></option>
									<option value="fa fa-phone" data-content="<i class='fa fa-phone'></i> fa fa-phone" <?=(($d[0]["idicon"]=="fa fa-phone")?'selected':'')?>></option>
									<option value="fa fa-square-o" data-content="<i class='fa fa-square-o'></i> fa fa-square-o" <?=(($d[0]["idicon"]=="fa fa-square-o")?'selected':'')?>></option>
									<option value="fa fa-bookmark-o" data-content="<i class='fa fa-bookmark-o'></i> fa fa-bookmark-o" <?=(($d[0]["idicon"]=="fa fa-bookmark-o")?'selected':'')?>></option>
									<option value="fa fa-phone-square" data-content="<i class='fa fa-phone-square'></i> fa fa-phone-square" <?=(($d[0]["idicon"]=="fa fa-phone-square")?'selected':'')?>></option>
									<option value="fa fa-twitter" data-content="<i class='fa fa-twitter'></i> fa fa-twitter" <?=(($d[0]["idicon"]=="fa fa-twitter")?'selected':'')?>></option>
									<option value="fa fa-facebook-f" data-content="<i class='fa fa-facebook-f'></i> fa fa-facebook-f" <?=(($d[0]["idicon"]=="fa fa-facebook-f")?'selected':'')?>></option>
									<option value="fa fa-facebook" data-content="<i class='fa fa-facebook'></i> fa fa-facebook" <?=(($d[0]["idicon"]=="fa fa-facebook")?'selected':'')?>></option>
									<option value="fa fa-github" data-content="<i class='fa fa-github'></i> fa fa-github" <?=(($d[0]["idicon"]=="fa fa-github")?'selected':'')?>></option>
									<option value="fa fa-unlock" data-content="<i class='fa fa-unlock'></i> fa fa-unlock" <?=(($d[0]["idicon"]=="fa fa-unlock")?'selected':'')?>></option>
									<option value="fa fa-credit-card" data-content="<i class='fa fa-credit-card'></i> fa fa-credit-card" <?=(($d[0]["idicon"]=="fa fa-credit-card")?'selected':'')?>></option>
									<option value="fa fa-feed" data-content="<i class='fa fa-feed'></i> fa fa-feed" <?=(($d[0]["idicon"]=="fa fa-feed")?'selected':'')?>></option>
									<option value="fa fa-rss" data-content="<i class='fa fa-rss'></i> fa fa-rss" <?=(($d[0]["idicon"]=="fa fa-rss")?'selected':'')?>></option>
									<option value="fa fa-hdd-o" data-content="<i class='fa fa-hdd-o'></i> fa fa-hdd-o" <?=(($d[0]["idicon"]=="fa fa-hdd-o")?'selected':'')?>></option>
									<option value="fa fa-bullhorn" data-content="<i class='fa fa-bullhorn'></i> fa fa-bullhorn" <?=(($d[0]["idicon"]=="fa fa-bullhorn")?'selected':'')?>></option>
									<option value="fa fa-bell" data-content="<i class='fa fa-bell'></i> fa fa-bell" <?=(($d[0]["idicon"]=="fa fa-bell")?'selected':'')?>></option>
									<option value="fa fa-certificate" data-content="<i class='fa fa-certificate'></i> fa fa-certificate" <?=(($d[0]["idicon"]=="fa fa-certificate")?'selected':'')?>></option>
									<option value="fa fa-hand-o-right" data-content="<i class='fa fa-hand-o-right'></i> fa fa-hand-o-right" <?=(($d[0]["idicon"]=="fa fa-hand-o-right")?'selected':'')?>></option>
									<option value="fa fa-hand-o-left" data-content="<i class='fa fa-hand-o-left'></i> fa fa-hand-o-left" <?=(($d[0]["idicon"]=="fa fa-hand-o-left")?'selected':'')?>></option>
									<option value="fa fa-hand-o-up" data-content="<i class='fa fa-hand-o-up'></i> fa fa-hand-o-up" <?=(($d[0]["idicon"]=="fa fa-hand-o-up")?'selected':'')?>></option>
									<option value="fa fa-hand-o-down" data-content="<i class='fa fa-hand-o-down'></i> fa fa-hand-o-down" <?=(($d[0]["idicon"]=="fa fa-hand-o-down")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-left" data-content="<i class='fa fa-arrow-circle-left'></i> fa fa-arrow-circle-left" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-left")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-right" data-content="<i class='fa fa-arrow-circle-right'></i> fa fa-arrow-circle-right" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-right")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-up" data-content="<i class='fa fa-arrow-circle-up'></i> fa fa-arrow-circle-up" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-up")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-down" data-content="<i class='fa fa-arrow-circle-down'></i> fa fa-arrow-circle-down" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-down")?'selected':'')?>></option>
									<option value="fa fa-globe" data-content="<i class='fa fa-globe'></i> fa fa-globe" <?=(($d[0]["idicon"]=="fa fa-globe")?'selected':'')?>></option>
									<option value="fa fa-wrench" data-content="<i class='fa fa-wrench'></i> fa fa-wrench" <?=(($d[0]["idicon"]=="fa fa-wrench")?'selected':'')?>></option>
									<option value="fa fa-tasks" data-content="<i class='fa fa-tasks'></i> fa fa-tasks" <?=(($d[0]["idicon"]=="fa fa-tasks")?'selected':'')?>></option>
									<option value="fa fa-filter" data-content="<i class='fa fa-filter'></i> fa fa-filter" <?=(($d[0]["idicon"]=="fa fa-filter")?'selected':'')?>></option>
									<option value="fa fa-briefcase" data-content="<i class='fa fa-briefcase'></i> fa fa-briefcase" <?=(($d[0]["idicon"]=="fa fa-briefcase")?'selected':'')?>></option>
									<option value="fa fa-arrows-alt" data-content="<i class='fa fa-arrows-alt'></i> fa fa-arrows-alt" <?=(($d[0]["idicon"]=="fa fa-arrows-alt")?'selected':'')?>></option>
									<option value="fa fa-group" data-content="<i class='fa fa-group'></i> fa fa-group" <?=(($d[0]["idicon"]=="fa fa-group")?'selected':'')?>></option>
									<option value="fa fa-users" data-content="<i class='fa fa-users'></i> fa fa-users" <?=(($d[0]["idicon"]=="fa fa-users")?'selected':'')?>></option>
									<option value="fa fa-chain" data-content="<i class='fa fa-chain'></i> fa fa-chain" <?=(($d[0]["idicon"]=="fa fa-chain")?'selected':'')?>></option>
									<option value="fa fa-link" data-content="<i class='fa fa-link'></i> fa fa-link" <?=(($d[0]["idicon"]=="fa fa-link")?'selected':'')?>></option>
									<option value="fa fa-cloud" data-content="<i class='fa fa-cloud'></i> fa fa-cloud" <?=(($d[0]["idicon"]=="fa fa-cloud")?'selected':'')?>></option>
									<option value="fa fa-flask" data-content="<i class='fa fa-flask'></i> fa fa-flask" <?=(($d[0]["idicon"]=="fa fa-flask")?'selected':'')?>></option>
									<option value="fa fa-cut" data-content="<i class='fa fa-cut'></i> fa fa-cut" <?=(($d[0]["idicon"]=="fa fa-cut")?'selected':'')?>></option>
									<option value="fa fa-scissors" data-content="<i class='fa fa-scissors'></i> fa fa-scissors" <?=(($d[0]["idicon"]=="fa fa-scissors")?'selected':'')?>></option>
									<option value="fa fa-copy" data-content="<i class='fa fa-copy'></i> fa fa-copy" <?=(($d[0]["idicon"]=="fa fa-copy")?'selected':'')?>></option>
									<option value="fa fa-files-o" data-content="<i class='fa fa-files-o'></i> fa fa-files-o" <?=(($d[0]["idicon"]=="fa fa-files-o")?'selected':'')?>></option>
									<option value="fa fa-paperclip" data-content="<i class='fa fa-paperclip'></i> fa fa-paperclip" <?=(($d[0]["idicon"]=="fa fa-paperclip")?'selected':'')?>></option>
									<option value="fa fa-save" data-content="<i class='fa fa-save'></i> fa fa-save" <?=(($d[0]["idicon"]=="fa fa-save")?'selected':'')?>></option>
									<option value="fa fa-floppy-o" data-content="<i class='fa fa-floppy-o'></i> fa fa-floppy-o" <?=(($d[0]["idicon"]=="fa fa-floppy-o")?'selected':'')?>></option>
									<option value="fa fa-square" data-content="<i class='fa fa-square'></i> fa fa-square" <?=(($d[0]["idicon"]=="fa fa-square")?'selected':'')?>></option>
									<option value="fa fa-navicon" data-content="<i class='fa fa-navicon'></i> fa fa-navicon" <?=(($d[0]["idicon"]=="fa fa-navicon")?'selected':'')?>></option>
									<option value="fa fa-reorder" data-content="<i class='fa fa-reorder'></i> fa fa-reorder" <?=(($d[0]["idicon"]=="fa fa-reorder")?'selected':'')?>></option>
									<option value="fa fa-bars" data-content="<i class='fa fa-bars'></i> fa fa-bars" <?=(($d[0]["idicon"]=="fa fa-bars")?'selected':'')?>></option>
									<option value="fa fa-list-ul" data-content="<i class='fa fa-list-ul'></i> fa fa-list-ul" <?=(($d[0]["idicon"]=="fa fa-list-ul")?'selected':'')?>></option>
									<option value="fa fa-list-ol" data-content="<i class='fa fa-list-ol'></i> fa fa-list-ol" <?=(($d[0]["idicon"]=="fa fa-list-ol")?'selected':'')?>></option>
									<option value="fa fa-strikethrough" data-content="<i class='fa fa-strikethrough'></i> fa fa-strikethrough" <?=(($d[0]["idicon"]=="fa fa-strikethrough")?'selected':'')?>></option>
									<option value="fa fa-underline" data-content="<i class='fa fa-underline'></i> fa fa-underline" <?=(($d[0]["idicon"]=="fa fa-underline")?'selected':'')?>></option>
									<option value="fa fa-table" data-content="<i class='fa fa-table'></i> fa fa-table" <?=(($d[0]["idicon"]=="fa fa-table")?'selected':'')?>></option>
									<option value="fa fa-magic" data-content="<i class='fa fa-magic'></i> fa fa-magic" <?=(($d[0]["idicon"]=="fa fa-magic")?'selected':'')?>></option>
									<option value="fa fa-truck" data-content="<i class='fa fa-truck'></i> fa fa-truck" <?=(($d[0]["idicon"]=="fa fa-truck")?'selected':'')?>></option>
									<option value="fa fa-pinterest" data-content="<i class='fa fa-pinterest'></i> fa fa-pinterest" <?=(($d[0]["idicon"]=="fa fa-pinterest")?'selected':'')?>></option>
									<option value="fa fa-pinterest-square" data-content="<i class='fa fa-pinterest-square'></i> fa fa-pinterest-square" <?=(($d[0]["idicon"]=="fa fa-pinterest-square")?'selected':'')?>></option>
									<option value="fa fa-google-plus-square" data-content="<i class='fa fa-google-plus-square'></i> fa fa-google-plus-square" <?=(($d[0]["idicon"]=="fa fa-google-plus-square")?'selected':'')?>></option>
									<option value="fa fa-google-plus" data-content="<i class='fa fa-google-plus'></i> fa fa-google-plus" <?=(($d[0]["idicon"]=="fa fa-google-plus")?'selected':'')?>></option>
									<option value="fa fa-money" data-content="<i class='fa fa-money'></i> fa fa-money" <?=(($d[0]["idicon"]=="fa fa-money")?'selected':'')?>></option>
									<option value="fa fa-caret-down" data-content="<i class='fa fa-caret-down'></i> fa fa-caret-down" <?=(($d[0]["idicon"]=="fa fa-caret-down")?'selected':'')?>></option>
									<option value="fa fa-caret-up" data-content="<i class='fa fa-caret-up'></i> fa fa-caret-up" <?=(($d[0]["idicon"]=="fa fa-caret-up")?'selected':'')?>></option>
									<option value="fa fa-caret-left" data-content="<i class='fa fa-caret-left'></i> fa fa-caret-left" <?=(($d[0]["idicon"]=="fa fa-caret-left")?'selected':'')?>></option>
									<option value="fa fa-caret-right" data-content="<i class='fa fa-caret-right'></i> fa fa-caret-right" <?=(($d[0]["idicon"]=="fa fa-caret-right")?'selected':'')?>></option>
									<option value="fa fa-columns" data-content="<i class='fa fa-columns'></i> fa fa-columns" <?=(($d[0]["idicon"]=="fa fa-columns")?'selected':'')?>></option>
									<option value="fa fa-unsorted" data-content="<i class='fa fa-unsorted'></i> fa fa-unsorted" <?=(($d[0]["idicon"]=="fa fa-unsorted")?'selected':'')?>></option>
									<option value="fa fa-sort" data-content="<i class='fa fa-sort'></i> fa fa-sort" <?=(($d[0]["idicon"]=="fa fa-sort")?'selected':'')?>></option>
									<option value="fa fa-sort-down" data-content="<i class='fa fa-sort-down'></i> fa fa-sort-down" <?=(($d[0]["idicon"]=="fa fa-sort-down")?'selected':'')?>></option>
									<option value="fa fa-sort-desc" data-content="<i class='fa fa-sort-desc'></i> fa fa-sort-desc" <?=(($d[0]["idicon"]=="fa fa-sort-desc")?'selected':'')?>></option>
									<option value="fa fa-sort-up" data-content="<i class='fa fa-sort-up'></i> fa fa-sort-up" <?=(($d[0]["idicon"]=="fa fa-sort-up")?'selected':'')?>></option>
									<option value="fa fa-sort-asc" data-content="<i class='fa fa-sort-asc'></i> fa fa-sort-asc" <?=(($d[0]["idicon"]=="fa fa-sort-asc")?'selected':'')?>></option>
									<option value="fa fa-envelope" data-content="<i class='fa fa-envelope'></i> fa fa-envelope" <?=(($d[0]["idicon"]=="fa fa-envelope")?'selected':'')?>></option>
									<option value="fa fa-linkedin" data-content="<i class='fa fa-linkedin'></i> fa fa-linkedin" <?=(($d[0]["idicon"]=="fa fa-linkedin")?'selected':'')?>></option>
									<option value="fa fa-rotate-left" data-content="<i class='fa fa-rotate-left'></i> fa fa-rotate-left" <?=(($d[0]["idicon"]=="fa fa-rotate-left")?'selected':'')?>></option>
									<option value="fa fa-undo" data-content="<i class='fa fa-undo'></i> fa fa-undo" <?=(($d[0]["idicon"]=="fa fa-undo")?'selected':'')?>></option>
									<option value="fa fa-legal" data-content="<i class='fa fa-legal'></i> fa fa-legal" <?=(($d[0]["idicon"]=="fa fa-legal")?'selected':'')?>></option>
									<option value="fa fa-gavel" data-content="<i class='fa fa-gavel'></i> fa fa-gavel" <?=(($d[0]["idicon"]=="fa fa-gavel")?'selected':'')?>></option>
									<option value="fa fa-dashboard" data-content="<i class='fa fa-dashboard'></i> fa fa-dashboard" <?=(($d[0]["idicon"]=="fa fa-dashboard")?'selected':'')?>></option>
									<option value="fa fa-tachometer" data-content="<i class='fa fa-tachometer'></i> fa fa-tachometer" <?=(($d[0]["idicon"]=="fa fa-tachometer")?'selected':'')?>></option>
									<option value="fa fa-comment-o" data-content="<i class='fa fa-comment-o'></i> fa fa-comment-o" <?=(($d[0]["idicon"]=="fa fa-comment-o")?'selected':'')?>></option>
									<option value="fa fa-comments-o" data-content="<i class='fa fa-comments-o'></i> fa fa-comments-o" <?=(($d[0]["idicon"]=="fa fa-comments-o")?'selected':'')?>></option>
									<option value="fa fa-flash" data-content="<i class='fa fa-flash'></i> fa fa-flash" <?=(($d[0]["idicon"]=="fa fa-flash")?'selected':'')?>></option>
									<option value="fa fa-bolt" data-content="<i class='fa fa-bolt'></i> fa fa-bolt" <?=(($d[0]["idicon"]=="fa fa-bolt")?'selected':'')?>></option>
									<option value="fa fa-sitemap" data-content="<i class='fa fa-sitemap'></i> fa fa-sitemap" <?=(($d[0]["idicon"]=="fa fa-sitemap")?'selected':'')?>></option>
									<option value="fa fa-umbrella" data-content="<i class='fa fa-umbrella'></i> fa fa-umbrella" <?=(($d[0]["idicon"]=="fa fa-umbrella")?'selected':'')?>></option>
									<option value="fa fa-paste" data-content="<i class='fa fa-paste'></i> fa fa-paste" <?=(($d[0]["idicon"]=="fa fa-paste")?'selected':'')?>></option>
									<option value="fa fa-clipboard" data-content="<i class='fa fa-clipboard'></i> fa fa-clipboard" <?=(($d[0]["idicon"]=="fa fa-clipboard")?'selected':'')?>></option>
									<option value="fa fa-lightbulb-o" data-content="<i class='fa fa-lightbulb-o'></i> fa fa-lightbulb-o" <?=(($d[0]["idicon"]=="fa fa-lightbulb-o")?'selected':'')?>></option>
									<option value="fa fa-exchange" data-content="<i class='fa fa-exchange'></i> fa fa-exchange" <?=(($d[0]["idicon"]=="fa fa-exchange")?'selected':'')?>></option>
									<option value="fa fa-cloud-download" data-content="<i class='fa fa-cloud-download'></i> fa fa-cloud-download" <?=(($d[0]["idicon"]=="fa fa-cloud-download")?'selected':'')?>></option>
									<option value="fa fa-cloud-upload" data-content="<i class='fa fa-cloud-upload'></i> fa fa-cloud-upload" <?=(($d[0]["idicon"]=="fa fa-cloud-upload")?'selected':'')?>></option>
									<option value="fa fa-user-md" data-content="<i class='fa fa-user-md'></i> fa fa-user-md" <?=(($d[0]["idicon"]=="fa fa-user-md")?'selected':'')?>></option>
									<option value="fa fa-stethoscope" data-content="<i class='fa fa-stethoscope'></i> fa fa-stethoscope" <?=(($d[0]["idicon"]=="fa fa-stethoscope")?'selected':'')?>></option>
									<option value="fa fa-suitcase" data-content="<i class='fa fa-suitcase'></i> fa fa-suitcase" <?=(($d[0]["idicon"]=="fa fa-suitcase")?'selected':'')?>></option>
									<option value="fa fa-bell-o" data-content="<i class='fa fa-bell-o'></i> fa fa-bell-o" <?=(($d[0]["idicon"]=="fa fa-bell-o")?'selected':'')?>></option>
									<option value="fa fa-coffee" data-content="<i class='fa fa-coffee'></i> fa fa-coffee" <?=(($d[0]["idicon"]=="fa fa-coffee")?'selected':'')?>></option>
									<option value="fa fa-cutlery" data-content="<i class='fa fa-cutlery'></i> fa fa-cutlery" <?=(($d[0]["idicon"]=="fa fa-cutlery")?'selected':'')?>></option>
									<option value="fa fa-file-text-o" data-content="<i class='fa fa-file-text-o'></i> fa fa-file-text-o" <?=(($d[0]["idicon"]=="fa fa-file-text-o")?'selected':'')?>></option>
									<option value="fa fa-building-o" data-content="<i class='fa fa-building-o'></i> fa fa-building-o" <?=(($d[0]["idicon"]=="fa fa-building-o")?'selected':'')?>></option>
									<option value="fa fa-hospital-o" data-content="<i class='fa fa-hospital-o'></i> fa fa-hospital-o" <?=(($d[0]["idicon"]=="fa fa-hospital-o")?'selected':'')?>></option>
									<option value="fa fa-ambulance" data-content="<i class='fa fa-ambulance'></i> fa fa-ambulance" <?=(($d[0]["idicon"]=="fa fa-ambulance")?'selected':'')?>></option>
									<option value="fa fa-medkit" data-content="<i class='fa fa-medkit'></i> fa fa-medkit" <?=(($d[0]["idicon"]=="fa fa-medkit")?'selected':'')?>></option>
									<option value="fa fa-fighter-jet" data-content="<i class='fa fa-fighter-jet'></i> fa fa-fighter-jet" <?=(($d[0]["idicon"]=="fa fa-fighter-jet")?'selected':'')?>></option>
									<option value="fa fa-beer" data-content="<i class='fa fa-beer'></i> fa fa-beer" <?=(($d[0]["idicon"]=="fa fa-beer")?'selected':'')?>></option>
									<option value="fa fa-h-square" data-content="<i class='fa fa-h-square'></i> fa fa-h-square" <?=(($d[0]["idicon"]=="fa fa-h-square")?'selected':'')?>></option>
									<option value="fa fa-plus-square" data-content="<i class='fa fa-plus-square'></i> fa fa-plus-square" <?=(($d[0]["idicon"]=="fa fa-plus-square")?'selected':'')?>></option>
									<option value="fa fa-angle-double-left" data-content="<i class='fa fa-angle-double-left'></i> fa fa-angle-double-left" <?=(($d[0]["idicon"]=="fa fa-angle-double-left")?'selected':'')?>></option>
									<option value="fa fa-angle-double-right" data-content="<i class='fa fa-angle-double-right'></i> fa fa-angle-double-right" <?=(($d[0]["idicon"]=="fa fa-angle-double-right")?'selected':'')?>></option>
									<option value="fa fa-angle-double-up" data-content="<i class='fa fa-angle-double-up'></i> fa fa-angle-double-up" <?=(($d[0]["idicon"]=="fa fa-angle-double-up")?'selected':'')?>></option>
									<option value="fa fa-angle-double-down" data-content="<i class='fa fa-angle-double-down'></i> fa fa-angle-double-down" <?=(($d[0]["idicon"]=="fa fa-angle-double-down")?'selected':'')?>></option>
									<option value="fa fa-angle-left" data-content="<i class='fa fa-angle-left'></i> fa fa-angle-left" <?=(($d[0]["idicon"]=="fa fa-angle-left")?'selected':'')?>></option>
									<option value="fa fa-angle-right" data-content="<i class='fa fa-angle-right'></i> fa fa-angle-right" <?=(($d[0]["idicon"]=="fa fa-angle-right")?'selected':'')?>></option>
									<option value="fa fa-angle-up" data-content="<i class='fa fa-angle-up'></i> fa fa-angle-up" <?=(($d[0]["idicon"]=="fa fa-angle-up")?'selected':'')?>></option>
									<option value="fa fa-angle-down" data-content="<i class='fa fa-angle-down'></i> fa fa-angle-down" <?=(($d[0]["idicon"]=="fa fa-angle-down")?'selected':'')?>></option>
									<option value="fa fa-desktop" data-content="<i class='fa fa-desktop'></i> fa fa-desktop" <?=(($d[0]["idicon"]=="fa fa-desktop")?'selected':'')?>></option>
									<option value="fa fa-laptop" data-content="<i class='fa fa-laptop'></i> fa fa-laptop" <?=(($d[0]["idicon"]=="fa fa-laptop")?'selected':'')?>></option>
									<option value="fa fa-tablet" data-content="<i class='fa fa-tablet'></i> fa fa-tablet" <?=(($d[0]["idicon"]=="fa fa-tablet")?'selected':'')?>></option>
									<option value="fa fa-mobile-phone" data-content="<i class='fa fa-mobile-phone'></i> fa fa-mobile-phone" <?=(($d[0]["idicon"]=="fa fa-mobile-phone")?'selected':'')?>></option>
									<option value="fa fa-mobile" data-content="<i class='fa fa-mobile'></i> fa fa-mobile" <?=(($d[0]["idicon"]=="fa fa-mobile")?'selected':'')?>></option>
									<option value="fa fa-circle-o" data-content="<i class='fa fa-circle-o'></i> fa fa-circle-o" <?=(($d[0]["idicon"]=="fa fa-circle-o")?'selected':'')?>></option>
									<option value="fa fa-quote-left" data-content="<i class='fa fa-quote-left'></i> fa fa-quote-left" <?=(($d[0]["idicon"]=="fa fa-quote-left")?'selected':'')?>></option>
									<option value="fa fa-quote-right" data-content="<i class='fa fa-quote-right'></i> fa fa-quote-right" <?=(($d[0]["idicon"]=="fa fa-quote-right")?'selected':'')?>></option>
									<option value="fa fa-spinner" data-content="<i class='fa fa-spinner'></i> fa fa-spinner" <?=(($d[0]["idicon"]=="fa fa-spinner")?'selected':'')?>></option>
									<option value="fa fa-circle" data-content="<i class='fa fa-circle'></i> fa fa-circle" <?=(($d[0]["idicon"]=="fa fa-circle")?'selected':'')?>></option>
									<option value="fa fa-mail-reply" data-content="<i class='fa fa-mail-reply'></i> fa fa-mail-reply" <?=(($d[0]["idicon"]=="fa fa-mail-reply")?'selected':'')?>></option>
									<option value="fa fa-reply" data-content="<i class='fa fa-reply'></i> fa fa-reply" <?=(($d[0]["idicon"]=="fa fa-reply")?'selected':'')?>></option>
									<option value="fa fa-github-alt" data-content="<i class='fa fa-github-alt'></i> fa fa-github-alt" <?=(($d[0]["idicon"]=="fa fa-github-alt")?'selected':'')?>></option>
									<option value="fa fa-folder-o" data-content="<i class='fa fa-folder-o'></i> fa fa-folder-o" <?=(($d[0]["idicon"]=="fa fa-folder-o")?'selected':'')?>></option>
									<option value="fa fa-folder-open-o" data-content="<i class='fa fa-folder-open-o'></i> fa fa-folder-open-o" <?=(($d[0]["idicon"]=="fa fa-folder-open-o")?'selected':'')?>></option>
									<option value="fa fa-smile-o" data-content="<i class='fa fa-smile-o'></i> fa fa-smile-o" <?=(($d[0]["idicon"]=="fa fa-smile-o")?'selected':'')?>></option>
									<option value="fa fa-frown-o" data-content="<i class='fa fa-frown-o'></i> fa fa-frown-o" <?=(($d[0]["idicon"]=="fa fa-frown-o")?'selected':'')?>></option>
									<option value="fa fa-meh-o" data-content="<i class='fa fa-meh-o'></i> fa fa-meh-o" <?=(($d[0]["idicon"]=="fa fa-meh-o")?'selected':'')?>></option>
									<option value="fa fa-gamepad" data-content="<i class='fa fa-gamepad'></i> fa fa-gamepad" <?=(($d[0]["idicon"]=="fa fa-gamepad")?'selected':'')?>></option>
									<option value="fa fa-keyboard-o" data-content="<i class='fa fa-keyboard-o'></i> fa fa-keyboard-o" <?=(($d[0]["idicon"]=="fa fa-keyboard-o")?'selected':'')?>></option>
									<option value="fa fa-flag-o" data-content="<i class='fa fa-flag-o'></i> fa fa-flag-o" <?=(($d[0]["idicon"]=="fa fa-flag-o")?'selected':'')?>></option>
									<option value="fa fa-flag-checkered" data-content="<i class='fa fa-flag-checkered'></i> fa fa-flag-checkered" <?=(($d[0]["idicon"]=="fa fa-flag-checkered")?'selected':'')?>></option>
									<option value="fa fa-terminal" data-content="<i class='fa fa-terminal'></i> fa fa-terminal" <?=(($d[0]["idicon"]=="fa fa-terminal")?'selected':'')?>></option>
									<option value="fa fa-code" data-content="<i class='fa fa-code'></i> fa fa-code" <?=(($d[0]["idicon"]=="fa fa-code")?'selected':'')?>></option>
									<option value="fa fa-mail-reply-all" data-content="<i class='fa fa-mail-reply-all'></i> fa fa-mail-reply-all" <?=(($d[0]["idicon"]=="fa fa-mail-reply-all")?'selected':'')?>></option>
									<option value="fa fa-reply-all" data-content="<i class='fa fa-reply-all'></i> fa fa-reply-all" <?=(($d[0]["idicon"]=="fa fa-reply-all")?'selected':'')?>></option>
									<option value="fa fa-star-half-empty" data-content="<i class='fa fa-star-half-empty'></i> fa fa-star-half-empty" <?=(($d[0]["idicon"]=="fa fa-star-half-empty")?'selected':'')?>></option>
									<option value="fa fa-star-half-full" data-content="<i class='fa fa-star-half-full'></i> fa fa-star-half-full" <?=(($d[0]["idicon"]=="fa fa-star-half-full")?'selected':'')?>></option>
									<option value="fa fa-star-half-o" data-content="<i class='fa fa-star-half-o'></i> fa fa-star-half-o" <?=(($d[0]["idicon"]=="fa fa-star-half-o")?'selected':'')?>></option>
									<option value="fa fa-location-arrow" data-content="<i class='fa fa-location-arrow'></i> fa fa-location-arrow" <?=(($d[0]["idicon"]=="fa fa-location-arrow")?'selected':'')?>></option>
									<option value="fa fa-crop" data-content="<i class='fa fa-crop'></i> fa fa-crop" <?=(($d[0]["idicon"]=="fa fa-crop")?'selected':'')?>></option>
									<option value="fa fa-code-fork" data-content="<i class='fa fa-code-fork'></i> fa fa-code-fork" <?=(($d[0]["idicon"]=="fa fa-code-fork")?'selected':'')?>></option>
									<option value="fa fa-unlink" data-content="<i class='fa fa-unlink'></i> fa fa-unlink" <?=(($d[0]["idicon"]=="fa fa-unlink")?'selected':'')?>></option>
									<option value="fa fa-chain-broken" data-content="<i class='fa fa-chain-broken'></i> fa fa-chain-broken" <?=(($d[0]["idicon"]=="fa fa-chain-broken")?'selected':'')?>></option>
									<option value="fa fa-question" data-content="<i class='fa fa-question'></i> fa fa-question" <?=(($d[0]["idicon"]=="fa fa-question")?'selected':'')?>></option>
									<option value="fa fa-info" data-content="<i class='fa fa-info'></i> fa fa-info" <?=(($d[0]["idicon"]=="fa fa-info")?'selected':'')?>></option>
									<option value="fa fa-exclamation" data-content="<i class='fa fa-exclamation'></i> fa fa-exclamation" <?=(($d[0]["idicon"]=="fa fa-exclamation")?'selected':'')?>></option>
									<option value="fa fa-superscript" data-content="<i class='fa fa-superscript'></i> fa fa-superscript" <?=(($d[0]["idicon"]=="fa fa-superscript")?'selected':'')?>></option>
									<option value="fa fa-subscript" data-content="<i class='fa fa-subscript'></i> fa fa-subscript" <?=(($d[0]["idicon"]=="fa fa-subscript")?'selected':'')?>></option>
									<option value="fa fa-eraser" data-content="<i class='fa fa-eraser'></i> fa fa-eraser" <?=(($d[0]["idicon"]=="fa fa-eraser")?'selected':'')?>></option>
									<option value="fa fa-puzzle-piece" data-content="<i class='fa fa-puzzle-piece'></i> fa fa-puzzle-piece" <?=(($d[0]["idicon"]=="fa fa-puzzle-piece")?'selected':'')?>></option>
									<option value="fa fa-microphone" data-content="<i class='fa fa-microphone'></i> fa fa-microphone" <?=(($d[0]["idicon"]=="fa fa-microphone")?'selected':'')?>></option>
									<option value="fa fa-microphone-slash" data-content="<i class='fa fa-microphone-slash'></i> fa fa-microphone-slash" <?=(($d[0]["idicon"]=="fa fa-microphone-slash")?'selected':'')?>></option>
									<option value="fa fa-shield" data-content="<i class='fa fa-shield'></i> fa fa-shield" <?=(($d[0]["idicon"]=="fa fa-shield")?'selected':'')?>></option>
									<option value="fa fa-calendar-o" data-content="<i class='fa fa-calendar-o'></i> fa fa-calendar-o" <?=(($d[0]["idicon"]=="fa fa-calendar-o")?'selected':'')?>></option>
									<option value="fa fa-fire-extinguisher" data-content="<i class='fa fa-fire-extinguisher'></i> fa fa-fire-extinguisher" <?=(($d[0]["idicon"]=="fa fa-fire-extinguisher")?'selected':'')?>></option>
									<option value="fa fa-rocket" data-content="<i class='fa fa-rocket'></i> fa fa-rocket" <?=(($d[0]["idicon"]=="fa fa-rocket")?'selected':'')?>></option>
									<option value="fa fa-maxcdn" data-content="<i class='fa fa-maxcdn'></i> fa fa-maxcdn" <?=(($d[0]["idicon"]=="fa fa-maxcdn")?'selected':'')?>></option>
									<option value="fa fa-chevron-circle-left" data-content="<i class='fa fa-chevron-circle-left'></i> fa fa-chevron-circle-left" <?=(($d[0]["idicon"]=="fa fa-chevron-circle-left")?'selected':'')?>></option>
									<option value="fa fa-chevron-circle-right" data-content="<i class='fa fa-chevron-circle-right'></i> fa fa-chevron-circle-right" <?=(($d[0]["idicon"]=="fa fa-chevron-circle-right")?'selected':'')?>></option>
									<option value="fa fa-chevron-circle-up" data-content="<i class='fa fa-chevron-circle-up'></i> fa fa-chevron-circle-up" <?=(($d[0]["idicon"]=="fa fa-chevron-circle-up")?'selected':'')?>></option>
									<option value="fa fa-chevron-circle-down" data-content="<i class='fa fa-chevron-circle-down'></i> fa fa-chevron-circle-down" <?=(($d[0]["idicon"]=="fa fa-chevron-circle-down")?'selected':'')?>></option>
									<option value="fa fa-html5" data-content="<i class='fa fa-html5'></i> fa fa-html5" <?=(($d[0]["idicon"]=="fa fa-html5")?'selected':'')?>></option>
									<option value="fa fa-css3" data-content="<i class='fa fa-css3'></i> fa fa-css3" <?=(($d[0]["idicon"]=="fa fa-css3")?'selected':'')?>></option>
									<option value="fa fa-anchor" data-content="<i class='fa fa-anchor'></i> fa fa-anchor" <?=(($d[0]["idicon"]=="fa fa-anchor")?'selected':'')?>></option>
									<option value="fa fa-unlock-alt" data-content="<i class='fa fa-unlock-alt'></i> fa fa-unlock-alt" <?=(($d[0]["idicon"]=="fa fa-unlock-alt")?'selected':'')?>></option>
									<option value="fa fa-bullseye" data-content="<i class='fa fa-bullseye'></i> fa fa-bullseye" <?=(($d[0]["idicon"]=="fa fa-bullseye")?'selected':'')?>></option>
									<option value="fa fa-ellipsis-h" data-content="<i class='fa fa-ellipsis-h'></i> fa fa-ellipsis-h" <?=(($d[0]["idicon"]=="fa fa-ellipsis-h")?'selected':'')?>></option>
									<option value="fa fa-ellipsis-v" data-content="<i class='fa fa-ellipsis-v'></i> fa fa-ellipsis-v" <?=(($d[0]["idicon"]=="fa fa-ellipsis-v")?'selected':'')?>></option>
									<option value="fa fa-rss-square" data-content="<i class='fa fa-rss-square'></i> fa fa-rss-square" <?=(($d[0]["idicon"]=="fa fa-rss-square")?'selected':'')?>></option>
									<option value="fa fa-play-circle" data-content="<i class='fa fa-play-circle'></i> fa fa-play-circle" <?=(($d[0]["idicon"]=="fa fa-play-circle")?'selected':'')?>></option>
									<option value="fa fa-ticket" data-content="<i class='fa fa-ticket'></i> fa fa-ticket" <?=(($d[0]["idicon"]=="fa fa-ticket")?'selected':'')?>></option>
									<option value="fa fa-minus-square" data-content="<i class='fa fa-minus-square'></i> fa fa-minus-square" <?=(($d[0]["idicon"]=="fa fa-minus-square")?'selected':'')?>></option>
									<option value="fa fa-minus-square-o" data-content="<i class='fa fa-minus-square-o'></i> fa fa-minus-square-o" <?=(($d[0]["idicon"]=="fa fa-minus-square-o")?'selected':'')?>></option>
									<option value="fa fa-level-up" data-content="<i class='fa fa-level-up'></i> fa fa-level-up" <?=(($d[0]["idicon"]=="fa fa-level-up")?'selected':'')?>></option>
									<option value="fa fa-level-down" data-content="<i class='fa fa-level-down'></i> fa fa-level-down" <?=(($d[0]["idicon"]=="fa fa-level-down")?'selected':'')?>></option>
									<option value="fa fa-check-square" data-content="<i class='fa fa-check-square'></i> fa fa-check-square" <?=(($d[0]["idicon"]=="fa fa-check-square")?'selected':'')?>></option>
									<option value="fa fa-pencil-square" data-content="<i class='fa fa-pencil-square'></i> fa fa-pencil-square" <?=(($d[0]["idicon"]=="fa fa-pencil-square")?'selected':'')?>></option>
									<option value="fa fa-external-link-square" data-content="<i class='fa fa-external-link-square'></i> fa fa-external-link-square" <?=(($d[0]["idicon"]=="fa fa-external-link-square")?'selected':'')?>></option>
									<option value="fa fa-share-square" data-content="<i class='fa fa-share-square'></i> fa fa-share-square" <?=(($d[0]["idicon"]=="fa fa-share-square")?'selected':'')?>></option>
									<option value="fa fa-compass" data-content="<i class='fa fa-compass'></i> fa fa-compass" <?=(($d[0]["idicon"]=="fa fa-compass")?'selected':'')?>></option>
									<option value="fa fa-toggle-down" data-content="<i class='fa fa-toggle-down'></i> fa fa-toggle-down" <?=(($d[0]["idicon"]=="fa fa-toggle-down")?'selected':'')?>></option>
									<option value="fa fa-caret-square-o-down" data-content="<i class='fa fa-caret-square-o-down'></i> fa fa-caret-square-o-down" <?=(($d[0]["idicon"]=="fa fa-caret-square-o-down")?'selected':'')?>></option>
									<option value="fa fa-toggle-up" data-content="<i class='fa fa-toggle-up'></i> fa fa-toggle-up" <?=(($d[0]["idicon"]=="fa fa-toggle-up")?'selected':'')?>></option>
									<option value="fa fa-caret-square-o-up" data-content="<i class='fa fa-caret-square-o-up'></i> fa fa-caret-square-o-up" <?=(($d[0]["idicon"]=="fa fa-caret-square-o-up")?'selected':'')?>></option>
									<option value="fa fa-toggle-right" data-content="<i class='fa fa-toggle-right'></i> fa fa-toggle-right" <?=(($d[0]["idicon"]=="fa fa-toggle-right")?'selected':'')?>></option>
									<option value="fa fa-caret-square-o-right" data-content="<i class='fa fa-caret-square-o-right'></i> fa fa-caret-square-o-right" <?=(($d[0]["idicon"]=="fa fa-caret-square-o-right")?'selected':'')?>></option>
									<option value="fa fa-euro" data-content="<i class='fa fa-euro'></i> fa fa-euro" <?=(($d[0]["idicon"]=="fa fa-euro")?'selected':'')?>></option>
									<option value="fa fa-eur" data-content="<i class='fa fa-eur'></i> fa fa-eur" <?=(($d[0]["idicon"]=="fa fa-eur")?'selected':'')?>></option>
									<option value="fa fa-gbp" data-content="<i class='fa fa-gbp'></i> fa fa-gbp" <?=(($d[0]["idicon"]=="fa fa-gbp")?'selected':'')?>></option>
									<option value="fa fa-dollar" data-content="<i class='fa fa-dollar'></i> fa fa-dollar" <?=(($d[0]["idicon"]=="fa fa-dollar")?'selected':'')?>></option>
									<option value="fa fa-usd" data-content="<i class='fa fa-usd'></i> fa fa-usd" <?=(($d[0]["idicon"]=="fa fa-usd")?'selected':'')?>></option>
									<option value="fa fa-rupee" data-content="<i class='fa fa-rupee'></i> fa fa-rupee" <?=(($d[0]["idicon"]=="fa fa-rupee")?'selected':'')?>></option>
									<option value="fa fa-inr" data-content="<i class='fa fa-inr'></i> fa fa-inr" <?=(($d[0]["idicon"]=="fa fa-inr")?'selected':'')?>></option>
									<option value="fa fa-cny" data-content="<i class='fa fa-cny'></i> fa fa-cny" <?=(($d[0]["idicon"]=="fa fa-cny")?'selected':'')?>></option>
									<option value="fa fa-rmb" data-content="<i class='fa fa-rmb'></i> fa fa-rmb" <?=(($d[0]["idicon"]=="fa fa-rmb")?'selected':'')?>></option>
									<option value="fa fa-yen" data-content="<i class='fa fa-yen'></i> fa fa-yen" <?=(($d[0]["idicon"]=="fa fa-yen")?'selected':'')?>></option>
									<option value="fa fa-jpy" data-content="<i class='fa fa-jpy'></i> fa fa-jpy" <?=(($d[0]["idicon"]=="fa fa-jpy")?'selected':'')?>></option>
									<option value="fa fa-ruble" data-content="<i class='fa fa-ruble'></i> fa fa-ruble" <?=(($d[0]["idicon"]=="fa fa-ruble")?'selected':'')?>></option>
									<option value="fa fa-rouble" data-content="<i class='fa fa-rouble'></i> fa fa-rouble" <?=(($d[0]["idicon"]=="fa fa-rouble")?'selected':'')?>></option>
									<option value="fa fa-rub" data-content="<i class='fa fa-rub'></i> fa fa-rub" <?=(($d[0]["idicon"]=="fa fa-rub")?'selected':'')?>></option>
									<option value="fa fa-won" data-content="<i class='fa fa-won'></i> fa fa-won" <?=(($d[0]["idicon"]=="fa fa-won")?'selected':'')?>></option>
									<option value="fa fa-krw" data-content="<i class='fa fa-krw'></i> fa fa-krw" <?=(($d[0]["idicon"]=="fa fa-krw")?'selected':'')?>></option>
									<option value="fa fa-bitcoin" data-content="<i class='fa fa-bitcoin'></i> fa fa-bitcoin" <?=(($d[0]["idicon"]=="fa fa-bitcoin")?'selected':'')?>></option>
									<option value="fa fa-btc" data-content="<i class='fa fa-btc'></i> fa fa-btc" <?=(($d[0]["idicon"]=="fa fa-btc")?'selected':'')?>></option>
									<option value="fa fa-file" data-content="<i class='fa fa-file'></i> fa fa-file" <?=(($d[0]["idicon"]=="fa fa-file")?'selected':'')?>></option>
									<option value="fa fa-file-text" data-content="<i class='fa fa-file-text'></i> fa fa-file-text" <?=(($d[0]["idicon"]=="fa fa-file-text")?'selected':'')?>></option>
									<option value="fa fa-sort-alpha-asc" data-content="<i class='fa fa-sort-alpha-asc'></i> fa fa-sort-alpha-asc" <?=(($d[0]["idicon"]=="fa fa-sort-alpha-asc")?'selected':'')?>></option>
									<option value="fa fa-sort-alpha-desc" data-content="<i class='fa fa-sort-alpha-desc'></i> fa fa-sort-alpha-desc" <?=(($d[0]["idicon"]=="fa fa-sort-alpha-desc")?'selected':'')?>></option>
									<option value="fa fa-sort-amount-asc" data-content="<i class='fa fa-sort-amount-asc'></i> fa fa-sort-amount-asc" <?=(($d[0]["idicon"]=="fa fa-sort-amount-asc")?'selected':'')?>></option>
									<option value="fa fa-sort-amount-desc" data-content="<i class='fa fa-sort-amount-desc'></i> fa fa-sort-amount-desc" <?=(($d[0]["idicon"]=="fa fa-sort-amount-desc")?'selected':'')?>></option>
									<option value="fa fa-sort-numeric-asc" data-content="<i class='fa fa-sort-numeric-asc'></i> fa fa-sort-numeric-asc" <?=(($d[0]["idicon"]=="fa fa-sort-numeric-asc")?'selected':'')?>></option>
									<option value="fa fa-sort-numeric-desc" data-content="<i class='fa fa-sort-numeric-desc'></i> fa fa-sort-numeric-desc" <?=(($d[0]["idicon"]=="fa fa-sort-numeric-desc")?'selected':'')?>></option>
									<option value="fa fa-thumbs-up" data-content="<i class='fa fa-thumbs-up'></i> fa fa-thumbs-up" <?=(($d[0]["idicon"]=="fa fa-thumbs-up")?'selected':'')?>></option>
									<option value="fa fa-thumbs-down" data-content="<i class='fa fa-thumbs-down'></i> fa fa-thumbs-down" <?=(($d[0]["idicon"]=="fa fa-thumbs-down")?'selected':'')?>></option>
									<option value="fa fa-youtube-square" data-content="<i class='fa fa-youtube-square'></i> fa fa-youtube-square" <?=(($d[0]["idicon"]=="fa fa-youtube-square")?'selected':'')?>></option>
									<option value="fa fa-youtube" data-content="<i class='fa fa-youtube'></i> fa fa-youtube" <?=(($d[0]["idicon"]=="fa fa-youtube")?'selected':'')?>></option>
									<option value="fa fa-xing" data-content="<i class='fa fa-xing'></i> fa fa-xing" <?=(($d[0]["idicon"]=="fa fa-xing")?'selected':'')?>></option>
									<option value="fa fa-xing-square" data-content="<i class='fa fa-xing-square'></i> fa fa-xing-square" <?=(($d[0]["idicon"]=="fa fa-xing-square")?'selected':'')?>></option>
									<option value="fa fa-youtube-play" data-content="<i class='fa fa-youtube-play'></i> fa fa-youtube-play" <?=(($d[0]["idicon"]=="fa fa-youtube-play")?'selected':'')?>></option>
									<option value="fa fa-dropbox" data-content="<i class='fa fa-dropbox'></i> fa fa-dropbox" <?=(($d[0]["idicon"]=="fa fa-dropbox")?'selected':'')?>></option>
									<option value="fa fa-stack-overflow" data-content="<i class='fa fa-stack-overflow'></i> fa fa-stack-overflow" <?=(($d[0]["idicon"]=="fa fa-stack-overflow")?'selected':'')?>></option>
									<option value="fa fa-instagram" data-content="<i class='fa fa-instagram'></i> fa fa-instagram" <?=(($d[0]["idicon"]=="fa fa-instagram")?'selected':'')?>></option>
									<option value="fa fa-flickr" data-content="<i class='fa fa-flickr'></i> fa fa-flickr" <?=(($d[0]["idicon"]=="fa fa-flickr")?'selected':'')?>></option>
									<option value="fa fa-adn" data-content="<i class='fa fa-adn'></i> fa fa-adn" <?=(($d[0]["idicon"]=="fa fa-adn")?'selected':'')?>></option>
									<option value="fa fa-bitbucket" data-content="<i class='fa fa-bitbucket'></i> fa fa-bitbucket" <?=(($d[0]["idicon"]=="fa fa-bitbucket")?'selected':'')?>></option>
									<option value="fa fa-bitbucket-square" data-content="<i class='fa fa-bitbucket-square'></i> fa fa-bitbucket-square" <?=(($d[0]["idicon"]=="fa fa-bitbucket-square")?'selected':'')?>></option>
									<option value="fa fa-tumblr" data-content="<i class='fa fa-tumblr'></i> fa fa-tumblr" <?=(($d[0]["idicon"]=="fa fa-tumblr")?'selected':'')?>></option>
									<option value="fa fa-tumblr-square" data-content="<i class='fa fa-tumblr-square'></i> fa fa-tumblr-square" <?=(($d[0]["idicon"]=="fa fa-tumblr-square")?'selected':'')?>></option>
									<option value="fa fa-long-arrow-down" data-content="<i class='fa fa-long-arrow-down'></i> fa fa-long-arrow-down" <?=(($d[0]["idicon"]=="fa fa-long-arrow-down")?'selected':'')?>></option>
									<option value="fa fa-long-arrow-up" data-content="<i class='fa fa-long-arrow-up'></i> fa fa-long-arrow-up" <?=(($d[0]["idicon"]=="fa fa-long-arrow-up")?'selected':'')?>></option>
									<option value="fa fa-long-arrow-left" data-content="<i class='fa fa-long-arrow-left'></i> fa fa-long-arrow-left" <?=(($d[0]["idicon"]=="fa fa-long-arrow-left")?'selected':'')?>></option>
									<option value="fa fa-long-arrow-right" data-content="<i class='fa fa-long-arrow-right'></i> fa fa-long-arrow-right" <?=(($d[0]["idicon"]=="fa fa-long-arrow-right")?'selected':'')?>></option>
									<option value="fa fa-apple" data-content="<i class='fa fa-apple'></i> fa fa-apple" <?=(($d[0]["idicon"]=="fa fa-apple")?'selected':'')?>></option>
									<option value="fa fa-windows" data-content="<i class='fa fa-windows'></i> fa fa-windows" <?=(($d[0]["idicon"]=="fa fa-windows")?'selected':'')?>></option>
									<option value="fa fa-android" data-content="<i class='fa fa-android'></i> fa fa-android" <?=(($d[0]["idicon"]=="fa fa-android")?'selected':'')?>></option>
									<option value="fa fa-linux" data-content="<i class='fa fa-linux'></i> fa fa-linux" <?=(($d[0]["idicon"]=="fa fa-linux")?'selected':'')?>></option>
									<option value="fa fa-dribbble" data-content="<i class='fa fa-dribbble'></i> fa fa-dribbble" <?=(($d[0]["idicon"]=="fa fa-dribbble")?'selected':'')?>></option>
									<option value="fa fa-skype" data-content="<i class='fa fa-skype'></i> fa fa-skype" <?=(($d[0]["idicon"]=="fa fa-skype")?'selected':'')?>></option>
									<option value="fa fa-foursquare" data-content="<i class='fa fa-foursquare'></i> fa fa-foursquare" <?=(($d[0]["idicon"]=="fa fa-foursquare")?'selected':'')?>></option>
									<option value="fa fa-trello" data-content="<i class='fa fa-trello'></i> fa fa-trello" <?=(($d[0]["idicon"]=="fa fa-trello")?'selected':'')?>></option>
									<option value="fa fa-female" data-content="<i class='fa fa-female'></i> fa fa-female" <?=(($d[0]["idicon"]=="fa fa-female")?'selected':'')?>></option>
									<option value="fa fa-male" data-content="<i class='fa fa-male'></i> fa fa-male" <?=(($d[0]["idicon"]=="fa fa-male")?'selected':'')?>></option>
									<option value="fa fa-gittip" data-content="<i class='fa fa-gittip'></i> fa fa-gittip" <?=(($d[0]["idicon"]=="fa fa-gittip")?'selected':'')?>></option>
									<option value="fa fa-gratipay" data-content="<i class='fa fa-gratipay'></i> fa fa-gratipay" <?=(($d[0]["idicon"]=="fa fa-gratipay")?'selected':'')?>></option>
									<option value="fa fa-sun-o" data-content="<i class='fa fa-sun-o'></i> fa fa-sun-o" <?=(($d[0]["idicon"]=="fa fa-sun-o")?'selected':'')?>></option>
									<option value="fa fa-moon-o" data-content="<i class='fa fa-moon-o'></i> fa fa-moon-o" <?=(($d[0]["idicon"]=="fa fa-moon-o")?'selected':'')?>></option>
									<option value="fa fa-archive" data-content="<i class='fa fa-archive'></i> fa fa-archive" <?=(($d[0]["idicon"]=="fa fa-archive")?'selected':'')?>></option>
									<option value="fa fa-bug" data-content="<i class='fa fa-bug'></i> fa fa-bug" <?=(($d[0]["idicon"]=="fa fa-bug")?'selected':'')?>></option>
									<option value="fa fa-vk" data-content="<i class='fa fa-vk'></i> fa fa-vk" <?=(($d[0]["idicon"]=="fa fa-vk")?'selected':'')?>></option>
									<option value="fa fa-weibo" data-content="<i class='fa fa-weibo'></i> fa fa-weibo" <?=(($d[0]["idicon"]=="fa fa-weibo")?'selected':'')?>></option>
									<option value="fa fa-renren" data-content="<i class='fa fa-renren'></i> fa fa-renren" <?=(($d[0]["idicon"]=="fa fa-renren")?'selected':'')?>></option>
									<option value="fa fa-pagelines" data-content="<i class='fa fa-pagelines'></i> fa fa-pagelines" <?=(($d[0]["idicon"]=="fa fa-pagelines")?'selected':'')?>></option>
									<option value="fa fa-stack-exchange" data-content="<i class='fa fa-stack-exchange'></i> fa fa-stack-exchange" <?=(($d[0]["idicon"]=="fa fa-stack-exchange")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-o-right" data-content="<i class='fa fa-arrow-circle-o-right'></i> fa fa-arrow-circle-o-right" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-o-right")?'selected':'')?>></option>
									<option value="fa fa-arrow-circle-o-left" data-content="<i class='fa fa-arrow-circle-o-left'></i> fa fa-arrow-circle-o-left" <?=(($d[0]["idicon"]=="fa fa-arrow-circle-o-left")?'selected':'')?>></option>
									<option value="fa fa-toggle-left" data-content="<i class='fa fa-toggle-left'></i> fa fa-toggle-left" <?=(($d[0]["idicon"]=="fa fa-toggle-left")?'selected':'')?>></option>
									<option value="fa fa-caret-square-o-left" data-content="<i class='fa fa-caret-square-o-left'></i> fa fa-caret-square-o-left" <?=(($d[0]["idicon"]=="fa fa-caret-square-o-left")?'selected':'')?>></option>
									<option value="fa fa-dot-circle-o" data-content="<i class='fa fa-dot-circle-o'></i> fa fa-dot-circle-o" <?=(($d[0]["idicon"]=="fa fa-dot-circle-o")?'selected':'')?>></option>
									<option value="fa fa-wheelchair" data-content="<i class='fa fa-wheelchair'></i> fa fa-wheelchair" <?=(($d[0]["idicon"]=="fa fa-wheelchair")?'selected':'')?>></option>
									<option value="fa fa-vimeo-square" data-content="<i class='fa fa-vimeo-square'></i> fa fa-vimeo-square" <?=(($d[0]["idicon"]=="fa fa-vimeo-square")?'selected':'')?>></option>
									<option value="fa fa-turkish-lira" data-content="<i class='fa fa-turkish-lira'></i> fa fa-turkish-lira" <?=(($d[0]["idicon"]=="fa fa-turkish-lira")?'selected':'')?>></option>
									<option value="fa fa-try" data-content="<i class='fa fa-try'></i> fa fa-try" <?=(($d[0]["idicon"]=="fa fa-try")?'selected':'')?>></option>
									<option value="fa fa-plus-square-o" data-content="<i class='fa fa-plus-square-o'></i> fa fa-plus-square-o" <?=(($d[0]["idicon"]=="fa fa-plus-square-o")?'selected':'')?>></option>
									<option value="fa fa-space-shuttle" data-content="<i class='fa fa-space-shuttle'></i> fa fa-space-shuttle" <?=(($d[0]["idicon"]=="fa fa-space-shuttle")?'selected':'')?>></option>
									<option value="fa fa-slack" data-content="<i class='fa fa-slack'></i> fa fa-slack" <?=(($d[0]["idicon"]=="fa fa-slack")?'selected':'')?>></option>
									<option value="fa fa-envelope-square" data-content="<i class='fa fa-envelope-square'></i> fa fa-envelope-square" <?=(($d[0]["idicon"]=="fa fa-envelope-square")?'selected':'')?>></option>
									<option value="fa fa-wordpress" data-content="<i class='fa fa-wordpress'></i> fa fa-wordpress" <?=(($d[0]["idicon"]=="fa fa-wordpress")?'selected':'')?>></option>
									<option value="fa fa-openid" data-content="<i class='fa fa-openid'></i> fa fa-openid" <?=(($d[0]["idicon"]=="fa fa-openid")?'selected':'')?>></option>
									<option value="fa fa-institution" data-content="<i class='fa fa-institution'></i> fa fa-institution" <?=(($d[0]["idicon"]=="fa fa-institution")?'selected':'')?>></option>
									<option value="fa fa-bank" data-content="<i class='fa fa-bank'></i> fa fa-bank" <?=(($d[0]["idicon"]=="fa fa-bank")?'selected':'')?>></option>
									<option value="fa fa-university" data-content="<i class='fa fa-university'></i> fa fa-university" <?=(($d[0]["idicon"]=="fa fa-university")?'selected':'')?>></option>
									<option value="fa fa-mortar-board" data-content="<i class='fa fa-mortar-board'></i> fa fa-mortar-board" <?=(($d[0]["idicon"]=="fa fa-mortar-board")?'selected':'')?>></option>
									<option value="fa fa-graduation-cap" data-content="<i class='fa fa-graduation-cap'></i> fa fa-graduation-cap" <?=(($d[0]["idicon"]=="fa fa-graduation-cap")?'selected':'')?>></option>
									<option value="fa fa-yahoo" data-content="<i class='fa fa-yahoo'></i> fa fa-yahoo" <?=(($d[0]["idicon"]=="fa fa-yahoo")?'selected':'')?>></option>
									<option value="fa fa-google" data-content="<i class='fa fa-google'></i> fa fa-google" <?=(($d[0]["idicon"]=="fa fa-google")?'selected':'')?>></option>
									<option value="fa fa-reddit" data-content="<i class='fa fa-reddit'></i> fa fa-reddit" <?=(($d[0]["idicon"]=="fa fa-reddit")?'selected':'')?>></option>
									<option value="fa fa-reddit-square" data-content="<i class='fa fa-reddit-square'></i> fa fa-reddit-square" <?=(($d[0]["idicon"]=="fa fa-reddit-square")?'selected':'')?>></option>
									<option value="fa fa-stumbleupon-circle" data-content="<i class='fa fa-stumbleupon-circle'></i> fa fa-stumbleupon-circle" <?=(($d[0]["idicon"]=="fa fa-stumbleupon-circle")?'selected':'')?>></option>
									<option value="fa fa-stumbleupon" data-content="<i class='fa fa-stumbleupon'></i> fa fa-stumbleupon" <?=(($d[0]["idicon"]=="fa fa-stumbleupon")?'selected':'')?>></option>
									<option value="fa fa-delicious" data-content="<i class='fa fa-delicious'></i> fa fa-delicious" <?=(($d[0]["idicon"]=="fa fa-delicious")?'selected':'')?>></option>
									<option value="fa fa-digg" data-content="<i class='fa fa-digg'></i> fa fa-digg" <?=(($d[0]["idicon"]=="fa fa-digg")?'selected':'')?>></option>
									<option value="fa fa-pied-piper-pp" data-content="<i class='fa fa-pied-piper-pp'></i> fa fa-pied-piper-pp" <?=(($d[0]["idicon"]=="fa fa-pied-piper-pp")?'selected':'')?>></option>
									<option value="fa fa-pied-piper-alt" data-content="<i class='fa fa-pied-piper-alt'></i> fa fa-pied-piper-alt" <?=(($d[0]["idicon"]=="fa fa-pied-piper-alt")?'selected':'')?>></option>
									<option value="fa fa-drupal" data-content="<i class='fa fa-drupal'></i> fa fa-drupal" <?=(($d[0]["idicon"]=="fa fa-drupal")?'selected':'')?>></option>
									<option value="fa fa-joomla" data-content="<i class='fa fa-joomla'></i> fa fa-joomla" <?=(($d[0]["idicon"]=="fa fa-joomla")?'selected':'')?>></option>
									<option value="fa fa-language" data-content="<i class='fa fa-language'></i> fa fa-language" <?=(($d[0]["idicon"]=="fa fa-language")?'selected':'')?>></option>
									<option value="fa fa-fax" data-content="<i class='fa fa-fax'></i> fa fa-fax" <?=(($d[0]["idicon"]=="fa fa-fax")?'selected':'')?>></option>
									<option value="fa fa-building" data-content="<i class='fa fa-building'></i> fa fa-building" <?=(($d[0]["idicon"]=="fa fa-building")?'selected':'')?>></option>
									<option value="fa fa-child" data-content="<i class='fa fa-child'></i> fa fa-child" <?=(($d[0]["idicon"]=="fa fa-child")?'selected':'')?>></option>
									<option value="fa fa-paw" data-content="<i class='fa fa-paw'></i> fa fa-paw" <?=(($d[0]["idicon"]=="fa fa-paw")?'selected':'')?>></option>
									<option value="fa fa-spoon" data-content="<i class='fa fa-spoon'></i> fa fa-spoon" <?=(($d[0]["idicon"]=="fa fa-spoon")?'selected':'')?>></option>
									<option value="fa fa-cube" data-content="<i class='fa fa-cube'></i> fa fa-cube" <?=(($d[0]["idicon"]=="fa fa-cube")?'selected':'')?>></option>
									<option value="fa fa-cubes" data-content="<i class='fa fa-cubes'></i> fa fa-cubes" <?=(($d[0]["idicon"]=="fa fa-cubes")?'selected':'')?>></option>
									<option value="fa fa-behance" data-content="<i class='fa fa-behance'></i> fa fa-behance" <?=(($d[0]["idicon"]=="fa fa-behance")?'selected':'')?>></option>
									<option value="fa fa-behance-square" data-content="<i class='fa fa-behance-square'></i> fa fa-behance-square" <?=(($d[0]["idicon"]=="fa fa-behance-square")?'selected':'')?>></option>
									<option value="fa fa-steam" data-content="<i class='fa fa-steam'></i> fa fa-steam" <?=(($d[0]["idicon"]=="fa fa-steam")?'selected':'')?>></option>
									<option value="fa fa-steam-square" data-content="<i class='fa fa-steam-square'></i> fa fa-steam-square" <?=(($d[0]["idicon"]=="fa fa-steam-square")?'selected':'')?>></option>
									<option value="fa fa-recycle" data-content="<i class='fa fa-recycle'></i> fa fa-recycle" <?=(($d[0]["idicon"]=="fa fa-recycle")?'selected':'')?>></option>
									<option value="fa fa-automobile" data-content="<i class='fa fa-automobile'></i> fa fa-automobile" <?=(($d[0]["idicon"]=="fa fa-automobile")?'selected':'')?>></option>
									<option value="fa fa-car" data-content="<i class='fa fa-car'></i> fa fa-car" <?=(($d[0]["idicon"]=="fa fa-car")?'selected':'')?>></option>
									<option value="fa fa-cab" data-content="<i class='fa fa-cab'></i> fa fa-cab" <?=(($d[0]["idicon"]=="fa fa-cab")?'selected':'')?>></option>
									<option value="fa fa-taxi" data-content="<i class='fa fa-taxi'></i> fa fa-taxi" <?=(($d[0]["idicon"]=="fa fa-taxi")?'selected':'')?>></option>
									<option value="fa fa-tree" data-content="<i class='fa fa-tree'></i> fa fa-tree" <?=(($d[0]["idicon"]=="fa fa-tree")?'selected':'')?>></option>
									<option value="fa fa-spotify" data-content="<i class='fa fa-spotify'></i> fa fa-spotify" <?=(($d[0]["idicon"]=="fa fa-spotify")?'selected':'')?>></option>
									<option value="fa fa-deviantart" data-content="<i class='fa fa-deviantart'></i> fa fa-deviantart" <?=(($d[0]["idicon"]=="fa fa-deviantart")?'selected':'')?>></option>
									<option value="fa fa-soundcloud" data-content="<i class='fa fa-soundcloud'></i> fa fa-soundcloud" <?=(($d[0]["idicon"]=="fa fa-soundcloud")?'selected':'')?>></option>
									<option value="fa fa-database" data-content="<i class='fa fa-database'></i> fa fa-database" <?=(($d[0]["idicon"]=="fa fa-database")?'selected':'')?>></option>
									<option value="fa fa-file-pdf-o" data-content="<i class='fa fa-file-pdf-o'></i> fa fa-file-pdf-o" <?=(($d[0]["idicon"]=="fa fa-file-pdf-o")?'selected':'')?>></option>
									<option value="fa fa-file-word-o" data-content="<i class='fa fa-file-word-o'></i> fa fa-file-word-o" <?=(($d[0]["idicon"]=="fa fa-file-word-o")?'selected':'')?>></option>
									<option value="fa fa-file-excel-o" data-content="<i class='fa fa-file-excel-o'></i> fa fa-file-excel-o" <?=(($d[0]["idicon"]=="fa fa-file-excel-o")?'selected':'')?>></option>
									<option value="fa fa-file-powerpoint-o" data-content="<i class='fa fa-file-powerpoint-o'></i> fa fa-file-powerpoint-o" <?=(($d[0]["idicon"]=="fa fa-file-powerpoint-o")?'selected':'')?>></option>
									<option value="fa fa-file-photo-o" data-content="<i class='fa fa-file-photo-o'></i> fa fa-file-photo-o" <?=(($d[0]["idicon"]=="fa fa-file-photo-o")?'selected':'')?>></option>
									<option value="fa fa-file-picture-o" data-content="<i class='fa fa-file-picture-o'></i> fa fa-file-picture-o" <?=(($d[0]["idicon"]=="fa fa-file-picture-o")?'selected':'')?>></option>
									<option value="fa fa-file-image-o" data-content="<i class='fa fa-file-image-o'></i> fa fa-file-image-o" <?=(($d[0]["idicon"]=="fa fa-file-image-o")?'selected':'')?>></option>
									<option value="fa fa-file-zip-o" data-content="<i class='fa fa-file-zip-o'></i> fa fa-file-zip-o" <?=(($d[0]["idicon"]=="fa fa-file-zip-o")?'selected':'')?>></option>
									<option value="fa fa-file-archive-o" data-content="<i class='fa fa-file-archive-o'></i> fa fa-file-archive-o" <?=(($d[0]["idicon"]=="fa fa-file-archive-o")?'selected':'')?>></option>
									<option value="fa fa-file-sound-o" data-content="<i class='fa fa-file-sound-o'></i> fa fa-file-sound-o" <?=(($d[0]["idicon"]=="fa fa-file-sound-o")?'selected':'')?>></option>
									<option value="fa fa-file-audio-o" data-content="<i class='fa fa-file-audio-o'></i> fa fa-file-audio-o" <?=(($d[0]["idicon"]=="fa fa-file-audio-o")?'selected':'')?>></option>
									<option value="fa fa-file-movie-o" data-content="<i class='fa fa-file-movie-o'></i> fa fa-file-movie-o" <?=(($d[0]["idicon"]=="fa fa-file-movie-o")?'selected':'')?>></option>
									<option value="fa fa-file-video-o" data-content="<i class='fa fa-file-video-o'></i> fa fa-file-video-o" <?=(($d[0]["idicon"]=="fa fa-file-video-o")?'selected':'')?>></option>
									<option value="fa fa-file-code-o" data-content="<i class='fa fa-file-code-o'></i> fa fa-file-code-o" <?=(($d[0]["idicon"]=="fa fa-file-code-o")?'selected':'')?>></option>
									<option value="fa fa-vine" data-content="<i class='fa fa-vine'></i> fa fa-vine" <?=(($d[0]["idicon"]=="fa fa-vine")?'selected':'')?>></option>
									<option value="fa fa-codepen" data-content="<i class='fa fa-codepen'></i> fa fa-codepen" <?=(($d[0]["idicon"]=="fa fa-codepen")?'selected':'')?>></option>
									<option value="fa fa-jsfiddle" data-content="<i class='fa fa-jsfiddle'></i> fa fa-jsfiddle" <?=(($d[0]["idicon"]=="fa fa-jsfiddle")?'selected':'')?>></option>
									<option value="fa fa-life-bouy" data-content="<i class='fa fa-life-bouy'></i> fa fa-life-bouy" <?=(($d[0]["idicon"]=="fa fa-life-bouy")?'selected':'')?>></option>
									<option value="fa fa-life-buoy" data-content="<i class='fa fa-life-buoy'></i> fa fa-life-buoy" <?=(($d[0]["idicon"]=="fa fa-life-buoy")?'selected':'')?>></option>
									<option value="fa fa-life-saver" data-content="<i class='fa fa-life-saver'></i> fa fa-life-saver" <?=(($d[0]["idicon"]=="fa fa-life-saver")?'selected':'')?>></option>
									<option value="fa fa-support" data-content="<i class='fa fa-support'></i> fa fa-support" <?=(($d[0]["idicon"]=="fa fa-support")?'selected':'')?>></option>
									<option value="fa fa-life-ring" data-content="<i class='fa fa-life-ring'></i> fa fa-life-ring" <?=(($d[0]["idicon"]=="fa fa-life-ring")?'selected':'')?>></option>
									<option value="fa fa-circle-o-notch" data-content="<i class='fa fa-circle-o-notch'></i> fa fa-circle-o-notch" <?=(($d[0]["idicon"]=="fa fa-circle-o-notch")?'selected':'')?>></option>
									<option value="fa fa-ra" data-content="<i class='fa fa-ra'></i> fa fa-ra" <?=(($d[0]["idicon"]=="fa fa-ra")?'selected':'')?>></option>
									<option value="fa fa-resistance" data-content="<i class='fa fa-resistance'></i> fa fa-resistance" <?=(($d[0]["idicon"]=="fa fa-resistance")?'selected':'')?>></option>
									<option value="fa fa-rebel" data-content="<i class='fa fa-rebel'></i> fa fa-rebel" <?=(($d[0]["idicon"]=="fa fa-rebel")?'selected':'')?>></option>
									<option value="fa fa-ge" data-content="<i class='fa fa-ge'></i> fa fa-ge" <?=(($d[0]["idicon"]=="fa fa-ge")?'selected':'')?>></option>
									<option value="fa fa-empire" data-content="<i class='fa fa-empire'></i> fa fa-empire" <?=(($d[0]["idicon"]=="fa fa-empire")?'selected':'')?>></option>
									<option value="fa fa-git-square" data-content="<i class='fa fa-git-square'></i> fa fa-git-square" <?=(($d[0]["idicon"]=="fa fa-git-square")?'selected':'')?>></option>
									<option value="fa fa-git" data-content="<i class='fa fa-git'></i> fa fa-git" <?=(($d[0]["idicon"]=="fa fa-git")?'selected':'')?>></option>
									<option value="fa fa-y-combinator-square" data-content="<i class='fa fa-y-combinator-square'></i> fa fa-y-combinator-square" <?=(($d[0]["idicon"]=="fa fa-y-combinator-square")?'selected':'')?>></option>
									<option value="fa fa-yc-square" data-content="<i class='fa fa-yc-square'></i> fa fa-yc-square" <?=(($d[0]["idicon"]=="fa fa-yc-square")?'selected':'')?>></option>
									<option value="fa fa-hacker-news" data-content="<i class='fa fa-hacker-news'></i> fa fa-hacker-news" <?=(($d[0]["idicon"]=="fa fa-hacker-news")?'selected':'')?>></option>
									<option value="fa fa-tencent-weibo" data-content="<i class='fa fa-tencent-weibo'></i> fa fa-tencent-weibo" <?=(($d[0]["idicon"]=="fa fa-tencent-weibo")?'selected':'')?>></option>
									<option value="fa fa-qq" data-content="<i class='fa fa-qq'></i> fa fa-qq" <?=(($d[0]["idicon"]=="fa fa-qq")?'selected':'')?>></option>
									<option value="fa fa-wechat" data-content="<i class='fa fa-wechat'></i> fa fa-wechat" <?=(($d[0]["idicon"]=="fa fa-wechat")?'selected':'')?>></option>
									<option value="fa fa-weixin" data-content="<i class='fa fa-weixin'></i> fa fa-weixin" <?=(($d[0]["idicon"]=="fa fa-weixin")?'selected':'')?>></option>
									<option value="fa fa-send" data-content="<i class='fa fa-send'></i> fa fa-send" <?=(($d[0]["idicon"]=="fa fa-send")?'selected':'')?>></option>
									<option value="fa fa-paper-plane" data-content="<i class='fa fa-paper-plane'></i> fa fa-paper-plane" <?=(($d[0]["idicon"]=="fa fa-paper-plane")?'selected':'')?>></option>
									<option value="fa fa-send-o" data-content="<i class='fa fa-send-o'></i> fa fa-send-o" <?=(($d[0]["idicon"]=="fa fa-send-o")?'selected':'')?>></option>
									<option value="fa fa-paper-plane-o" data-content="<i class='fa fa-paper-plane-o'></i> fa fa-paper-plane-o" <?=(($d[0]["idicon"]=="fa fa-paper-plane-o")?'selected':'')?>></option>
									<option value="fa fa-history" data-content="<i class='fa fa-history'></i> fa fa-history" <?=(($d[0]["idicon"]=="fa fa-history")?'selected':'')?>></option>
									<option value="fa fa-circle-thin" data-content="<i class='fa fa-circle-thin'></i> fa fa-circle-thin" <?=(($d[0]["idicon"]=="fa fa-circle-thin")?'selected':'')?>></option>
									<option value="fa fa-header" data-content="<i class='fa fa-header'></i> fa fa-header" <?=(($d[0]["idicon"]=="fa fa-header")?'selected':'')?>></option>
									<option value="fa fa-paragraph" data-content="<i class='fa fa-paragraph'></i> fa fa-paragraph" <?=(($d[0]["idicon"]=="fa fa-paragraph")?'selected':'')?>></option>
									<option value="fa fa-sliders" data-content="<i class='fa fa-sliders'></i> fa fa-sliders" <?=(($d[0]["idicon"]=="fa fa-sliders")?'selected':'')?>></option>
									<option value="fa fa-share-alt" data-content="<i class='fa fa-share-alt'></i> fa fa-share-alt" <?=(($d[0]["idicon"]=="fa fa-share-alt")?'selected':'')?>></option>
									<option value="fa fa-share-alt-square" data-content="<i class='fa fa-share-alt-square'></i> fa fa-share-alt-square" <?=(($d[0]["idicon"]=="fa fa-share-alt-square")?'selected':'')?>></option>
									<option value="fa fa-bomb" data-content="<i class='fa fa-bomb'></i> fa fa-bomb" <?=(($d[0]["idicon"]=="fa fa-bomb")?'selected':'')?>></option>
									<option value="fa fa-soccer-ball-o" data-content="<i class='fa fa-soccer-ball-o'></i> fa fa-soccer-ball-o" <?=(($d[0]["idicon"]=="fa fa-soccer-ball-o")?'selected':'')?>></option>
									<option value="fa fa-futbol-o" data-content="<i class='fa fa-futbol-o'></i> fa fa-futbol-o" <?=(($d[0]["idicon"]=="fa fa-futbol-o")?'selected':'')?>></option>
									<option value="fa fa-tty" data-content="<i class='fa fa-tty'></i> fa fa-tty" <?=(($d[0]["idicon"]=="fa fa-tty")?'selected':'')?>></option>
									<option value="fa fa-binoculars" data-content="<i class='fa fa-binoculars'></i> fa fa-binoculars" <?=(($d[0]["idicon"]=="fa fa-binoculars")?'selected':'')?>></option>
									<option value="fa fa-plug" data-content="<i class='fa fa-plug'></i> fa fa-plug" <?=(($d[0]["idicon"]=="fa fa-plug")?'selected':'')?>></option>
									<option value="fa fa-slideshare" data-content="<i class='fa fa-slideshare'></i> fa fa-slideshare" <?=(($d[0]["idicon"]=="fa fa-slideshare")?'selected':'')?>></option>
									<option value="fa fa-twitch" data-content="<i class='fa fa-twitch'></i> fa fa-twitch" <?=(($d[0]["idicon"]=="fa fa-twitch")?'selected':'')?>></option>
									<option value="fa fa-yelp" data-content="<i class='fa fa-yelp'></i> fa fa-yelp" <?=(($d[0]["idicon"]=="fa fa-yelp")?'selected':'')?>></option>
									<option value="fa fa-newspaper-o" data-content="<i class='fa fa-newspaper-o'></i> fa fa-newspaper-o" <?=(($d[0]["idicon"]=="fa fa-newspaper-o")?'selected':'')?>></option>
									<option value="fa fa-wifi" data-content="<i class='fa fa-wifi'></i> fa fa-wifi" <?=(($d[0]["idicon"]=="fa fa-wifi")?'selected':'')?>></option>
									<option value="fa fa-calculator" data-content="<i class='fa fa-calculator'></i> fa fa-calculator" <?=(($d[0]["idicon"]=="fa fa-calculator")?'selected':'')?>></option>
									<option value="fa fa-paypal" data-content="<i class='fa fa-paypal'></i> fa fa-paypal" <?=(($d[0]["idicon"]=="fa fa-paypal")?'selected':'')?>></option>
									<option value="fa fa-google-wallet" data-content="<i class='fa fa-google-wallet'></i> fa fa-google-wallet" <?=(($d[0]["idicon"]=="fa fa-google-wallet")?'selected':'')?>></option>
									<option value="fa fa-cc-visa" data-content="<i class='fa fa-cc-visa'></i> fa fa-cc-visa" <?=(($d[0]["idicon"]=="fa fa-cc-visa")?'selected':'')?>></option>
									<option value="fa fa-cc-mastercard" data-content="<i class='fa fa-cc-mastercard'></i> fa fa-cc-mastercard" <?=(($d[0]["idicon"]=="fa fa-cc-mastercard")?'selected':'')?>></option>
									<option value="fa fa-cc-discover" data-content="<i class='fa fa-cc-discover'></i> fa fa-cc-discover" <?=(($d[0]["idicon"]=="fa fa-cc-discover")?'selected':'')?>></option>
									<option value="fa fa-cc-amex" data-content="<i class='fa fa-cc-amex'></i> fa fa-cc-amex" <?=(($d[0]["idicon"]=="fa fa-cc-amex")?'selected':'')?>></option>
									<option value="fa fa-cc-paypal" data-content="<i class='fa fa-cc-paypal'></i> fa fa-cc-paypal" <?=(($d[0]["idicon"]=="fa fa-cc-paypal")?'selected':'')?>></option>
									<option value="fa fa-cc-stripe" data-content="<i class='fa fa-cc-stripe'></i> fa fa-cc-stripe" <?=(($d[0]["idicon"]=="fa fa-cc-stripe")?'selected':'')?>></option>
									<option value="fa fa-bell-slash" data-content="<i class='fa fa-bell-slash'></i> fa fa-bell-slash" <?=(($d[0]["idicon"]=="fa fa-bell-slash")?'selected':'')?>></option>
									<option value="fa fa-bell-slash-o" data-content="<i class='fa fa-bell-slash-o'></i> fa fa-bell-slash-o" <?=(($d[0]["idicon"]=="fa fa-bell-slash-o")?'selected':'')?>></option>
									<option value="fa fa-trash" data-content="<i class='fa fa-trash'></i> fa fa-trash" <?=(($d[0]["idicon"]=="fa fa-trash")?'selected':'')?>></option>
									<option value="fa fa-copyright" data-content="<i class='fa fa-copyright'></i> fa fa-copyright" <?=(($d[0]["idicon"]=="fa fa-copyright")?'selected':'')?>></option>
									<option value="fa fa-at" data-content="<i class='fa fa-at'></i> fa fa-at" <?=(($d[0]["idicon"]=="fa fa-at")?'selected':'')?>></option>
									<option value="fa fa-eyedropper" data-content="<i class='fa fa-eyedropper'></i> fa fa-eyedropper" <?=(($d[0]["idicon"]=="fa fa-eyedropper")?'selected':'')?>></option>
									<option value="fa fa-paint-brush" data-content="<i class='fa fa-paint-brush'></i> fa fa-paint-brush" <?=(($d[0]["idicon"]=="fa fa-paint-brush")?'selected':'')?>></option>
									<option value="fa fa-birthday-cake" data-content="<i class='fa fa-birthday-cake'></i> fa fa-birthday-cake" <?=(($d[0]["idicon"]=="fa fa-birthday-cake")?'selected':'')?>></option>
									<option value="fa fa-area-chart" data-content="<i class='fa fa-area-chart'></i> fa fa-area-chart" <?=(($d[0]["idicon"]=="fa fa-area-chart")?'selected':'')?>></option>
									<option value="fa fa-pie-chart" data-content="<i class='fa fa-pie-chart'></i> fa fa-pie-chart" <?=(($d[0]["idicon"]=="fa fa-pie-chart")?'selected':'')?>></option>
									<option value="fa fa-line-chart" data-content="<i class='fa fa-line-chart'></i> fa fa-line-chart" <?=(($d[0]["idicon"]=="fa fa-line-chart")?'selected':'')?>></option>
									<option value="fa fa-lastfm" data-content="<i class='fa fa-lastfm'></i> fa fa-lastfm" <?=(($d[0]["idicon"]=="fa fa-lastfm")?'selected':'')?>></option>
									<option value="fa fa-lastfm-square" data-content="<i class='fa fa-lastfm-square'></i> fa fa-lastfm-square" <?=(($d[0]["idicon"]=="fa fa-lastfm-square")?'selected':'')?>></option>
									<option value="fa fa-toggle-off" data-content="<i class='fa fa-toggle-off'></i> fa fa-toggle-off" <?=(($d[0]["idicon"]=="fa fa-toggle-off")?'selected':'')?>></option>
									<option value="fa fa-toggle-on" data-content="<i class='fa fa-toggle-on'></i> fa fa-toggle-on" <?=(($d[0]["idicon"]=="fa fa-toggle-on")?'selected':'')?>></option>
									<option value="fa fa-bicycle" data-content="<i class='fa fa-bicycle'></i> fa fa-bicycle" <?=(($d[0]["idicon"]=="fa fa-bicycle")?'selected':'')?>></option>
									<option value="fa fa-bus" data-content="<i class='fa fa-bus'></i> fa fa-bus" <?=(($d[0]["idicon"]=="fa fa-bus")?'selected':'')?>></option>
									<option value="fa fa-ioxhost" data-content="<i class='fa fa-ioxhost'></i> fa fa-ioxhost" <?=(($d[0]["idicon"]=="fa fa-ioxhost")?'selected':'')?>></option>
									<option value="fa fa-angellist" data-content="<i class='fa fa-angellist'></i> fa fa-angellist" <?=(($d[0]["idicon"]=="fa fa-angellist")?'selected':'')?>></option>
									<option value="fa fa-cc" data-content="<i class='fa fa-cc'></i> fa fa-cc" <?=(($d[0]["idicon"]=="fa fa-cc")?'selected':'')?>></option>
									<option value="fa fa-shekel" data-content="<i class='fa fa-shekel'></i> fa fa-shekel" <?=(($d[0]["idicon"]=="fa fa-shekel")?'selected':'')?>></option>
									<option value="fa fa-sheqel" data-content="<i class='fa fa-sheqel'></i> fa fa-sheqel" <?=(($d[0]["idicon"]=="fa fa-sheqel")?'selected':'')?>></option>
									<option value="fa fa-ils" data-content="<i class='fa fa-ils'></i> fa fa-ils" <?=(($d[0]["idicon"]=="fa fa-ils")?'selected':'')?>></option>
									<option value="fa fa-meanpath" data-content="<i class='fa fa-meanpath'></i> fa fa-meanpath" <?=(($d[0]["idicon"]=="fa fa-meanpath")?'selected':'')?>></option>
									<option value="fa fa-buysellads" data-content="<i class='fa fa-buysellads'></i> fa fa-buysellads" <?=(($d[0]["idicon"]=="fa fa-buysellads")?'selected':'')?>></option>
									<option value="fa fa-connectdevelop" data-content="<i class='fa fa-connectdevelop'></i> fa fa-connectdevelop" <?=(($d[0]["idicon"]=="fa fa-connectdevelop")?'selected':'')?>></option>
									<option value="fa fa-dashcube" data-content="<i class='fa fa-dashcube'></i> fa fa-dashcube" <?=(($d[0]["idicon"]=="fa fa-dashcube")?'selected':'')?>></option>
									<option value="fa fa-forumbee" data-content="<i class='fa fa-forumbee'></i> fa fa-forumbee" <?=(($d[0]["idicon"]=="fa fa-forumbee")?'selected':'')?>></option>
									<option value="fa fa-leanpub" data-content="<i class='fa fa-leanpub'></i> fa fa-leanpub" <?=(($d[0]["idicon"]=="fa fa-leanpub")?'selected':'')?>></option>
									<option value="fa fa-sellsy" data-content="<i class='fa fa-sellsy'></i> fa fa-sellsy" <?=(($d[0]["idicon"]=="fa fa-sellsy")?'selected':'')?>></option>
									<option value="fa fa-shirtsinbulk" data-content="<i class='fa fa-shirtsinbulk'></i> fa fa-shirtsinbulk" <?=(($d[0]["idicon"]=="fa fa-shirtsinbulk")?'selected':'')?>></option>
									<option value="fa fa-simplybuilt" data-content="<i class='fa fa-simplybuilt'></i> fa fa-simplybuilt" <?=(($d[0]["idicon"]=="fa fa-simplybuilt")?'selected':'')?>></option>
									<option value="fa fa-skyatlas" data-content="<i class='fa fa-skyatlas'></i> fa fa-skyatlas" <?=(($d[0]["idicon"]=="fa fa-skyatlas")?'selected':'')?>></option>
									<option value="fa fa-cart-plus" data-content="<i class='fa fa-cart-plus'></i> fa fa-cart-plus" <?=(($d[0]["idicon"]=="fa fa-cart-plus")?'selected':'')?>></option>
									<option value="fa fa-cart-arrow-down" data-content="<i class='fa fa-cart-arrow-down'></i> fa fa-cart-arrow-down" <?=(($d[0]["idicon"]=="fa fa-cart-arrow-down")?'selected':'')?>></option>
									<option value="fa fa-diamond" data-content="<i class='fa fa-diamond'></i> fa fa-diamond" <?=(($d[0]["idicon"]=="fa fa-diamond")?'selected':'')?>></option>
									<option value="fa fa-ship" data-content="<i class='fa fa-ship'></i> fa fa-ship" <?=(($d[0]["idicon"]=="fa fa-ship")?'selected':'')?>></option>
									<option value="fa fa-user-secret" data-content="<i class='fa fa-user-secret'></i> fa fa-user-secret" <?=(($d[0]["idicon"]=="fa fa-user-secret")?'selected':'')?>></option>
									<option value="fa fa-motorcycle" data-content="<i class='fa fa-motorcycle'></i> fa fa-motorcycle" <?=(($d[0]["idicon"]=="fa fa-motorcycle")?'selected':'')?>></option>
									<option value="fa fa-street-view" data-content="<i class='fa fa-street-view'></i> fa fa-street-view" <?=(($d[0]["idicon"]=="fa fa-street-view")?'selected':'')?>></option>
									<option value="fa fa-heartbeat" data-content="<i class='fa fa-heartbeat'></i> fa fa-heartbeat" <?=(($d[0]["idicon"]=="fa fa-heartbeat")?'selected':'')?>></option>
									<option value="fa fa-venus" data-content="<i class='fa fa-venus'></i> fa fa-venus" <?=(($d[0]["idicon"]=="fa fa-venus")?'selected':'')?>></option>
									<option value="fa fa-mars" data-content="<i class='fa fa-mars'></i> fa fa-mars" <?=(($d[0]["idicon"]=="fa fa-mars")?'selected':'')?>></option>
									<option value="fa fa-mercury" data-content="<i class='fa fa-mercury'></i> fa fa-mercury" <?=(($d[0]["idicon"]=="fa fa-mercury")?'selected':'')?>></option>
									<option value="fa fa-intersex" data-content="<i class='fa fa-intersex'></i> fa fa-intersex" <?=(($d[0]["idicon"]=="fa fa-intersex")?'selected':'')?>></option>
									<option value="fa fa-transgender" data-content="<i class='fa fa-transgender'></i> fa fa-transgender" <?=(($d[0]["idicon"]=="fa fa-transgender")?'selected':'')?>></option>
									<option value="fa fa-transgender-alt" data-content="<i class='fa fa-transgender-alt'></i> fa fa-transgender-alt" <?=(($d[0]["idicon"]=="fa fa-transgender-alt")?'selected':'')?>></option>
									<option value="fa fa-venus-double" data-content="<i class='fa fa-venus-double'></i> fa fa-venus-double" <?=(($d[0]["idicon"]=="fa fa-venus-double")?'selected':'')?>></option>
									<option value="fa fa-mars-double" data-content="<i class='fa fa-mars-double'></i> fa fa-mars-double" <?=(($d[0]["idicon"]=="fa fa-mars-double")?'selected':'')?>></option>
									<option value="fa fa-venus-mars" data-content="<i class='fa fa-venus-mars'></i> fa fa-venus-mars" <?=(($d[0]["idicon"]=="fa fa-venus-mars")?'selected':'')?>></option>
									<option value="fa fa-mars-stroke" data-content="<i class='fa fa-mars-stroke'></i> fa fa-mars-stroke" <?=(($d[0]["idicon"]=="fa fa-mars-stroke")?'selected':'')?>></option>
									<option value="fa fa-mars-stroke-v" data-content="<i class='fa fa-mars-stroke-v'></i> fa fa-mars-stroke-v" <?=(($d[0]["idicon"]=="fa fa-mars-stroke-v")?'selected':'')?>></option>
									<option value="fa fa-mars-stroke-h" data-content="<i class='fa fa-mars-stroke-h'></i> fa fa-mars-stroke-h" <?=(($d[0]["idicon"]=="fa fa-mars-stroke-h")?'selected':'')?>></option>
									<option value="fa fa-neuter" data-content="<i class='fa fa-neuter'></i> fa fa-neuter" <?=(($d[0]["idicon"]=="fa fa-neuter")?'selected':'')?>></option>
									<option value="fa fa-genderless" data-content="<i class='fa fa-genderless'></i> fa fa-genderless" <?=(($d[0]["idicon"]=="fa fa-genderless")?'selected':'')?>></option>
									<option value="fa fa-facebook-official" data-content="<i class='fa fa-facebook-official'></i> fa fa-facebook-official" <?=(($d[0]["idicon"]=="fa fa-facebook-official")?'selected':'')?>></option>
									<option value="fa fa-pinterest-p" data-content="<i class='fa fa-pinterest-p'></i> fa fa-pinterest-p" <?=(($d[0]["idicon"]=="fa fa-pinterest-p")?'selected':'')?>></option>
									<option value="fa fa-whatsapp" data-content="<i class='fa fa-whatsapp'></i> fa fa-whatsapp" <?=(($d[0]["idicon"]=="fa fa-whatsapp")?'selected':'')?>></option>
									<option value="fa fa-server" data-content="<i class='fa fa-server'></i> fa fa-server" <?=(($d[0]["idicon"]=="fa fa-server")?'selected':'')?>></option>
									<option value="fa fa-user-plus" data-content="<i class='fa fa-user-plus'></i> fa fa-user-plus" <?=(($d[0]["idicon"]=="fa fa-user-plus")?'selected':'')?>></option>
									<option value="fa fa-user-times" data-content="<i class='fa fa-user-times'></i> fa fa-user-times" <?=(($d[0]["idicon"]=="fa fa-user-times")?'selected':'')?>></option>
									<option value="fa fa-hotel" data-content="<i class='fa fa-hotel'></i> fa fa-hotel" <?=(($d[0]["idicon"]=="fa fa-hotel")?'selected':'')?>></option>
									<option value="fa fa-bed" data-content="<i class='fa fa-bed'></i> fa fa-bed" <?=(($d[0]["idicon"]=="fa fa-bed")?'selected':'')?>></option>
									<option value="fa fa-viacoin" data-content="<i class='fa fa-viacoin'></i> fa fa-viacoin" <?=(($d[0]["idicon"]=="fa fa-viacoin")?'selected':'')?>></option>
									<option value="fa fa-train" data-content="<i class='fa fa-train'></i> fa fa-train" <?=(($d[0]["idicon"]=="fa fa-train")?'selected':'')?>></option>
									<option value="fa fa-subway" data-content="<i class='fa fa-subway'></i> fa fa-subway" <?=(($d[0]["idicon"]=="fa fa-subway")?'selected':'')?>></option>
									<option value="fa fa-medium" data-content="<i class='fa fa-medium'></i> fa fa-medium" <?=(($d[0]["idicon"]=="fa fa-medium")?'selected':'')?>></option>
									<option value="fa fa-yc" data-content="<i class='fa fa-yc'></i> fa fa-yc" <?=(($d[0]["idicon"]=="fa fa-yc")?'selected':'')?>></option>
									<option value="fa fa-y-combinator" data-content="<i class='fa fa-y-combinator'></i> fa fa-y-combinator" <?=(($d[0]["idicon"]=="fa fa-y-combinator")?'selected':'')?>></option>
									<option value="fa fa-optin-monster" data-content="<i class='fa fa-optin-monster'></i> fa fa-optin-monster" <?=(($d[0]["idicon"]=="fa fa-optin-monster")?'selected':'')?>></option>
									<option value="fa fa-opencart" data-content="<i class='fa fa-opencart'></i> fa fa-opencart" <?=(($d[0]["idicon"]=="fa fa-opencart")?'selected':'')?>></option>
									<option value="fa fa-expeditedssl" data-content="<i class='fa fa-expeditedssl'></i> fa fa-expeditedssl" <?=(($d[0]["idicon"]=="fa fa-expeditedssl")?'selected':'')?>></option>
									<option value="fa fa-battery-4" data-content="<i class='fa fa-battery-4'></i> fa fa-battery-4" <?=(($d[0]["idicon"]=="fa fa-battery-4")?'selected':'')?>></option>
									<option value="fa fa-battery-full" data-content="<i class='fa fa-battery-full'></i> fa fa-battery-full" <?=(($d[0]["idicon"]=="fa fa-battery-full")?'selected':'')?>></option>
									<option value="fa fa-battery-3" data-content="<i class='fa fa-battery-3'></i> fa fa-battery-3" <?=(($d[0]["idicon"]=="fa fa-battery-3")?'selected':'')?>></option>
									<option value="fa fa-battery-three-quarters" data-content="<i class='fa fa-battery-three-quarters'></i> fa fa-battery-three-quarters" <?=(($d[0]["idicon"]=="fa fa-battery-three-quarters")?'selected':'')?>></option>
									<option value="fa fa-battery-2" data-content="<i class='fa fa-battery-2'></i> fa fa-battery-2" <?=(($d[0]["idicon"]=="fa fa-battery-2")?'selected':'')?>></option>
									<option value="fa fa-battery-half" data-content="<i class='fa fa-battery-half'></i> fa fa-battery-half" <?=(($d[0]["idicon"]=="fa fa-battery-half")?'selected':'')?>></option>
									<option value="fa fa-battery-1" data-content="<i class='fa fa-battery-1'></i> fa fa-battery-1" <?=(($d[0]["idicon"]=="fa fa-battery-1")?'selected':'')?>></option>
									<option value="fa fa-battery-quarter" data-content="<i class='fa fa-battery-quarter'></i> fa fa-battery-quarter" <?=(($d[0]["idicon"]=="fa fa-battery-quarter")?'selected':'')?>></option>
									<option value="fa fa-battery-0" data-content="<i class='fa fa-battery-0'></i> fa fa-battery-0" <?=(($d[0]["idicon"]=="fa fa-battery-0")?'selected':'')?>></option>
									<option value="fa fa-battery-empty" data-content="<i class='fa fa-battery-empty'></i> fa fa-battery-empty" <?=(($d[0]["idicon"]=="fa fa-battery-empty")?'selected':'')?>></option>
									<option value="fa fa-mouse-pointer" data-content="<i class='fa fa-mouse-pointer'></i> fa fa-mouse-pointer" <?=(($d[0]["idicon"]=="fa fa-mouse-pointer")?'selected':'')?>></option>
									<option value="fa fa-i-cursor" data-content="<i class='fa fa-i-cursor'></i> fa fa-i-cursor" <?=(($d[0]["idicon"]=="fa fa-i-cursor")?'selected':'')?>></option>
									<option value="fa fa-object-group" data-content="<i class='fa fa-object-group'></i> fa fa-object-group" <?=(($d[0]["idicon"]=="fa fa-object-group")?'selected':'')?>></option>
									<option value="fa fa-object-ungroup" data-content="<i class='fa fa-object-ungroup'></i> fa fa-object-ungroup" <?=(($d[0]["idicon"]=="fa fa-object-ungroup")?'selected':'')?>></option>
									<option value="fa fa-sticky-note" data-content="<i class='fa fa-sticky-note'></i> fa fa-sticky-note" <?=(($d[0]["idicon"]=="fa fa-sticky-note")?'selected':'')?>></option>
									<option value="fa fa-sticky-note-o" data-content="<i class='fa fa-sticky-note-o'></i> fa fa-sticky-note-o" <?=(($d[0]["idicon"]=="fa fa-sticky-note-o")?'selected':'')?>></option>
									<option value="fa fa-cc-jcb" data-content="<i class='fa fa-cc-jcb'></i> fa fa-cc-jcb" <?=(($d[0]["idicon"]=="fa fa-cc-jcb")?'selected':'')?>></option>
									<option value="fa fa-cc-diners-club" data-content="<i class='fa fa-cc-diners-club'></i> fa fa-cc-diners-club" <?=(($d[0]["idicon"]=="fa fa-cc-diners-club")?'selected':'')?>></option>
									<option value="fa fa-clone" data-content="<i class='fa fa-clone'></i> fa fa-clone" <?=(($d[0]["idicon"]=="fa fa-clone")?'selected':'')?>></option>
									<option value="fa fa-balance-scale" data-content="<i class='fa fa-balance-scale'></i> fa fa-balance-scale" <?=(($d[0]["idicon"]=="fa fa-balance-scale")?'selected':'')?>></option>
									<option value="fa fa-hourglass-o" data-content="<i class='fa fa-hourglass-o'></i> fa fa-hourglass-o" <?=(($d[0]["idicon"]=="fa fa-hourglass-o")?'selected':'')?>></option>
									<option value="fa fa-hourglass-1" data-content="<i class='fa fa-hourglass-1'></i> fa fa-hourglass-1" <?=(($d[0]["idicon"]=="fa fa-hourglass-1")?'selected':'')?>></option>
									<option value="fa fa-hourglass-start" data-content="<i class='fa fa-hourglass-start'></i> fa fa-hourglass-start" <?=(($d[0]["idicon"]=="fa fa-hourglass-start")?'selected':'')?>></option>
									<option value="fa fa-hourglass-2" data-content="<i class='fa fa-hourglass-2'></i> fa fa-hourglass-2" <?=(($d[0]["idicon"]=="fa fa-hourglass-2")?'selected':'')?>></option>
									<option value="fa fa-hourglass-half" data-content="<i class='fa fa-hourglass-half'></i> fa fa-hourglass-half" <?=(($d[0]["idicon"]=="fa fa-hourglass-half")?'selected':'')?>></option>
									<option value="fa fa-hourglass-3" data-content="<i class='fa fa-hourglass-3'></i> fa fa-hourglass-3" <?=(($d[0]["idicon"]=="fa fa-hourglass-3")?'selected':'')?>></option>
									<option value="fa fa-hourglass-end" data-content="<i class='fa fa-hourglass-end'></i> fa fa-hourglass-end" <?=(($d[0]["idicon"]=="fa fa-hourglass-end")?'selected':'')?>></option>
									<option value="fa fa-hourglass" data-content="<i class='fa fa-hourglass'></i> fa fa-hourglass" <?=(($d[0]["idicon"]=="fa fa-hourglass")?'selected':'')?>></option>
									<option value="fa fa-hand-grab-o" data-content="<i class='fa fa-hand-grab-o'></i> fa fa-hand-grab-o" <?=(($d[0]["idicon"]=="fa fa-hand-grab-o")?'selected':'')?>></option>
									<option value="fa fa-hand-rock-o" data-content="<i class='fa fa-hand-rock-o'></i> fa fa-hand-rock-o" <?=(($d[0]["idicon"]=="fa fa-hand-rock-o")?'selected':'')?>></option>
									<option value="fa fa-hand-stop-o" data-content="<i class='fa fa-hand-stop-o'></i> fa fa-hand-stop-o" <?=(($d[0]["idicon"]=="fa fa-hand-stop-o")?'selected':'')?>></option>
									<option value="fa fa-hand-paper-o" data-content="<i class='fa fa-hand-paper-o'></i> fa fa-hand-paper-o" <?=(($d[0]["idicon"]=="fa fa-hand-paper-o")?'selected':'')?>></option>
									<option value="fa fa-hand-scissors-o" data-content="<i class='fa fa-hand-scissors-o'></i> fa fa-hand-scissors-o" <?=(($d[0]["idicon"]=="fa fa-hand-scissors-o")?'selected':'')?>></option>
									<option value="fa fa-hand-lizard-o" data-content="<i class='fa fa-hand-lizard-o'></i> fa fa-hand-lizard-o" <?=(($d[0]["idicon"]=="fa fa-hand-lizard-o")?'selected':'')?>></option>
									<option value="fa fa-hand-spock-o" data-content="<i class='fa fa-hand-spock-o'></i> fa fa-hand-spock-o" <?=(($d[0]["idicon"]=="fa fa-hand-spock-o")?'selected':'')?>></option>
									<option value="fa fa-hand-pointer-o" data-content="<i class='fa fa-hand-pointer-o'></i> fa fa-hand-pointer-o" <?=(($d[0]["idicon"]=="fa fa-hand-pointer-o")?'selected':'')?>></option>
									<option value="fa fa-hand-peace-o" data-content="<i class='fa fa-hand-peace-o'></i> fa fa-hand-peace-o" <?=(($d[0]["idicon"]=="fa fa-hand-peace-o")?'selected':'')?>></option>
									<option value="fa fa-trademark" data-content="<i class='fa fa-trademark'></i> fa fa-trademark" <?=(($d[0]["idicon"]=="fa fa-trademark")?'selected':'')?>></option>
									<option value="fa fa-registered" data-content="<i class='fa fa-registered'></i> fa fa-registered" <?=(($d[0]["idicon"]=="fa fa-registered")?'selected':'')?>></option>
									<option value="fa fa-creative-commons" data-content="<i class='fa fa-creative-commons'></i> fa fa-creative-commons" <?=(($d[0]["idicon"]=="fa fa-creative-commons")?'selected':'')?>></option>
									<option value="fa fa-gg" data-content="<i class='fa fa-gg'></i> fa fa-gg" <?=(($d[0]["idicon"]=="fa fa-gg")?'selected':'')?>></option>
									<option value="fa fa-gg-circle" data-content="<i class='fa fa-gg-circle'></i> fa fa-gg-circle" <?=(($d[0]["idicon"]=="fa fa-gg-circle")?'selected':'')?>></option>
									<option value="fa fa-tripadvisor" data-content="<i class='fa fa-tripadvisor'></i> fa fa-tripadvisor" <?=(($d[0]["idicon"]=="fa fa-tripadvisor")?'selected':'')?>></option>
									<option value="fa fa-odnoklassniki" data-content="<i class='fa fa-odnoklassniki'></i> fa fa-odnoklassniki" <?=(($d[0]["idicon"]=="fa fa-odnoklassniki")?'selected':'')?>></option>
									<option value="fa fa-odnoklassniki-square" data-content="<i class='fa fa-odnoklassniki-square'></i> fa fa-odnoklassniki-square" <?=(($d[0]["idicon"]=="fa fa-odnoklassniki-square")?'selected':'')?>></option>
									<option value="fa fa-get-pocket" data-content="<i class='fa fa-get-pocket'></i> fa fa-get-pocket" <?=(($d[0]["idicon"]=="fa fa-get-pocket")?'selected':'')?>></option>
									<option value="fa fa-wikipedia-w" data-content="<i class='fa fa-wikipedia-w'></i> fa fa-wikipedia-w" <?=(($d[0]["idicon"]=="fa fa-wikipedia-w")?'selected':'')?>></option>
									<option value="fa fa-safari" data-content="<i class='fa fa-safari'></i> fa fa-safari" <?=(($d[0]["idicon"]=="fa fa-safari")?'selected':'')?>></option>
									<option value="fa fa-chrome" data-content="<i class='fa fa-chrome'></i> fa fa-chrome" <?=(($d[0]["idicon"]=="fa fa-chrome")?'selected':'')?>></option>
									<option value="fa fa-firefox" data-content="<i class='fa fa-firefox'></i> fa fa-firefox" <?=(($d[0]["idicon"]=="fa fa-firefox")?'selected':'')?>></option>
									<option value="fa fa-opera" data-content="<i class='fa fa-opera'></i> fa fa-opera" <?=(($d[0]["idicon"]=="fa fa-opera")?'selected':'')?>></option>
									<option value="fa fa-internet-explorer" data-content="<i class='fa fa-internet-explorer'></i> fa fa-internet-explorer" <?=(($d[0]["idicon"]=="fa fa-internet-explorer")?'selected':'')?>></option>
									<option value="fa fa-tv" data-content="<i class='fa fa-tv'></i> fa fa-tv" <?=(($d[0]["idicon"]=="fa fa-tv")?'selected':'')?>></option>
									<option value="fa fa-television" data-content="<i class='fa fa-television'></i> fa fa-television" <?=(($d[0]["idicon"]=="fa fa-television")?'selected':'')?>></option>
									<option value="fa fa-contao" data-content="<i class='fa fa-contao'></i> fa fa-contao" <?=(($d[0]["idicon"]=="fa fa-contao")?'selected':'')?>></option>
									<option value="fa fa-500px" data-content="<i class='fa fa-500px'></i> fa fa-500px" <?=(($d[0]["idicon"]=="fa fa-500px")?'selected':'')?>></option>
									<option value="fa fa-amazon" data-content="<i class='fa fa-amazon'></i> fa fa-amazon" <?=(($d[0]["idicon"]=="fa fa-amazon")?'selected':'')?>></option>
									<option value="fa fa-calendar-plus-o" data-content="<i class='fa fa-calendar-plus-o'></i> fa fa-calendar-plus-o" <?=(($d[0]["idicon"]=="fa fa-calendar-plus-o")?'selected':'')?>></option>
									<option value="fa fa-calendar-minus-o" data-content="<i class='fa fa-calendar-minus-o'></i> fa fa-calendar-minus-o" <?=(($d[0]["idicon"]=="fa fa-calendar-minus-o")?'selected':'')?>></option>
									<option value="fa fa-calendar-times-o" data-content="<i class='fa fa-calendar-times-o'></i> fa fa-calendar-times-o" <?=(($d[0]["idicon"]=="fa fa-calendar-times-o")?'selected':'')?>></option>
									<option value="fa fa-calendar-check-o" data-content="<i class='fa fa-calendar-check-o'></i> fa fa-calendar-check-o" <?=(($d[0]["idicon"]=="fa fa-calendar-check-o")?'selected':'')?>></option>
									<option value="fa fa-industry" data-content="<i class='fa fa-industry'></i> fa fa-industry" <?=(($d[0]["idicon"]=="fa fa-industry")?'selected':'')?>></option>
									<option value="fa fa-map-pin" data-content="<i class='fa fa-map-pin'></i> fa fa-map-pin" <?=(($d[0]["idicon"]=="fa fa-map-pin")?'selected':'')?>></option>
									<option value="fa fa-map-signs" data-content="<i class='fa fa-map-signs'></i> fa fa-map-signs" <?=(($d[0]["idicon"]=="fa fa-map-signs")?'selected':'')?>></option>
									<option value="fa fa-map-o" data-content="<i class='fa fa-map-o'></i> fa fa-map-o" <?=(($d[0]["idicon"]=="fa fa-map-o")?'selected':'')?>></option>
									<option value="fa fa-map" data-content="<i class='fa fa-map'></i> fa fa-map" <?=(($d[0]["idicon"]=="fa fa-map")?'selected':'')?>></option>
									<option value="fa fa-commenting" data-content="<i class='fa fa-commenting'></i> fa fa-commenting" <?=(($d[0]["idicon"]=="fa fa-commenting")?'selected':'')?>></option>
									<option value="fa fa-commenting-o" data-content="<i class='fa fa-commenting-o'></i> fa fa-commenting-o" <?=(($d[0]["idicon"]=="fa fa-commenting-o")?'selected':'')?>></option>
									<option value="fa fa-houzz" data-content="<i class='fa fa-houzz'></i> fa fa-houzz" <?=(($d[0]["idicon"]=="fa fa-houzz")?'selected':'')?>></option>
									<option value="fa fa-vimeo" data-content="<i class='fa fa-vimeo'></i> fa fa-vimeo" <?=(($d[0]["idicon"]=="fa fa-vimeo")?'selected':'')?>></option>
									<option value="fa fa-black-tie" data-content="<i class='fa fa-black-tie'></i> fa fa-black-tie" <?=(($d[0]["idicon"]=="fa fa-black-tie")?'selected':'')?>></option>
									<option value="fa fa-fonticons" data-content="<i class='fa fa-fonticons'></i> fa fa-fonticons" <?=(($d[0]["idicon"]=="fa fa-fonticons")?'selected':'')?>></option>
									<option value="fa fa-reddit-alien" data-content="<i class='fa fa-reddit-alien'></i> fa fa-reddit-alien" <?=(($d[0]["idicon"]=="fa fa-reddit-alien")?'selected':'')?>></option>
									<option value="fa fa-edge" data-content="<i class='fa fa-edge'></i> fa fa-edge" <?=(($d[0]["idicon"]=="fa fa-edge")?'selected':'')?>></option>
									<option value="fa fa-credit-card-alt" data-content="<i class='fa fa-credit-card-alt'></i> fa fa-credit-card-alt" <?=(($d[0]["idicon"]=="fa fa-credit-card-alt")?'selected':'')?>></option>
									<option value="fa fa-codiepie" data-content="<i class='fa fa-codiepie'></i> fa fa-codiepie" <?=(($d[0]["idicon"]=="fa fa-codiepie")?'selected':'')?>></option>
									<option value="fa fa-modx" data-content="<i class='fa fa-modx'></i> fa fa-modx" <?=(($d[0]["idicon"]=="fa fa-modx")?'selected':'')?>></option>
									<option value="fa fa-fort-awesome" data-content="<i class='fa fa-fort-awesome'></i> fa fa-fort-awesome" <?=(($d[0]["idicon"]=="fa fa-fort-awesome")?'selected':'')?>></option>
									<option value="fa fa-usb" data-content="<i class='fa fa-usb'></i> fa fa-usb" <?=(($d[0]["idicon"]=="fa fa-usb")?'selected':'')?>></option>
									<option value="fa fa-product-hunt" data-content="<i class='fa fa-product-hunt'></i> fa fa-product-hunt" <?=(($d[0]["idicon"]=="fa fa-product-hunt")?'selected':'')?>></option>
									<option value="fa fa-mixcloud" data-content="<i class='fa fa-mixcloud'></i> fa fa-mixcloud" <?=(($d[0]["idicon"]=="fa fa-mixcloud")?'selected':'')?>></option>
									<option value="fa fa-scribd" data-content="<i class='fa fa-scribd'></i> fa fa-scribd" <?=(($d[0]["idicon"]=="fa fa-scribd")?'selected':'')?>></option>
									<option value="fa fa-pause-circle" data-content="<i class='fa fa-pause-circle'></i> fa fa-pause-circle" <?=(($d[0]["idicon"]=="fa fa-pause-circle")?'selected':'')?>></option>
									<option value="fa fa-pause-circle-o" data-content="<i class='fa fa-pause-circle-o'></i> fa fa-pause-circle-o" <?=(($d[0]["idicon"]=="fa fa-pause-circle-o")?'selected':'')?>></option>
									<option value="fa fa-stop-circle" data-content="<i class='fa fa-stop-circle'></i> fa fa-stop-circle" <?=(($d[0]["idicon"]=="fa fa-stop-circle")?'selected':'')?>></option>
									<option value="fa fa-stop-circle-o" data-content="<i class='fa fa-stop-circle-o'></i> fa fa-stop-circle-o" <?=(($d[0]["idicon"]=="fa fa-stop-circle-o")?'selected':'')?>></option>
									<option value="fa fa-shopping-bag" data-content="<i class='fa fa-shopping-bag'></i> fa fa-shopping-bag" <?=(($d[0]["idicon"]=="fa fa-shopping-bag")?'selected':'')?>></option>
									<option value="fa fa-shopping-basket" data-content="<i class='fa fa-shopping-basket'></i> fa fa-shopping-basket" <?=(($d[0]["idicon"]=="fa fa-shopping-basket")?'selected':'')?>></option>
									<option value="fa fa-hashtag" data-content="<i class='fa fa-hashtag'></i> fa fa-hashtag" <?=(($d[0]["idicon"]=="fa fa-hashtag")?'selected':'')?>></option>
									<option value="fa fa-bluetooth" data-content="<i class='fa fa-bluetooth'></i> fa fa-bluetooth" <?=(($d[0]["idicon"]=="fa fa-bluetooth")?'selected':'')?>></option>
									<option value="fa fa-bluetooth-b" data-content="<i class='fa fa-bluetooth-b'></i> fa fa-bluetooth-b" <?=(($d[0]["idicon"]=="fa fa-bluetooth-b")?'selected':'')?>></option>
									<option value="fa fa-percent" data-content="<i class='fa fa-percent'></i> fa fa-percent" <?=(($d[0]["idicon"]=="fa fa-percent")?'selected':'')?>></option>
									<option value="fa fa-gitlab" data-content="<i class='fa fa-gitlab'></i> fa fa-gitlab" <?=(($d[0]["idicon"]=="fa fa-gitlab")?'selected':'')?>></option>
									<option value="fa fa-wpbeginner" data-content="<i class='fa fa-wpbeginner'></i> fa fa-wpbeginner" <?=(($d[0]["idicon"]=="fa fa-wpbeginner")?'selected':'')?>></option>
									<option value="fa fa-wpforms" data-content="<i class='fa fa-wpforms'></i> fa fa-wpforms" <?=(($d[0]["idicon"]=="fa fa-wpforms")?'selected':'')?>></option>
									<option value="fa fa-envira" data-content="<i class='fa fa-envira'></i> fa fa-envira" <?=(($d[0]["idicon"]=="fa fa-envira")?'selected':'')?>></option>
									<option value="fa fa-universal-access" data-content="<i class='fa fa-universal-access'></i> fa fa-universal-access" <?=(($d[0]["idicon"]=="fa fa-universal-access")?'selected':'')?>></option>
									<option value="fa fa-wheelchair-alt" data-content="<i class='fa fa-wheelchair-alt'></i> fa fa-wheelchair-alt" <?=(($d[0]["idicon"]=="fa fa-wheelchair-alt")?'selected':'')?>></option>
									<option value="fa fa-question-circle-o" data-content="<i class='fa fa-question-circle-o'></i> fa fa-question-circle-o" <?=(($d[0]["idicon"]=="fa fa-question-circle-o")?'selected':'')?>></option>
									<option value="fa fa-blind" data-content="<i class='fa fa-blind'></i> fa fa-blind" <?=(($d[0]["idicon"]=="fa fa-blind")?'selected':'')?>></option>
									<option value="fa fa-audio-description" data-content="<i class='fa fa-audio-description'></i> fa fa-audio-description" <?=(($d[0]["idicon"]=="fa fa-audio-description")?'selected':'')?>></option>
									<option value="fa fa-volume-control-phone" data-content="<i class='fa fa-volume-control-phone'></i> fa fa-volume-control-phone" <?=(($d[0]["idicon"]=="fa fa-volume-control-phone")?'selected':'')?>></option>
									<option value="fa fa-braille" data-content="<i class='fa fa-braille'></i> fa fa-braille" <?=(($d[0]["idicon"]=="fa fa-braille")?'selected':'')?>></option>
									<option value="fa fa-asl-interpreting" data-content="<i class='fa fa-asl-interpreting'></i> fa fa-asl-interpreting" <?=(($d[0]["idicon"]=="fa fa-asl-interpreting")?'selected':'')?>></option>
									<option value="fa fa-deafness" data-content="<i class='fa fa-deafness'></i> fa fa-deafness" <?=(($d[0]["idicon"]=="fa fa-deafness")?'selected':'')?>></option>
									<option value="fa fa-hard-of-hearing" data-content="<i class='fa fa-hard-of-hearing'></i> fa fa-hard-of-hearing" <?=(($d[0]["idicon"]=="fa fa-hard-of-hearing")?'selected':'')?>></option>
									<option value="fa fa-deaf" data-content="<i class='fa fa-deaf'></i> fa fa-deaf" <?=(($d[0]["idicon"]=="fa fa-deaf")?'selected':'')?>></option>
									<option value="fa fa-glide" data-content="<i class='fa fa-glide'></i> fa fa-glide" <?=(($d[0]["idicon"]=="fa fa-glide")?'selected':'')?>></option>
									<option value="fa fa-glide-g" data-content="<i class='fa fa-glide-g'></i> fa fa-glide-g" <?=(($d[0]["idicon"]=="fa fa-glide-g")?'selected':'')?>></option>
									<option value="fa fa-signing" data-content="<i class='fa fa-signing'></i> fa fa-signing" <?=(($d[0]["idicon"]=="fa fa-signing")?'selected':'')?>></option>
									<option value="fa fa-sign-language" data-content="<i class='fa fa-sign-language'></i> fa fa-sign-language" <?=(($d[0]["idicon"]=="fa fa-sign-language")?'selected':'')?>></option>
									<option value="fa fa-low-vision" data-content="<i class='fa fa-low-vision'></i> fa fa-low-vision" <?=(($d[0]["idicon"]=="fa fa-low-vision")?'selected':'')?>></option>
									<option value="fa fa-viadeo" data-content="<i class='fa fa-viadeo'></i> fa fa-viadeo" <?=(($d[0]["idicon"]=="fa fa-viadeo")?'selected':'')?>></option>
									<option value="fa fa-viadeo-square" data-content="<i class='fa fa-viadeo-square'></i> fa fa-viadeo-square" <?=(($d[0]["idicon"]=="fa fa-viadeo-square")?'selected':'')?>></option>
									<option value="fa fa-snapchat" data-content="<i class='fa fa-snapchat'></i> fa fa-snapchat" <?=(($d[0]["idicon"]=="fa fa-snapchat")?'selected':'')?>></option>
									<option value="fa fa-snapchat-ghost" data-content="<i class='fa fa-snapchat-ghost'></i> fa fa-snapchat-ghost" <?=(($d[0]["idicon"]=="fa fa-snapchat-ghost")?'selected':'')?>></option>
									<option value="fa fa-snapchat-square" data-content="<i class='fa fa-snapchat-square'></i> fa fa-snapchat-square" <?=(($d[0]["idicon"]=="fa fa-snapchat-square")?'selected':'')?>></option>
									<option value="fa fa-pied-piper" data-content="<i class='fa fa-pied-piper'></i> fa fa-pied-piper" <?=(($d[0]["idicon"]=="fa fa-pied-piper")?'selected':'')?>></option>
									<option value="fa fa-first-order" data-content="<i class='fa fa-first-order'></i> fa fa-first-order" <?=(($d[0]["idicon"]=="fa fa-first-order")?'selected':'')?>></option>
									<option value="fa fa-yoast" data-content="<i class='fa fa-yoast'></i> fa fa-yoast" <?=(($d[0]["idicon"]=="fa fa-yoast")?'selected':'')?>></option>
									<option value="fa fa-themeisle" data-content="<i class='fa fa-themeisle'></i> fa fa-themeisle" <?=(($d[0]["idicon"]=="fa fa-themeisle")?'selected':'')?>></option>
									<option value="fa fa-google-plus-circle" data-content="<i class='fa fa-google-plus-circle'></i> fa fa-google-plus-circle" <?=(($d[0]["idicon"]=="fa fa-google-plus-circle")?'selected':'')?>></option>
									<option value="fa fa-google-plus-official" data-content="<i class='fa fa-google-plus-official'></i> fa fa-google-plus-official" <?=(($d[0]["idicon"]=="fa fa-google-plus-official")?'selected':'')?>></option>
									<option value="fa fa-fa" data-content="<i class='fa fa-fa'></i> fa fa-fa" <?=(($d[0]["idicon"]=="fa fa-fa")?'selected':'')?>></option>
									<option value="fa fa-font-awesome" data-content="<i class='fa fa-font-awesome'></i> fa fa-font-awesome" <?=(($d[0]["idicon"]=="fa fa-font-awesome")?'selected':'')?>></option>
						</select>

					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=servicehome_img?>:</label>
					<div class="col-md-9">
						<img id="image_two" src="<?=url_base.$d["src"]?>" style="border:1px solid #cccccc;width: 120px;height: 100px;" <?=(action!="query")? 'onclick="show_gallery_modal(0,this);"':''?> >
						<input type="hidden" name="idgallery" id="idgallery_image_two" value="<?=$d["idgallery"]?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=servicehome_idpage?>:</label>
					<div class="col-md-3">
						<select name="idpage" id="idpage" aajs='required' data-live-search="true" class="width-full form-control selectpicker" <?=(action=="query")?'disabled':''?> title="<?=servicehome_idpage_title?>">
							<option value='0' <?=(($d["idpage"] == "0")? 'selected' : '')?> ><?=servicehome_idpage_option?></option>
							<?php
								foreach ($dependencies["idpage"] as $page){
									echo "<option value='".$page["idpage"]."' data-content='".$page["name"]."' ".(($d["idpage"]==$page["idpage"])? 'selected' : '')."></option>";
								}
							?>
						</select>

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