<?php
	if(routerCtrl=="parish"){
		$address = parish;
		$father = parish_father;
		$father_title = parish_father_title;
		$name_title = parish_name_title;
		$name_placeholder = parish_name_placeholder;
	}else if(routerCtrl=="municipality"){
		$address = municipality;
		$father = municipality_father;
		$father_title = municipality_father_title;
		$name_title = municipality_name_title;
		$name_placeholder = parish_name_placeholder;
	}else if(routerCtrl=="state"){
		$address = state;
		$father = state_father;
		$father_title = state_father_title;
		$name_title = state_name_title;
		$name_placeholder = state_name_placeholder;
	}else if(routerCtrl=="country"){
		$address = country;
		$name_title = country_name_title;
		$name_placeholder = country_name_placeholder;
	}
	$_SESSION["title"] = $address;
?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=$address?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
			<?=$dependencies['add']?>
			<table id="datatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=address_name?></th><?=((routerCtrl!="country")? "<th>".$father."</th>":'')?><th><?=actions?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idaddress"]."</td><td>".$val["name"]."</td><td>".$val["father"]."</td><td>".$val["btn"]."</td></tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=address_name?></th><?=((routerCtrl!="country")? "<th>".$father."</th>":'')?><th><?=actions?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d["idaddress"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<?php
					if(action!="add")
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".id.":</label>
							<div class='col-md-3'>
								<input type='text' name='idaddress' id='idaddress' value='".$d["idaddress"]."' class='width-full' disabled title='".id_title."'>
							</div>
						</div>";
					if(routerCtrl != "country"){
						echo "<div class='form-group'>
							<label class='col-md-2 text-right'>".$father.":</label>
							<div class='col-md-10'>
								<input type='text' id='father' aajs='searchajax{".url_base.routerCtrl."/search,this},required'  class='width-full' ".((action=="query")?'disabled':'').">
								<input type='hidden' name='idfather' id='idfather' class='width-full' ".((action=="query")?'disabled':'').">
							</div>
						</div>";
					}
				?>
				<div class="form-group">
					<label class="col-md-2 text-right"><?=address_name?>:</label>
					<div class="col-md-3">
						<input type="text" name="name" id="name" value="<?=$d["name"]?>" aajs='required,letter' class="width-full" <?=(action=="query")?'disabled':''?> data-toggle="tooltip" title="<?=$name_title?>" placeholder="<?=$name_placeholder?>">
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