<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Choisir ton Docteur</title>

    <link href="<?=ADMIN_THEME ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ADMIN_THEME ?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=ADMIN_THEME ?>css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?=ADMIN_THEME ?>css/plugins/timeline/timeline.css" rel="stylesheet">

    <link href="<?=ADMIN_THEME ?>css/sb-admin.css" rel="stylesheet">
    <link href="<?=ADMIN_THEME ?>css/style.css" rel="stylesheet">
</head>

<body>

    <div id="wrapper">

        <? echo common::elements("adminnav"); ?>
        <div id="page-wrapper">
<div class="row">
<div class="col-lg-12">
<h1 class="page-header"><i class="fa fa-user fa-fw"></i> Ajouter un administrateur</h1>
</div>
</div>
<div class="row">
    <div class="col-md-6">

<div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> Ajouter un Administrateur
                        </div>
                        <div class="panel-body">
        
			<form id="form" action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Nom d'administrateur</label>
                        <div class="col-lg-8">
						<input class="form-control" name="username" type="text" />
					   </div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Mot de passe</label>
                        <div class="col-lg-8">
						<input class="form-control" name="password" type="password" />
					</div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Email</label>
                        <div class="col-lg-8">
						<input class="form-control" name="email" type="email" />
					</div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Type</label>
                        <div class="col-lg-8">
						<select name="type" class="form-control">
                            <option>administrateur</option>
                            <option>utilisateur</option>
                        </select>
					</div>
                    </div>
                    <div class="form-group">
                        <label for="text1" class="control-label col-lg-4">Active</label>
                        <div class="col-lg-8">
						<select name="active" class="form-control">
                            <option value="1">Oui</option>
                            <option value="0">Non</option>
                        </select>
					</div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-8">
						<input class="btn" type="submit" name="submit" value="Ajouter" />
					       </div>
                    </div>
                    </div>
            </form>
</div>
</div>


    
   


</div>    

    </div>
    
</div>

            
            
			</div>
                  </div>
    <script src="<?=ADMIN_THEME ?>js/jquery-1.10.2.js"></script>
    <script src="<?=ADMIN_THEME ?>js/bootstrap.min.js"></script>
    <script src="<?=ADMIN_THEME ?>js/plugins/metisMenu/jquery.metisMenu.js"></script>


    <script src="<?=ADMIN_THEME ?>js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?=ADMIN_THEME ?>js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?=ADMIN_THEME ?>js/sb-admin.js"></script>

    
        <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
