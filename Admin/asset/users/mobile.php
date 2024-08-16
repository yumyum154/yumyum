<?php
require '../db/restrict.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/readywears/admin/asset/css/style.css">
</head>

<body>

    <?php include '../global/header.php' ?>

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
            <p class="userheaderdesc">mobile Unverified Users</p>

            <div class="tbl_header">
                <a href="/readywears/admin/asset/users/adduser.php">add new user</a>
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
                            <th>balance</th>
                            <th>created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Prepare and execute query to fetch users with status 'pending'
                        $stmt = $conn->prepare("SELECT * FROM `users`  WHERE JSON_EXTRACT(verification_status, '$.mobile_verified') = 'false'");
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
                                <td data-label="country"><?php echo htmlspecialchars($user['balance']); ?></td>
                                <td data-label="created at"><?php echo htmlspecialchars($user['created_at']); ?></td>
                                <td data-label="action">
                                    <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a
                                            href="userdetails.php?edit=<?php echo htmlspecialchars($user['user_id']); ?>">details</a>
                                        <a href="/readywears/admin/asset/global/backend.php?delete=<?php echo htmlspecialchars($user['user_id'], ENT_QUOTES, 'UTF-8'); ?>"
                                            onclick="return confirm('Are you sure you want to delete user <?php echo htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8'); ?>?');">delete</a>

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
    </div>

    <?php include '../global/footer.php' ?>