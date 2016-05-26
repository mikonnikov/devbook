<div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">
    <dl class="dl-horizontal">

        <?php if(trim($model->title)!=''): ?>
            <dd><span class="text-info">
                <b><?php echo $model->title; ?></b>
            </span></dd>
        <?php endif; ?>

        <?php if(trim($model->descr)!=''): ?>
            <dt><?=Yii::t('app', 'Answer')?></dt>
            <dd><span><?php echo substr($model->descr, 0, 300).' ... '; ?></span></dd>
        <?php endif; ?>

        <?php if(trim($model->ref_url)!=''): ?>
            <dt><?=Yii::t('app', 'Reference URL')?></dt>
            <dd><span><?php echo "<a href='$model->ref_url' target='_blank'>".$model->ref_url."</a>"; ?></span></dd>
        <?php endif; ?>

        <?php if($model->user && trim($model->user->username)!=''): ?>
            <dt><?=Yii::t('app', 'Author')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/users/view', 'id' => $model->user->id]);?>">
                    <?php echo "&nbsp;" . $model->user->username; ?>
                </a>
            </span></dd>
        <?php endif; ?>

    </dl>
</div>