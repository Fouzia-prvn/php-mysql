<html>
    <body>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Age</th>
                <th>Position</th>
                <th>Phone</th>
              </tr>
               <?php
               //Database Connection
               $conn=new mysqli('localhost','root','','employee');
                 //checking for connection error
               if($conn->connect_error)
               {
                   die('Connection Failed:'.$conn->conn->connect_error);
               } 
               $sql="select * from employee_details";
               $result=$conn->query($sql);

               if($result->num_rows>0)
               {
                  while($row=$result->fetch_assoc())
                   {
                    echo "<tr><td>".$row["first_name"].
                        "</td><td>".$row["last_name"].
                        "</td><td>".$row["address"].
                        "</td><td>".$row["age"].
                        "</td><td>".$row["position"].
                        "</td><td>".$row["phone"]."</td><td>";
                    }
                }
                    else
                    {
                        echo "no result";
                    }

               
                    $conn->close();
            ?>
        </table>

        <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
    </body>
</html>