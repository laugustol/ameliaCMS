<?php $_SESSION["title"] = log_access ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=log_movement?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?=$dependencies['add']?>
		<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
            <thead><th><?=id?></th><th><?=log_movement_user?></th><th><?=log_movement_action?></th><th><?=log_movement_service?></th><th><?=log_movement_message?></th><th ><?=log_movement_data?></th><th><?=log_movement_date_created?></th><th><?=actions?></th></thead>
            <?php
                    foreach($dependencies["list"] as $val){
                        echo "<tr><td>".$val["idlog_movement"]."</td><td>".$val["uname"]."</td><td>".$val["aname"]."</td><td>".$val["sname"]."</td><td>".$val["message"]."</td><td>".$val["data"]."</td><td>".$val["data_created"]."</td><td>".$val["btn"]."</td></tr>";
                    }
                ?>
            <tfoot><th><?=id?></th><th><?=log_movement_user?></th><th><?=log_movement_action?></th><th><?=log_movement_service?></th><th><?=log_movement_message?></th><th ><?=log_movement_data?></th><th><?=log_movement_date_created?></th><th><?=actions?></th></tfoot>
        </table>
        <style type="text/css">
            td{
                word-wrap: break-word;
                word-break:break-all;
            }
        </style>
	</div>
</div>