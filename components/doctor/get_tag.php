<?php header('Content-type: text/json');
$q = new Query();
$q->select("title")
->from(TBL_Tags)
->where_equal_to(array('type'=>common::get_control_value("type")))
->run();
$output = $q->get_selected();
$data = array();
foreach($output as $val){
    $data[] = $val["title"];
}
echo json_encode($data);
?>