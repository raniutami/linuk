<?php

$dbconn = pg_connect("host=localhost port=5432 dbname=irqs");

$errJumlah = "";
$jumlah = "";
$nama = test_input($_POST["nama"])
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!preg_match('/^[0-9]*$/', $_POST["jumlah"])) {
        $errJumlah = "masukan harus angka";
    } else {
        $jumlah = test_input($_POST["jumlah"]);
    }
}

if($errJumlah == "") {
  $query = "INSERT INTO customer(nama, jumlah_kursi) VALUES ('$nama','$jumlah');";
  $result = pg_query($query);
  header('location: welcome.php');
}

function test_input($data) {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Restoran Linuk - Queue Form</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,700'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto+Mono'>

      <link rel="stylesheet" href="css/style.css">


</head>

<body>

<h1>Antrian <br> <br> Restoran Linuk</h1>
<div id="container">
  <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <p>
      <label>Nama</label>
      <input type="text" placeholder="Super Awesome Customer" name="nama" required/>
    </p>
    <p>
      <label>Jumlah orang</label>
      <input type="text" placeholder="5" name="jumlah" required/><span class="error">* <?php echo $errJumlah;?></span>
    </p>
    <input type="submit" value="Submit" required/>
  </form>
</div>


</body>
</html>
