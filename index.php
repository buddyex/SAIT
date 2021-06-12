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

<?php

require('connect.php');

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $query);

    if($result){
        $smsg = "Регистрация прошла успешно";
    } 
    else {
        $fsmsg = "Ошибка";
    }
}
?>

<form class="container-fluid" method="POST">
  <h1 class="container">Регистрация</h1>
  <?php if(isset($smsg)){?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?> </div><?php }?>
  <?php if(isset($fsmsg)){?><div class="alert alert-danger" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
  
  <div class="container-fluid">
    <label for="exampleInputLogin1" class="form-label">Логин</label>
    <input type="text" name="username" class="form-control" id="exampleInputLogin1" placeholder="Логин" required>
  </div>
  <div class="container-fluid">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email" required>
  </div>
  <div class="container-fluid">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Пароль" required>
  </div>
  <div class="container-fluid">
    <button type="submit" class="btn btn-primary">Регистрация</button>
    <a href="login.php"  class="btn btn-primary">Вход</a>
  </div>
</form>

</body>
</html>