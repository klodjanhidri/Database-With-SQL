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

	function searches_date(){
	   $search_date=$_POST["search_date"]; 

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					

			$sql= "select id,name_customer,name_seller,date,poso_dosolipsias,tipos_dosolipsias 
					 from DOSOLHPSIA 
					 where DOSOLHPSIA.date='$search_date';";
					 
					echo "<br>".'barcode δοσοληψιας' . "\t|";
					echo 'Ονομα Πελατη'."\t|";
					echo 'Ονομα Εμπορου' . "\t|";
					echo 'Ημερομηνια' . "\t|";
				   echo 'Ποσο Αγορας' . "\t|";
				   echo 'Τυπος Δοσοληψιας'."<br>";
							
			$result = mysql_query($sql,$connect);
			$i=0;

			if(mysql_num_rows($result)!=0){

				while($row = mysql_fetch_row($result)){
				$id=$row[0];
				$onoma_pelati=$row[1];
			   $onoma_emporou=$row[2];
		   	$hmeromonima=$row[3];
			   $poso_agoras=$row[4];
				$tipos=$row[5];								
				
				
					echo "<br>";
					print_r($id);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($onoma_pelati);
echo " &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;| "; 
					print_r($onoma_emporou);
echo ("&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp\t\t\t|");
					print_r($hmeromonima);
echo "&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($poso_agoras);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp\t\t\t|";
					print_r($tipos);
					echo "<br>";
		}
	}
}


	function katastasi_pelati() {
	$search_name=$_POST["search_name"];
	$search_account=$_POST["search_account"];	
	$search_expiration_date_account=$_POST["search_expiration_date_account"];
	$search_trexon_poso_ofeilis=$_POST["search_trexon_poso_ofeilis"];
	$search_upoloipo_poso=$_POST["search_upoloipo_poso"];


		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
				if(!empty($search_account)) {	

			$sql= "select id_,name_customer,name_seller,date_,poso_dosolipsias,tipos_dosolipsias 
					 from  AGORA A,DOSOLHPSIA D,IDIOTIS I
					 where  (A.onoma_pelati='$search_account' and A.id_=D.id);";
					 }
					 
					 if(!empty($search_name)&&!empty($search_trexon_poso_ofeilis)&&
					 !empty($search_upoloipo_poso)&&!empty($search_expiration_date_account)) {	

			$sql= "select id_,name_customer,name_seller,date_,poso_dosolipsias,tipos_dosolipsias 
					 from  AGORA A,DOSOLHPSIA D,IDIOTIS I
					 where  (A.onoma_pelati='$search_account' and A.id_=D.id) 
					 			or (I.name1='$search_name' and D.name_customer='$search_name' 
					 			and I.account1=A.onoma_pelati and A.id_=D.id 
					 			and I.trexon_poso_ofeilis1='$search_trexon_poso_ofeilis'
					 			and I.upoloipo_poso1='$search_upoloipo_poso'
					 			and I.expiration_date_account1='$search_expiration_date_account') ;";
					 }
			//		 $sql= "select name_customer
			//		 from  AGORA A,DOSOLHPSIA 
			//		 where  A.onoma_pelati='$search_account'  ;";
					
		echo "<br>".'barcode δοσοληψιας' . "\t|";
					echo 'Ονομα Πελατη'."\t|";
					echo 'Ονομα Εμπορου' . "\t|";
					echo 'Ημερομηνια' . "\t|";
				   echo 'Ποσο Αγορας' . "\t|";
				   echo 'Τυπος Δοσοληψιας'."<br>";
							
			$result = mysql_query($sql,$connect);
			$i=0;

			if(mysql_num_rows($result)!=0){
				echo 'bika gamo';
				while($row = mysql_fetch_row($result)){
				$id=$row[0];
				$onoma_pelati=$row[1];
			   $onoma_emporou=$row[2];
		   	$hmeromonima=$row[3];
			   $poso_agoras=$row[4];
				$tipos=$row[5];								
				
				
					echo "<br>";
					print_r($id);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($onoma_pelati);
echo " &nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;| "; 
					print_r($onoma_emporou);
echo ("&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp\t\t\t|");
					print_r($hmeromonima);
echo "&nbsp;&nbsp;&nbsp;\t\t\t|";
					print_r($poso_agoras);
echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp\t\t\t|";
					print_r($tipos);
					echo "<br>";
			}
		}

	}

?>

<?php
if ( isset( $_POST['searches_date'] ) )
			searches_date();
if ( isset( $_POST['katastasi_pelati'] ) )
			katastasi_pelati();
?>

<h3> ΑΝΑΖΗΤΗΣΗ ΔΟΣΟΛΗΨΙΑΣ </h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
   
   ΗΜ/ΝΙΑ: <input type="date" name="search_date">
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "ηη/μμ/εεεε";?> 
   </span></span>
   <br>
   
   <input type="submit" name="searches_date" value="ΑΝΑΖΗΤΗΣΗ">
</form>

<h3> ΚΑΤΑΣΤΑΣΗ ΙΔΙΩΤΗ H ΕΜΠΟΡΟΥ</h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
   
   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ: <input type="number" name="search_account" value="">
   <span class="πατηστε τον αριθμο λογαριασμου">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>

ΟΝΟΜΑ ΠΕΛΑΤΗ (χρεωση\πιστωση): <input type="text" name="search_name"value="">
   <span class="error">*  </span>
   <span style="color:grey"> <span style="font-style:italic">
   <br>   
 
   
	ΗΜΕΡΟΜΗΝΙΑ ΛΗΞΗΣ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ: <input type="date" name="search_expiration_date_account">
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "ηη/μμ/εεεε";?> 
   </span></span>
    <br>
    
   ΤΡΕΧΟΝ ΟΦΕΙΛΕΣ ΠΕΛΑΤΗ: <input type="number" name="search_trexon_poso_ofeilis" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΥΠΟΛΟΙΠΟ ΠΙΣΤΩΣΗΣ ΠΕΛΑΤΗ: <input type="number" name="search_upoloipo_poso" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
    
 
   
   <input type="submit" name="katastasi_pelati" value="κατασταση πελατη">
</form>




