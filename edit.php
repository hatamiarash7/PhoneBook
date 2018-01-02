<?php
require "login/loginheader.php";
require "include/DB_Functions.php";

$db = new DB_Functions();

$id = $_GET['id'];
$contact = $db->GetContact($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>ویرایش مخاطب</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
    <link href="css/mine.css" rel="stylesheet" media="screen">
</head>
<body>
<div class="container">
    <div class="box effect2">
        <form class="form-horizontal" action="update.php" method="post">
            <fieldset>
                <?php echo '<legend class="font" style="text-align: center; font-size: x-large; direction: rtl;">ویرایش اطلاعات مخاطب' . '<span style="color: blueviolet">' . ' ( ' . $contact['fname'] . ' ' . $contact['lname'] . ' )</span><br><br></legend>' ?>
                <?php echo '<input type="hidden" name="id" value="' . $id . '">' ?>
                <p class="font" style="text-align: center">پر کردن فیلد های <span style="color: red">*</span> دار الزامی
                    می باشد</p>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered input-group">
                                <?php echo '<input class="form-control" name="lname" placeholder="نام خانوادگی" type="text"
                                       tabindex="2" required value="' . $contact['lname'] . '">' ?>
                                <div class="input-group-addon" style="background-color: white; border-color: white">
                                    <span style="color: red">*</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered input-group">
                                <?php echo '<input class="form-control" name="fname" placeholder="نام" type="text" tabindex="1"
                                       required value="' . $contact['fname'] . '">' ?>
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
                                <?php echo '<input class="form-control" name="p_h" placeholder="تلفن منزل" type="text" tabindex="4" value="' . $contact['phone_home'] . '">' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <?php echo '<input class="form-control" name="p_m" placeholder="تلفن همراه" type="text"
                                       tabindex="3" value="' . $contact['phone_mobile'] . '">' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <?php echo '<input class="form-control" name="p_w" placeholder="تلفن محل کار" type="text"
                                       tabindex="5" value="' . $contact['phone_work'] . '">' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <?php echo '<input class="form-control" name="email" placeholder="ایمیل" type="text" tabindex="6" value="' . $contact['email'] . '">' ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <?php echo '<input class="form-control" name="a_h" placeholder="آدرس منزل" type="text" tabindex="7" value="' . $contact['address_home'] . '">' ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10 col-centered">
                        <?php echo '<input class="form-control" name="a_w" placeholder="آدرس محل کار" type="text" tabindex="8" value="' . $contact['address_work'] . '">' ?>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <?php echo '<input class="form-control" name="birthday" placeholder="تاریخ تولد" type="text"
                                       tabindex="10" value="' . $contact['birthday'] . '">' ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-10 col-centered">
                                <?php echo '<input class="form-control" name="job" placeholder="شغل" type="text" tabindex="9" value="' . $contact['job'] . '">' ?>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg btn-info font col-centered" tabindex="11">اعمال تغییرات
                    </button>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>
