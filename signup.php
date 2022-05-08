<section class="signup-form">
    <h2>Sign up</h2>
    <div class="signup-form1">
        <form action="inc/signupinc.php" method="post">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="password" name="pwd" placeholder="Pass"><br>
            <input type="password" name="pwdrp" placeholder="Pass again"><br>
            <button type="submit" name="submit">Sign up</button>
        </form>
    </div>

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Bạn điền thiếu rùi!!</p>";
        } 
        else if ($_GET["error"] == "invalidUID") {
            echo "<p>Điền username lại nha!</p>";
        } 
        else if ($_GET["error"] == "invalidEmail") {
            echo "<p>Điền email lại nha!</p>";
        } 
        else if ($_GET["error"] == "pwdunmatch") {
            echo "<p>pwd hong khớp rùi!</p>";
        } 
        else if ($_GET["error"] == "stmtfailed") {
            echo "<p>oops, thử lại i!</p>";
        } 
        else if ($_GET["error"] == "usernametaken") {
            echo "<p>username trùng rùi!</p>";
        }
        else if ($_GET["error"] == "none") {
            echo "<p>Đăng kí thành công!</p>";
        }
    }
    ?>
</section>