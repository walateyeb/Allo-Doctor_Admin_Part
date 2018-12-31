<?php header('Content-type: text/json');
$data = array();

$filter = "";

if($_REQUEST["id"]!="")
{
    $filter =" and `".TBL_Appointment."`.`id`='".trim($_REQUEST["id"])."' ";
}
if($_REQUEST["user_id"]!="")
{
    $filter =" and `".TBL_Appointment."`.`user_id`='".trim($_REQUEST["user_id"])."' ";
}


$q = new Query();
$q->select("`".TBL_Appointment."`.*, `doct`.`dr_name`, `doct`.`dr_degree`")
->from("`".TBL_Appointment."` inner join ".TBL_Doctor." as `doct` on `doct`.`dr_id` = `".TBL_Appointment."`.`dr_id` where 1 ".$filter." Order by `".TBL_Appointment."`.`app_date` DESC ")
->run();

$data['count'] = $q->get_selected_count();
$data['data'] = $q->get_selected();


echo json_encode($data);
?>