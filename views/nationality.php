<?php $_SESSION["title"] = nationality ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=nationality?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=nationality_name_one?></th><th><?=nationality_name_two?></th><th><?=actions?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idnationality"]."</td><td>".$val["name_one"]."</td><td>".$val["name_two"]."</td><td>".$val["btn"]."</td></tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=nationality_name_one?></th><th><?=nationality_name_two?></th><th><?=actions?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idnationality"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idnationality' id='idnationality' value='".$d["idnationality"]."' class='width-full' disabled title='".id_title."'>
							</div>
						</div>";
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=nationality_name_one?>:</label>
					<div class="col-md-3">
						<input type="text" name="name_one" id="name_one" value="<?=$d["name_one"]?>" aajs='required,letter' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=nationality_name_one_title?>" placeholder="<?=nationality_name_one_placeholder?>">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=nationality_name_two?>:</label>
					<div class="col-md-3">
						<input type="text" name="name_two" id="name_two" value="<?=$d["name_two"]?>" aajs='required,letter' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=nationality_name_two_title?>" placeholder="<?=nationality_name_two_placeholder?>">
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