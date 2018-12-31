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
<h1 class="page-header"><i class="fa fa-folder fa-fw"></i> Modifier Catégorie
<div class="action pull-right">
    <a href="<?php echo common::get_component_link(array("category","list")); ?>" class="btn btn-primary btn-small"><i class="fa fa-list"></i> Liste </a>
</div>
</h1>
</div>
</div>
<div class="row">
    <div class="col-md-12">

<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-plus-circle fa-fw"></i> Modifier
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
            <? if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
			<form id="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                  
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Titre</label>
                        <div class="col-lg-8">
						<input class="text-input form-control" name="title" value="<?php echo $data["title"]; ?>" id="txttitle" type="text" required=""  /> (Ex. ABC )
					</div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Image D'icone : </label>
                        <div class="col-lg-7">
						<input type="file" name="icon"  class="text-input form-control"  />
                        </div>
                        <div class="col-lg-1">
                            <figure class="thumbnail"><img src="<?php echo CONTENT_IMAGE_URL."/icon/".$data["icon"]; ?>" /></figure>
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
<?php echo common::load_view("common","load_editor"); ?>
</body>

</html>
