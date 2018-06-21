<!DOCTYPE html>
<html lang="el">
<head>
	<title> ΑΓΟΡΑ ΠΡΟΙΟΝΤΟΣ </title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta charset="utf-8"></meta>
</head>
<body>

<?php
	function agora(){
		$doso_ID						=$_POST["doso_ID"];
		$doso_tipos_dosolipsias =$_POST["doso_tipos_dosolipsias"];
		$doso_date					=$_POST["doso_date"];
		$doso_account_idioti		=$_POST["doso_account_idioti"];
		$doso_account_emporou	=$_POST["doso_account_emporou"];
		$doso_poso_dosolipsias	=$_POST["doso_poso_dosolipsias"];

		
		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	if(!empty($doso_tipos_dosolipsias) && !empty($doso_date) &&!empty($doso_account_idioti) 
		&& !empty($doso_account_emporou)&& !empty($doso_poso_dosolipsias)){
					

			$sql= "select name1,account1, upoloipo_poso1,trexon_poso_ofeilis1 from IDIOTIS where IDIOTIS.account1='$doso_account_idioti';";
							
			$result = mysql_query($sql,$connect);
			

			if(mysql_num_rows($result)!=0){
				echo 'emphka sto prwto if 3434' . "<br>";
				$row = mysql_fetch_row($result);
				$idioti_name1=$row[0];
				$idioti_account1=$row[1];
				$idioti_upoloipo_poso1=$row[2];
				$idioti_trexon_poso_ofeilis1=$row[3];
				$sql1 ="select name2, kerdos,promitheia_sto_CCC ,ofeiles from EMPOROS where EMPOROS.account2='$doso_account_emporou';";
								
				$temp_result = mysql_query($sql1,$connect);
				
				if(mysql_num_rows($temp_result)!=0){
					echo 'emphka k sto deutero if' . "<br>";
					$temp_row = mysql_fetch_row($temp_result);
					$emporos_name=$temp_row[0];
					$emporos_kerdos=$temp_row[1];
					$emporos_promitheia=$temp_row[2];
					$emporos_ofeiles=$temp_row[3];
					if($doso_poso_dosolipsias<=$idioti_upoloipo_poso1){
						$idioti_trexon_poso_ofeilis1=$idioti_trexon_poso_ofeilis1+$doso_poso_dosolipsias;
						$idioti_upoloipo_poso1 = $idioti_upoloipo_poso1 -$doso_poso_dosolipsias;
						$poso_promithias=($emporos_promitheia/100)*$doso_poso_dosolipsias;
	   				$emporos_kerdos = $emporos_kerdos +($doso_poso_dosolipsias-$poso_promithias);
						$emporos_ofeiles=$emporos_ofeiles+$poso_promithias;
						
						mysql_query("
							INSERT INTO DOSOLHPSIA (id,name_customer,name_seller,date,poso_dosolipsias,tipos_dosolipsias)
							VALUES ('$doso_ID','$idioti_name1', '$emporos_name', '$doso_date', 
									  '$doso_poso_dosolipsias','$doso_tipos_dosolipsias')");

						mysql_query("
							INSERT INTO AGORA (id_,sunolo_agoras,date_, onoma_pelati,emporos_logarisasmos)
							VALUES ('$doso_ID','$doso_poso_dosolipsias','$doso_date','$doso_account_idioti','$doso_account_emporou')");
					
					}else {echo 'Aneparkis Pistotiko Upoloipo ';}
	
		$conn = new PDO("mysql:host=localhost;dbname=Credit_Card_Company","root","klodjan");
		
		$s="UPDATE IDIOTIS SET  trexon_poso_ofeilis1='$idioti_trexon_poso_ofeilis1',upoloipo_poso1='$idioti_upoloipo_poso1' WHERE IDIOTIS.account1='$doso_account_idioti';";

		$stmt = $conn->prepare($s);
    	$stmt->execute();
    	echo $stmt->rowCount() . " records UPDATED successfully";
    	
    	$s1="UPDATE EMPOROS SET kerdos='$emporos_kerdos',ofeiles='$emporos_ofeiles' WHERE EMPOROS.account2='$doso_account_emporou';";
			echo $doso_account_emporou;	
		$stmt1 = $conn->prepare($s1);
    	$stmt1->execute();
    	echo $stmt1->rowCount() . " records UPDATED successfully";
    					
				}
			}
			
		}
	
	}
?>

<?php
if ( isset( $_POST['agora'] ) )
			agora();
?>

<h3>Ο ΠΕΛΑΤΗΣ ΑΓΟΡΑΖΕΙ </h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
	
	ID ΔΟΣΟΛΗΨΙΑΣ: <input type="number" name="doso_ID" min="0.00" 
   max="999999.00" step="0.01" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>   
	
	ΤΥΠΟΣ ΔΟΣΟΛΗΨΙΑΣ (χρεωση\πιστωση): <input type="text" name="doso_tipos_dosolipsias"value="">
   <span class="error">*  </span>
   <span style="color:grey"> <span style="font-style:italic">
   <br>

 	ΗΜΕΡΟΜΗΝΙΑ: <input type="date" name="doso_date">
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "ηη/μμ/εεεε";?> 
   </span></span>
   <br>

	ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ: <input type="number" name="doso_account_idioti" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "Αριθμός μέχρι 11 ψηφία";?> 
   </span></span>
   <br>

	ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ ΕΜΠΟΡΟΥ: <input type="number" name="doso_account_emporou" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "Αριθμός μέχρι 11 ψηφία";?> 
   </span></span>
   <br>

	ΤΙΜΙ ΑΓΟΡΑΣ: <input type="number" name="doso_poso_dosolipsias" min="0" 
    max="999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "Αριθμός μέχρι 6 ψηφία";?> 
   </span></span>
   <br>
   

   <input type="submit" name="agora" value="ΕΚΤΕΛΕΣΕ ΤΗΝ ΑΓΟΡΑ">
   </form>

</body>
</html>
   