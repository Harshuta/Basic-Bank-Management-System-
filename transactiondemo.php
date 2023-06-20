<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                 <script>
                  swal("Transfer Successful", "Click OK to close", "success");
                 </script>
<?php
session_start();
class TransactionDemo {

 const servername = 'localhost';
    const dbname = 'bank management system';
    const username = 'root';
    const password = '';

    public function __construct() {
       
        $conStr = sprintf("mysql:servername=%s;dbname=%s", self::servername, self::dbname);
        try {
            $this->pdo = new PDO($conStr, self::username, self::password);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

private $pdo = null;

 function transfer($from, $to, $amount) {

        try {
            $this->pdo->beginTransaction();

           
            $sql = 'SELECT amount FROM customers WHERE name=:from';
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(array(":from" => $from));
            $availableAmount = (int) $stmt->fetchColumn();
            $stmt->closeCursor();

            if ($availableAmount < $amount) {
                echo 'Insufficient amount to transfer';
                return false;
            }
          
            $sql_update_from = 'UPDATE customers
        SET amount = amount - :amount
        WHERE Name= :from';
            $stmt = $this->pdo->prepare($sql_update_from);
            $stmt->execute(array(":from" => $from, ":amount" => $amount));
            $stmt->closeCursor();


           
            $sql_update_to = 'UPDATE customers
                                SET amount = amount + :amount
                                WHERE name= :to';
            $stmt = $this->pdo->prepare($sql_update_to);
            $stmt->execute(array(":to" => $to, ":amount" => $amount));

            
            $this->pdo->commit();
         
            return true;
        } catch (PDOException $e) {
            $this->pdo->rollBack();
            die($e->getMessage());
        }
    }
 
     public function __destruct() {
      
        $this->pdo = null;
    }

}


$obj = new TransactionDemo();


$obj->transfer("Harshu","Sneha",1000);




?>
<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
html,
body {
	height: 100%;
}

body {
	margin: 0;
	background-color:grey;
	font-family: sans-serif;
   font-color: grey;
	font-weight: 100;
}

.container {
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%, -50%);
}

table {
  padding: 30px;

  	width: 800px;
	border-collapse: collapse;
	overflow: hidden;
	box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
	padding: 15px;
	background-color: black;
	color: white
  ;
}

th {
	text-align: left;
}

thead {
	th {
		background-color: #55608f;
	}
}


tr:hover {		
  position: relative;
  

}
.buttonn:link,
.buttonn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
    position: relative;
}

.buttonn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.buttonn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.buttonn-white {
    background-color: #fff;
    color: #777;
  font-size: 14px;
}

.header {
    height: 9vh;
    background-image: 
    linear-gradient(to right bottom, 
   blue,
  purple),
   url('image1.jpg');
    
  background-size: cover;
    background-position: top;
    position: relative;

    clip-path: polygon(0 0, 100% 0, 100% 75vh, 0 100%);
    margin-top: 0%;
    padding-top: 0%;
}
*{
  font-weight:400;
  font-family:Means Web,Georgia,Times,Times New Roman,serif;
  -webkit-font-variant-ligatures:none;
  font-variant-ligatures:none;
  font-size:var(--h1-size);
  line-height:var(--h3-line);
  letter-spacing:0;
}
table {
  width: 100%;
  border-collapse: 0;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

tr:hover {
  background-color: #f5f5f5;
  cursor: pointer;
}

.selected {
  background-color: #ccc;
}

td:not(:last-child),
th:not(:last-child) {
  padding-right: 70px; 
}


.btnn:link,
.btnn:visited {
    text-transform: uppercase;
    text-decoration: none;
    padding: 10px 20px;
    display: inline-block;
    border-radius: 100px;
    transition: all .2s;
    position: relative;
}

.btnn:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.btnn:active {
    transform: translateY(-1px);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}

.btnn-white {
    background-color: #fff;
    color: #777;
  font-size: 14px;
}
</style>
</head>
<script>document.addEventListener('DOMContentLoaded', function () {
  var table = document.getElementById('myTable');
  var rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
  var transferBtn = document.getElementById('transferBtn');
  var selectedRow = null;
  
  for (var i = 0; i < rows.length; i++) {
    var selectBtn = rows[i].querySelector('.selectBtn');
    var actionBtn = rows[i].querySelector('.actionBtn');
    
    selectBtn.addEventListener('click', function (event) {
      event.stopPropagation(); 
      
      var row = this.parentElement.parentElement;
      
      if (selectedRow === row) {
        row.classList.remove('selected');
        selectedRow = null;
        transferBtn.disabled = true;
      } else {
        if (selectedRow !== null) {
          selectedRow.classList.remove('selected');
        }
        row.classList.add('selected');
        selectedRow = row;
        transferBtn.disabled = false;
      }
    });
    
    actionBtn.addEventListener('click', function (event) {
      event.stopPropagation(); 
      
      var row = this.parentElement.parentElement;
      
      if (selectedRow === row) {
       
        console.log('Selected customer:', row);
      }
    });
  }
});


</script>
<body>
<header class="header">
              
              <div class="text-box">
                
              </div>

          </header>
  <div class="container">

<table  class="table-hover">
  <tbody>
<thead>
  <tr>
   

  
<th><b>ID</b></th>
<th><b>USERNAME</b></th>
<th><b>EMAIL</b></th>
<th><b>AMOUNT</b></th>

</tr>
</thead>
<tr>


<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "bank management system";

$conn = mysqli_connect($servername, $username, $password, $database);



$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn, $sql);


$num = mysqli_num_rows($result);


if($num> 0){

    while($row = mysqli_fetch_assoc($result)){
       
        echo "<tr><td>" .  $row['Id_no'] . "</td><td>"   . $row['Name'] . "</td><td>" . $row['Email']. "</td><td>" . $row['Amount'];
        echo "<br>";
    }


}
?>


</tr>
</tbody>
</table>

</body>
</html>


</body>
</html>