<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="style.css">

<title>Teine praktikum</title>
</head>
<body>



<h1>
Mu esimene PHP skript!
</h1>
<p>Paragraph</p>


<p id="demo">Clock</p>


<script>
var myTimer = setInterval(myClock, 1000);
function myClock() {
    document.getElementById("demo").innerHTML =
    new Date().toLocaleTimeString();
}
</script>

<?php
$file = "log.txt";
$datei = fopen($file,"r");
$count = fgets($datei,1000);
fclose($datei);
$count=$count + 1 ;

// opens countlog.txt to change new hit number
$datei = fopen($file,"w");
fwrite($datei, $count);
fclose($datei);

    $host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, "SET CHARACTER SET UTF8") or
            die("Error, ei saa andmebaasi charsetti seatud");
            
    $ip = $_SERVER['REMOTE_ADDR'];
    
    $sql = "UPDATE german_alar SET count = count + 1 WHERE ip_address = '".$ip."'";
    
    if ($l->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $l->error;
}    
    
    $sql = "SELECT ip_address, count FROM german_alar";
	$result = $l->query($sql);
	
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$data[] = $row["ip_address"];	
		}
	}
	print_r($data);
	if (in_array($ip, $data)){
				echo "IP: " . $row["ip_address"]. " - Külastusi: " . $row["count"]. " <br>";
			} else {
				$sql = "INSERT INTO german_alar (ip_address, count) VALUES ('$ip', count +1)";
				}

if ($l->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $l->error;
}    
    mysqli_close($l);
?>

<p> Külastusi lehel: <?php echo $count; ?> </p>
<p> Sinu IP aadress: <?php echo $ip; ?> </p>

</body>
</html>