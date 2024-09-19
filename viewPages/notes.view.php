<?php 
  require("componante/head.php") ; 
  $page="notes" ;
  include("componante/header.php") ;


  include("componante/notes.php") ; 

  require("componante/foot.php") ; ?>
   <form method="post" class="flex flex-col gap-4 w-36"  >
    <textarea type="text" name="text" class="boreder-1" style="border:1px solid black" ><?php echo(isset($_POST["text"])? $_POST["text"]:"")  ?>  </textarea>
    <input type="hidden" name="_method" value="PUT" />
    <input type="submit" name="submite" />
    <p class="text-gray-500 font-bold"> <?php echo (isset($errors["body"])? $errors['body']:"" );?> </p>
   </form>
 


