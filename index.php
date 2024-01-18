<?php
define('PAGE_NAME', 'Login Page');
define('ABS_PATH', 'cs3270-notes');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo PAGE_NAME?></title>
</head>
<body>
    <form action="<?php echo  ABS_PATH . '/members.php' ?>" method="get">
       <label for="user-name">Username: <input type="text" name='userName' id='user-name'></label> 
       <label for="password">Password: <input type="text" name="password" id="password"></label>
       <input type="submit" value="Submit">
    </form>
</body>
</html>