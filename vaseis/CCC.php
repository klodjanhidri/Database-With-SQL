/* 
	name  Klodjan Hidri
	AM	 2726
	login	hidri@csd.uoc.gr
*/ 

<!DOCTYPE html>
<html lang="el">
<head>
	<title> Credit_Card_Company </title>
	<style>
	.error {color: #FF0000;}
	</style>
	<meta charset="utf-8"></meta>
</head>
<body>

<?php

$username = "root";
$password = "klodjan";
$hostname = "localhost";

//connection to MySQL
$dbhandle = mysql_connect($hostname, $username,$password)
	or die ("Unable to connect to MySQL lathos" . mysql_error());
echo "Connected to MySQL";

//create database
$sql = 'CREATE DATABASE Credit_Card_Company';
if (mysql_query($sql, $dbhandle)) {
    echo "Database Credit_Card_Company created successfully" . mysql_error();
} else {
    echo "Error creating database \n\n: " . mysql_error();
}

//select a database to work with
$selected = mysql_select_db("Credit_Card_Company",$dbhandle)
	or die("Could not select Credit_Card_Company ");
echo "Database Credit_Card_Company selected successfully";

//Create necessary tables in Credit_Card_Company
// first of all the company table


$sql = mysql_query("CREATE TABLE IF NOT EXISTS `ETAIREIA` (
`name`					 		varchar(40)	 NOT NULL,
`account` 				 		int(11)		 NOT NULL,
`expiration_date_account`  date 			 Not NULL,
`credit_limit`			 		int(10)		 NOT NULL,
`trexon_poso_ofeilis` 		int(10)      NOT NULL,
`upoloipo_poso`		 		int(10)		 NOT NULL,
`onoma_ipallilou`				varchar(40)  NOT NULL,
`ID`								int(40)		 NOT NULL,		
PRIMARY KEY(name, account))")
	or die("Unable to create Table ETAIREIA " . mysql_error());
echo 'Table ETAIREIA created ' ;



$sql = mysql_query("CREATE TABLE IF NOT EXISTS `IDIOTIS`(
`name1`					 		varchar(40)	 NOT NULL,
`account1` 				 		int(11) 	    NOT NULL,
`expiration_date_account1` date 			 Not NULL,
`credit_limit1`			 	int(10)		 NOT NULL,
`trexon_poso_ofeilis1` 		int(10)      NOT NULL,
`upoloipo_poso1`		 		int(10)		 NOT NULL,
PRIMARY KEY(name1, account1))")

	or die("Unable to create Table IDIOTIS " . mysql_error());
echo 'Table IDIOTIS created ' ;

$sql = mysql_query("CREATE TABLE IF NOT EXISTS `EMPOROS`(
`name2`					varchar(40)	 NOT NULL,
`account2` 				int(11)		 NOT NULL,
`promitheia_sto_CCC`	int(10)		 NOT NULL,
`kerdos` 				int(10)      NOT NULL,
`ofeiles`				float(10)	 NOT NULL,
PRIMARY KEY(name2, account2))")

	or die("Unable to create Table EMPOROS " . mysql_error());
echo 'Table  created EMPOROS ' ;


$sql = mysql_query("CREATE TABLE IF NOT EXISTS `DOSOLHPSIA`(
`id`						int(10)     UNIQUE NOT NULL,
`name_customer`		varchar(40)	NOT NULL,
`name_seller`			varchar(40) NOT NULL,
`date`					date			NOT NULL,
`poso_dosolipsias`   float(6)		NOT NULL,
`tipos_dosolipsias`	varchar(40) NOT NULL,
PRIMARY KEY(id))")
	or die("Unable to create Table DOSOLHPSIA " . mysql_error());
echo 'Table DOSOLHPSIA created ';


$sql = mysql_query("CREATE TABLE IF NOT EXISTS `AGORA`(
`id_`						int(10)     UNIQUE NOT NULL,
`sunolo_agoras`		float(10) 	NOT NULL,
`date_`					date			NOT NULL,
`onoma_pelati`			int(10)     NOT NULL,
`emporos_logarisasmos`			int(10)     NOT NULL,

PRIMARY KEY(id_))")
	or die("Unable to create Table AGORA " . mysql_error());
echo 'Table AGORA created ';

//--------------------------
//ksexoristoi pinakes gia ipallillous epeidi einai pleiotima
$sql = mysql_query("CREATE TABLE IF NOT EXISTS `IPALLILOS`(
`onoma_ipallilou`		varchar(40),
`account`   			int(6)	NOT NULL,

PRIMARY KEY(onoma_ipallilou,account))")
	or die("Unable to create Table IPALLILOS " . mysql_error());
echo 'Table IPALLILOS created ';



/*
Tables are created. Now must create graphics!
*/
?>

<?php
/*
create the functions for button calls.
*/



//for insert into etaireia
function etaireia_insert(){
		$etaireia_name								= $_POST["etaireia_name"];
		$etaireia_account 						= $_POST["etaireia_account"];
		$etaireia_expiration_date_account	= $_POST["etaireia_expiration_date_account"];
		$etaireia_credit_limit					= $_POST["etaireia_credit_limit"];
		$etaireia_trexon_poso_ofeilis		   = $_POST["etaireia_trexon_poso_ofeilis"];
		$etaireia_upoloipo_poso					= $_POST["etaireia_upoloipo_poso"];
		$etaireia_onoma_ipallilou		   	= $_POST["etaireia_onoma_ipallilou"];
		$etaireia_ID								= $_POST["etaireia_ID"];
	
	$ok=mysql_query("
			INSERT INTO ETAIREIA (name,account, expiration_date_account,
										 credit_limit,trexon_poso_ofeilis,upoloipo_poso,
										 onoma_ipallilou,ID)
			VALUES  ('$etaireia_name', '$etaireia_account', 
			'$etaireia_expiration_date_account', '$etaireia_credit_limit'
			,'$etaireia_trexon_poso_ofeilis', 
			  '$etaireia_upoloipo_poso','$etaireia_onoma_ipallilou','$etaireia_ID')
		");
		
		if ( $ok ) {
			mysql_query("
				INSERT INTO IPALLILOS (onoma_ipallilou,account)
				VALUES ('$etaireia_onoma_ipallilou', '$etaireia_account')
			");
		}

}


function idiotis_insert(){
		$idiotis_name							= $_POST["idiotis_name"];
		$idiotis_account 						= $_POST["idiotis_account"];
		$idiotis_expiration_date_account	= $_POST["idiotis_expiration_date_account"];
		$idiotis_credit_limit				= $_POST["idiotis_credit_limit"];
		$idiotis_trexon_poso_ofeilis	   = $_POST["idiotis_trexon_poso_ofeilis"];
		$idiotis_upoloipo_poso				= $_POST["idiotis_upoloipo_poso"];
	
	mysql_query("
			INSERT INTO IDIOTIS (name1,account1, expiration_date_account1,
										 credit_limit1,trexon_poso_ofeilis1,upoloipo_poso1)
			VALUES  ('$idiotis_name',
						'$idiotis_account', 
						'$idiotis_expiration_date_account', 
						'$idiotis_credit_limit',
						'$idiotis_trexon_poso_ofeilis', 
			  			'$idiotis_upoloipo_poso')
		");

}

function emporos_insert(){
		$emporos_name						= $_POST["emporos_name"];
		$emporos_account 					= $_POST["emporos_account"];
		$emporos_promitheia_sto_CCC   = $_POST["emporos_promitheia_sto_CCC"];
		$emporos_kerdos					= $_POST["emporos_kerdos"];
		$emporos_ofeiles	   			= $_POST["emporos_ofeiles"];
	
	mysql_query("
			INSERT INTO EMPOROS (name2,account2,promitheia_sto_CCC,kerdos,ofeiles)
			VALUES  ('$emporos_name',
						'$emporos_account', 
						'$emporos_promitheia_sto_CCC', 
						'$emporos_kerdos',
						'$emporos_ofeiles')
		");

}

function doso_insert(){
	$doso_ID						= $_POST["doso_ID"];
	$doso_name_customer		= $_POST["doso_name_customer"];
	$doso_name_seller			= $_POST["doso_name_seller"];
	$doso_date 					= $_POST["doso_date"];
	$doso_poso_dosolipsias	= $_POST["doso_poso_dosolipsias"];
	$doso_tipos_dosolipsias = $_POST["doso_tipos_dosolipsias"];
	
	mysql_query("
			INSERT INTO DOSOLHPSIA (id,name_customer, name_seller,date,poso_dosolipsias,tipos_dosolipsias)
			VALUES ('$doso_ID','$doso_name_customer', '$doso_name_seller', '$doso_date', 
				'$doso_poso_dosolipsias', '$doso_tipos_dosolipsias')
		");
}

?>

<?php

	function delete_cost(){
		$account_idioti		=$_POST["account_idioti"];
	   $name_idioti		=$_POST["name_idioti"];
	   $miden=0 ;

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					

			$sql= "select trexon_poso_ofeilis1
					 from IDIOTIS I 
					 where  I.account1='$account_idioti';";
					
					
							
			$result = mysql_query($sql,$connect);


			if(mysql_num_rows($result)!=0){
				if($row = mysql_fetch_row($result)){
			   
			   $ofeiles=$row[0];
			   
			   if($ofeiles>0){
					echo 'Δεν μπορειται να διαγραψετε τον λογαριασμο γιατι χρωστατε';			   	
			   }else {
			   
					$conn=new mysqli("localhost","root","klodjan","Credit_Card_Company");
    			
    			$sql3="DELETE FROM IDIOTIS WHERE IDIOTIS.account1='$account_idioti'";
    			if(mysqli_query($conn, $sql3)) {
    				echo "Record deleted successfully";
				} else {
    				echo "Error deleting record: " . mysqli_error($conn);
				}			   
			   
			   
			   }
		   								
			
		}
	}
}



?>

//===================================================
<?php

	function delete_emporou(){
		$account_idioti		=$_POST["account_idioti"];
	   $name_idioti		=$_POST["name_idioti"];
	   $miden=0 ;

		$connect = mysql_connect("localhost","root","klodjan");
		if(!$connect){
		die("Could not connect: " . mysql_error());
		}
		mysql_select_db("Credit_Card_Company", $connect);
		
	
					

			$sql= "select ofeiles
					 from EMPOROS I 
					 where  I.account2='$account_idioti';";
					
					
							
			$result = mysql_query($sql,$connect);


			if(mysql_num_rows($result)!=0){
				if($row = mysql_fetch_row($result)){
			   
			   $ofeiles=$row[0];
			   
			   if($ofeiles>0){
					echo "<br>".'Δεν μπορειται να διαγραψετε τον λογαριασμο γιατι εχετε οφειλες'."<br>";			   	
			   }else {
			   
					$conn=new mysqli("localhost","root","klodjan","Credit_Card_Company");
    			
    			$sql3="DELETE FROM EMPOROS WHERE EMPOROS.account2='$account_idioti'";
    			if(mysqli_query($conn, $sql3)) {
    				echo "Record deleted successfully";
				} else {
    				echo "Error deleting record: " . mysqli_error($conn);
				}			   
			   
			   
			   }
		   								
			
		}
	}
}
?>
//==================================================


<?php


//for insert into etaireia
if ( isset( $_POST['etaireia_insert'] ) )
	etaireia_insert();

//for insert into idiotis
if ( isset( $_POST['idiotis_insert'] ) )
	idiotis_insert();


if ( isset( $_POST['emporos_insert'] ) )
	emporos_insert();

//for insert into dosolipsia
if ( isset( $_POST['doso_insert'] ) )
	doso_insert();
if ( isset( $_POST['delete_cost'] ) )
	delete_cost();

if ( isset( $_POST['delete_emporou'] ) )
	delete_emporou();


?>

<h3>ΕΤΑΙΡΕΙΑ</h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
	
	ΟΝΟΜΑ ΠΕΛΑΤΙ: <input type="text" name="etaireia_name" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ: <input type="number" name="etaireia_account" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
	ΗΜΕΡΟΜΗΝΙΑ ΛΗΞΗΣ ΛΟΓΑΡΙΑΣΜΟΥ: <input type="date" name="etaireia_expiration_date_account">
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "ηη/μμ/εεεε";?> 
   </span></span>
   
   ΠΙΣΤΩΤΙΚΟ ΟΡΙΟ: <input type="number" name="etaireia_credit_limit" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
    
   ΤΡΕΧΟΝ ΟΦΕΙΛΕΣ: <input type="number" name="etaireia_trexon_poso_ofeilis" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΥΠΟΛΟΙΠΟ ΠΙΣΤΩΣΗΣ: <input type="number" name="etaireia_upoloipo_poso" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
  ΟΝΟΜΑ ΥΠΑΛΛΗΛΟΥ ΣΤΗΝ ΕΤΑΙΡΕΙΑ: <input type="text" name="etaireia_onoma_ipallilou" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ID ΥΠΑΛΛΗΛΟΥ ΣΤΗΝ ΕΤΑΙΡΕΙΑ: <input type="number" name="etaireia_ID" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   

   <input type="submit" name="etaireia_insert" value="ΔΗΜΙΟΥΡΓΙΑ ΛΟΓΑΡΙΑΣΜΟΥ ΕΤΑΙΡΕΙΑΣ">
</form>


<h3>ΙΔΙΩΤΗΣ</h3>
<p><span class="error">* Απαραίτητο Πεδίο.</span></p>
<form method="post"> 
   	ΟΝΟΜΑ ΠΕΛΑΤΗ: <input type="text" name="idiotis_name" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ: <input type="number" name="idiotis_account" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
	ΗΜΕΡΟΜΗΝΙΑ ΛΗΞΗΣ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ: <input type="date" name="idiotis_expiration_date_account">
   <span style="color:grey"> <span style="font-style:italic">
	<?php echo "ηη/μμ/εεεε";?> 
   </span></span>
   
   ΠΙΣΤΩΤΙΚΟ ΟΡΙΟ ΠΕΛΑΤΗ: <input type="number" name="idiotis_credit_limit" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
    
   ΤΡΕΧΟΝ ΟΦΕΙΛΕΣ ΠΕΛΑΤΗ: <input type="number" name="idiotis_trexon_poso_ofeilis" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΥΠΟΛΟΙΠΟ ΠΙΣΤΩΣΗΣ ΠΕΛΑΤΗ: <input type="number" name="idiotis_upoloipo_poso" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
    <input type="submit" name="idiotis_insert" value="ΔΗΜΙΟΥΡΓΙΑ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ">
</form>


<h3>ΕΜΠΟΡΟΣ</h3>

<form method="post"> 
   	ΟΝΟΜΑ ΕΜΠΟΡΟΥ: <input type="text" name="emporos_name" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ : <input type="number" name="emporos_account" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   
   ΠΡΟΜΗΘΕΙΑ : <input type="number" name="emporos_promitheia_sto_CCC" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
    
   ΚΕΡΔΟΣ : <input type="number" name="emporos_kerdos" 
   min="0" max="9999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   ΟΦΕΙΛΕΣ ΣΤΗΝ CREDIT CARD COMPANY: <input type="number" name="emporos_ofeiles" 
   min="0"max="99999999999" value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
    <input type="submit" name="emporos_insert" value="ΔΗΜΙΟΥΡΓΙΑ ΛΟΓΑΡΙΑΣΜΟΥ ΕΜΠΟΡΟΥ">
</form>



<h3> Διαγραφη Πελατη </h3>
<form method="post"> 


   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ ΠΕΛΑΤΗ: <input type="number" name="account_idioti"  value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
   
   
   <input type="submit" name="delete_cost" value="ΔΙΑΓΡΑΦΗ ΠΕΛΑΤΗ">
</form>

<h3> Διαγραφη Εμπορου </h3>
<form method="post"> 


   ΑΡΙΘΜΟ ΛΟΓΑΡΙΑΣΜΟΥ ΕΜΠΟΡΟΥ: <input type="number" name="account_idioti"  value="">
   <span class="error">* </span>
   <span style="color:grey"> <span style="font-style:italic">
   </span></span>
   <br>
 
    <input type="submit" name="delete_emporou" value="ΔΙΑΓΡΑΦΗ ΕΜΠΟΡΟΣ">
</form>



</body>
</html>

