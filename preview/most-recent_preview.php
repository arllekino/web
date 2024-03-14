<?php
    $DatePost = date("m/d/Y", $most_recent['date']);
?>
<a href="" class="most-recent__post">
    <img src="<?= $most_recent['img_modifier'] ?>" alt="<?= $most_recent['title'] ?>" class="most-recent-post__picture">
    <div class="most-recent-post__info">
        <h3 class="info__title">
            <?= $most_recent['title'] ?>
        </h3>
        <h4 class="info__line">
            <?= $most_recent['subtitle'] ?>
        </h4>
    </div>
    <div class="most-recent-post__description">
        <div class="most-recent-description__author">
            <img src="<?= $most_recent['img_author'] ?>" alt="" class="most-recent-author__photo">
            <h5 class="most-recent-author__name">
                <?= $most_recent['author'] ?>
            </h5>
        </div>
        <h5 class="most-recent-description__date">
            <?= $DatePost ?>
        </h5>
    </div>
</a>