<?php
// Database connection
require_once 'asset/db/conn.php';
// Turn on error reporting
ini_set('display_errors', 1); // Show errors
ini_set('display_startup_errors', 1); // Show startup errors
error_reporting(E_ALL); // Report all types of errors




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readywears/admin/asset/css/style.css">
</head>

<body>

    <?php include 'asset/global/header.php' ?>

    <div class="containers">
        <div class="table">
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
            <div class="tbl_header">
                <a href="/readywears/admin/adduser.php">add new user</a>
                <div>
                    <input type="text" placeholder="email / username">
                    <span>
                        <img src="/readywears/admin/asset/svgs/search.svg" alt="">
                    </span>
                </div>
            </div>
            <div class="tbl_section">
                <table>
                    <thead>
                        <tr>
                            <th>s.no.</th>
                            <th>image</th>
                            <th>email / name</th>
                            <th>country</th>
                            <th>created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Prepare and execute query to fetch users with status 'pending'
                        $stmt = $conn->prepare("SELECT * FROM `users`");
                        $stmt->execute();

                        // Fetch all users
                        
                        while ($user = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                        <tr>
                            <td data-label="s.no."><?php echo htmlspecialchars($user['id']); ?></td>
                            <td data-label="image" class="tdimg">
                                <img src="/readywears/admin/asset/uploads/<?php echo htmlspecialchars($user['img']); ?>"
                                    alt="">
                            </td>
                            <td data-label="email">
                                <div>
                                    <?php echo htmlspecialchars($user['email']); ?>
                                    <br><?php echo htmlspecialchars($user['f_name']); ?>
                                </div>
                            </td>
                            <td data-label="country"><?php echo htmlspecialchars($user['country']); ?></td>
                            <td data-label="created at"><?php echo htmlspecialchars($user['created_at']); ?></td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <button class="fundlink"
                                        data-id="<?php echo htmlspecialchars($user['id']); ?>">view</button>
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- Update Popup -->
        <div id="update-popup" class="popup">

            <div class="popup-content">
                <span class="close-btn">&times;</span>
                <h1>edit balance</h1>
                <form id="update-form">
                    <input type="hidden" id="user-id" name="user_id">
                    <label for="user-email">Email:</label>
                    <input type="email" id="user-email" name="email">
                    <label for="user-name">Name:</label>
                    <select name="" id="">
                        <option value="">payment_method</option>
                        <option value="">btc</option>
                        <option value="">usdc</option>
                        <option value="">usdt</option>
                        <option value="">eth</option>
                    </select>
                    <input type="text" name="name" placeholder="btc">
                    <input type="text" name="name" placeholder="usdc">
                    <input type="text" name="name" placeholder="usdt">
                    <input type="text" name="name" placeholder="eth">

                    <input type="text" id="user-name" name="name">
                    <label for="user-country">Country:</label>
                    <input type="text" id="user-country" name="country">
                    <label for="user-img">Image URL:</label>
                    <input type="text" id="user-img" name="img">
                    <label for="popup-image">Image Preview:</label>
                    <img id="popup-image" src="asset/uploads/" alt="User Image" style="width: 100px; height: auto;">
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>

    </div>

    <?php include 'asset/global/footer.php' ?>



</body>

</html>