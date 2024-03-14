<?php
    $DatePost = date("F j, Y", $featured_post['date'])
?>
<a href="<?= $featured_post['url'] ?>" class="featured-post" style="background-image: url('<?= $featured_post['img_modifier'] ?>')">
    <h3 class="featured-post__title">
        <?= $featured_post['title'] ?>
    </h3>
    <h4 class="featured-post__line">
        <?= $featured_post['subtitle'] ?>
    </h4>
    <div class="featured-post__description">
        <div class="featured-posts-description__author">
            <img src="<?= $featured_post['img_author'] ?>" alt="" class="featured-posts-author__photo">
            <h5 class="featured-posts-author__name">
                <?= $featured_post['author'] ?>
            </h5>
        </div>
        <h5 class="featured-posts-description__date">
            <?= $DatePost ?>
        </h5>
    </div>
</a>