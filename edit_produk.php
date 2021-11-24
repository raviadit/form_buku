<?php
  
include 'koneksi.php';

  
  if (isset($_GET['id_buku'])) {
    
    $id_buku = ($_GET["id_buku"]);

    
    $query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
    $result = mysqli_query($koneksi, $query);
    
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    
    $data = mysqli_fetch_assoc($result);
      
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" type="image/x-icon" href="img/edit.png">
    <title>Edit Buku</title>
    <style type="text/css">
      * {
        font-family: "Javanese Text";
      }
      h1 {
        text-transform: uppercase;
        color: orange;
      }
    button {
      
          background-color: darkgrey;
          color: #d3d3d3;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
          border: 0px;
          margin-top: 20px;
    }
    label {
      margin-top: 10px;
      float: left;
      text-align: left;
      width: 100%;
    }
    input {
      padding: 6px;
      width: 100%;
      box-sizing: border-box;
      background: #f8f8f8;
      border: 2px solid #d3d3d3;
      outline-color: orange;
    }
    button{
      background-color: orange;
      color: #fff;
      padding: 10px;
      font-size: 12px;
      border: 0;
      margin-top: 20px;
    }
    div {
      width: 100%;
      height: auto;
    }
    body{
      background-color: white;
    }
    .base {
      width: 800px;
      height: auto;
      padding: 20px;
      margin-left: auto;
      margin-right: auto;
      background: white;
    }
    </style>
  </head>
  <body>
    <section class="base">
      <center>
        <h1>Edit Buku <?php echo $data['judul']; ?></h1>
      <center>
      <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id_buku" value="<?php echo $data['id_buku']; ?>"  hidden />
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required=""value="<?php echo $data['penerbit']; ?>" />
        </div>
        <div>
          <label>Tahun Terbit</label>
         <input type="text" name="tahun" required="" value="<?php echo $data['tahun']; ?>"/>
        </div>
        
        <div>
          
          <label>Gambar Buku</label>
          <img src="../gambar<?php echo $data['gambar']; ?>" style="width: 120px;float: middle;margin-bottom: 5px;">
          <input type="file" name="gambar" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
          
        </div>
  
        <div>
        <button type="submit">Simpan</button>
         
        </div>
        </section>
      </form>
  </body>
</html>