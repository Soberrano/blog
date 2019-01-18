<?php

use yii\helpers\Url;

?>
<div class="technology">
    <div class="container">
        <div class="col-md-9 technology-left">
            <div class="tech-no">
                <!-- technology-top -->
                <?php
                if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>
                        <div class="tc-ch wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                            <h6>Пользователь: <?= $blog->userName . ' (' . $blog->email . ')' ?>
                                <?php if (!empty($blog->homePage)): ?>
                                    <a href="<?= $blog->homePage ?>">Мой VK</a>
                                <?php endif; ?>
                            </h6>
                            <p><?= $blog->created_at ?></p>
                            <h3><a href="#"><?= $blog->blogTitle ?></a></h3>
                            <?php
                            $tags = explode(" ", $blog->blogTags);
                            ?>
                            <h6>Tags:
                                <?php if (!empty($tags)): ?>
                                    <?php foreach ($tags as $tag): ?>
                                        <a href="<?= Url::to(['blog/search']) ?>?q=<?= $tag ?>"><?= $tag ?></a>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </h6>
                            <p><?= $blog->blogContent ?></p>
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
                    <?php endforeach; ?>
                <?php endif; ?>
                <!-- technology-top -->
            </div>
        </div>
        <!-- technology-right -->
        <div class="col-md-3 technology-right">
            <div class="blo-top1">
                <div class="tech-btm">
                    <div class="search-1 wow fadeInDown" data-wow-duration=".8s" data-wow-delay=".2s">
                        <form action="<?= Url::to(['blog/search']) ?>" method="get">
                            <input type="text" name="q" placeholder="Поиск...">
                            <input type="submit" value=" ">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- technology-right -->

        <!--        Если нужна пагинация, просто раскомментируй меня-->
        <!--        --><?php //echo \yii\widgets\LinkPager::widget([
        //            'pagination' => $pages,
        //            'disabledPageCssClass' => 'disabled'
        //        ]); ?>

    </div>
</div>