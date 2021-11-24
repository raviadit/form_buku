<?php
  include('koneksi.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
  <link rel="icon" type="image/x-icon" href="img/plus.png">
    <title>Daftar Buku</title>
    <style type="text/css">
      * {
        font-family: "Javanese Text";
      }
      h1 {
        text-transform: uppercase;
        color: skyblue;
      }
    button {
          background-color: skyblue;
          color: #EDEDED;
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
      background: white;
      border: 2px solid #ccc;
      outline-color: skyblue;
    }
    button{
      background-color: skyblue;
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
      background-color: sekyblue;
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
        <h1>Tambah Buku</h1>
      <center>
      <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
        <div>
          <label>Judul Buku</label>
          <input type="text" name="judul" autofocus="" required="" />
        </div>
        <div>
          <label>Pengarang</label>
         <input type="text" name="pengarang" />
        </div>
        <div>
          <label>Penerbit</label>
         <input type="text" name="penerbit" required="" />
        </div>
        <div>
          <label>Tahun Terbit</label>
         <input type="text" name="tahun" required="" />
        </div>
        <div>
          <label>Gambar Buku</label>
         <input type="file" name="gambar" required="" />
        </div>
        <div>
         <button type="submit">Tambahkan</button>
        </div>
        </section>
      </form>
  </body>
</html>