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
                    <h1 class="page-header"><i class="fa fa-dashboard"></i> Actualité</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Mes rendez-vous de ce jour</h3>
                    </div>
                    <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th style="width: 100px;">Date</th>
                                            <th>Temp</th>
                                            <th>Téléphone</th>
                                            <th>Description</th>
                                            <th>Visité</th>
                                            <th>Etat</th>
                                            <th  style="width: 70px;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($appointments as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["app_date"]; ?></td>
                                            <td><?=$d["time"]; ?></td>
                                            <td><? echo $d["phone"]; echo ($d["confirm"]=="0")?"":" <i class='fa fa-check-circle text-success'></i>"; ?></td>
                                            <td><?=$d["description"]; ?></td>
                                            <td>
                                            <input type="checkbox"  id="my-checkbox" data-appid="<?php echo $d["id"]; ?>" name="my-checkbox" <?php echo ($d["visited"]==0)? "" : "checked"; ?> />
                                            </td>
                                             <td>
                                            Oui
                                            </td>
                                             <td class="center">
                                              <a href="<?=common::get_component_link(array('appointment','delete'),array("id"=>$d['id'],"ref"=>"pending")); ?>" class="btn btn-sm"  title="Delete"><i class="glyphicon glyphicon-remove"></i></a> 
                                        
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
           
        </div>
     

    </div>
  
<?php echo common::load_view("common","footer"); ?>
<script>
$(document).ready(function(){
    
    
    $("[name='my-checkbox']").bootstrapSwitch("offText","No");
    $("[name='my-checkbox']").bootstrapSwitch("onText","Yes");
    $("[name='my-checkbox']").on('switchChange.bootstrapSwitch', function(event, state) {
        
        var confirm = 0;
        if(state){
            confirm = 1;
        }else{
            confirm = 0;
        }
        $.ajax({
          method: "POST",
          url: "index.php?component=doctor&action=visited",
          data: { appid: $(this).data("appid"), value: confirm }
        })
          .done(function( msg ) {
            
        });
    });
    
});
</script>
</body>

</html>
