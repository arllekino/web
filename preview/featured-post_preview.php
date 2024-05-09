<?php
$datePost = date("F j, Y", strtotime($featuredPostContent['publish_date']))
    ?>
<a href="post?id=<?= $featuredPostContent['post_id'] ?>" class="featured-post"
    style="background-image: url('<?= $featuredPostContent['img_url'] ?>')">
    <?php if ($featuredPostContent['modifier']): ?>
        <span class="featured-post__status">
            <?= mb_strtoupper($featuredPostContent['modifier']) ?>
        </span>
    <?php endif; ?>
    <h3 class="featured-post__title">
        <?= $featuredPostContent['title'] ?>
    </h3>
    <h4 class="featured-post__line">
        <?= $featuredPostContent['subtitle'] ?>
    </h4>
    <div class="featured-post__description">
        <div class="featured-posts-description__author">
            <img src="<?= $featuredPostContent['img_author_url'] ?>" alt="" class="featured-posts-author__photo">
            <span class="featured-posts-author__name">
                <?= $featuredPostContent['author'] ?>
            </span>
        </div>
        <span class="featured-posts-description__date">
            <?= $datePost ?>
        </span>
    </div>
</a>