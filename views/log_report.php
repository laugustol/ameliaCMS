<?php $_SESSION["title"] = log_report ?>
<div class="box">
	<div class="box-tools">
		<div class="box-tool-left">
			<a href="<?=url_base?>home/dashboard"><?=dashboard?></a> <i class="fa fa-angle-right"></i> <a href="<?=url_base.routerCtrl?>"><?=log_report?></a> <?=(action!="index")? "<i class='fa fa-angle-right'></i> ".((action=="add")? add : ((action=="edit")? edit : query ) ) : ''?>
		</div>
		<div class="box-tool-right"><i class="glyphicon glyphicon-minus"></i></div>
	</div>
	<div class="box-container">
		<?=$dependencies['add']?>
		<table id="datatable" class="table table-striped table-bordered table-hover dataTable" width="100%">
            <thead><th><?=id?></th><th><?=log_report_user?></th><th><?=log_report_report?></th><th><?=log_report_code?></th><th><?=log_report_date_created?></th></thead>
            <?php
                foreach($dependencies["list"] as $val){
                    echo "<tr><td>".$val["idlog_report"]."</td><td>".$val["name"]."</td><td>".$val["report"]."</td><td>".$val["code"]."</td><td>".$val["date_created"]."</td></tr>";
                }
            ?>
            <tfoot><th><?=id?></th><th><?=log_report_user?></th><th><?=log_report_report?></th><th><?=log_report_code?></th><th><?=log_report_date_created?></th></tfoot>
        </table>
        <style type="text/css">
            td{
                word-wrap: break-word;
                word-break:break-all;
            }
        </style>
	</div>
</div>