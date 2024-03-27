<?php
$DatePost = date("F j, Y", $FeaturedPostContent['date'])
    ?>
<a href="post?id=<?= $FeaturedPostContent['id'] ?>" class="featured-post"
    style="background-image: url('<?= $FeaturedPostContent['img'] ?>')">
    <?php if ($FeaturedPostContent['modifier'] == 'adventure'): ?>
        <span class="featured-post__status">ADVENTURE</span>
    <?php endif; ?>
    <h3 class="featured-post__title">
        <?= $FeaturedPostContent['title'] ?>
    </h3>
    <h4 class="featured-post__line">
        <?= $FeaturedPostContent['subtitle'] ?>
    </h4>
    <div class="featured-post__description">
        <div class="featured-posts-description__author">
            <img src="<?= $FeaturedPostContent['img_author'] ?>" alt="" class="featured-posts-author__photo">
            <span class="featured-posts-author__name">
                <?= $FeaturedPostContent['author'] ?>
            </span>
        </div>
        <span class="featured-posts-description__date">
            <?= $DatePost ?>
        </span>
    </div>
</a>