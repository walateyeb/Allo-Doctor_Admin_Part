<?php header('Content-type: text/json');
$data = array();

$q = new Query();
$q->select()
->from(TBL_Service_charge)
->where_equal_to(array("clinic_id"=>common::get_control_value("cl_id")))
->run();

$data['count'] = $q->get_selected_count();
$data['data'] = $q->get_selected();


echo json_encode($data);
?>