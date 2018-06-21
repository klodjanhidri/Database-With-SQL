<!DOCTYPE html>
<html lang="el">
<head>
	<title> ΠΛΗΡΩΜΗ ΟΦΕΙΛΩΝ ΣΤΗΝ CCC </title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta charset="utf-8"></meta>
</head>
<body>

<?php

	function pliromi(){
		$idiotis_account		=$_POST["idiotis_account"];
		$emporos_account		=$_POST["emporos_account"];
		$etairia_account		=$_POST["etairia_account"];
		$poso_eksofliseis    =$_POST["poso_eksofliseis"];

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					
				echo 'emphka sto prwto if  1' . "<br>";
			$sql= "select trexon_poso_ofeilis1,ofeiles from IDIOTIS,EMPOROS where IDIOTIS.account1='$idiotis_account'
					 or EMPOROS.account2='$emporos_account';";
							
			$result = mysql_query($sql,$connect);
			

			if(mysql_num_rows($result)!=0){
				echo 'emphka sto prwto if 3434' . "<br>";
				$row = mysql_fetch_row($result);
				$ofeiles_idioti=$row[0];
				$ofeiles_emporou=$row[1];
				}

				echo $ofeiles_emporou;
//=========================================================
		
		if(!empty($idiotis_account)){
			$ofeiles_idioti=$ofeiles_idioti-$poso_eksofliseis;
			
	   	$conn = new PDO("mysql:host=localhost;dbname=Credit_Card_Company","root","klodjan");
		
			$s="UPDATE IDIOTIS SET  trexon_poso_ofeilis1='$ofeiles_idioti' WHERE IDIOTIS.account1='$idiotis_account';";
			$stmt = $conn->prepare($s);
    		$stmt->execute();
    		echo $stmt->rowCount() . " records UPDATED successfully";
    		$conn=null;			
		}
//=========================================================
		if(!empty($emporos_account)){
			$ofeiles_emporou=$ofeiles_emporou-$poso_eksofliseis;
		
			$conn = new PDO("mysql:host=localhost;dbname=Credit_Card_Company","root","klodjan");
    	
    		$s1="UPDATE EMPOROS SET ofeiles='$ofeiles_emporou' WHERE EMPOROS.account2='$emporos_account';";
			echo $doso_account_emporou;	
			$stmt1 = $conn->prepare($s1);
    		$stmt1->execute();
    		echo $stmt1->rowCount() . " records UPDATED successfully";
    		$conn=null;
		}
	
	}
?>

<?php
if ( isset( $_POST['pliromi'] ) )
			pliromi();
?>

<h3> ΠΛΗΡΩΜΗ ΟΦΕΙΛΩΝ </h3>
<form method="post"> 
	
	ΑΡΙΘΜΟΣ ΛΟΓΑΡΙΑΣΜΟΥ ΙΔΙΟΤΙ: <input type="number" name="idiotis_account" min="0.00" 
   max="999999.00" step="0.01" value="">
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>   
	
	ΑΡΙΘΜΟΣ ΛΟΓΑΡΙΑΣΜΟΥ ΕΜΠΟΡΟΥ: <input type="number" name="emporos_account" min="0.00" 
   max="999999.00" step="0.01" value="">
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br> 
   
   ΠΟΣΟ ΕΞΟΦΛΗΣΗΣ: <input type="number" name="poso_eksofliseis" min="0.00" 
   max="999999.00" step="0.01" value="">
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>   
	

   <input type="submit" name="pliromi" value="ΠΛΗΡΩΜΗ">
   </form>

</body>
</html>


