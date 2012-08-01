<?php

include_once('global.php');

 $sql="SELECT * FROM `p_newsclass` where f_id=0 order by id DESC";
 $query=$db->query($sql);
 while($row_class=$db->fetch_array($query)){
 	$sm_class[]=array("name"=>$row_class[name],"id"=>$row_class[id]);
 }


 $smarty->assign("sm_class",$sm_class);//导航引入

//==============

 $sql="SELECT * FROM p_config";
 $query=$db->query($sql);
  while($row_config=$db->fetch_array($query)){
 	$sm_config[]=$row_config[values];
 }

$smarty->assign("sm_config",$sm_config);//配置引入

//==============

 $sql="SELECT * FROM `p_newsbase` order by id DESC limit 5";
 $query=$db->query($sql);
 while($row_news=$db->fetch_array($query)){
 	$sm_news[]=array("title"=>$row_news[title],"id"=>$row_news[id]);
 }


 $smarty->assign("sm_news",$sm_news);//最新新��?

//========================================


	$sql="SELECT C.* FROM p_newsclass C, p_newsbase B  where C.id= B.cid order by B.id DESC limit 5";
	$query=$db->query($sql);

	while($row_title=$db->fetch_array($query)){

 	$sm_title[]=array("name"=>$row_title[2]);
 }


$smarty->assign("sm_title",$sm_title);//最新新��?

 $smarty->display("index.htm");


?>
