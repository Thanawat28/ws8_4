<?php include "connect.php";?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
    <input type="text"name="key">
    <input type="submit"value="ค้นหา">
</form>

<?php
$stmt = $pdo->prepare("SELECT * FROM member WHERE  name LIKE ?");

if(!empty($_GET))
    $value = '%' .$_GET["key"]. '%';

$stmt->bindParam(1, $value);    
$stmt->execute();

echo "<br>";

$x = 1;
while ($row = $stmt->fetch())  { 
echo "ชื่อสมาชิก: ".$row["name"]."<br>";
echo "ที่อยู่: ".$row["address"]."<br>";
echo "อีเมลล์: ".$row["email"]."<br>";
echo "<img src = 'imgws4/$x.jpg'"."<br>";
$x++;
echo "<hr>";
echo "<br>";
}
?>
</body>
</html>