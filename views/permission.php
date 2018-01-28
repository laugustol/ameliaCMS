<?php $_SESSION["title"] = permission ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=permission?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?php if(action=="index"){ ?>
		 	<?=$dependencies['add']?>
			<table id="dxatatable" class="table table-striped table-bordered table-hover dataTable">
                <thead><th><?=id?></th><th><?=permission_charge?></th><th><?=actions?></th></thead>
                <?php
                	foreach($dependencies["list"] as $val){
                		echo "<tr><td>".$val["idcharge"]."</td><td>".$val["name"]."</td>".$val["btn"]."</tr>";
                	}
                ?>
                <tfoot><th><?=id?></th><th><?=permission_charge?></th><th><?=actions?></th></tfoot>
            </table>
		<?php }else{ ?>
			<?=(action!="query")? "<form action='".url_base.routerCtrl."/".action."/".$d[0]["idcharge"]."' method='POST' class='form-horizontal'>" : "<div class='form-horizontal'>" ?>
				<input type="hidden" name="event" id="event">
				<div class='form-group'>
				<label class='col-md-2 text-right'><?=permission_charge?>:</label>
				<div class='col-md-3'>
					<input type='text' name='name' id='name' value='<?=$d[0]["name"]?>' class='width-full' disabled title='<?=permission_charge_title?>'>
					<input type='hidden' name='idcharge' id='idcharge' value='<?=$d[0]["idcharge"]?>'>
					</div>
				</div>
				<?php
					if(action!="query"){
						$idothercharge = "<div class='form-group'>";
							$idothercharge .= "<label class='col-md-2 text-right'>".permission_others_charges.":</label>";
							$idothercharge .= "<div class='col-md-3'>";
								$idothercharge .= "<select name='idothercharge' id='idothercharge' class='width-full'>";
									$idothercharge .= "<option value='0'>".permission_others_charges_option."</option>";
								foreach ($dependencies["charges"] as $charge) {
									$idothercharge .= "<option value='".$charge["idcharge"]."'>".$charge["name"]."</option>";
								}
								$idothercharge .= "</select>";
							$idothercharge .= "</div>";
						$idothercharge .= "</div>";
						echo $idothercharge;
					}
				?>
				<div class="form-group">
					<div class='col-md-2 col-md-offset-5'>
						<label><input type='checkbox' id="checkedfull"> <?=permission_checked_full?></label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<td class="text-center" colspan="<?=$dependencies["count_actions"]+1?>"><b>Modulo</b> - Sub-Modulo - <i>2do-Sub-Modulo</i></td>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($dependencies["service_actions"] as $k1 => $val){
										$service_actions.="<tr><th class='text-left'>".$val["sname"]."<input type='hidden' name='idservices[]' value='".$val["idservice"]."'></th></tr>";
										foreach ($val["services"] as $k2 => $val2) {
											$service_actions.="<tr><td>".$val2["name"]."<input type='hidden' name='idservices[]' value='".$val2["idservice"]."'></td>";
											foreach ($val2["actions"] as $k3 => $val3) {
												$service_actions.="<td><label><input type='checkbox' name='idactions_".$val2["idservice"]."[]' value='".$val3["idaction"]."' ".(($d["actions"][$val2["idservice"].$val3["idaction"]])? "checked" : '')." ".((action=="query")? 'disabled' : '').">".$val3["name"]."</label></td>";
											}
											$service_actions.="</tr>";
											if(!empty($val2["services"])){
												$service_actions.="<tr>";
												foreach ($val2["services"] as $k4 => $val4) {
													$service_actions.="<tr><td class='text-right'><i>".$val4["name"]."</i><input type='hidden' name='idservices[]' value='".$val4["idservice"]."'></td>";
													foreach ($val4["actions"] as $k5 => $val5) {
														$service_actions.="<td><label><input type='checkbox' name='idactions_".$val4["idservice"]."[]' value='".$val5["idaction"]."' ".(($d["actions"][$val4["idservice"].$val5["idaction"]])? "checked" : '')." ".((action=="query")? 'disabled' : '').">".$val5["name"]."</label></td>";
													}
												}
												$service_actions.="</tr>";
											}
										}
										for($i=0;$i<($dependencies["count_actions"]-count($val["actions"]));$i++){
											$service_actions.="<td></td>";
										}													
										
									}
									echo $service_actions;
								?>
							</tbody>
						</table>
					</div>
				</div>
				<?php
					if(action!="query")
						echo"<div class='form-group'>
							<div class='col-md-2 col-md-offset-5'>
								<button class='btn1'>".save."</button>
							</div>
						</div>";
				?>
			<?=(action!="query")? "</form>" :'</div>' ?>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
	$("#checkedfull").change(function () {
		$("input:checkbox").prop('checked', $(this).prop("checked"));
	});
</script>