<!DOCTYPE html>
<html lang="el">
<head>
	<title> ΚΑΤΑΣΤΑΣΕΙΣ </title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta charset="utf-8"></meta>
</head>
<body>

<?php

	function searches_kalous_pelates(){
	   $miden=0 ;

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					

			$sql= "select name1,account1 
					 from IDIOTIS I,DOSOLHPSIA D ,AGORA A 
					 where  I.account1=A.onoma_pelati and I.trexon_poso_ofeilis1='$miden';";
					
					echo 'ΚΑΛΗ ΠΕΛΑΤΕΣ ΠΟΥ ΠΛΗΡΩΝΟΥΝ ΣΤΗΝ ΩΡΑ ΤΟΥΣ:'."<br>" ;

					echo 'Ονομα Πελατη'."\t|";
					echo 'Λογαρισαμος Πελατη' . "\t|";
					
							
			$result = mysql_query($sql,$connect);


			if(mysql_num_rows($result)!=0){
	
				while($row = mysql_fetch_row($result)){
		
				$onoma_pelati=$row[0];
			   $account=$row[1];
		   								
					echo "<br>";
					print_r($onoma_pelati);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($account);
echo " &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;| "; 

					echo "<br>";
		}
	}
}


	function searches_kakous_pelates() {
	$miden=0 ;
		$sql= "select name1,account1 
					 from IDIOTIS I,AGORA A 
					 where  I.account1=A.onoma_pelati and I.trexon_poso_ofeilis1>'$miden'
					 order by I.trexon_poso_ofeilis1;";
					 
		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
			
					
		echo 'Κακη Πελατες Που Χρωστανε' . "<br>";
					echo 'Ονομα Πελατη'."\t|";
					echo 'Λογαριασμος Πελατη'."\t|";
					
							
			$result = mysql_query($sql,$connect);
			$i=0;

			if(mysql_num_rows($result)!=0){

				while($row = mysql_fetch_row($result)){
				$onoma_pelati=$row[0];
				$account_pelati=$row[1];			  
		   								
				
				
					echo "<br>";
					print_r($onoma_pelati);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($account_pelati);
echo " &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;| "; 

					echo "<br>";
			}
		}

	}
	
	
	function searches_kaluteros_emporos(){
		
	   $miden=0 ;

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					

			$sql= "select name1,account1 
					 from IDIOTIS I,DOSOLHPSIA D ,AGORA A 
					 where  I.account1=A.onoma_pelati and I.trexon_poso_ofeilis1='$miden';";
					
					echo 'ΚΑΛΗ ΠΕΛΑΤΕΣ ΠΟΥ ΠΛΗΡΩΝΟΥΝ ΣΤΗΝ ΩΡΑ ΤΟΥΣ:'."<br>" ;

					echo 'Ονομα Πελατη'."\t|";
					echo 'Λογαρισαμος Πελατη' . "\t|";
					
							
			$result = mysql_query($sql,$connect);


			if(mysql_num_rows($result)!=0){

				while($row = mysql_fetch_row($result)){
		
				$onoma_pelati=$row[0];
			   $account=$row[1];
		   								
					echo "<br>";
					print_r($onoma_pelati);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($account);
echo " &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;| "; 

					echo "<br>";
		}
	}
	//=======================
	$sql= "select MONTH(date_), sum(sunolo_agoras),emporos_logarisasmos
					 from  AGORA 
					 where YEAR(date_) = YEAR(NOW())  
					group by MONTH(date_),emporos_logarisasmos";

			$result = mysql_query($sql,$connect);		
		if(mysql_num_rows($result)!=0){
						
			while($row = mysql_fetch_row($result)){
				$minas=$row[0];		
			   $log=$row[1];
			   $account_emp=$row[2];
				mysql_query("
							INSERT INTO TMP (hmerom,account_emp,poso)
							VALUES ('$minas','$account_emp','$log')");
				
				}
				
				$sql3= "select hmerom,account_emp,max(poso)
					 	  from  	TMP 
					 	  group by hmerom ;";
					 	  
				$result3 = mysql_query($sql3,$connect);
				
						if(mysql_num_rows($result3)!=0){

							while($row3 = mysql_fetch_row($result3)){
							$hm=$row3[0];
							$acc=$row3[1];
							$poso=$row3[2];
				
				$sql1= "select ofeiles,name2,account2
					 	  from  	EMPOROS  
					 	  where  EMPOROS.account2 = '$acc';";
									
				$result1 = mysql_query($sql1,$connect);
				
						if(mysql_num_rows($result1)!=0){

							while($row1 = mysql_fetch_row($result1)){
								
						$conn = new PDO("mysql:host=localhost;dbname=Credit_Card_Company","root","klodjan");								
								
							   $ofeiles=$row1[0];
			   				$name=$row1[1];
			   				$ofeiles=$ofeiles-($ofeiles*0.05);
			   				
			  $s="UPDATE EMPOROS SET ofeiles='$ofeiles' WHERE EMPOROS.account2='$account_emp';";
								$stmt1 = $conn->prepare($s);
    							$stmt1->execute();
    							echo $stmt1->rowCount() . " records UPDATED successfully";	
    							$conn = null;				
							echo " <pre><h1>Έμπορος του μηνα [$hm] : [$name]  με ποσό αγορών :[$poso] !! </h1></pre>";
							}
						
						}
					}
			
			}
			
		}
	
	
}

	
	
	
?>

<?php
if ( isset( $_POST['searches_kalous_pelates'] ) )
			searches_kalous_pelates();
if ( isset( $_POST['searches_kakous_pelates'] ) )
			searches_kakous_pelates();
if ( isset( $_POST['searches_kaluteros_emporos'] ) )
			searches_kaluteros_emporos();
?>


<h3> ΚΑΤΑΣΤΑΣΗ ΙΔΙΩΤΗ H ΕΜΠΟΡΟΥ</h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
   
   <input type="submit" name="searches_kaluteros_emporos" value="ΕΜΠΟΡΟΣ ΤΗΣ ΧΡΟΝΙΑΣ">
   <input type="submit" name="searches_kakous_pelates" value="ΚΑΚΗ ΠΕΛΑΤΕΣ">
   <input type="submit" name="searches_kalous_pelates" value="ΚΑΛΗ ΠΕΛΑΤΕΣ">
</form>





