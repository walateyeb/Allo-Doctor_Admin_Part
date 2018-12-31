<?
function updateapp($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Appointment,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
?>