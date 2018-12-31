<!DOCTYPE html>
<html>

<head>

<?php echo common::load_view("common","head"); ?>
    
</head>

<body>

    <div id="wrapper">

        <? echo common::elements("adminnav"); ?>
        <div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Services <div class="action pull-right">
    <a href="<?php echo common::get_component_link(array("news","add")); ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter</a>
</div>
</h1>
</div>
</div>
<div class="row">
 
    
    <div class="col-md-12">

<?  if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Date</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($data as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["id"]; ?></td>
                                            <td><?=$d["date"]; ?></td>
                                            <td><?=$d["title"]; ?></td>
                                            <td><?=$d["description"]; ?></td>
                                            <td class="center">
                                             <a href="<?=common::get_component_link(array('news','edit'),array("id"=>$d['id'])); ?>" class="btn btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
										 <a href="<?=common::get_component_link(array('news','delete'),array("id"=>$d['id'])); ?>" class="btn btn-sm"  title="Delete"><i class="glyphicon glyphicon-remove"></i></a> 
										
                                            </td>
                                        </tr>
                                     <? } ?>   
                                    </tbody>
                                </table>
                            </div>




    </div>
    
</div>

            
            
			</div>
                  </div>
<?php echo common::load_view("common","footer"); ?>
</body>

</html>
