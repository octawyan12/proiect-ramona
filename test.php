<html>
<body>

<?php
	include ("mySqlConnect.php");
	$sql = "SELECT imagine FROM filme1";
	$resursa = mysql_query($sql);
	$contor = 0;
	while ($row = mysql_fetch_array($resursa))
	{
		$array[$contor]=$row['imagine'];
		$contor ++;
	}
	for ($i=0; $i<$contor; $i++){
		echo $array[$i]."<br>";
	}
?>

<script type="text/javascript">

    var jArray= <?php echo json_encode($array ); ?>;
	var dim= <?php echo json_encode($contor ); ?>;

    for(var i=0;i<dim;i++){
        alert(jArray[i]);
    }

 </script>


  

</body>
</html>