<?php $_SESSION["title"] = log_access ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=log_access?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?=$dependencies['add']?>
		<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
            <thead><th><?=id?></th><th><?=log_access_name?><th><?=log_access_message?><th><?=log_access_ip?><th><?=log_access_browser?><th><?=log_access_date_created?><th><?=log_access_operative_system?></th><th><?=actions?></th></thead>
            <?php
                    foreach($dependencies["list"] as $val){
                        echo "<tr><td>".$val["idlog_access"]."</td><td>".$val["name"]."</td><td>".$val["message"]."</td><td>".$val["ip"]."</td><td>".$val["browser"]."</td><td>".$val["date_created"]."</td><td>".$val["operative_system"]."</td><td>".$val["btn"]."</td></tr>";
                    }
                ?>
            <tfoot><th><?=id?></th><th><?=log_access_name?><th><?=log_access_message?><th><?=log_access_ip?><th><?=log_access_browser?><th><?=log_access_date_created?><th><?=log_access_operative_system?></th><th><?=actions?></th></tfoot>
        </table>
	</div>
</div>