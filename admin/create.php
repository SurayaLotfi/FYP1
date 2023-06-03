<?php
 include_once 'submit.php';
?>
<!DOCTYPE html>
<html>
    <body>
        <head>        
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
            rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
            <title>Create content</title>
            <script src="../ckeditor_4.21.0_full/ckeditor/ckeditor.js"></script>
        </head>
        <br>
        <div class="container">

        <?php if(!empty($statusMsg)){?>
        <p><?php echo $statusMsg; ?></p>
        <?php } ?>

        <form method="post" action="">
            <textarea name="editor" id="editor" rows="10" cols="80">
             This is my textarea to be replaced with HTML editor.
            </textarea>
            <input type="submit" name="submit" value="SUBMIT">
        </form>

        
    <?php if(!empty($statusMsg)){ ?>
        
        <h4>Inserted Content</h4>
        <?php echo $editorContent?>
        
    <?php } ?>
    </div>

    

        <script>
            CKEDITOR.replace('editor');
        </script>

    </body>
</html>