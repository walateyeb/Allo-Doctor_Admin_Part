<!DOCTYPE HTML>
<head>
<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="aronotic" />
        <meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="generator" content=""/>
		<meta name="Resource-Type" content="document"/>
		<meta name="Distribution" content="global"/>
		<meta name="Robots" content="index, follow"/>
		<meta name="Revisit-After" content="21 days"/>
		<meta name="Rating" content="general"/>
        
        
	<title>Choisir Ton Docteur</title>
    <link href="<?=ADMIN_THEME ?>css/bootstrap.css" rel="stylesheet" />
    <link href="<?=ADMIN_THEME ?>css/bootstrap-theme.css" rel="stylesheet"  />
    
       
    
    <link href="<?=ADMIN_THEME ?>css/style.css" rel="stylesheet" />
    
    
    
</head>

<body>
<div id="wrapper">
    <header>
        
    </header>
    <div class="container" >
        <div class="row">
            <div class="">
                         <div class="login-panel panel panel-default" style="margin: 60px auto;">
                            
                            <div class="panel-heading">
                                <h3 class="panel-title">S'il vous plais Connecté</h3>
                            </div>
                            <div class="panel-body">
                                <? if ( common::do_show_message() ) {
		          echo common::show_message();	
            } ?> 
                                <form role="form" action="" method="post" >
                                    <fieldset>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="E-mail" name="username" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
                                        </div>
                                        <div>
                                            <select class="form-control" name="loginas">
                                                <option value="">--connecter Tantque---</option>
                                                <option value="admin">Administrateur</option>
                                                <option value="doctor">Docteur </option>
                                            </select>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input name="remember" type="checkbox" value="Remember Me"> se rappeler de moi
                                            </label>
                                        </div>

                                       
                                        <input type="submit" class="btn btn-lg btn-success btn-block" name="login" value="Connexion" /><br/>
                                       <input type="submit" class="btn btn-lg btn-success btn-block" name="reg_dr" value="Inscription Docteur"/>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
        
        </div>
    </div> 
   
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <script src="<?=ADMIN_THEME ?>/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
       $('.carousel').carousel();
 
    });
    </script>
</body>
</html>