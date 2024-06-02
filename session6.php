<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="session6.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Data Siswa</title>
</head>
<body>

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
    echo "<table border=1px >";
    echo "<br>";
    // echo "<table>";
    echo "<tr>";
    echo "<th>NAMA</th>";
    echo "<th>NIS</th>";
    echo "<th>ROMBEL</th>";
    echo "<th>RAYON</th>";
    
    echo"</tr>";
    
    foreach ($_SESSION["dataSiswa"] as $index => $value) {
        echo "<tr>";
        echo "<td>" . $value["nama"] . "</td>";
        echo "<td>" . $value["nis"] . "</td>";
        echo "<td>" . $value["rombel"] . "</td>";
        echo "<td>" . $value["rayon"] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    ?>
    <div class="yaaini">
        <form action="">
            <button type="submit" name="hapus" value="hapus"><a href="session3.php"><i class='bx bxs-trash'></i>   HAPUS DATA</a></button>        
            <button type="submit" name="kembali" value="kembali"><a href="session5.php"><i class='bx bx-arrow-back'></i>   KEMBALI</a></button>
            <button onclick="window.print()">Print</button>
        </form>
    </div>
    </body>
    </html>