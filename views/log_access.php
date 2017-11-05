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
            <tfoot><th><?=id?></th><th><?=log_access_name?><th><?=log_access_message?><th><?=log_access_ip?><th><?=log_access_browser?><th><?=log_access_date_created?><th><?=log_access_operative_system?></th><th><?=actions?></th></tfoot>
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
                            { "data": "idlog_access" },
                            { "data": "name" },
                            { "data": "message" },
                            { "data": "ip" },
                            { "data": "browser" },
                            { "data": "date_created" },
                            { "data": "operative_system" },
                            { "data": "btn" }
                        ]
                    }
                );
                
            });
        </script>
	</div>
</div>