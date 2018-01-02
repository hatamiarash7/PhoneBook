<?php
require "login/loginheader.php";
require "include/DB_Functions.php";
$db = new DB_Functions();

$query = $_POST['query'];
$contacts = $db->SearchContact($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>دفترچه تلفن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link href="css/mine.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="js/mine.js"></script>
    <script type="text/javascript" src="js/sweetalert.min.js"></script>
</head>
<body>
<div class="container">
    <div class="form-signin">
        <a href="login/logout.php" class="font btn btn-default btn-lg btn-block">خروج</a>
        <a href="create.php" class="font btn btn-default btn-lg btn-block">ایجاد</a>
        <hr>
        <form action="search.php" method="post">
            <input class="form-control" type="text" name="query" placeholder="نام / ایمیل / شماره تلفن"/>
            <input class="btn btn-info btn-block" style="margin-top: 5px" type="submit" value="جستجوی مخاطب"/>
        </form>
    </div>
    <hr>
    <div>
        <table class="data-table">
            <?php
            if (count($contacts) > 0) {
                echo '
                <caption class="title" style="font-size: x-large">لیست مخاطبین</caption>
                <thead>
                    <tr>
                        <th>مدیریت</th>
                        <th>تاریخ تولد</th>
                        <th>شغل</th>
                        <th>آدرس محل کار</th>
                        <th>آدرس منزل</th>
                        <th>ایمیل</th>
                        <th>تلفن محل کار</th>
                        <th>تلفن منزل</th>
                        <th>تلفن همراه</th>
                        <th>نام و نام خانوادگی</th>
                    </tr>
                </thead>
                <tbody>';
                foreach ($contacts as $contact) {
                    echo '<tr>
					<td width="150">
					<a style="margin-right: 5px" class="btn btn-success" href="edit.php?id=' . $contact['id'] . '">ویرایش</a><a class="btn btn-danger" href="javascript:void(0);" onClick="deleteContact(' . "'" . $contact['id'] . "'" . ');">حذف</a>
					</td>
					<td>' . $contact['birthday'] . '</td>
					<td>' . $contact['job'] . '</td>
					<td>' . $contact['a_w'] . '</td>
					<td>' . $contact['a_h'] . '</td>
					<td>' . $contact['email'] . '</td>
					<td>' . $contact['p_work'] . '</td>
					<td>' . $contact['p_home'] . '</td>
					<td>' . $contact['p_mobile'] . '</td>
					<td>' . $contact['fname'] . ' ' . $contact['lname'] . '</a></td>
				</tr>';
                }
                echo '</tbody>';
            } else {
                echo '<h3 class="font" style="text-align: center">مخاطبی با مشخصات وارد شده وجود ندارد</h3>';
            }
            ?>
        </table>
    </div>
</div>
</body>
</html>
