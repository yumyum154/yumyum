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
                <h1>transactions</h1>
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
                            <th>user id</th>
                            <th>email / name</th>
                            <th>amount</th>
                            <th>transaction status</th>
                            <th>transaction type</th>
                            <th>created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">ghfjjdssjfc90</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="amount">$10,000</td>
                            <td data-label="transaction status">pending</td>
                            <td data-label="transaction type">btc</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">ghfjjdssjfc90</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="amount">$10,000</td>
                            <td data-label="transaction status">pending</td>
                            <td data-label="transaction type">btc</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">ghfjjdssjfc90</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="amount">$10,000</td>
                            <td data-label="transaction status">pending</td>
                            <td data-label="transaction type">btc</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">ghfjjdssjfc90</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="amount">$10,000</td>
                            <td data-label="transaction status">pending</td>
                            <td data-label="transaction type">btc</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">update</a>
                                </div>
                            </td>
                        </tr>


                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="balance">ghfjjdssjfc90</td>
                            <td data-label="email">
                                <div>
                                    christopher@email.com <br>christopher
                                </div>
                            </td>
                            <td data-label="amount">$10,000</td>
                            <td data-label="transaction status">pending</td>
                            <td data-label="transaction type">btc</td>
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
                            <input type="text" id="name" placeholder="" required="require" name="name" readonly
                                aria-readonly value="christoper ellot">
                        </div>
                        <div class="inputbox">
                            <select name="" id="">
                                <option value="">package status</option>
                                <option value="">approve</option>
                                <option value="">pending</option>
                            </select>
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