<section class="login-form">
    <h2>Log in</h2>
    <div class="login-form1">
    <form action="inc/logininc.php" method="post">
        <input type="text" name="UID" placeholder="Username/Email"><br>
        <input type="password" name="pwd" placeholder="Pass"><br>
        <button type="submit" name="submit">Log in</button>
    </form>
    </div> 

    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p>Bạn điền thiếu rùi!!</p>";
        } 
        else if ($_GET["error"] == "wronglogin") {
            echo "<p>Điền thông tin lại nha</p>";
        } 
    }
    ?>   
</section>
