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
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Utilisateurs enregistrés :  <div class="action pull-right">
    
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
                                            <th style="width: 80px;">ID</th>
                                            <th>Nom</th>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Ville</th>
                                            <th>Date d'inscription</th>
                                            <th  style="width: 100px;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($data as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["id"]; ?></td>
                                            <td><?=$d["name"]; ?></td>
                                            <td><?=$d["email"]; ?></td>
                                            <td><?=$d["phone"]; ?></td>
                                            <td><?=$d["city"]; ?></td>
                                            <td><?=$d["reg_date"]; ?></td>
                                            <td class="center">
        										 <a href="<?=common::get_component_link(array('registers','delete'),array("id"=>$d['id'])); ?>" class="btn btn-sm"  title="Delete"><i class="glyphicon glyphicon-remove"></i></a> 
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
