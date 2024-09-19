<?php 
require("componante/head.php") ; 
$page="register" ;
require("componante/header.php") ;
?>

<form class="flex flex-col w-48 gap-2" method="post">
    <h1><?php echo $loginOrRegister ; ?></h1>
    <input tye="email" name="email" required style="border:1px solid black" />
    <p class="text-xs text-red-600"><?php echo(isset($errors['email'])?($errors['email']):"") ?></p>
    <input type="password"  name="password" required style="border:1px solid black"/>
    <p class="text-xs text-red-600"><?php echo(isset($errors['password'])?($errors['password']):"") ?></p>
    <input type="submit"style="border:1px solid black" />
   
</form>

<?php
require("componante/foot.php") ;
