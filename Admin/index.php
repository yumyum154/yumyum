<?php
require 'asset/db/restrict.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/readywears/admin/asset/css/style.css">
</head>

<body>
    <?php include 'asset/global/header.php' ?>
    <div class="containers">
        <div class="wrapper">
            <div class="headerwrapper">
                <div class="date">
                    <h1>admin dashboard</h1>
                </div>

                <div class="secondwrap">
                    <a href="">
                        <img src="/readywears/admin/asset/svgs/plus.svg" alt="">
                        <span>add package</span>
                    </a>
                </div>
            </div>
            <div class="items">
                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>

                    <div>
                        <?php
                        $stmt = $conn->prepare("SELECT COUNT(*) as total_users FROM users");
                        $stmt->execute();
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total_users = $result['total_users'];
                        ?>
                        <h1><?php echo htmlspecialchars($result['total_users']); ?></h1>
                        <p>total users</p>
                        <a href="">view all</a>
                    </div>
                </div>

                <div class="item">
                    <span class="good">
                        <img src="/readywears/admin/asset/svgs/active.svg" alt="" class="icon">
                    </span>
                    <div>
                        <?php
                        // Prepare and execute the query
                        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM users WHERE status = :status");
                        $status = 'active';
                        $stmt->bindParam(":status", $status, PDO::PARAM_STR);
                        $stmt->execute();

                        // Fetch the result
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total = $result['total']; // Get the total count
                        
                        ?>
                        <h1><?php echo htmlspecialchars($total); ?></h1>
                        <p>Active users</p>
                        <a href="">View all</a>
                    </div>

                </div>
                <div class="item">
                    <span class="good">
                        <img src="/readywears/admin/asset/svgs/email.svg" alt="" class="icon">
                    </span>
                    <div>
                        <?php
                        // Prepare and execute the query
                        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM users WHERE JSON_EXTRACT(verification_status, '$.email_verified') = 'false'");
                        $stmt->execute();

                        // Fetch the result
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total = $result['total']; // Get the total count
                        
                        ?>
                        <h1><?php echo htmlspecialchars($total); ?></h1>
                        <p>Email unverified users</p>
                        <a href="">View all</a>
                    </div>

                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/mobile.svg" alt="" class="icon">
                    </span>
                    <div>
                        <?php
                        // Prepare and execute the query
                        $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM users WHERE JSON_EXTRACT(verification_status, '$.mobile_verified') = 'false'");
                        $stmt->execute();

                        // Fetch the result
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total = $result['total']; // Get the total count
                        
                        ?>
                        <h1><?php echo htmlspecialchars($total); ?></h1>
                        <p>mobile unverified users</p>
                        <a href="">View all</a>
                    </div>
                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>13</h1>
                        <p>pending deposit</p>
                        <a href="">view all</a>
                    </div>
                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>3</h1>
                        <p>rejected deposit</p>
                        <a href="">view all</a>
                    </div>
                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>1</h1>
                        <p>pending withdrawal</p>
                        <a href="">view all</a>
                    </div>
                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>0</h1>
                        <p>rejected withdrawal</p>
                        <a href="">view all</a>
                    </div>
                </div>


                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>1</h1>
                        <p>active mining</p>
                        <a href="">view all</a>
                    </div>
                </div>

                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>0</h1>
                        <p>paid minerss</p>
                        <a href="">view all</a>
                    </div>
                </div>


                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>5</h1>
                        <p>total package</p>
                        <a href="">view all</a>
                    </div>
                </div>


                <div class="item">
                    <span>
                        <img src="/readywears/admin/asset/svgs/users.svg" alt="" class="icon">
                    </span>
                    <div>
                        <h1>0</h1>
                        <p>approve package</p>
                        <a href="">view all</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="recentwrapper">
            <div class="table">
                <div class="tbl_section">
                    <h1>recent investments</h1>
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
                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">us</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">ngn</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">ca</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">eng</td>

                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="table">
                <div class="tbl_section">
                    <h1>recent investors</h1>
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
                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">us</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">ngn</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">ca</td>
                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td data-label="s.no.">1</td>
                                <td data-label="image" class="tdimg"> <img src="/readywears/admin/asset/svgs/4.jpeg"
                                        alt="">
                                </td>
                                <td data-label="email">
                                    <div>
                                        christopher@email.com <br>christopher
                                    </div>
                                </td>
                                <td data-label="country">eng</td>

                                <td data-label="created at">12-01-2021</td>
                                <td data-label="action">
                                    <div class="actionwrap">
                                        <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                        <a href="">fund</a>
                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include 'asset/global/footer.php' ?>
</body>

</html>