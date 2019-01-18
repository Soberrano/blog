<div class="tc-ch wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
    <h6>Пользователь: <?= $model->userName . ' (' . $model->email . ')' ?>
        <?php if (!empty($model->homePage)): ?>
            <a href="<?= $model->homePage ?>">Мой VK</a>
        <?php endif; ?>
    </h6>
    <p><?= date("Y-m-d H:i:s"); ?></p>
    <h3><a href="#"><?= $model->blogTitle ?></a></h3>
    <h6>Tags:
        <?php
        $tags = explode(" ", $model->blogTags);
        ?>
        <?php if (!empty($tags)): ?>
            <?php foreach ($tags as $tag): ?>
                <a href="<?= \yii\helpers\Url::to(['blog/search']) ?>?q=<?= $tag ?>"><?= $tag ?></a>
            <?php endforeach; ?>
        <?php endif; ?>
    </h6>
    <p><?= $model->blogContent ?></p>
    <div class="soci">
        <ul>
            <li class="hvr-rectangle-out"><a class="fb" href="#"></a></li>
            <li class="hvr-rectangle-out"><a class="twit" href="#"></a></li>
            <li class="hvr-rectangle-out"><a class="goog" href="#"></a></li>
            <li class="hvr-rectangle-out"><a class="pin" href="#"></a></li>
            <li class="hvr-rectangle-out"><a class="drib" href="#"></a></li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>
<div class="clearfix"></div>