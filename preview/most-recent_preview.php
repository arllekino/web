<?php
$datePost = date("m/d/Y", strtotime($mostRecentContent['publish_date']));
?>
<a href="post?id=<?= $mostRecentContent['post_id'] ?>" class="most-recent__post">
    <img src="<?= $mostRecentContent['img_url'] ?>" alt="<?= $mostRecentContent['title'] ?>"
        class="most-recent-post__picture">
    <div class="most-recent-post__info">
        <h3 class="info__title">
            <?= $mostRecentContent['title'] ?>
        </h3>
        <h4 class="info__line">
            <?= $mostRecentContent['subtitle'] ?>
        </h4>
    </div>
    <div class="most-recent-post__description">
        <div class="most-recent-description__author">
            <img src="<?= $mostRecentContent['img_author_url'] ?>" alt="" class="most-recent-author__photo">
            <span class="most-recent-author__name">
                <?= $mostRecentContent['author'] ?>
            </span>
        </div>
        <span class="most-recent-description__date">
            <?= $datePost ?>
        </span>
    </div>
</a>