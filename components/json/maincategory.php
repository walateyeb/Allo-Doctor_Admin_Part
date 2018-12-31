<?php header('Content-type: text/json');
$data = array();

$filter = "";

if($_REQUEST["id"]!="")
{
    $filter =" and `id`='".trim($_REQUEST["id"])."' ";
}



$q = new Query();
$q->select("`".TBL_Category."`.*,CONCAT('".CONTENT_IMAGE_URL1."/small/',`".TBL_Category."`.`icon`) as iconpath")
->from("`".TBL_Category."` where 1 ".$filter."")
->run();

$data['count'] = $q->get_selected_count();
$data['data'] = $q->get_selected();


echo json_encode($data);
?>