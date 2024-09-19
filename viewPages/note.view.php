<?php
  require("componante/head.php") ; 
  $page="notes" ;
  include("componante/header.php") ;
  include("componante/notes.php") ; 
 ?>

  <form class="flex flex-col w-48 gap-2" method="post">
    <input type="hidden" name="_method" value="DELETE" >
    <input type="hidden" readonly name="postId" style="border:1px solid black"  value= <?php  echo (isset($_POST["postId"])? $_POST["postId"]:"" )?> >
    <input type="submit" value="delet" class="border-1 text-red-600 cursor-pointer ">
  </form>
 <?php   require("componante/foot.php") ;