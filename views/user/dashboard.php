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
                    <h1 class="page-header"><i class="fa fa-dashboard"></i> Actualité </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Les inscriptions de ce jour</h3>
                        </div>
                        <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Email</th>
                                            <th>Téléphone</th>
                                            <th>Ville</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($registers as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["email"]; ?></td>
                                            <td><?=$d["phone"]; ?></td>
                                            <td><?=$d["city"]; ?></td>
                                        </tr>
                                     <? } ?>   
                                    </tbody>
                                </table>
                                </div>
                        </div>
                    </div>
                
                </div>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3>Rendez-vous de ce jours</h3>
                        </div>
                        <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example" id="dataTables-example" >
                                    <thead>
                                        <tr>
                                            <th>Utilisateur</th>
                                            <th>Pour Docteur</th>
                                            <th>ville de docteur</th>
                                            <th>Téléphone de docteur</th>
                                            <th>Spécialité de docteur</th>
                                            <th>Date</th>
                                            <th>Temp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <? foreach($appointments as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?=$d["email"]; ?></td>
                                            <td><?=$d["dr_name"]; ?></td>
                                            <th><?=$d["dr_city"] ?></th>
                                            <th><?=$d["dr_phone"] ?></th>
                                            <th><?=$d["category"] ?></th>
                                            <td><?=$d["app_date"]; ?></td>
                                            <td><?=$d["time"]; ?></td>
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
</body>

</html>
