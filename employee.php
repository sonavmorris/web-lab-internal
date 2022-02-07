<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>employee details</title>
    <style>
        table{
            background-attachment: fixed;
        }
        td{
            font-family: Arial, Helvetica, sans-serif;
            font-size: .7em;
            border: 1px solid #DDD; 
        }

    </style>
</head>
<body>
    <form action="" method="POST">
        <center>
            <table border="2" cellpadding="5"cellspacing="5">
                <tr>
                    <td>ENTER THE EMPLOYEE ID:</td>
                    <td><input type="text" name="emp_id"></td>
                </tr>
                <tr>
                    <td>ENTER THE EMPLOYEE NAME:</td>
                    <td><input type="text" name="emp_name"></td>
                </tr>
                <tr>
                    <td>ENTER THE JOB_NAME:</td>
                    <td><input type="text" name="job_name"></td>
                </tr>
                <tr>
                    <td>ENTER THE MANAGER ID:</td>
                    <td><input type="text" name="manager_id"></td>
                </tr>
                <tr>
                    <td>ENTER THE SALARY:</td>
                    <td><input type="text" name="salary"></td>
                </tr>
                <tr>
                    <td><center><input type="submit" name="submit" value="submit"></center></td>
                </tr>
            </table>

<?php
if(isset($_POST['submit']))
{
    $emp_id=$_POST['emp_id'];
    $emp_name=$_POST['emp_name'];
    $job_name=$_POST['job_name'];
    $manager_id=$_POST['manager_id'];
    $salary=$_POST['salary'];
    $conn=mysqli_connect("localhost","root","","employee");
    if($conn)
    {
        echo("sucessfully connected");
        echo "<br>";
    }
    else
    {
       echo("error");
       echo"<br>";
    }
    $query="INSERT INTO emp_table(emp_id,emp_name,job_name,manager_id,salary) VALUES('{$emp_id}','{$emp_name}','{$job_name}','{$manager_id}','{$salary}')";
if(mysqli_query($conn,$query))
    {
    echo("Sucessfully inserted");
    echo"<br>";
    }    
     else
     {
      echo("inserton failed");
      echo"<br>";
     }

}
 
?>
 <?php
 if(isset($_POST['submit']))
 {
     $conn=mysqli_connect("localhost","root","","employee");
     ?>
     <table border="1" cellpadding="5" cellspacing="5">
         <th>Employee_name</th>
         <th>Salary</th></tr>
         <?php
     $search="SELECT emp_name,salary FROM emp_table WHERE salary>35000";
     $res=mysqli_query($conn,$search);
     while($result=mysqli_fetch_assoc($res))
     {
         ?>
        <tr>
         <td><?php echo $result["emp_name"];?></td>
        <td><?php echo $result["salary"];?></td>
        </tr>
        <?php

     }
    }


?>
</form>
</center>
</body>
</html>