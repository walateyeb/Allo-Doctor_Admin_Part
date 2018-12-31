<?php header('Content-type: text/json');
$data = array();
$filter = "";

if($_REQUEST["slug"]!="")
{
    $filter =" and `slug`='".trim($_REQUEST["slug"])."' ";
}
if($_REQUEST["id"]!="")
{
    $filter =" and `id`='".trim($_REQUEST["id"])."' ";
}


$q = new Query();
$q->select()
->from("`pages` where '1' ".$filter)
->limit(1)
->run();
$data['count'] = $q->get_selected_count();
$data['page'] = $q->get_selected();


echo json_encode($data);
    
?>