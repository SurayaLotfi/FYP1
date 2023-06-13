<?php
$post_id = 1;


?>

<form action="" method="post">
    <input type="hidden" name="post_id" value="<php echo $post_id; ?>" required>
      
    <p>
        <label>Your name</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label>Your email address</label>
        <input type="text" name="name" required>
    </p>

    <p>
        <label>Comment</label>
        <textarea name="comment" required></textarea>
    </p>

    <p>
        <input type="submit" value="Add Comment" name="post_comment">
    </p>

</form>

<?php
    $conn = mysqli_connect("localhost", "root", "", "osp");

    if(isset($_POST['post_comment']))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $comment = $_POST['comment'];
        $reply_of = 0;

        $query = "INSERT INTO comments (name, email, comment, post_id, reply_of) VALUES
        ('$name','$email','$comment', '$post_id', '$reply_of')";
        $result = mysqli_query($conn, $query);
    }
?>