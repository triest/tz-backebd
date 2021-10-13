<?php

$row = 1;
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "tz-backebd";

$db_fields_array = [];
$db_array_to_insert = [];

$start = microtime(true);
$conn = new mysqli($servername, $username, $password, $dbname);

mysqli_report(MYSQLI_REPORT_ALL) ;


if ($conn->connect_error) {
    die("Connection failed: " . mysqli_connect_error());
}
$str=null;


try {
    $create_table = "select 1  from  `import_csv` LIMIT 1";

    $stmt = $conn->prepare(
            $create_table
    );
    $stmt->execute();
    $stmt->free_result();
} catch (mysqli_sql_exception  $e) {
    $query = file_get_contents("tz-backebd.sql");
    $stmt = $conn->prepare($query);
    $stmt->execute();
}


$count=1;
$first=true;
if (($handle = fopen("task2.csv", "r")) !== false) {
    while (($data = fgetcsv($handle)) !== false) {
        $num = count($data);

        $db_array_to_insert = [];

        for ($c = 0; $c < $num; $c++) {
            if ($count==1) {
                $db_fields_array[] = $data[$c];
            } else {
                if ($data[$c]==""){
                    $data[$c]=".";
                }
                $db_array_to_insert[] = $data[$c];
            }
        }
        $count++;

        $first=false;


        if($row==1){
            $row++;
            continue;
        }
        $row++;


        if($str==null) {
            $str = implode("`,`", $db_fields_array);
        }

        try {
            $STRING=  "INSERT INTO `import_csv`(`".$str."`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = $conn->prepare(
                   $STRING
            );



            $stmt->bind_param('sssssssssssss',...$db_array_to_insert);

            $stmt->execute();
            $stmt->free_result();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }


    }

    fclose($handle);
}
echo (microtime(true) - $start)/60;

