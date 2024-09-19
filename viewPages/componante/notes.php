
<div >
    <ul>
        <?php 
          foreach($posts as $post){
            echo '<li> <a href=/mywork/index.php/note?postId='. $post["postId"] .'>'.$post["text"].'</a></li>' ;
          }
        ?>
    </ul>
</div>

<!-- ../pages/notes/note.php?id -->