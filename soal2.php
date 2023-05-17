<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// query sintaks
$sql = "SELECT id, person_id, hobi FROM hobi";

if (isset($_GET['search'])) {
  $sql .= " WHERE hobi = '" . $_GET['search'] . "';";
}

// excute query
$queryResult = $conn->query($sql);

// get jumlah person
$hobis = array_column($queryResult->fetch_all(MYSQLI_ASSOC), 'hobi');
$result = array_count_values($hobis);

// Sorting result
arsort($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soal 2</title>
</head>

<body>
  <form action="" method="get">
    <input type="text" name="search" placeholder="Search hobi...">
    <button type="submit">Search</button>
  </form>
  <br><br>
  <table border="1">
    <?php if ($result != []) : ?>
      <tr>
        <th>Hobi</th>
        <th>Jumlah Person</th>
      </tr>
      <?php foreach ($result as $key => $val) : ?>
        <tr>
          <td><?= $key ?></td>
          <td><?= $val ?></td>
        </tr>
      <?php endforeach ?>
    <?php else: ?>
    <span>Data tidak ditemukan</span>
    <?php endif ?>

  </table>
</body>

</html>