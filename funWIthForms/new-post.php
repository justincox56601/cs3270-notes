<?php
require_once './blog-post.model.php';

if(isset($_POST['blogTitle'])){
    extract($_POST);
    $data = [
        'title' => $blogTitle ?? null,
        'content' => $blogContent ?? null,
        'category' => $blogCategory ?? null,
        'author' => 'Rick Ashley',
        'date' => $date = date('Y-m-d'),
    ];

    $blogPost = new BlogPostModel($data);
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
    <h1>Create A New Blog Post</h1>
    <p>First lets start off basic.  This page is a simple blog post form.  Create a post by filling out the fields then hit post.</p>
    <p>Once you create a blog post, it will show up under neath this form for you to see.  You will notice that the Author and Date fields are present even though you didn't have to fill them out.  This is becuase, the site in the background already has a logged in user and the date was just grabbed at the time of the submission.</p>

    <?php include_once './blog-post-form.view.php';?>

    <?php 
        if(isset($blogPost)): 
            include_once './blog-post.view.php';
        endif;
    ?>
</body>
</html>