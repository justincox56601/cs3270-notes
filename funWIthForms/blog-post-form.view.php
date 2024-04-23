<?php
    $category = $formPost->category ?? '';
?>
<form action="" method="post">
    <div class='form-container'>
        <p class="form-title">Title:</p>
        <div>
            <input class="form-input" type="text" name="blogTitle" id="blog-title" value="<?=$formPost->title ??''?>">
        </div>
        <p class="form-title">Content:</p>
        <div>
            <textarea class="form-input" name="blogContent" id="blog-content" ><?=$formPost->content ??''?></textarea>
        </div>
        <div>
            <p class="form-title">Category</p>
            <div>
                <input type="radio" name="blogCategory" id="blog-category-uncategorized" value="uncategorized" checked='checked'>
                <label for="blog-category-uncategorized">uncategorized</label>
            </div>
            <div>
                <input type="radio" name="blogCategory" id="blog-category-technology" value="technology" <?php if($category == 'technology'):?>checked='checked'<?php endif;?>>
                <label for="blog-category-technology">technology</label>
            </div>
            <div>
                <input type="radio" name="blogCategory" id="blog-category-sports" value="sports" <?php if($category == 'sports'):?>checked='checked'<?php endif;?>>
                <label for="blog-category-sports">sports</label>
            </div>
            <div>
                <input type="radio" name="blogCategory" id="blog-category-travel" value="travel" <?php if($category == 'travel'):?>checked='checked'<?php endif;?>>
                <label for="blog-category-travel">travel</label>
            </div>
        </div>
        <input type="hidden" name="blogId" value="<?= $formPost->id ?? null?>">
        <div>
            <input type="submit" value="<?= isset($formPost->id) ? 'Edit' : 'Post'?>">
        </div>
    </div>
</form>