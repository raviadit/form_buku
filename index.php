<?php
include('koneksi.php'); 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
<link rel="icon" type="image/x-icon" href="img/book.jpg">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Daftar Buku</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          
        </li>
        <li class="nav-item">
          
        </li>
        
        <li class="nav-item">
          
        </li>
      </ul>
      <form class="d-flex" action="index.php" method="get">
        <input name="cari" class="form-control me-2" type="text" placeholder="Masukan Kata Kunci" aria-label="Cari">
        <button class="btn btn-outline-success" type="submit" value="cari">Search</button>
      </form>
     
    </div>
  </div>
</nav>
  <title>Daftar Buku</title>
  
  <style type="text/css">
  * {
    font-family: sans-serif;
  }

  .tambah {
    position: relative;
    right: 500px;

  }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
  <center>
    <div class="container">
    <form action="" method="POST">
        <?php echo "<h2>Welcome, " . $_SESSION['username'] ."!". "&#128511;</h2>"; ?>
      </form>
</center>
      <br>
      <center>
      <a href="logout.php" class="btn btn-outline-dark my-3">Logout</a>
      
   
      <a href="tambah_produk.php" class="btn btn-outline-primary"> Tambah </a>
</center>
      
    <br />
    <div class ="container my-3 mx-auto">
      <div class="row">
        <?php
            $query = "SELECT * FROM buku ORDER BY id_buku ASC";
            $result = mysqli_query($koneksi, $query);
            if (!$result) {
              die("Query Error: " . mysqli_errno($koneksi) .
                " - " . mysqli_error($koneksi));
            }
            ?>
        <?php
            if (isset($_GET['cari'])) {
              $cari = $_GET['cari'];
              $result = mysqli_query($koneksi, "SELECT * FROM buku WHERE judul LIKE '%" . $cari . "%'");
            } else {
              $result = mysqli_query($koneksi, $query);
            }
            $no = 1;
            while ($row = mysqli_fetch_assoc($result)) {
            ?>

          
<div class="card" style="width: 35rem;">
  <center>
  <br><img src="../gambar<?php echo $row['gambar']; ?>" style="width: 150px;height: 200px;" class="card-img-top" >
  <div class="card-body">
    <p class="card-text"><b><?php echo $row['judul']; ?></b></p>
    <p class="card-text"><?php echo substr($row['pengarang'], 0, 25); ?></p>
    <p class="card-text"><?php echo $row['tahun']; ?></p>
    <p class="card-text"><?php echo $row['penerbit']; ?></p>
    <a href="edit_produk.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-outline-success">Edit</a>
            <a href="proses_hapus.php?id_buku=<?php echo $row['id_buku']; ?>" class="btn btn-outline-danger rounded" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
  <center>

  </div>
</div>
        <?php } ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>
