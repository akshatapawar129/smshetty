<?php
function redirect($pg_name)
{
	header('location:'.$pg_name);
}
function isValiduser()
{
	global $connect;
	$sess=session_id();
	$sel_qry = "SELECT * FROM smshetty_login WHERE adm_sess_id ='$sess' AND adm_active = 0";
	$res_sel = mysqli_query($connect,$sel_qry);
	if(mysqli_num_rows($res_sel)>0) return 1;
	else	return 0;
}

function loginchk($usernm,$passwd)
{
	global $connect;
	$pass_enc = md5($passwd);
	$sel_qry = "SELECT * FROM smshetty_login WHERE adm_us_nm = '$usernm' AND adm_pass = '$pass_enc' AND adm_active=0";
	$res_qry = mysqli_query($connect,$sel_qry);
	if(mysqli_num_rows($res_qry)>0){
		$session_id = session_id();
		$row_data = mysqli_fetch_array($res_qry);
		$_SESSION['smshetty_adm_id'] = $row_data['adm_id'];
		$adm_id = $row_data['adm_id'];
		$_SESSION['smshetty_adm_us_nm'] = $usernm;
		$upd_qry = "UPDATE smshetty_login SET adm_sess_id = '$session_id' WHERE adm_id = $adm_id";
		$res_upd_qry = mysqli_query($connect, $upd_qry);
		if($res_upd_qry) 
		{
			$error_count = 0;
		}
		else
		{
			$error_count = 2;
		}
	}
	else
	{
		$error_count = 1;
	}
	return $error_count;
}

function exc_qry($qry)
{
	global $connect;
    $resultArray=array();
	$resultQueryFinal=mysqli_query($connect,$qry);
	if(mysqli_num_rows($resultQueryFinal)>0)
	{
		while($RwGtAlSbmsn=mysqli_fetch_array($resultQueryFinal))
		{
			array_push($resultArray,$RwGtAlSbmsn);
		}
	}
	return array($resultArray);
}

	function resizeImage($fileType,$img_width,$img_height,$resize_width,$resize_height)
	{
		$img_layer = imagecreatetruecolor($resize_width, $resize_height);
		$transparent = imagecolorallocatealpha($img_layer, 0, 0, 0, 127);
		imagefill($img_layer, 0, 0, $transparent);
		imagesavealpha($img_layer, true);
		imagecopyresampled($img_layer, $fileType, 0, 0, 0, 0, $resize_width, $resize_height, $img_width, $img_height);
		return $img_layer;
	}
	function upload_image($img,$up_desti,$resize_width,$resize_height,$imgNm)
	{
		$file_tmp_nm = $img['tmp_name'];
		$img_Properties = getimagesize($file_tmp_nm); 
		$extension = pathinfo($img['name'],PATHINFO_EXTENSION);
		$file_type = $img_Properties['mime'];
		$img_width = $img_Properties[0];
		$img_height = $img_Properties[1];

		//echo $file_type;
		$name = $imgNm.time().'.'. $extension;
		switch ($file_type) {
			case 'image/jpeg':
			 $resourceType = imagecreatefromjpeg($file_tmp_nm); 
             $imageLayer = resizeImage($resourceType,$img_width,$img_height,$resize_width,$resize_height);
             if(imagejpeg($imageLayer,$up_desti.$name))
             {
             	$res = "success";
             }
             else
             {
             	echo "<script>swal('','Uploading file failed','warning');</script>";
             	$res = "failed";
             }
			break;

			case 'image/png':
			 $resourceType = imagecreatefrompng($file_tmp_nm); 
             $imageLayer = resizeImage($resourceType,$img_width,$img_height,$resize_width,$resize_height);

             if(imagepng($imageLayer,$up_desti.$name))
             {
             	$res = "success";
             }
             else
             {
             	echo "<script>swal('','Uploading file failed','warning');</script>";
             	$res = "failed";
             }
			break;

			default:
				echo "<script>swal('','Unknown File','warning');</script>";
				$res = "failed";
				break;
			
		}
		return $res;
	}


?>