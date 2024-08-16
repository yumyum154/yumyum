<?php
require '../db/restrict.php';

if (isset($_GET['edit'])) {
    $edit_id = $_GET['edit'];
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE user_id = :edit");
    $stmt->bindParam(':edit', $edit_id); // Use :edit here
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
// Array of countries
$countries = [
    "Afghanistan",
    "Albania",
    "Algeria",
    "Andorra",
    "Angola",
    "Antigua and Barbuda",
    "Argentina",
    "Armenia",
    "Australia",
    "Austria",
    "Azerbaijan",
    "Bahamas",
    "Bahrain",
    "Bangladesh",
    "Barbados",
    "Belarus",
    "Belgium",
    "Belize",
    "Benin",
    "Bhutan",
    "Bolivia",
    "Bosnia and Herzegovina",
    "Botswana",
    "Brazil",
    "Brunei",
    "Bulgaria",
    "Burkina Faso",
    "Burundi",
    "Cabo Verde",
    "Cambodia",
    "Cameroon",
    "Canada",
    "Central African Republic",
    "Chad",
    "Chile",
    "China",
    "Colombia",
    "Comoros",
    "Congo, Democratic Republic of the",
    "Congo, Republic of the",
    "Costa Rica",
    "Croatia",
    "Cuba",
    "Cyprus",
    "Czech Republic",
    "Denmark",
    "Djibouti",
    "Dominica",
    "Dominican Republic",
    "East Timor",
    "Ecuador",
    "Egypt",
    "El Salvador",
    "Equatorial Guinea",
    "Eritrea",
    "Estonia",
    "Eswatini",
    "Ethiopia",
    "Fiji",
    "Finland",
    "France",
    "Gabon",
    "Gambia",
    "Georgia",
    "Germany",
    "Ghana",
    "Greece",
    "Grenada",
    "Guatemala",
    "Guinea",
    "Guinea-Bissau",
    "Guyana",
    "Haiti",
    "Honduras",
    "Hungary",
    "Iceland",
    "India",
    "Indonesia",
    "Iran",
    "Iraq",
    "Ireland",
    "Israel",
    "Italy",
    "Jamaica",
    "Japan",
    "Jordan",
    "Kazakhstan",
    "Kenya",
    "Kiribati",
    "Korea, North",
    "Korea, South",
    "Kosovo",
    "Kuwait",
    "Kyrgyzstan",
    "Laos",
    "Latvia",
    "Lebanon",
    "Lesotho",
    "Liberia",
    "Libya",
    "Liechtenstein",
    "Lithuania",
    "Luxembourg",
    "Madagascar",
    "Malawi",
    "Malaysia",
    "Maldives",
    "Mali",
    "Malta",
    "Marshall Islands",
    "Mauritania",
    "Mauritius",
    "Mexico",
    "Micronesia",
    "Moldova",
    "Monaco",
    "Mongolia",
    "Montenegro",
    "Morocco",
    "Mozambique",
    "Myanmar",
    "Namibia",
    "Nauru",
    "Nepal",
    "Netherlands",
    "New Zealand",
    "Nicaragua",
    "Niger",
    "Nigeria",
    "North Macedonia",
    "Norway",
    "Oman",
    "Pakistan",
    "Palau",
    "Panama",
    "Papua New Guinea",
    "Paraguay",
    "Peru",
    "Philippines",
    "Poland",
    "Portugal",
    "Qatar",
    "Romania",
    "Russia",
    "Rwanda",
    "Saint Kitts and Nevis",
    "Saint Lucia",
    "Saint Vincent and the Grenadines",
    "Samoa",
    "San Marino",
    "Sao Tome and Principe",
    "Saudi Arabia",
    "Senegal",
    "Serbia",
    "Seychelles",
    "Sierra Leone",
    "Singapore",
    "Slovakia",
    "Slovenia",
    "Solomon Islands",
    "Somalia",
    "South Africa",
    "South Sudan",
    "Spain",
    "Sri Lanka",
    "Sudan",
    "Suriname",
    "Sweden",
    "Switzerland",
    "Syria",
    "Taiwan",
    "Tajikistan",
    "Tanzania",
    "Thailand",
    "Togo",
    "Tonga",
    "Trinidad and Tobago",
    "Tunisia",
    "Turkey",
    "Turkmenistan",
    "Tuvalu",
    "Uganda",
    "Ukraine",
    "United Arab Emirates",
    "United Kingdom",
    "United States",
    "Uruguay",
    "Uzbekistan",
    "Vanuatu",
    "Vatican City",
    "Venezuela",
    "Vietnam",
    "Yemen",
    "Zambia",
    "Zimbabwe"
];

// Get the selected country from the database or form data
$selectedCountry = isset($row['country']) ? htmlspecialchars($row['country']) : '';

// Decode JSON data
// Decode JSON data
$verificationStatus = json_decode($row['verification_status'], true);

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
        <div class="userdetailswrapper">
            <div class="wrapper">
                <div class="headerwrapper">
                    <div class="date">
                        <p class="userheaderdesc">user details - <?php echo htmlspecialchars($row['username']); ?></p>
                    </div>
                </div>
                <div class="items">
                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/dollar.svg" alt="" class="icon">
                        </span>

                        <div>
                            <h1>$ <?php echo htmlspecialchars($row['balance']); ?></h1>
                            <p>Balance</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span class="good">
                            <img src="/readywears/admin/asset/svgs/deposit.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$0.00</h1>
                            <p>deposited</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span class="notgood">
                            <img src="/readywears/admin/asset/svgs/withdraw.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$ 0.00</h1>
                            <p>withdrawn</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/exchange.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$ 0.00</h1>
                            <p>total transfered</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/bonus.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$ <?php echo htmlspecialchars($row['bonus']); ?></h1>
                            <p>total bonus</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/profit2.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$ <?php echo htmlspecialchars($row['profit']); ?></h1>
                            <p>total profit</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/loan.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>$ 0.00</h1>
                            <p>loan</p>
                            <a href="">view all</a>
                        </div>
                    </div>

                    <div class="item">
                        <span>
                            <img src="/readywears/admin/asset/svgs/profit.svg" alt="" class="icon">
                        </span>
                        <div>
                            <h1>0</h1>
                            <p>daily profit</p>
                            <a href="">view all</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="userdetailswrap">
                <div>
                    <a href="javascript:void(0);" data-popup-id="addbalance"
                        data-user-id="<?php echo addslashes($row['user_id']); ?>" onclick="openPopup(this)">
                        <img src="/readywears/admin/asset/svgs/add.svg" alt="">
                        balance
                    </a>
                </div>
                <div>
                    <a href="javascript:void(0);" data-popup-id="debitbalance"
                        data-user-id="<?php echo addslashes($row['user_id']); ?>" onclick="openPopup(this)">
                        <img src="/readywears/admin/asset/svgs/add.svg" alt="">
                        balance
                    </a>
                </div>
                <div>
                    <a href="javascript:void(0);" data-popup-id="profits"
                        data-user-id="<?php echo addslashes($row['user_id']); ?>" onclick="openPopup(this)">
                        <img src="/readywears/admin/asset/svgs/chart2.svg" alt="">
                        profits
                    </a>
                </div>
                <div>
                    <a href="javascript:void(0);" data-popup-id="notifications" onclick="openPopup(this)">
                        <img src="/readywears/admin/asset/svgs/bell2.svg" alt="">
                        notifications
                    </a>
                </div>
                <div>
                    <a href="javascript:void(0);" data-popup-id="banusers"
                        data-user-id="<?php echo addslashes($row['user_id']); ?>" onclick="openPopup(this)">
                        <img src="/readywears/admin/asset/svgs/ban.svg" alt="">
                        ban users
                    </a>
                </div>
            </div>


            <div class="detailsinfo">
                <div class="userimginfo">
                    <img src="/readywears/admin/asset/uploads/<?php echo htmlspecialchars($row['img']); ?>" alt=""
                        class="userimg">
                    <div class="downinfounser">
                        <h1>basic information</h1>

                        <div>
                            <p>username</p>
                            <span><?php echo htmlspecialchars($row['username']); ?></span>
                        </div>

                        <div>
                            <p>email</p>
                            <span><?php echo htmlspecialchars($row['email']); ?></span>
                        </div>
                        <div>
                            <p>country</p>
                            <span><?php echo htmlspecialchars($row['country']); ?></span>
                        </div>
                        <div>
                            <p>joined on</p>
                            <span><?php echo htmlspecialchars($row['created_at']); ?></span>
                        </div>

                    </div>
                </div>
                <div class="userdetailsinfo">
                    <form
                        action="/readywears/admin/asset/global/backend.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>"
                        method="post" enctype="multipart/form-data">

                        <h1>Information of <?php echo htmlspecialchars($row['username']); ?></h1>
                        <input type="hidden" name="user_id" id="phone"
                            value="<?php echo htmlspecialchars($row['user_id']); ?>">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username"
                            value="<?php echo htmlspecialchars($row['username']); ?>">

                        <label for="fullname">Full Name</label>
                        <input type="text" name="fullname" id="fullname"
                            value="<?php echo htmlspecialchars($row['f_name']); ?>">

                        <label for="phone">Phone</label>
                        <input type="text" name="phone" id="phone"
                            value="<?php echo htmlspecialchars($row['phone']); ?>">


                        <label for="email">email</label>
                        <input type="email" name="email" id="email"
                            value="<?php echo htmlspecialchars($row['email']); ?>">

                        <div class="column">
                            <div>
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                    <?php foreach ($countries as $country): ?>
                                    <option value="<?php echo htmlspecialchars($country); ?>"
                                        <?php echo strtolower(trim(htmlspecialchars($country))) === strtolower(trim(htmlspecialchars($row['country']))) ? 'selected' : ''; ?>>
                                        <?php echo htmlspecialchars($country); ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <label for="address">Address</label>
                                <input type="text" name="address" id="address"
                                    value="<?php echo htmlspecialchars($row['address']); ?>">
                            </div>
                        </div>

                        <div class="column">
                            <div>
                                <label for="city">City</label>
                                <input type="text" name="city" id="city"
                                    value="<?php echo htmlspecialchars($row['city']); ?>">
                            </div>
                            <div>
                                <label for="state">State</label>
                                <input type="text" name="state" id="state"
                                    value="<?php echo htmlspecialchars($row['state']); ?>">
                            </div>
                        </div>

                        <label for="image">upload image</label>
                        <input type="file" name="image" id="image">

                        <div class="togglediv">
                            <div class="toggle-switch">
                                <label for="emailverified">Email Verified</label>
                                <input type="checkbox" name="email_verified" id="emailverified"
                                    <?php echo isset($verificationStatus['email_verified']) && $verificationStatus['email_verified'] ? 'checked' : ''; ?>>

                                <span class="slider">
                                    <span class="status-text">
                                        <?php echo isset($verificationStatus['email_verified']) && $verificationStatus['email_verified'] ? 'Verified' : 'Unverified'; ?>
                                    </span>
                                </span>
                            </div>

                            <div class="toggle-switch">
                                <label for="mobileverified">Mobile Verified</label>
                                <input type="checkbox" name="mobile_verified" id="mobileverified"
                                    <?php echo isset($verificationStatus['mobile_verified']) && $verificationStatus['mobile_verified'] ? 'checked' : ''; ?>>

                                <span class="slider">
                                    <span class="status-text">
                                        <?php echo isset($verificationStatus['mobile_verified']) && $verificationStatus['mobile_verified'] ? 'Verified' : 'Unverified'; ?>
                                    </span>
                                </span>
                            </div>

                            <div class="toggle-switch">
                                <label for="2faverified">2FA Verified</label>
                                <input type="checkbox" name="twofa_verified" id="2faverified"
                                    <?php echo isset($verificationStatus['twofa_verified']) && $verificationStatus['twofa_verified'] ? 'checked' : ''; ?>>

                                <span class="slider">
                                    <span class="status-text">
                                        <?php echo isset($verificationStatus['twofa_verified']) && $verificationStatus['twofa_verified'] ? 'Verified' : 'Unverified'; ?>
                                    </span>
                                </span>
                            </div>

                            <div class="toggle-switch">
                                <label for="kycverified">KYC Verified</label>
                                <input type="checkbox" name="kyc_verified" id="kycverified"
                                    <?php echo isset($verificationStatus['kyc_verified']) && $verificationStatus['kyc_verified'] ? 'checked' : ''; ?>>

                                <span class="slider">
                                    <span class="status-text">
                                        <?php echo isset($verificationStatus['kyc_verified']) && $verificationStatus['kyc_verified'] ? 'Verified' : 'Unverified'; ?>
                                    </span>
                                </span>
                            </div>
                        </div>

                        <input type="submit" value="update user" name="updateuserbtn">
                    </form>

                </div>
            </div>
        </div>

        <div class="addbalance" id="addbalance">
            <!-- Hide the popup by default -->
            <div class="popup-wrapper addbalancewrapper">
                <form
                    action="/readywears/admin/asset/global/backend.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="headerheing">
                        <h1>Update Balance</h1>
                        <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="close-btn">
                    </div>
                    <input type="hidden" id="user_id_addbalance" name="user_id"> <!-- Unique ID for user_id -->
                    <input type="hidden" name="transaction_type" value="credit"> <!-- or "debit" -->

                    <label for="amount_addbalance">Amount</label>
                    <input type="text" id="amount_addbalance" name="balance">

                    <label for="date_addbalance">Date</label>
                    <input type="date" id="date_addbalance" name="date">

                    <label for="time_addbalance">Time</label>
                    <input type="time" id="time_addbalance" name="time">

                    <label for="remark_addbalance">Remark</label>
                    <textarea id="remark_addbalance" cols="10" rows="5" name="remark"></textarea>

                    <input type="submit" name="updatebal" value="Update">
                </form>
            </div>
        </div>

        <div class="addbalance" id="debitbalance">
            <!-- Hide the popup by default -->
            <div class="popup-wrapper addbalancewrapper">
                <form
                    action="/readywears/admin/asset/global/backend.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>"
                    method="post" enctype="multipart/form-data">
                    <div class="headerheing">
                        <h1>debit Balance</h1>
                        <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="close-btn">
                    </div>
                    <input type="hidden" id="user_id_debitbalance" name="user_id"> <!-- Unique ID for user_id -->
                    <input type="hidden" name="transaction_type" value="debit"> <!-- or "debit" -->


                    <label for="amount_debitbalance">Amount</label>
                    <input type="text" id="amount_debitbalance" name="balance">

                    <label for="date_debitbalance">Date</label>
                    <input type="date" id="date_debitbalance" name="date">

                    <label for="time_debitbalance">Time</label>
                    <input type="time" id="time_debitbalance" name="time">

                    <label for="remark_debitbalance">Remark</label>
                    <textarea id="remark_debitbalance" cols="10" rows="5" name="remark"></textarea>

                    <input type="submit" name="updatebal" value="Update">
                </form>
            </div>
        </div>

        <div class="addbalance" id="profits">
            <!-- Hide the popup by default -->
            <div class="popup-wrapper addbalancewrapper">
                <div class="userdetailsinfo">
                    <form
                        action="/readywears/admin/asset/global/backend.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>"
                        method="post" enctype="multipart/form-data">
                        <div class="headerheing">
                            <h1>Profits</h1>
                            <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="close-btn">
                        </div>
                        <input type="hidden" id="user_id_profits" name="user_id"> <!-- Unique ID for user_id -->
                        <input type="hidden" name="transaction_type" value="profit"> <!-- or "debit" -->

                        <div class="manual-section" id="manualSection">
                            <label for="profitAmount">Profit Amount:</label>
                            <input type="number" id="profitAmount" name="profitAmount">
                        </div>
                        <div class="automatic-section" id="automaticSection" style="display: none;">
                            <label for="profitPercentage">Profit Percentage:</label>
                            <input type="number" id="profitPercentage" name="profitPercentage" min="0" max="100"
                                step="0.01">

                            <label for="profitStartDate">Start Date:</label>
                            <input type="date" id="profitStartDate" name="profitStartDate">

                            <label for="profitEndDate">End Date:</label>
                            <input type="date" id="profitEndDate" name="profitEndDate">
                        </div>

                        <div class="togglediv">
                            <div class="toggle-switch">
                                <label for="manualprofit">Manual Profit</label>
                                <input type="checkbox" id="manualprofit" name="manualprofit">
                                <span class="slider">
                                    <span class="status-text">Manual Profit</span>
                                </span>
                            </div>
                            <div class="toggle-switch">
                                <label for="automaticprofit">Automatic Profit</label>
                                <input type="checkbox" id="automaticprofit" name="automaticprofit">
                                <span class="slider">
                                    <span class="status-text">Automatic Profit</span>
                                </span>
                            </div>
                        </div>
                        <input type="submit" value="Update User" name="uploadprofit">
                    </form>
                </div>
            </div>
        </div>
        <div class="addbalance" id="banusers">
            <!-- Hide the popup by default -->
            <div class="addbalancewrapper">
                <div class="userdetailsinfo">
                    <form
                        action="/readywears/admin/asset/global/backend.php?user_id=<?php echo htmlspecialchars($row['user_id']); ?>"
                        method="post" enctype="multipart/form-data">
                        <div class="headerheing">
                            <h1>ban user</h1>
                            <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="close-btn">
                        </div>
                        <p>If you ban this user he/she won't able to access his/her dashboard.</p>
                        <input type="hidden" name="status">
                        <input type="hidden" id="user_id_banusers" name="user_id"> <!-- Unique ID for user_id -->

                        <label for="">reason</label>
                        <textarea name="ban_reason" id="" cols="30" rows="5"></textarea>
                        <input type="submit" value="Update User" name="updatestate">
                    </form>
                </div>
            </div>
        </div>
        <?php include '../global/footer.php' ?>
</body>

</html>