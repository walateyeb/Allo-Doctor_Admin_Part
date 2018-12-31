<?php
function getClinic($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Clinic)
->where_equal_to(array("dr_id"=>$id))
->run();
return  $q->get_selected();

}
function getServiceCharges($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Service_charge)
->where_equal_to(array("clinic_id"=>$id))
->run();
return  $q->get_selected();

}
function getPhotos($cl_id)
{
    $q = new Query();
    $q->select()
->from(TBL_Clinic_photo)
->where_equal_to(array("cl_id"=>$cl_id))
->run();
return  $q->get_selected();

}
function getPhotosById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Clinic_photo)
->where_equal_to(array("id"=>$id))
->limit(1)
->run();
return  $q->get_selected();

}

function getClinicById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Clinic)
->where_equal_to(array('cl_id'=>$id))
    ->limit(1)
->run();
return  $q->get_selected();

}
function getServiceChargeById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Service_charge)
->where_equal_to(array('id'=>$id))
    ->limit(1)
->run();
return  $q->get_selected();

}
function addClinic($data)
{

        $q=new Query();
            $q->insert_into(TBL_Clinic,$data)
            ->run();
            common::set_message(3);
}
function addServiceCharges($data)
{

        $q=new Query();
            $q->insert_into(TBL_Service_charge,$data)
            ->run();
            common::set_message(3);
}
function addPhoto($data)
{

        $q=new Query();
            $q->insert_into(TBL_Clinic_photo,$data)
            ->run();
            common::set_message(3);
}
function updateClinic($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Clinic,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
function updateServiceCharge($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Service_charge,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
function updatePhoto($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Clinic_photo,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}

?>