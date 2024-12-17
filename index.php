<?php 

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "expnDetails";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
if (isset($_GET['sn'])){
    $sn=$_GET['sn'];
    $delete=mysqli_query($conn,"DELETE FROM `info` WHERE `sn`='$sn'");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="styling.css">
    <link rel="icon" href="img/logo.png" type="img.png" >
</head>
<body>
    <section class="container">
        <div id="expn-form1" class="section-padding1">
            <h1><u>Expense Tracker</u></h1>
            <br><br>

            
            <form method="post" action="index.php" id="dataForm" >
                <input type="text" placeholder="Expense Name" name="expense-name"  id="expense-name">
                <input type="number" placeholder="Amount"  name="expense-amount">
                <select name="expense-category" id="" >
                    <option value="" disabled selected>Select Category</option>
                    <option value="Food">Food</option>
                    <option value="Transport">Transport</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Others">Others</option>
                </select>
                <input type="date" name="expense-date">
             
              <button id="submit" class="btn">Submit</button>
              <button id="reset" class="btn">Reset</button>
             
              <button id="total" class="btn">Total</button>
            </form>
            <br><br>

            <div class="scroll">
           
           
            
             <?php
          
                $servername = "localhost";
                $username = "your_username";
                $password = "your_password";
                $dbname = "expnDetails";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT sn, name, amount,category, date FROM info";
                $result = $conn->query($sql);


              if ($result->num_rows > 0) {
                  echo "<table border='1' >
                          <tr>
                              <th>SN</th>
                              <th>Name</th>
                              <th>Amount</th>
                              <th>Category</th>
                              <th>date</th>
                              
                          </tr>";
              
                  while($row = $result->fetch_assoc()) {
                      echo "<tr>
                              <td>" . $row["sn"]. "</td>
                              <td>" . $row["name"]. "</td>
                              <td>" . $row["amount"]. "</td>
                              <td>" . $row["category"]. "</td>
                              <td>" . $row["date"]. "</td>
                             <td> <a href='index.php?sn=" . $row["sn"]. "' class='btn'>Delete</a></td>
                            </tr>";
                  }
                  echo "</table>";
              } else {
                  echo "0 results";
              }
              $conn->close();
              
              ?> 
        </div><!--This is the ending of div scroll -->
        <p id="response"></p>
        <p id="response1"></p>
            <br><br>
            <div class="total">
                <strong>Total:</strong> Rs.<span id="total-amount">0</span>
            </div>

             
        </div>
    </section>

    <div class="pagination" id="pagination"> 
        <a href="index.html" class="active" >Previous</a> 
        <a href="doList.html" >Next</a>
        
    </div> 

   
 <script src="total.js"></script>
<script src="reset.js"></script>

<script src="script.js"></script>
    
</body>
</html>




<!-- SET @num := 0;
UPDATE info SET sn = @num := (@num+1);
ALTER TABLE info AUTO_INCREMENT =1; -->