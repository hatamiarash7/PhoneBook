<?php
require "login/loginheader.php";
require "include/DB_Functions.php";
$db = new DB_Functions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>مخاطب جدید</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link href="css/mine.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="container">
    <div class="box effect2">
        <form class="form-horizontal" action="store.php" method="post">
            <fieldset>

                <legend class="font" style="text-align: center; font-size: x-large">ثبت مخاطب جدید<br><br></legend>
                <p class="font" style="text-align: center">پر کردن فیلد های <span style="color: red">*</span> دار الزامی
                    می باشد</p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered input-group">
                                <input class="form-control" name="lname" placeholder="نام خانوادگی"
                                       type="text"
                                       tabindex="2" required>
                                <div class="input-group-addon" style="background-color: white; border-color: white">
                                    <span style="color: red">*</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered input-group">
                                <input class="form-control" name="fname" placeholder="نام" type="text"
                                       tabindex="1"
                                       required>
                                <div class="input-group-addon" style="background-color: white; border-color: white">
                                    <span style="color: red">*</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <input class="form-control" name="p_h" placeholder="تلفن منزل" type="text" tabindex="4">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <input class="form-control" name="p_m" placeholder="تلفن همراه" type="text"
                                       tabindex="3">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <input class="form-control" name="p_w" placeholder="تلفن محل کار" type="text"
                                       tabindex="5">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <input class="form-control" name="email" placeholder="ایمیل" type="text" tabindex="6">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <input class="form-control" name="a_h" placeholder="آدرس منزل" type="text" tabindex="7">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <input class="form-control" name="a_w" placeholder="آدرس محل کار" type="text" tabindex="8">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <input class="form-control" name="birthday" placeholder="تاریخ تولد" type="text"
                                       tabindex="10">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <input class="form-control" name="job" placeholder="شغل" type="text" tabindex="9">
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-success font col-centered" tabindex="11">ذخیره</button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
