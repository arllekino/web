<?php
$DatePost = date("m/d/Y", $MostRecentContent['date']);
?>
<a href="" class="most-recent__post">
    <img src="<?= $MostRecentContent['img'] ?>" alt="<?= $MostRecentContent['title'] ?>"
        class="most-recent-post__picture">
    <div class="most-recent-post__info">
        <h3 class="info__title">
            <?= $MostRecentContent['title'] ?>
        </h3>
        <h4 class="info__line">
            <?= $MostRecentContent['subtitle'] ?>
        </h4>
    </div>
    <div class="most-recent-post__description">
        <div class="most-recent-description__author">
            <img src="<?= $MostRecentContent['img_author'] ?>" alt="" class="most-recent-author__photo">
            <span class="most-recent-author__name">
                <?= $MostRecentContent['author'] ?>
            </span>
        </div>
        <span class="most-recent-description__date">
            <?= $DatePost ?>
        </span>
    </div>
</a>