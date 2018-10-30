<?php
function redirect($pg_name)
{
	header('location:'.$pg_name);
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

?>