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
                <a href="#0">add new package</a>
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
                            <th>package name</th>
                            <th>min</th>
                            <th>max</th>
                            <th>interest</th>
                            <th>created at</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="package name">silver</td>
                            <td data-label="min">
                                $1000
                            </td>
                            <td data-label="max">$2500</td>
                            <td data-label="interest">10%</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">edit</a>
                                    <a href="">delete</a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td data-label="s.no.">2</td>
                            <td data-label="package name">premium</td>
                            <td data-label="min">
                                $2500
                            </td>
                            <td data-label="max">$5000</td>
                            <td data-label="interest">15%</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">edit</a>
                                    <a href="">delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="package name">premium +</td>
                            <td data-label="min">
                                $5000
                            </td>
                            <td data-label="max">$7500</td>
                            <td data-label="interest">20%</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">edit</a>
                                    <a href="">delete</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="s.no.">1</td>
                            <td data-label="package name">gold</td>
                            <td data-label="min">
                                $7500
                            </td>
                            <td data-label="max">$10000</td>
                            <td data-label="interest">35%</td>
                            <td data-label="created at">12-01-2021</td>
                            <td data-label="action">
                                <div class="actionwrap toggle-btn" data-target=".fundpopup">
                                    <img src="/readywears/admin/asset/svgs/desk.svg" alt="" class="icon">
                                    <a href="#0">edit</a>
                                    <a href="">delete</a>
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
                        <h1>edit package</h1>
                        <img src="/readywears/admin/asset/svgs/closes.svg" alt="" class="closeform toggle-btn"
                            data-target="#form">
                    </div>
                    <form action="" method="post">
                        <div class="inputbox">
                            <input type="text" id="name" placeholder="" required="require" name="name">
                            <label for="name">package name</label>
                        </div>

                        <div class="inputbox">
                            <input type="number" id="min" placeholder="" required="require" name="min">
                            <label for="min">package min</label>
                        </div>

                        <div class="inputbox">
                            <input type="number" id="max" placeholder="" required="require" name="max">
                            <label for="min">package max</label>
                        </div>

                        <div class="inputbox">
                            <input type="number" id="p_interest" placeholder="" required="require" name="p_interest">
                            <label for="p_interest">package interest</label>
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