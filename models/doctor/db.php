<?php
function getDoctor()
{
    $q = new Query();
    $q->select()
->from(TBL_Doctor)
->run();
return  $q->get_selected();

}
function getDoctorById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Doctor)
->where_equal_to(array('dr_id'=>$id))
    ->limit(1)
->run();
return  $q->get_selected();

}
function addDoctor($data)
{

        $q=new Query();
            $q->insert_into(TBL_Doctor,$data)
            ->run();
            common::set_message(3);
}
function updateDoctor($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Doctor,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
?>