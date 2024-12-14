<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo.png" type="img.png" >
</head>
<body>
    <section class="container">
        <div id="expn-form" class="section-padding1">
            <h1><u>Expense Tracker</u></h1>
            <br><br>

            
            <form method="post" action="index.php" id="dataForm">
                <input type="text" placeholder="Expense Name" name="expense-name" id="recordId">
                <input type="number" placeholder="Amount"  name="expense-amount">
                <select name="expense-category" id="" >
                    <option value="" disabled selected>Select Category</option>
                    <option value="Food">Food</option>
                    <option value="Transport">Transport</option>
                    <option value="Entertainment">Entertainment</option>
                    <option value="Others">Others</option>
                </select>
                <input type="date" name="expense-date">
                <button class="normal" id="submit" >Submit</button>
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

   
   
    

    <script>
      
    </script>
<script src="script.js"></script>
    
</body>
</html>




