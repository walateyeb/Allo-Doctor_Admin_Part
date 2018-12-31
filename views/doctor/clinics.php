<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<?php echo common::load_view("common","head"); ?>
<link href="<?=ADMIN_THEME ?>css/jquery-ui.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <? echo common::elements("adminnav"); ?>
        <div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Cliniques
<div class="action pull-right">
    
</div>
</h1>
</div>
</div>
<div class="row">
    <div class="col-md-12">

<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus-circle fa-fw"></i> Ajouter
                        </div>
                        
                        <div class="panel-body">
            <? if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
			<form id="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Nom Clinique <span class="">*</span></label>
                        <div class="col-lg-6">
						  <input class="text-input form-control" name="name" id="txtname" type="text" required="" /> 
                        </div>
                        <div class="col-lg-2">
                            (Ex. Clinic)
                        </div>
                    </div>
                   
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Emplacement<span class="">*</span></label>
                        <div class="col-lg-6">
						  <input class="text-input form-control" name="location" id="txtlocation" type="text" required="" /> 
                        </div>
                        <div class="col-lg-2">
                            (Ex. Rue 87)
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Addresse</label>
                        <div class="col-lg-6">
						      <textarea class="text-input form-control" name="address" id="txtaddress" ></textarea> 
                        </div>
                        <div class="col-lg-2">
                           
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Frais de consultation<span>*</span></label>
                        <div class="col-lg-6">
						  <input class="text-input form-control" name="fees" id="txtfees" type="number" required="" /> 
                        </div>
                        <div class="col-lg-2">
                           DT.
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Latitude</label>
                        <div class="col-lg-2">
						  <input class="text-input form-control" name="latitude" id="txtlatitude" type="text" /> 
                        </div>
                        <label for="text1" class="control-label col-lg-1">Longitude</label>
                        <div class="col-lg-2">
						  <input class="text-input form-control" name="longitude" id="txtlongitude" type="text" /> 
                        </div>
                        <div class="col-lg-2">
                           
                        </div>
                    </div>
                        
                   <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Installations</label>
                        <div class="col-lg-6">
						  <input class="text-input form-control" name="facilities" id="txtspecility" type="text" /> 
                        </div>
                        <div class="col-lg-2">
                           
                        </div>
                    </div>
						<input class="btn btn-primary pull-right" type="submit" name="add" value="valider" />
				
            </form>
            
            
            
</div>
</div>


<?  if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">ID</th>
                                            
                                            <th>Nom</th>
                                            <th>Emplacement</th>
                                            <th>Frais de consultation</th>
                                            <th>Galerie</th>
                                            <th>Frais de service</th>
                                            <th>Tableau Temps</th>
                                            <th  style="width: 100px;">Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($data as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["cl_id"]; ?></td>
                                            <td><?=$d["cl_name"]; ?></td>
                                            <td><?=$d["cl_location"]; ?></td>
                                            <td><?=$d["cl_fees"]; ?></td>
                                            
                                            <td><a href="<?=common::get_component_link(array("clinic","photos"),array("cl_id"=>$d["cl_id"]))?>" class="btn btn-default">Ajouter photos</a></td>
                                             <td><a href="<?=common::get_component_link(array("clinic","services"),array("cl_id"=>$d["cl_id"],"dr_id"=>common::get_control_value("dr_id")))?>" class="btn btn-default">Frais de service</a></td>
                                            <td><a href="<?=common::get_component_link(array("clinic","timetable"),array("cl_id"=>$d["cl_id"],"dr_id"=>$drid))?>" class="btn btn-default">Régler le temps</a></td>
                                            <td class="center">
                                             <a href="<?=common::get_component_link(array('clinic','edit'),array("id"=>$d['cl_id'])); ?>" class="btn btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
										      <a href="<?=common::get_component_link(array('clinic','delete'),array("id"=>$d['cl_id'])); ?>" class="btn btn-sm"  title="Delete"><i class="glyphicon glyphicon-remove"></i></a> 
										
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
<script src="<?=ADMIN_THEME ?>js/jquery-ui.js"></script>
<script>
  $(function() {
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#txtspecility" )
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).autocomplete( "instance" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        source: function( request, response ) {
          $.getJSON( "<?php echo SITE_URL ?>index.php?component=doctor&action=get_tag&type=facility", {
            term: extractLast( request.term )
          }, response );
        },
        search: function() {
          
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          terms.pop();
          terms.push( ui.item.value );
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
  </script>
<?php echo common::load_view("common","load_editor"); ?>

</body>

</html>
