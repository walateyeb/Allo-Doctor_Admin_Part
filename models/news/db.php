<?php
function getNews()
{
    $q = new Query();
    $q->select()
->from(TBL_NEWS)
->run();
return  $q->get_selected();

}
function getNewsById($id)
{
    $q = new Query();
    $q->select()
->from(TBL_NEWS)
->where_equal_to(array('id'=>$id))
    ->limit(1)
->run();
return  $q->get_selected();

}
function addNews($data)
{

        $q=new Query();
            $q->insert_into(TBL_NEWS,$data)
            ->run();
            common::set_message(3);
}
function updateNews($data,$condi)
{
    $q=new Query();
            $q->update(TBL_NEWS,$data)
            ->where_equal_to($condi)
            ->run();
            
            
}
?>