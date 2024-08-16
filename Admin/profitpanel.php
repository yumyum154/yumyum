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
            <div class="tbl_header">
                <h1>profit panel</h1>
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
                            <th>balance</th>
                            <th>email / name</th>
                            <th>package</th>
                            <th>package status</th>
                            <th>country</th>
                            <th>created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">$320</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="package">silver</td>
                            <td data-label="package status">pending</td>
                            <td data-label="country">us</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">2</td>
                            <td data-label="balance">$320</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="package">silver</td>
                            <td data-label="package status">pending</td>
                            <td data-label="country">us</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">3</td>
                            <td data-label="balance">$320</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="package">silver</td>
                            <td data-label="package status">pending</td>
                            <td data-label="country">us</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">4</td>
                            <td data-label="balance">$320</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="package">silver</td>
                            <td data-label="package status">pending</td>
                            <td data-label="country">us</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">5</td>
                            <td data-label="balance">$320</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="package">silver</td>
                            <td data-label="package status">pending</td>
                            <td data-label="country">us</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="fundpopupwrapper">
            <div class="fundpopup">
                <div class="fundpopupwrap">
                    <div class="header">
                        <h1>fund account</h1>
                        <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="closeform toggle-btn"
                            data-target="#form">
                    </div>
                    <form action="" method="post">
                        <div class="inputbox">
                            <input type="text" id="p_amt" placeholder="" required="require" name="p_amt">
                            <label for="p_amt">profit amount (daily)</label>
                        </div>

                        <div class="inputbox">
                            <select name="" id="">
                                <option value="">profit stage</option>
                                <option value="">increase</option>
                                <option value="">decrease</option>
                            </select>
                        </div>


                        <div class="inputbox">
                            <input type="time" id="s_point" placeholder="" required="require" name="s_point">
                            <label for="s_point">starting time</label>
                        </div>

                        <div class="inputbox">
                            <input type="time" id="e_point" placeholder="" required="require" name="e_point">
                            <label for="e_point">ending time</label>
                        </div>

                        <div class="inputbox">
                            <input type="submit" value="update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'asset/global/footer.php' ?>
</body>

</html>