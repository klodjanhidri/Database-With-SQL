<!DOCTYPE html>
<html lang="el">
<head>
	<title> ΕΠΙΣΤΡΟΦΗ ΠΡΟΙΟΝΤΟΣ </title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta charset="utf-8"></meta>
</head>
<body>

<?php

	function epistrofi(){
		$doso_ID_proiontos		=$_POST["doso_ID_proiontos"];

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	if(!empty($doso_ID_proiontos)){
					
				echo 'emphka sto prwto if  1' . "<br>";
			$sql= "select sunolo_agoras,onoma_pelati,id_,emporos_logarisasmos from AGORA where AGORA.id_='$doso_ID_proiontos';";
							
			$result = mysql_query($sql,$connect);
			

			if(mysql_num_rows($result)!=0){
				echo 'emphka sto prwto if 3434' . "<br>";
				$row = mysql_fetch_row($result);
				$price=$row[0];
				$idioti_account1=$row[1];
				$id_proiontos=$row[2];
				$emporo_account=$row[3];

//=========================================================
$sql2 ="select trexon_poso_ofeilis1,upoloipo_poso1 from IDIOTIS where IDIOTIS.account1='$idioti_account1';";
				$temp_result1 = mysql_query($sql2,$connect);
  				
  				if(mysql_num_rows($temp_result1)!=0){
					echo 'emphka k sto deutero trito if' . "<br>";
					$temp_row1 = mysql_fetch_row($temp_result1);
				   $idiotis_poso_ofeilis=$temp_row1[0];
				   $idiotis_upoloipo_poso=$temp_row1[1];	
				}

//=========================================================	

//=========================================================
$sql2 ="select kerdos,ofeiles,promitheia_sto_CCC from EMPOROS where EMPOROS.account2='$emporo_account';";
				$temp_result2 = mysql_query($sql2,$connect);
  
  				if(mysql_num_rows($temp_result2)!=0){
					echo 'emphka k sto deutero trito if' . "<br>";
					$temp_row2 = mysql_fetch_row($temp_result1);
				   $emporos_kerdos=$temp_row2[0];
				   $emporos_ofeiles=$temp_row2[1];
				   $emporos_promithia=$temp_row2[2];	
				}

//=============================================					
				$tmp=$price*($emporos_promithia/100);
				$emporos_ofeiles=$emporos_ofeiles-$tmp;
				$emporos_kerdos=$emporos_kerdos-($price-$tmp);
				$idiotis_upoloipo_poso=$idiotis_upoloipo_poso+$price;
				$idiotis_poso_ofeilis=$idiotis_poso_ofeilis-$price;	
				
				$conn = new PDO("mysql:host=localhost;dbname=Credit_Card_Company","root","klodjan");
		
		$s="UPDATE IDIOTIS SET  trexon_poso_ofeilis1='$idiotis_poso_ofeilis',upoloipo_poso1='$idiotis_upoloipo_poso' WHERE IDIOTIS.account1='$idioti_account1';";

		$stmt = $conn->prepare($s);
    	$stmt->execute();
    	echo $stmt->rowCount() . " records UPDATED successfully";
    	
    	$s1="UPDATE EMPOROS SET kerdos='$emporos_kerdos',ofeiles='$emporos_ofeiles' WHERE EMPOROS.account2='$emporo_account';";
			echo $doso_account_emporou;	
		$stmt1 = $conn->prepare($s1);
    	$stmt1->execute();
    	echo $stmt1->rowCount() . " records UPDATED successfully";
    		
    		$conn=new mysqli("localhost","root","klodjan","Credit_Card_Company");
    			
    			$sql3="DELETE FROM DOSOLHPSIA WHERE DOSOLHPSIA.id='$doso_ID_proiontos'";
    			if(mysqli_query($conn, $sql3)) {
    				echo "Record deleted successfully";
				} else {
    				echo "Error deleting record: " . mysqli_error($conn);
				}

				    			
				$sql4="DELETE FROM AGORA WHERE AGORA.id_='$doso_ID_proiontos'";
				if(mysqli_query($conn, $sql4)) {
    				echo "Record deleted successfully";
				} else {
    				echo "Error deleting record: " . mysqli_error($conn);
				}
				mysqli_close($conn);
    			
			}			
		}
	
	}
?>

<?php
if ( isset( $_POST['epistrofi'] ) )
			epistrofi();
?>

<h3> ΕΠΙΣΤΡΟΦΗ ΠΡΟΙΟΝΤΟΣ </h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
	
	ΚΩΔΙΚΟ ΠΡΟΙΟΝΤΟΣ: <input type="number" name="doso_ID_proiontos" min="0.00" 
   max="999999.00" step="0.01" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>   
	
	

   <input type="submit" name="epistrofi" value="ΕΠΙΣΤΡΟΦΗ ΠΡΟΙΟΝΤΟΣ">
   </form>

</body>
</html>


