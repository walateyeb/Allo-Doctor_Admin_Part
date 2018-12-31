<?php header('Content-type: text/json');
$data = array();

$filter = "";

if($_REQUEST["id"]!="")
{
    $filter =" and `".TBL_Reviews."`.`id`='".trim($_REQUEST["id"])."' ";
}
if($_REQUEST["dr_id"]!="")
{
    $filter =" and `".TBL_Reviews."`.`dr_id`='".trim($_REQUEST["dr_id"])."' ";
}
if($_REQUEST["cl_id"]!="")
{
    $filter =" and `".TBL_Reviews."`.`cl_id`='".trim($_REQUEST["cl_id"])."' ";
}

$q = new Query();
$q->select("`".TBL_Reviews."`.*, `reg`.`name`, `reg`.`email`")
->from("`".TBL_Reviews."` inner join ".TBL_REGISTERS." as `reg` on `reg`.`id` = `".TBL_Reviews."`.`user_id` where 1 ".$filter." Order by `".TBL_Reviews."`.`on_date` DESC ")
->run();

$data['count'] = $q->get_selected_count();
$data['data'] = $q->get_selected();


echo json_encode($data);
?>