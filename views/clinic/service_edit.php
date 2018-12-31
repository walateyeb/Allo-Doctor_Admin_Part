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
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Cliniquess
<div class="action pull-right">
    <a href="<?php echo common::get_component_link(array("clinic","list")); ?>" class="btn btn-primary btn-small"><i class="fa fa-list"></i> Liste </a>
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
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <? if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
			<form id="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Nom service<span class="">*</span></label>
                        <div class="col-lg-6">
						  <input class="text-input form-control" name="name" value="<?=$data["service"]; ?>" id="txtname" type="text" required="" /> 
                        </div>
                        <div class="col-lg-2">
                            (Ex. Nettoyage de dents)
                        </div>
                    </div>
                   
                    <div class="form-group">

                       
                            <label for="text1" class="control-label col-lg-2">Frais<span>*</span></label>
                            <div class="col-lg-2">
    						  <input class="text-input form-control" name="fees" value="<?=$data["charge"]; ?>" id="txtfees" type="number" required="" /> 
                            </div>
                            <div class="col-lg-1">
                               DT.
                            </div>
                        
                            
                        
                    </div>
                    
                    
						<input class="btn btn-primary pull-right" type="submit" name="add" value="valider" />
				
            </form>
            
            
            
</div>
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
      // don't navigate away from the field on tab when selecting an item
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
          // custom minLength
          var term = extractLast( this.value );
          if ( term.length < 2 ) {
            return false;
          }
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
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
