<table>
    <tr>
        <th></th>
        <th></th>
        <th>Title</th>
        <th>Excerpt</th>
        <th>category</th>
    </tr>
    <?php foreach($tablePosts as $post):?>
        <tr>
            <td><a href="<?=$_SERVER['PHP_SELF']?>?blogPostViewId=<?=$post->id?>">view</a></td>
            <td><a href="<?=$_SERVER['PHP_SELF']?>?blogPostEditId=<?=$post->id?>">edit</a></td>
            <td><?=$post->title?></td>
            <td><?= substr($post->content, 0, 100)?></td>
            <td><?=$post->category?></td>
        </tr>
    <?php endforeach;?>
</table>
