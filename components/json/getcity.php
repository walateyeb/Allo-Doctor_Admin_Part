<?php header('Content-type: text/json');
$data = array();
$q = new Query();
$q->select("Distinct(dr_city)")
->from("`".TBL_Doctor."` where 1 ")
->run();

$data['count'] = $q->get_selected_count();
$data['data'] = $q->get_selected();


echo json_encode($data);
?>