<?php
function getCategory()
{
    $q = new Query();
    $q->select()
->from(TBL_Category)
->run();
return  $q->get_selected();

}
function getCategoryById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_Category)
->where_equal_to(array('id'=>$id))
    ->limit(1)
->run();
return  $q->get_selected();

}
function addCategory($data)
{

        $q=new Query();
            $q->insert_into(TBL_Category,$data)
            ->run();
            common::set_message(3);
}
function updateCategory($data,$condi)
{
    $q=new Query();
            $q->update(TBL_Category,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
?>