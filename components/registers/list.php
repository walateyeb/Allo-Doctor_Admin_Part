<?php common::user_access_only("admin");
$q = new Query();
$q->select()
->from(TBL_REGISTERS)
->order_by("reg_date DESC")
->run();
$data = $q->get_selected();
?>