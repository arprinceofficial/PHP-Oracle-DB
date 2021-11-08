<html>
    <head>
        <title>Last 10 Results</title>
    </head>
    <body>
        <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $db = "(DESCRIPTION=(ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521)))(CONNECT_DATA=(SID=orcl)))" ;

            if($conn = OCILogon("pr", "pr", $db))
            {
                //echo "Successfully connected to Oracle.\n .'<br>'";
            }
            else
            {
                $err = OCIError();
                echo "Connection failed." . $err['text'];
            }
       
    

            $sql= "select * from SALARY_GRADE";
            $stds = oci_parse($conn,$sql);
            
            oci_execute($stds);
            
            while ($row= oci_fetch_assoc($stds))
            {
            ?>
                <tr>
                    <td><?php echo $row['GRADE']?></td>
                    <td><?php echo $row['MIN_SALARY']?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>
    </body>
</html>