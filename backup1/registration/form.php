<?php
include "registration.php";
?>


<link rel="stylesheet" href="form.css" type="text/css">
<div class="body-content">
    <div class="module">
        <h1>Vendor Registration</h1>
        <hr></br>
    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error">
            <?= $_SESSION['message'] ?>
        </div>

        <input type="text" placeholder="Vendor Name" name="username" required />
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
        <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
        <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </form>
</div>
</div>

