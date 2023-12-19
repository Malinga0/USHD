<?php

if(isset($_POST['submit']) && !empty($_POST['message'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];
                                
    $receiver = "wijebandaraam1999@gmail.com";
    $subject = "Test Mode";
    $headers = "From: " . $email;
                                
    mail($receiver, $subject, $message, $headers);
    
    //header("Location: https://newushd.000webhostapp.com/home.php?msg=success");
}

?>

<script>
    setTimeout(function() {
        window.location.href = 'http://ushdsys.000webhostapp.com/home.php?msg=success';
    }, 1)
</script>