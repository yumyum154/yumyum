<?php
require_once 'asset/db/conn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readywears/admin/asset/css/style.css">
</head>

<body>

    <div class="containers login">

        <div class="registerwrapper login">
            <?php
            if (isset($_SESSION['success_message'])) {
                echo "<p class='message success-message'>{$_SESSION['success_message']}</p>";
                unset($_SESSION['success_message']);
            }
            if (isset($_SESSION['error_message'])) {
                echo "<p class='message error-message'>{$_SESSION['error_message']}</p>";
                unset($_SESSION['error_message']);
            }
            ?>
            <div class="formcontain login">
                <form action="/readywears/admin/asset/global/backend.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <h1>login to admin</h1>
                        <img src="/readywears/admin/asset/svgs/lock.svg" alt="">
                    </div>
                    <div class="inputbox">
                        <input type="text" name="user_input" id="username" placeholder="" required="require">
                        <label for="username">username / email</label>
                    </div>

                    <div class="inputbox">
                        <input type="password" name="pass" id="pass" placeholder="" required="require">
                        <label for="pass">password</label>
                    </div>

                    <div class="submitbtn">
                        <button type="submit" name="loginbtn" value="login" class="btnclick">login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", (event) => {
        const messageElement = document.querySelector(".message");
        if (messageElement) {
            // Remove the message after the animation completes (2s duration)
            setTimeout(() => {
                messageElement.remove();
            }, 5000);
        }
    });
    </script>
</body>

</html>