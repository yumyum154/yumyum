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

        <div class="registerwrapper">
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
            <div class="formcontain">
                <h1>create an account</h1>
                <form action="/readywears/admin/asset/global/backend.php" method="post" enctype="multipart/form-data">
                    <div class="inputbox">
                        <input type="text" name="username" id="username" placeholder="" required="require">
                        <label for="username">username</label>
                    </div>
                    <div class="inputbox">
                        <input type="text" name="f_name" id="f_name" placeholder="" required="require">
                        <label for="f_name">full name</label>
                    </div>
                    <div class="inputbox">
                        <input type="email" name="email" id="email" placeholder="" required="require">
                        <label for="email">email</label>
                    </div>
                    <div class="column">
                        <div class="inputbox">
                            <select id="country" name="country">
                                <option value="" disabled selected>Select an option</option>
                                <option value="afghanistan">Afghanistan</option>
                                <option value="albania">Albania</option>
                                <option value="algeria">Algeria</option>
                                <option value="andorra">Andorra</option>
                                <option value="angola">Angola</option>
                                <option value="antigua_and_barbuda">Antigua and Barbuda</option>
                                <option value="argentina">Argentina</option>
                                <option value="armenia">Armenia</option>
                                <option value="australia">Australia</option>
                                <option value="austria">Austria</option>
                                <option value="azerbaijan">Azerbaijan</option>
                                <option value="bahamas">Bahamas</option>
                                <option value="bahrain">Bahrain</option>
                                <option value="bangladesh">Bangladesh</option>
                                <option value="barbados">Barbados</option>
                                <option value="belarus">Belarus</option>
                                <option value="belgium">Belgium</option>
                                <option value="belize">Belize</option>
                                <option value="benin">Benin</option>
                                <option value="bhutan">Bhutan</option>
                                <option value="bolivia">Bolivia</option>
                                <option value="bosnia_and_herzegovina">Bosnia and Herzegovina</option>
                                <option value="botswana">Botswana</option>
                                <option value="brazil">Brazil</option>
                                <option value="brunei">Brunei</option>
                                <option value="bulgaria">Bulgaria</option>
                                <option value="burkina_faso">Burkina Faso</option>
                                <option value="burundi">Burundi</option>
                                <option value="cabo_verde">Cabo Verde</option>
                                <option value="cambodia">Cambodia</option>
                                <option value="cameroon">Cameroon</option>
                                <option value="canada">Canada</option>
                                <option value="central_african_republic">Central African Republic</option>
                                <option value="chad">Chad</option>
                                <option value="chile">Chile</option>
                                <option value="china">China</option>
                                <option value="colombia">Colombia</option>
                                <option value="comoros">Comoros</option>
                                <option value="congo">Congo</option>
                                <option value="costa_rica">Costa Rica</option>
                                <option value="croatia">Croatia</option>
                                <option value="cuba">Cuba</option>
                                <option value="cyprus">Cyprus</option>
                                <option value="czech_republic">Czech Republic</option>
                                <option value="denmark">Denmark</option>
                                <option value="djibouti">Djibouti</option>
                                <option value="dominica">Dominica</option>
                                <option value="dominican_republic">Dominican Republic</option>
                                <option value="east_timor">East Timor</option>
                                <option value="ecuador">Ecuador</option>
                                <option value="egypt">Egypt</option>
                                <option value="el_salvador">El Salvador</option>
                                <option value="equatorial_guinea">Equatorial Guinea</option>
                                <option value="eritrea">Eritrea</option>
                                <option value="estonia">Estonia</option>
                                <option value="eswatini">Eswatini</option>
                                <option value="ethiopia">Ethiopia</option>
                                <option value="fiji">Fiji</option>
                                <option value="finland">Finland</option>
                                <option value="france">France</option>
                                <option value="gabon">Gabon</option>
                                <option value="gambia">Gambia</option>
                                <option value="georgia">Georgia</option>
                                <option value="germany">Germany</option>
                                <option value="ghana">Ghana</option>
                                <option value="greece">Greece</option>
                                <option value="grenada">Grenada</option>
                                <option value="guatemala">Guatemala</option>
                                <option value="guinea">Guinea</option>
                                <option value="guinea_bissau">Guinea-Bissau</option>
                                <option value="guyana">Guyana</option>
                                <option value="haiti">Haiti</option>
                                <option value="honduras">Honduras</option>
                                <option value="hungary">Hungary</option>
                                <option value="iceland">Iceland</option>
                                <option value="india">India</option>
                                <option value="indonesia">Indonesia</option>
                                <option value="iran">Iran</option>
                                <option value="iraq">Iraq</option>
                                <option value="ireland">Ireland</option>
                                <option value="israel">Israel</option>
                                <option value="italy">Italy</option>
                                <option value="jamaica">Jamaica</option>
                                <option value="japan">Japan</option>
                                <option value="jordan">Jordan</option>
                                <option value="kazakhstan">Kazakhstan</option>
                                <option value="kenya">Kenya</option>
                                <option value="kiribati">Kiribati</option>
                                <option value="korea_north">North Korea</option>
                                <option value="korea_south">South Korea</option>
                                <option value="kosovo">Kosovo</option>
                                <option value="kuwait">Kuwait</option>
                                <option value="kyrgyzstan">Kyrgyzstan</option>
                                <option value="laos">Laos</option>
                                <option value="latvia">Latvia</option>
                                <option value="lebanon">Lebanon</option>
                                <option value="lesotho">Lesotho</option>
                                <option value="liberia">Liberia</option>
                                <option value="libya">Libya</option>
                                <option value="liechtenstein">Liechtenstein</option>
                                <option value="lithuania">Lithuania</option>
                                <option value="luxembourg">Luxembourg</option>
                                <option value="madagascar">Madagascar</option>
                                <option value="malawi">Malawi</option>
                                <option value="malaysia">Malaysia</option>
                                <option value="maldives">Maldives</option>
                                <option value="mali">Mali</option>
                                <option value="malta">Malta</option>
                                <option value="marshall_islands">Marshall Islands</option>
                                <option value="mauritania">Mauritania</option>
                                <option value="mauritius">Mauritius</option>
                                <option value="mexico">Mexico</option>
                                <option value="micronesia">Micronesia</option>
                                <option value="moldova">Moldova</option>
                                <option value="monaco">Monaco</option>
                                <option value="mongolia">Mongolia</option>
                                <option value="montenegro">Montenegro</option>
                                <option value="morocco">Morocco</option>
                                <option value="mozambique">Mozambique</option>
                                <option value="myanmar">Myanmar</option>
                                <option value="namibia">Namibia</option>
                                <option value="nauru">Nauru</option>
                                <option value="nepal">Nepal</option>
                                <option value="netherlands">Netherlands</option>
                                <option value="new_zealand">New Zealand</option>
                                <option value="nicaragua">Nicaragua</option>
                                <option value="niger">Niger</option>
                                <option value="nigeria">Nigeria</option>
                                <option value="north_macedonia">North Macedonia</option>
                                <option value="norway">Norway</option>
                                <option value="oman">Oman</option>
                                <option value="pakistan">Pakistan</option>
                                <option value="palau">Palau</option>
                                <option value="palestine">Palestine</option>
                                <option value="panama">Panama</option>
                                <option value="papua_new_guinea">Papua New Guinea</option>
                                <option value="paraguay">Paraguay</option>
                                <option value="peru">Peru</option>
                                <option value="philippines">Philippines</option>
                                <option value="poland">Poland</option>
                                <option value="portugal">Portugal</option>
                                <option value="qatar">Qatar</option>
                                <option value="romania">Romania</option>
                                <option value="russia">Russia</option>
                                <option value="rwanda">Rwanda</option>
                                <option value="saint_kitts_and_nevis">Saint Kitts and Nevis</option>
                                <option value="saint_lucia">Saint Lucia</option>
                                <option value="saint_vincent_and_the_grenadines">Saint Vincent and the Grenadines
                                </option>
                                <option value="samoa">Samoa</option>
                                <option value="san_marino">San Marino</option>
                                <option value="sao_tome_and_principe">Sao Tome and Principe</option>
                                <option value="saudi_arabia">Saudi Arabia</option>
                                <option value="senegal">Senegal</option>
                                <option value="serbia">Serbia</option>
                                <option value="seychelles">Seychelles</option>
                                <option value="sierra_leone">Sierra Leone</option>
                                <option value="singapore">Singapore</option>
                                <option value="slovakia">Slovakia</option>
                                <option value="slovenia">Slovenia</option>
                                <option value="solomon_islands">Solomon Islands</option>
                                <option value="somalia">Somalia</option>
                                <option value="south_africa">South Africa</option>
                                <option value="spain">Spain</option>
                                <option value="sri_lanka">Sri Lanka</option>
                                <option value="sudan">Sudan</option>
                                <option value="suriname">Suriname</option>
                                <option value="sweden">Sweden</option>
                                <option value="switzerland">Switzerland</option>
                                <option value="syria">Syria</option>
                                <option value="taiwan">Taiwan</option>
                                <option value="tajikistan">Tajikistan</option>
                                <option value="tanzania">Tanzania</option>
                                <option value="thailand">Thailand</option>
                                <option value="togo">Togo</option>
                                <option value="tonga">Tonga</option>
                                <option value="trinidad_and_tobago">Trinidad and Tobago</option>
                                <option value="tunisia">Tunisia</option>
                                <option value="turkey">Turkey</option>
                                <option value="turkmenistan">Turkmenistan</option>
                                <option value="tuvalu">Tuvalu</option>
                                <option value="uganda">Uganda</option>
                                <option value="ukraine">Ukraine</option>
                                <option value="united_arab_emirates">United Arab Emirates</option>
                                <option value="united_kingdom">United Kingdom</option>
                                <option value="united_states">United States</option>
                                <option value="uruguay">Uruguay</option>
                                <option value="uzbekistan">Uzbekistan</option>
                                <option value="vanuatu">Vanuatu</option>
                                <option value="vatican_city">Vatican City</option>
                                <option value="venezuela">Venezuela</option>
                                <option value="vietnam">Vietnam</option>
                                <option value="yemen">Yemen</option>
                                <option value="zambia">Zambia</option>
                                <option value="zimbabwe">Zimbabwe</option>
                            </select>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="address" id="address" placeholder="" required="require">
                            <label for="address">address</label>
                        </div>
                    </div>
                    <div class="column">
                        <div class="inputbox">
                            <input type="text" name="city" id="city" placeholder="" required="require">
                            <label for="city">city</label>
                        </div>
                        <div class="inputbox">
                            <input type="text" name="state" id="state" placeholder="" required="require">
                            <label for="state">state</label>
                        </div>
                    </div>
                    <div class="inputbox">
                        <input type="phone" name="phone" id="phone" placeholder="" required="require">
                        <label for="phone">phone number</label>
                    </div>
                    <div class="inputbox">
                        <input type="file" name="image">
                    </div>
                    <div class="column">
                        <div class="inputbox">
                            <input type="password" name="pass" id="pass" placeholder="" required="require">
                            <label for="pass">password</label>
                        </div>
                        <div class="inputbox">
                            <input type="password" name="cpass" id="cpass" placeholder="" required="require">
                            <label for="cpass">password</label>
                        </div>
                    </div>

                    <div class="inputbox">
                        <input type="submit" name="registerbtn" value="register">
                    </div>

                </form>
            </div>
        </div>
    </div>

    <?php include '../global/footer.php' ?>
</body>

</html>