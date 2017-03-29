<link rel="stylesheet" href="form.css">

<?php session_start(); ?>


<div class="body_content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        </br>
         <h1> Welcome, <?= $_SESSION['username'] ?>! </h1> 
        
         <h3> Thank you for registering, we will be in contact soon.</h3>
            
    
    
    
    
    </div>


</div>

