<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="session5.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  </head>
</head>
<body>
    <div class="box">
        <h1>Masukan Data Siswa</h1>

        <!----untuk mengsejajarkan titik dua---->
<head>
    <style>
        label {
            display: inline-block;
            width: 100px; /* Sesuaikan lebar label sesuai kebutuhan */
            text-align: center;
        }
    </style>
</head>

        <div class="box1">
            <form action="" method="post">
                <label for="">Nama : </label>
                <input type="text" name="nama" id="nama" required autocomplete="off"><br><br>
                
                <label for="">NIS : </label>
                <input type="number" name="nis" id="nis" required autocomplete="off"><br><br>
                
                <label for="">Rombel : </label>
                <input type="text" name="rombel" id="rombel" required autocomplete="off"><br><br>
                
                <label for="">Rayon : </label>
                <input type="text" name="rayon" id="rayon" required autocomplete="off"><br><br>
                
                <button name="kirim" value="kirim"><i class='bx bx-plus'></i>Tambah</button>
                <button name="kirim" value="kirim"><a href="session6.php"><i class='bx bx-printer'></i>Cetak</a></button>
                <button name="kirim" value="kirim"><a href="session3.php"><i class='bx bx-trash'></i>Hapus Data</a></button>
            </form>
        </div>
        
    <?php
    session_start();
    
    if (!isset($_SESSION["dataSiswa"])) {
        $_SESSION["dataSiswa"] = array();
    }
    
    if (isset($_POST["nama"]) && isset($_POST["nis"]) && isset($_POST["rombel"]) && isset($_POST["rayon"])) {
        $data = array(
            "nama" => $_POST["nama"],
            "nis" => $_POST["nis"],
            "rombel" => $_POST["rombel"],
            "rayon" => $_POST["rayon"]
        );
        array_push($_SESSION["dataSiswa"], $data);
    }
    
    
    //proses penghapusan data siswa
    if(isset($_GET['page'])) {
        $index = $_GET['page'];
        unset($_SESSION['dataSiswa'][$index]);
        //redirect kembali ke halaman ini setelah penghapusan
        header('Location: http://windhakusumadewi.liveblog365.com/datasiswawindha/session5.php');
        exit;
    }
    
    // var_dump($_SESSION["dataSiswa"]);
    echo "<table border=1px>";
    echo "<br>";
    // echo "<table>";
    echo "<tr>";
    echo "<th>NAMA</th>";
    echo "<th>NIS</th>";
    echo "<th>ROMBEL</th>";
    echo "<th>RAYON</th>";
    echo "<th>AKSI</th>";
    
    echo"</tr>";
    
    foreach ($_SESSION["dataSiswa"] as $index => $value) {
        echo "<tr>";
        echo "<td>" . $value["nama"] . "</td>";
        echo "<td>" . $value["nis"] . "</td>";
        echo "<td>" . $value["rombel"] . "</td>";
        echo "<td>" . $value["rayon"] . "</td>";
        echo "<td><a href='?page=".$index."'><i class='bx bx-trash'></i>Hapus</a></td>";
        echo "</tr>";
    }

    echo "</table>";
    ?>
</div>
</div>
</body>
</html>