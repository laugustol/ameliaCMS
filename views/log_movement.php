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
            <tfoot><th><?=id?></th><th><?=log_movement_user?></th><th><?=log_movement_action?></th><th><?=log_movement_service?></th><th><?=log_movement_message?></th><th ><?=log_movement_data?></th><th><?=log_movement_date_created?></th><th><?=actions?></th></tfoot>
        </table>
        <style type="text/css">
            td{
                word-wrap: break-word;
                word-break:break-all;
            }
        </style>
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
                            { "data": "idlog_movement" },
                            { "data": "uname" },
                            { "data": "aname" },
                            { "data": "sname" },
                            { "data": "message" },
                            { "data": "data" },
                            { "data": "date_created" },
                            { "data": "btn" }
                        ]
                    }
                );
            });
        </script>
	</div>
</div>