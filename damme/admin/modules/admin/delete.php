<?php
	
	$open = "admin";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));

	$Deleteadmin = $db->fetchID("admin", $id);
	if ( empty($Deleteadmin)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("admin");
	}

	$num = $db->delete("admin", $id);
	if($num > 0) 
	{
		$_SESSION['success'] = "Xoá tài khoản thành công ";
		redirectAdmin("admin");
	}
	else {
		$_SESSION['error'] = "Xoá tài khoản thất bại ";
		redirectAdmin("admin");
	}
		
?>




 