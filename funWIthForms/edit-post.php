<?php
    require_once './database.service.php';
    $db = new DatabaseService();

    if(isset($_POST['blogTitle'])){
        extract($_POST);
        $data = [
            'id' => $blogId ?? null,
            'title' => $blogTitle ?? null,
            'content' => $blogContent ?? null,
            'category' => $blogCategory ?? null,
            'author' => 'Rick Ashley',
            'date' => $date = date('Y-m-d'),
        ];
    
        if(isset($data['id'])){
            $db->edit_post($data);
        }else{
            $db->submit_post($data);
        }
    }
    
    $tablePosts = $db->get_posts();
    
    if(isset($_GET['blogPostEditId'])){
        $formPost = $db->get_post_by_id($_GET['blogPostEditId']);
    }

    if(isset($_GET['blogPostViewId'])){
        $blogPost = $db->get_post_by_id($_GET['blogPostViewId']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Editing a blog post</h1>
    <p>The next question is how do we edit it?  It seems intuitive that we would use a form, but do we need a new form?  do we use the same form?</p>
    <p>We actually use the same form, but we just need to do a little extra set up on our page to make it work. if you look at the code for the previous page, you will notice tat it wa a basic set up.  The form was blank until we hit the sumbit button, that created some post variables, and then we used those to fill in the data.  Now, we are going to call the database ahead of time to see if we already have a post.</p>

    <?php include_once('./post-table.view.php');?>

    <?php include_once('./blog-post-form.view.php');?>

    <?php 
        if(isset($blogPost)): 
            include_once './blog-post.view.php';
        endif;
    ?>
    
</body>
</html>