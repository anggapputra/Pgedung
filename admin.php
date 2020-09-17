<?php 
session_start();
error_reporting(0);
  include "koneksi.php";

  if (isset($_POST[login])){
              $userlogin = $_POST[user];
              $passlogin = md5($_POST[pass]);
                $login = mysql_query("SELECT * FROM rb_admin 
                where username='$userlogin' AND password='$passlogin'");
          $cek = mysql_num_rows($login);
          $r = mysql_fetch_assoc($login);
            if ($cek >= 1){
              $_SESSION[id]       = $r[id_members];
              $_SESSION[nama_lengkap] = $r[nama_lengkap];
              $_SESSION[alamat_email] = $r[alamat_email];
              $_SESSION[level]    = 2;
              
              echo "<script>window.alert('Anda Sukses Login.');
                window.location='index.php'</script>";
            }else{
              echo "<script>window.alert('Maaf, anda Gagal Login.');
                window.location='index.php'</script>";
            }
          }
?>

<html>
<head>
<title>Login Admin - Portal Berita</title>
<style>
  body {
    background:#e3e3e3; 
  }
  #login {
    position:absolute;
    left:50%;
    top:35%;
    margin-left:-150px; 
    margin-top:-120px;  
  }
  
  .button {
    color: #ffffff;
    background-color: #006dcc;
    background-repeat: repeat-x;
    border-color: #002a80;
    padding:5px 40px 5px 40px;
    margin-bottom:8px;
  }
  
  .input {
    font-size:15px;
    padding:4px;
  }
  
  form {
    background:#fff;
    width: 280px;
    padding:40px;
    border-radius:5px;
    box-shadow: 4px 4px 4px #cecece;
  }
  
  h2 {
    text-align:center;
    border-bottom:1px solid #cecece;
  }
</style>
</head>

<body>
  <div id='login'>
    <form action='' method='POST'>
    <h2>Admin Login</h2>
      <table>
        <tr>
          <td>Username</td>
          <td><input type='text' name='user' class='input'></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type='password' name='pass' class='input'></td>
        </tr>
        <tr>
          <td colspan='2'>
            <center><br>
            <input type='submit' name='login' value='Login' class='button'>
            </center>
          </td>
        </tr>
      </table>
    </form>
  </div>
</body>
</html>

