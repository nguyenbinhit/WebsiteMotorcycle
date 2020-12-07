<?php
	
	$open = "theloai";
	require_once __DIR__. "/../../autoload/autoload.php";


	$id = intval(getInput('id'));





	$EditCategory = $db->fetchID("theloai", $id);
	if ( empty($EditCategory)) 
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin("theloai");
	}

	/**
	 * kiểm tra xem danh mục đã có sản phẩm chưa
	 */
	$is_product = $db->fetchOne("product"," theloai_id = $id ");
	if ($is_product == NULL) 
	{
		$num = $db->delete("theloai", $id);
		if($num > 0) 
		{
			$_SESSION['success'] = "Xoá thành công ";
			redirectAdmin("theloai");
		}
		else {
			$_SESSION['error'] = "Xoá thất bại ";
			redirectAdmin("theloai");
		}	
	}
	else
	{
		$_SESSION['error'] = " Danh mục có sản phẩm ! Bạn không thể xoá ! ";
		redirectAdmin("theloai");
	}

	
		
?>




 