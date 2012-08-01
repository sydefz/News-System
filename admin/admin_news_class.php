<?php
include_once ('admin_global.php');

$r=$db->Get_user_shell_check($uid, $shell);

if(isset($_POST[into_class])){
	$db->query("INSERT INTO `sydefzco_news`.`p_newsclass` (`id`, `f_id`, `name`, `keywrod`, `remark`)" .
			" VALUES (NULL, '$_POST[f_id]', '$_POST[name]', '', '')");
	$db->Get_admin_msg("admin_news_class.php","已经成功添加分类");
}

if(!empty($_GET[del])){
	$db->query("DELETE FROM `p_newsclass` WHERE `id` = '$_GET[del]' LIMIT 1;");
	$db->Get_admin_msg("admin_news_class.php","删除成功");
}

if(isset($_POST[update_class])){
	$db->query("update `p_newsclass` set `name`='$_POST[name]' WHERE `id` = '$_POST[id]' LIMIT 1;");
	$db->Get_admin_msg("admin_news_class.php","更新成功");
}

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD><TITLE>后台管理</TITLE>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<META content=Alan name=Author><LINK rev=MADE
href="mailto:haowubai@hotmail.com"><LINK href="images/private.css"
type=text/css rel=stylesheet>
<META content="MSHTML 6.00.6000.16890" name=GENERATOR></HEAD>
<BODY>
<TABLE class=navi cellSpacing=1 align=center border=0>
  <TBODY>
  <TR>



    <TH>后台 >> 新闻分类</TH></TR></TBODY></TABLE><BR>

	<table border=0 cellspacing=1 align=center class=form>
	<tr>
		<th colspan="2">添加分类</th>
	</tr>
	<form action="" method="post" >
    <tr>
    <td colspan="2" align="center" height='30'>

  <select name="f_id">
    <option value="0">添加大类</option>
    <?php
    $query=$db->findall("p_newsclass where f_id=0");
    while ($row=$db->fetch_array($query)) {
    	$news_class_arr[$row[id]]=$row[name];
      echo "<option value=\"$row[id]\">$row[name]</option>";
	}
    ?>
  </select>
    <input type="text" name="name" value="" />
    <input type="submit" name="into_class" value=" 添加分类 "/>
    </td>
    </form>
    </tr>
	</table>
<br>
		<table border=0 cellspacing=1 align=center class=form>
	<tr>
	<th>系统分类</th>
	</tr>

<?php
foreach($news_class_arr as $id=>$val){
?>
  <tr>
  <form action="" method="post">
  <td>
  <input type="hidden" name="id" value="<?php echo $id?>" />
  <input type="text" name="name" value="<?php echo $val?>"/>
  <input type="submit" name="update_class" value="更新"/>
  <input type="button" value="删除" onclick="location.href='?del=<?php echo $id?>'"/>
  </form>

<?php
    $query_fid=$db->findall("p_newsclass where f_id=$id");
    while ($row_fid=$db->fetch_array($query_fid)) {
?>
  <form action="" method="post">
  &nbsp;&nbsp;&nbsp;┗<input type="hidden" name="id" value="<?php echo $row_fid[id]?>" />
  <input type="text" name="name" value="<?php echo $row_fid[name]?>"/>
  <input type="submit" name="update_class" value="更新"/>
  <input type="button" value="删除" onclick="location.href='?del=<?php echo $row_fid[id]?>'"/>
  </form>
<?php } ?>
  </td>
  </tr>
<?php
}
?>
	</table>




	</BODY></HTML>
