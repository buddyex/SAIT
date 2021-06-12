<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>ПППС</title>
</head>
<body>
  
<form class="container-fluid" method="POST">
  <h1 class="container">Вход</h1>  
  <div class="container-fluid">
    <label for="exampleInputLogin1" class="form-label">Логин</label>
    <input type="text" name="username" class="form-control" id="exampleInputLogin1" placeholder="Логин" required>
  </div>
  <div class="container-fluid">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
  </div>
  <div class="container-fluid">
    <button  type="submit" class="btn btn-primary">Вход</button>
    <a href="index.php"  class="btn btn-primary ">Регистрация</a>
  </div>
</form>

<?php

require('connect.php');

if(isset($_POST['username']) and isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if($count == 1){
      $_SESSION['username'] = $username;
    }
    else{
      $fsmsg = "Ошибка";
    }
}

if(isset($_SESSION['username'])){
  $username = $_SESSION['username'];
  echo $username."Вы успешно вошли на сайт!<script>window.location = 'glav.html';</script>";
  echo "<a href='logout.php' class='btn btn-primary'> Выход </a>";
}
?>

</body>
</html>