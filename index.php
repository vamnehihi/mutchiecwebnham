<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style.css" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=League+Spartan&display=swap" rel="stylesheet" />

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>VamNeHihi</title>
</head>

<body>

  <nav>
    <?php
    if (isset($_SESSION["useruid"])) {
      echo "<a href='index.php'>Main page</a> | ";
      echo "<a href='logoutinc.php'>Log out</a>";
    } 
    else {
      echo "<a href='login.php'>Log in</a> | ";
      echo "<a href='signup.php'>Sign up</a>";
    }
    ?>
  </nav>

  <top>
    <h1>VAMNEHIHI</h1>
    <p>thì nói chung đây là mụt chiếc web thui hihi</p>
  </top>
  <img class="center" src="http://images6.fanpop.com/image/photos/39800000/Snowball-the-secret-life-of-pets-39873469-1280-720.jpg" />
  <h2>Chơi thử mụt trò khum ạ?</h2>

  <div>
    <p>Ở dưới là một đoạn thơ, chỗ nào đánh số thì bạn chế chỗ đó!!</p>
    <p>Chiều chiều gió thổi hiu hiu</p>
    <p>Vì mê [x] tỉ, mất tiêu [y] ngàn.</p>
  </div>

  <form action="index.php" method="get">
    [x]: <input type="number" name="x">

    <br>
    [y]: <input type="number" name="y">
    <br>
    <input type="submit" name="submit" value="Gửi">
    <br>
  </form>
  <br>
  <?php
  $o1 = $_GET["x"];
  $o2 = $_GET["y"];
  echo "Sẽ thành: <br><br>";
  echo "Chiều chiều gió thổi hiu hiu <br>";
  echo "Vì mê $o1 tỉ, mất tiêu $o2 ngàn.";
  ?>

  <br><br><br>
  <h2>Nếu bạn khum biết hôm nay nên ăn gì thì chọn mụt cái.</h2>
  <div>
    <form action="index.php" method="post">
      cơm tấm: <input type="checkbox" name="foods[]" value="cơm tấm"> <br>
      bún bò: <input type="checkbox" name="foods[]" value="bún bò"> <br>
      hủ tiếu: <input type="checkbox" name="foods[]" value="hủ tiếu"> <br>
      mì quảng: <input type="checkbox" name="foods[]" value="mì quảng"> <br>
      <input type="submit" name="submit" value="Gửi">
    </form>
  </div>
  <br>

  <?php
  $foods = $_POST["foods"];
  echo "Chọn $foods[0] rồi thì đi ăn $foods[0] đi ạ.";
  ?>

  <?php
  $nameErr = $emailErr = $commentErr = "";
  $name = $email = $comment = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Phải có tên á";
    } else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email cũng phải có lun";
    } else {
      $email = test_input($_POST["email"]);
    }

    if (empty($_POST["comment"])) {
      $commentErr = "Comment mà khum có comment sao mà đượt";
    } else {
      $comment = test_input($_POST["comment"]);
    }
  }

  ?>

</body>

</html>
