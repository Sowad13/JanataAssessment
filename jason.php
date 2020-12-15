
<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Janata Data</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  

     
           <br />  
           <div class="container">  
                <h2>Janata Data</h2><br><br>                 
                <div class="table-editable">  
                     <table class="table table-bordered" id = "data_table">  
                          <tr>  
                               <th>Date</th>
                               <th>Trade_code</th>
                               <th>High</th>
                               <th>Low</th>
                               <th>Open</th>  
                               <th>Close</th>
                               <th>Volume</th>

                          </tr>  
                          <?php   
                          $data = file_get_contents("janata.json");  
                          $data = json_decode($data, true);  
                          foreach($data as $row)  
                          {  
                               echo '<tr><td class="pt-3-half" contenteditable="true">'.$row["date"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true">'.$row["trade_code"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true">'.$row["high"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true"> '.$row["low"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true">'.$row["open"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true">'.$row["close"].'</td>';
                               echo '<td class="pt-3-half" contenteditable="true">'.$row["volume"].'</td>';
                               echo '<td><input type=submit></td></tr>';
                              
                               $conn = mysqli_connect("localhost","root","","datasystem");
                              $sql = "INSERT INTO data (date,trade_code,high,low,open,close,volume)
                               VALUES ('".$row["date"]."','".$row["trade_code"]."','".$row["high"]."','".$row["low"]."','".$row["open"]."','".$row["close"]."','".$row["volume"]."')";

                                
                                mysqli_query($conn, $sql);


                          }  

                         

                          while ($row = mysql_fetch_array(mysqli_query($conn,$sql))){
                              echo '<tr><form action = update.php method = post>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["date"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["trade_code"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["high"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true"> '.$row["low"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["open"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["close"].'</td>';
                              echo '<td class="pt-3-half" contenteditable="true">'.$row["volume"].'</td>';
                              echo '<td><input type = submit>';
                              echo '</form></tr>';
                          }
                          ?>  
                     </table>  
                         
                     
                </div>  
           </div>  
           <br /> 
            
      </body>  
 </html>

 