<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<?php echo common::load_view("common","head"); ?>
</head>

<body>

    <div id="wrapper">

        <? echo common::elements("adminnav"); ?>
        <div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> table de temps

</h1>
</div>
</div>
<div class="row">
    <div class="col-md-12">

<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus-circle fa-fw"></i> Table de temps de Docteur à la clinique
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <? if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
			<form id="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  
                   <table class="table">
                        <tr>
                            <th>Temps : </th>
                            <th>Lundi</th>
                            <th>Mardi</th>
                            <th>Mrecredi</th>
                            <th>Jeudi</th>
                            <th>Vendredi</th>
                            <th>Samedi</th>
                            <th>Dimanche</th>
                        </tr>
                        <? 
                        $day_array = array("mon","tue","wed","thu","fri","sat","sun");
                        $time_array = array("8:30 - 9:00 AM","9:00 - 9:30 AM","9:30 - 10:00 AM","10:00 - 10:30 AM","10:30 - 11:00 AM","11:00 - 11:30 AM","11:30 - 12:00 PM",
                        "12:00 - 12:30 PM","12:30 - 01:00 PM","01:00 - 01:30 PM","01:30 - 02:00 PM","02:00 - 02:30 PM","02:30 - 03:00 PM","03:00 - 03:30 PM",
                        "04:00 - 04:30 PM","04:30 - 05:00 PM","05:00 - 05:30 PM","06:30 - 07:00 PM","07:00 - 07:30 PM","07:30 - 08:00 PM","08:00 - 08:30 PM",
                        "08:30 - 09:00 PM","09:00 - 09:30 PM","09:30 - 10:00 PM","10:00 - 10:30 PM");
                        foreach($time_array as $time){
                            
                            ?>
                            <tr>
                            <th><?php echo $time; ?></th>
                                    
                            <?
                            foreach($day_array as $day){
                                $intime = false;    
                                foreach($dr_times as $dtime){
                                    if($dtime["day"]==$day && $dtime["during"]==$time)
                                        $intime = true;                                    
                                }
                                    if($intime){
                                        ?>
                                        <td><input type="checkbox" name="times[]" value="<?php echo $day."_".$time ?>" checked="" /></td>
                                        <?
                                    }else{
                                        ?>
                                        <td><input type="checkbox" name="times[]" value="<?php echo $day."_".$time ?>" /></td>
                                        <?
                                    }
                                    ?>
                                
                                <?
                                
                            }
                            ?>
                            </tr>
                            <?
                        }
                        
                         ?>
                   </table>
                    
						<input class="btn btn-primary pull-right" type="submit" name="add" value="valider" />
				
            </form>
            
            
            
</div>
</div>
<?php foreach((array) $photos as $photo){
    ?>
    <div class="col-md-2 thumbnail">
        <img src="<?php echo CONTENT_IMAGE_URL."/small/".$photo["image"]; ?>" />
        <a href="<? echo common::get_component_link(array("clinic","photos"),array("cl_id"=>common::get_control_value("cl_id"),"delete"=>$photo["id"])) ?>">Supprimer</a>
        
    </div>
    <?
}
?>


    </div>
    

    
</div>

            
            
			</div>
                  </div>
<?php echo common::load_view("common","footer"); ?>

</body>

</html>
