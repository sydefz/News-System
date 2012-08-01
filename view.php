<?php
include_once ('global.php');



$sql = "SELECT * FROM `p_newsbase` where id =".$_GET[id];
$query = $db->query($sql);
$flag = 0;
while ($row_class = $db->fetch_array($query)) {
	if($row_class[id]==$_GET[id])
		$flag++;
		$classid =$row_class[cid];
}

if(empty($_GET[id])||empty($flag)){
echo '<meta http-equiv="refresh" content="0; url=index.php" />';
exit();
}


$sql = "SELECT * FROM `p_newsclass` order by id DESC";
$query = $db->query($sql);
while ($row_class = $db->fetch_array($query)) {
	if($row_class[f_id]!=0 && $row_class[id] == $classid)
		$se_id = $row_class[f_id];
	if($row_class[f_id]==0 && $row_class[id] == $classid)
		$se_id = $row_class[id];
}

//Define the selected tag

$sql = "SELECT * FROM `p_newsclass` where f_id = 0 order by id DESC";
$query = $db->query($sql);
	while ($row_class = $db->fetch_array($query)) {

		if($row_class[id] == $se_id){
		$selected_tab = "class ='selected'";
		$remark = $row_class[remark];
		$sub_name = $row_class[name]." | ";
		}

		$sm_class[] = array (
		"name" => $row_class[name],
		"id" => $row_class[id],
		"tab" => $selected_tab,
		"remark" =>  $remark);

		$selected_tab = "";
		$remark = "";

	}

$smarty->assign("sm_class", $sm_class); //导航引入

//==============

$sql = "SELECT * FROM p_config";
$query = $db->query($sql);
while ($row_config = $db->fetch_array($query)) {
	$sm_config[] = $row_config[values];
}

$smarty->assign("sm_config", $sm_config); //配置引入


//==============
$query = $db->findall("p_newsclass");
while ($row = $db->fetch_array($query)) {
	$news_class_arr[$row[id]] = $row[name];
}



$query = $db->findall("p_newsclass where f_id=".$se_id);
while ($row = $db->fetch_array($query)) {
	$news_class_list_arr[] =array("name"=>$row[name],"id"=>$row[id],);
}

$smarty->assign("news_class_list_arr", $news_class_list_arr); //新闻子类




//==============
if(!empty($_GET[id])){
	$sql="select * from p_newsbase as a, p_newscontent as b where a.id=b.nid and a.id='$_GET[id]'";
    $query=mysql_query($sql);
    $row_news=mysql_fetch_array($query);
    $row_news[4]=date("Y-m-d",$row_news[4]);
}



$smarty->assign("sub_name", $sub_name);
$smarty->assign("row_news",$row_news);//news content
//=======================================
$smarty->display("view.htm");
?>
