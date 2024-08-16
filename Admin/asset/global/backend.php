<?php
include '../db/conn.php'; // Ensure this file initializes $conn correctly

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Function to generate a random user ID
function generateRandomUserId()
{
    return uniqid('user_', true);
}
// Function to log transactions
// Function to log transactions
function logTransaction($conn, $userId, $transactionType, $amount, $note = '')
{
    try {
        $stmt = $conn->prepare("INSERT INTO transaction_logs (user_id, transaction_type, amount, note) VALUES (?, ?, ?, ?)");
        $stmt->execute([$userId, $transactionType, $amount, $note]);
    } catch (PDOException $e) {
        // Log detailed error message
        error_log("Failed to log transaction: " . $e->getMessage());
        // Optionally, add more debugging info
        throw new Exception("Failed to log transaction.");
    }
}

// Initialize the verification statuses to false
$verificationStatus = [
    'email_verified' => false,
    'mobile_verified' => false,
    'twofa_verified' => false,
    'kyc_verified' => false
];

// Encode the statuses to JSON
$verificationStatusJson = json_encode($verificationStatus);


if (isset($_POST['registerbtn'])) {
    // Generate a random user ID
    $user_id = generateRandomUserId();

    // Sanitize and validate form data
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $fullname = filter_var($_POST['f_name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    $cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);

    // Validate password match
    if ($pass !== $cpass) {
        $_SESSION['error_message'] = "Passwords do not match";
        header('Location: /readywears/admin/asset/users/adduser.php');
        exit();
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format";
        header('Location: /readywears/admin/asset/users/adduser.php');
        exit();
    }

    $date = date('Y-m-d'); // Current date
    $time = date('H:i:s'); // Current time
    $remark = "Initial balance"; // Default remark
    $profit = "0.00";
    $bonus = "0.00";

    // Handle image upload
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $img_error = $_FILES['image']['error'];

    $img_path = "../uploads/" . basename($img_name); // Correct path to destination
    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $img_extension = ["jpg", "png", "jpeg"];

    // Validate image file
    if ($img_error === UPLOAD_ERR_OK) {
        if (in_array($img_type, $img_extension)) {
            if ($img_size <= 2 * 1024 * 1024) { // 2MB limit
                // Check if email or username already exists
                $stmt = $conn->prepare("SELECT * FROM `users` WHERE email = :email OR username = :username");
                $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    $_SESSION['error_message'] = "Profile already exists with this email or username";
                    header('Location: /readywears/admin/asset/users/adduser.php');
                    exit();
                } else {
                    // Hash password
                    $hasspass = password_hash($pass, PASSWORD_DEFAULT);

                    // Insert new user into database
                    $stmt = $conn->prepare("INSERT INTO `users` (`user_id`, `username`, `f_name`, `email`, `country`, `address`, `city`, `phone`, `img`, `state`, `pass`, `verification_status`) VALUES (:user_id, :username, :fullname, :email, :country, :address, :city, :phone, :img, :state, :pass, '{}')");

                    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                    $stmt->bindParam(':fullname', $fullname, PDO::PARAM_STR);
                    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
                    $stmt->bindParam(':country', $country, PDO::PARAM_STR);
                    $stmt->bindParam(':address', $address, PDO::PARAM_STR);
                    $stmt->bindParam(':city', $city, PDO::PARAM_STR);
                    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
                    $stmt->bindParam(':img', $img_name, PDO::PARAM_STR);
                    $stmt->bindParam(':state', $state, PDO::PARAM_STR);
                    $stmt->bindParam(':pass', $hasspass, PDO::PARAM_STR);

                    if ($stmt->execute()) {
                        // Insert initial balance record
                        $stmt = $conn->prepare("INSERT INTO `user_balance` (`user_id`, `balance`, `date`, `time`, `last_updated`, `remark`, `profit`, `bonus`) VALUES (:user_id, :balance, :date, :time, NOW(), :remark, :profit, :bonus)");
                        $initial_balance = 0.00; // Starting balance
                        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                        $stmt->bindParam(':balance', $initial_balance, PDO::PARAM_STR);
                        $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                        $stmt->bindParam(':time', $time, PDO::PARAM_STR);
                        $stmt->bindParam(':remark', $remark, PDO::PARAM_STR);
                        $stmt->bindParam(':profit', $profit, PDO::PARAM_STR);
                        $stmt->bindParam(':bonus', $bonus, PDO::PARAM_STR);

                        if ($stmt->execute()) {
                            // Move uploaded image file
                            if (move_uploaded_file($img_tmp_name, $img_path)) {
                                $_SESSION['success_message'] = "Account successfully created";
                                header('Location: /readywears/admin/asset/users/users.php');
                                exit();
                            } else {
                                $_SESSION['error_message'] = "Failed to move uploaded file";
                                header('Location: /readywears/admin/asset/users/adduser.php');
                                exit();
                            }
                        } else {
                            $_SESSION['error_message'] = "Failed to create balance record";
                            header('Location: /readywears/admin/asset/users/adduser.php');
                            exit();
                        }
                    } else {
                        $_SESSION['error_message'] = "Failed to create account";
                        header('Location: /readywears/admin/asset/users/adduser.php');
                        exit();
                    }
                }
            } else {
                $_SESSION['error_message'] = "Image size exceeds 2MB";
                header('Location: /readywears/admin/asset/users/adduser.php');
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Invalid image format. Only JPG, PNG, and JPEG are allowed.";
            header('Location: /readywears/admin/asset/users/adduser.php');
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Error uploading image: " . $img_error;
        header('Location: /readywears/admin/asset/users/adduser.php');
        exit();
    }
}

if (isset($_POST['loginbtn'])) {
    $user_input = htmlspecialchars(strip_tags($_POST['user_input']));
    $pass = htmlspecialchars(strip_tags($_POST['pass']));

    try {
        // Prepare and execute the query
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :user_input OR username = :user_input");
        $stmt->bindParam(":user_input", $user_input, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch user details
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verify the password
            if (password_verify($pass, $user['pass'])) {
                // Check user role
                if ($user['usertype'] === 'admin') {
                    // Update last login
                    $stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
                    $stmt->execute([$user['id']]);

                    // Set session variables
                    $_SESSION['admin_id'] = $user['id'];
                    $_SESSION['admin_email'] = $user['email'];
                    $_SESSION['admin_username'] = $user['username'];
                    $_SESSION['admin_img'] = $user['img'];
                    $_SESSION['last_activity'] = time(); // Initialize last_activity

                    // Redirect to admin dashboard
                    header('Location: /readywears/admin/index.php');
                    exit();
                } else {
                    $_SESSION['error_message'] = "This account is not an admin account. Check details and try again.";
                    header('Location: /readywears/admin/login.php');
                    exit();
                }
            } else {
                $_SESSION['error_message'] = "Password is incorrect. Try again.";
                header('Location: /readywears/admin/login.php');
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Email or username not found. Check details and try again.";
            header('Location: /readywears/admin/login.php');
            exit();
        }
    } catch (PDOException $e) {
        // Handle database errors
        $_SESSION['error_message'] = "An error occurred: " . htmlspecialchars($e->getMessage());
        header('Location: /readywears/admin/login.php');
        exit();
    }
}




if (isset($_POST['updatebal'])) {
    // Sanitize and validate inputs
    $balance = filter_var($_POST['balance'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $date = htmlspecialchars(strip_tags($_POST['date']));
    $time = htmlspecialchars(strip_tags($_POST['time']));
    $remark = htmlspecialchars(strip_tags($_POST['remark']));
    $user_id = isset($_GET['user_id']) ? filter_var($_GET['user_id'], FILTER_SANITIZE_STRING) : 0;

    $transactionType = $_POST['transaction_type']; // Ensure you have a way to determine if it's a credit or debit

    // Validate user_id and transaction_type
    if (empty($user_id) || !in_array($transactionType, ['credit', 'debit'])) {
        $_SESSION['error_message'] = "Invalid user ID or transaction type.";
        header('Location: /readywears/admin/asset/users/adduser.php');
        exit();
    }

    try {
        // Start a transaction
        $conn->beginTransaction();

        // Prepare SQL statement to get current balance
        $stmt = $conn->prepare("SELECT balance FROM `user_balance` WHERE user_id = :user_id LIMIT 1");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $currentbalance = $row['balance'];

            // Calculate new balance based on transaction type
            if ($transactionType === 'credit') {
                $newbalance = $currentbalance + (float) $balance;
            } else { // debit
                if ((float) $balance > $currentbalance) {
                    throw new Exception("Debit amount exceeds current balance.");
                }
                $newbalance = $currentbalance - (float) $balance;
            }

            // Prepare SQL statement to update balance in user_balance table
            $stmt = $conn->prepare("UPDATE `user_balance` SET balance = :balance, date = :date, time = :time, last_updated = NOW(), remark = :remark WHERE user_id = :user_id");
            $stmt->bindParam(':balance', $newbalance, PDO::PARAM_STR);
            $stmt->bindParam(':date', $date, PDO::PARAM_STR);
            $stmt->bindParam(':time', $time, PDO::PARAM_STR);
            $stmt->bindParam(':remark', $remark, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                throw new Exception("Error updating balance in user_balance table: " . $stmt->errorInfo()[2]);
            }

            // Prepare SQL statement to update balance in users table
            $stmt = $conn->prepare("UPDATE `users` SET balance = :balance WHERE user_id = :user_id");
            $stmt->bindParam(':balance', $newbalance, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

            if (!$stmt->execute()) {
                throw new Exception("Error updating balance in users table: " . $stmt->errorInfo()[2]);
            }

            // Log the transaction
            logTransaction($conn, $user_id, $transactionType, $balance, $remark);

            // Commit transaction
            $conn->commit();

            $_SESSION['success_message'] = "Balance updated successfully.";
        } else {
            $_SESSION['error_message'] = "No balance record found for user ID: " . htmlspecialchars($user_id);
        }
    } catch (Exception $e) {
        // Rollback transaction if something failed
        $conn->rollBack();
        $_SESSION['error_message'] = $e->getMessage();
    }

    // Redirect to the admin users page
    header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
    exit();
}

if (isset($_POST['uploadprofit'])) {
    $user_id = isset($_GET['user_id']) ? filter_var($_GET['user_id'], FILTER_SANITIZE_STRING) : 0;
    $manualprofit = isset($_POST['manualprofit']) ? $_POST['manualprofit'] : false;
    $automaticprofit = isset($_POST['automaticprofit']) ? $_POST['automaticprofit'] : false;
    $transaction_type = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : '';

    try {
        if ($manualprofit) {
            $profitAmount = filter_var($_POST['profitAmount'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

            // Retrieve current user data
            $stmt = $conn->prepare("SELECT profit, balance FROM users WHERE user_id = ?");
            $stmt->execute([$user_id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user) {
                $newProfit = $user['profit'] + $profitAmount;
                $newBalance = $user['balance'] + $profitAmount;

                // Start a transaction
                $conn->beginTransaction();

                // Update the profit and balance in the users table
                $stmt = $conn->prepare("UPDATE users SET profit = ?, balance = ? WHERE user_id = ?");
                $stmt->execute([$newProfit, $newBalance, $user_id]);

                // Update the profit and balance in the users table
                $stmt = $conn->prepare("UPDATE user_balance SET profit = ?, balance = ? WHERE user_id = ?");
                $stmt->execute([$newProfit, $newBalance, $user_id]);


                // Insert a new record into the transaction_logs table
                $stmt = $conn->prepare("INSERT INTO transaction_logs (user_id, transaction_type, amount, profit, profit_remark, profit_timestamp) VALUES (?, ?, ?, ?, ?, NOW())");
                $profit_remark = "Added profit of $profitAmount";
                $stmt->execute([$user_id, $transaction_type, $profitAmount, $profitAmount, $profit_remark]);

                // Commit the transaction
                $conn->commit();

                $_SESSION['success_message'] = "Profit amount of $profitAmount assigned and logged for user $user_id";
            } else {
                $_SESSION['error_message'] = "User not found";
            }

            header('Location:/readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
            exit();
        } elseif ($automaticprofit) {
            $profitPercentage = filter_var($_POST['profitPercentage'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $profitStartDate = htmlspecialchars($_POST['profitStartDate']);
            $profitEndDate = htmlspecialchars($_POST['profitEndDate']);

            $stmt = $conn->prepare("INSERT INTO automatic_profits (user_id, profit_percentage, start_date, end_date) VALUES (:user_id, :profitPercentage, :profitStartDate, :profitEndDate)");
            $stmt->bindParam(":user_id", $user_id);
            $stmt->bindParam(":profitPercentage", $profitPercentage);
            $stmt->bindParam(":profitStartDate", $profitStartDate);
            $stmt->bindParam(":profitEndDate", $profitEndDate);
            $stmt->execute();

            $_SESSION['success_message'] = "Automatic profit of $profitPercentage% scheduled for user $user_id from $profitStartDate to $profitEndDate";
            header('Location:/readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
            exit();
        } else {
            $_SESSION['error_message'] = "No profit option selected";
            header('Location:/readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
            exit();
        }
    } catch (PDOException $e) {
        // Rollback the transaction in case of error
        if ($conn->inTransaction()) {
            $conn->rollBack();
        }
        $_SESSION['error_message'] = "Database error: " . $e->getMessage();
        header('Location:/readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
        exit();
    }
}

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Fetch the image filename from the database
        $stmt_img = $conn->prepare("SELECT img FROM `users` WHERE user_id = :delete_id");
        $stmt_img->bindParam(":delete_id", $delete_id, PDO::PARAM_STR);
        $stmt_img->execute();
        $result = $stmt_img->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $image = $result['img']; // Fetch image file name

            // Delete the image file
            if ($image && file_exists('../uploads/' . $image)) {
                if (!unlink('../uploads/' . $image)) {
                    throw new Exception("Failed to delete image file.");
                }
            }

            // Delete user record and related data
            $stmt_delete_user = $conn->prepare("DELETE FROM `users` WHERE user_id = :delete_id");
            $stmt_delete_balance = $conn->prepare("DELETE FROM `user_balance` WHERE user_id = :delete_id");
            $stmt_delete_logs = $conn->prepare("DELETE FROM `transaction_logs` WHERE user_id = :delete_id");
            $stmt_delete_profit = $conn->prepare("DELETE FROM `automatic_profits` WHERE user_id = :delete_id");

            $stmt_delete_user->bindParam(":delete_id", $delete_id, PDO::PARAM_STR);
            $stmt_delete_balance->bindParam(":delete_id", $delete_id, PDO::PARAM_STR);
            $stmt_delete_logs->bindParam(":delete_id", $delete_id, PDO::PARAM_STR);
            $stmt_delete_profit->bindParam(":delete_id", $delete_id, PDO::PARAM_STR);

            $stmt_delete_user->execute();
            $stmt_delete_balance->execute();
            $stmt_delete_logs->execute();
            $stmt_delete_profit->execute();

            // Commit transaction
            $conn->commit();

            $_SESSION['success_message'] = "User successfully deleted.";
        } else {
            throw new Exception("No user found with the provided ID.");
        }
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollBack();
        $_SESSION['error_message'] = $e->getMessage();
    }

    // Redirect to the admin users page
    header("Location: /readywears/admin/asset/usersusers.php");
    exit();
}

// Function to log a transaction


if (isset($_POST['updateuserbtn'])) {
    $edit_id = filter_var($_GET['user_id'] ?? '', FILTER_SANITIZE_STRING);
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING); // Corrected from 'f_name'
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $country = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    $state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $updated_at = date('Y-m-d H:i:s'); // Corrected date format

    $image = $_FILES['image']['name'];
    $img_tmp_name = $_FILES['image']['tmp_name'];
    $img_folder = "../uploads/" . basename($image);
    $error_occurred = false;

    $email_verified = isset($_POST['email_verified']) ? true : false;
    $mobile_verified = isset($_POST['mobile_verified']) ? true : false;
    $twofa_verified = isset($_POST['twofa_verified']) ? true : false;
    $kyc_verified = isset($_POST['kyc_verified']) ? true : false;

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :edit_id");
    $stmt->bindParam(":edit_id", $edit_id, PDO::PARAM_STR);
    $stmt->execute();
    $existing_user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($image)) {
        $img_extension = pathinfo($image, PATHINFO_EXTENSION);
        if (move_uploaded_file($img_tmp_name, $img_folder)) {
            if (!empty($existing_user['img'])) {
                $old_img_path = "../uploads/" . $existing_user['img'];
                if (file_exists($old_img_path)) {
                    unlink($old_img_path);
                }
            }
        } else {
            $_SESSION['error_message'] = "Failed to upload image: " . htmlspecialchars($image);
            header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $edit_id);
            $error_occurred = true;
            exit();
        }
    } else {
        // Use existing image if no new image is uploaded
        $image = $existing_user['img'];
    }

    $stmt = $conn->prepare("UPDATE `users` SET `username` = :username, `f_name` = :fullname, `email` = :email, `country` = :country, `address` = :address, `city` = :city, `phone` = :phone, `img` = :image, `state` = :state, `updated_at` = :updated_at, `verification_status` = :verification_status WHERE user_id = :edit_id");

    // Encode the updated statuses to JSON
    $verificationStatus = [
        'email_verified' => $email_verified,
        'mobile_verified' => $mobile_verified,
        'twofa_verified' => $twofa_verified,
        'kyc_verified' => $kyc_verified
    ];
    $verificationStatusJson = json_encode($verificationStatus);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR); // Corrected from ':f_name'
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":country", $country, PDO::PARAM_STR);
    $stmt->bindParam(":address", $address, PDO::PARAM_STR);
    $stmt->bindParam(":city", $city, PDO::PARAM_STR);
    $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
    $stmt->bindParam(":image", $image, PDO::PARAM_STR);
    $stmt->bindParam(":state", $state, PDO::PARAM_STR);
    $stmt->bindParam(":updated_at", $updated_at, PDO::PARAM_STR);
    $stmt->bindParam(":verification_status", $verificationStatusJson, PDO::PARAM_STR);
    $stmt->bindParam(":edit_id", $edit_id, PDO::PARAM_STR);

    // Check if there are any changes to be made
    $changes_made = (
        $existing_user['username'] !== $username ||
        $existing_user['f_name'] !== $fullname ||
        $existing_user['email'] !== $email ||
        $existing_user['country'] !== $country ||
        $existing_user['address'] !== $address ||
        $existing_user['city'] !== $city ||
        $existing_user['phone'] !== $phone ||
        $existing_user['img'] !== $image ||
        $existing_user['state'] !== $state ||
        $existing_user['updated_at'] !== $updated_at
    );

    if (!$changes_made) {
        $_SESSION['error_message'] = "No changes made to user";
        header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $edit_id);
        exit();
    }

    if (!$error_occurred) {
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "User details updated successfully";
        } else {
            $_SESSION['error_message'] = "Failed to update user.";
        }

        header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $edit_id);
        exit();
    }
}

if (isset($_POST['updatestate'])) {
    $user_id = isset($_GET['user_id']) ? filter_var($_GET['user_id'], FILTER_SANITIZE_STRING) : 0;

    $ban_reason = filter_var($_POST['ban_reason'], FILTER_SANITIZE_STRING);
    $status = "banned";

    $stmt = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

    if ($stmt->execute()) {
        $stmt = $conn->prepare("UPDATE users SET status=:status, ban_reason = :ban_reason WHERE user_id = :user_id ");
        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
        $stmt->bindParam(":ban_reason", $ban_reason, PDO::PARAM_STR);
        $stmt->bindParam(":user_id", $user_id, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "account banned";
            header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
            exit();
        } else {
            $_SESSION['error_message'] = "failed to banned user";
            header('Location: /readywears/admin/asset/users/userdetails.php?edit=' . $user_id);
            exit();
        }

    }

}