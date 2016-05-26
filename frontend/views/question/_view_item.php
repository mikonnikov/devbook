<div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">
    <dl class="dl-horizontal">

        <dt><?=Yii::t('app', 'Problem solved?')?></dt>
        <dd><span><?php echo ($model->solved ? Yii::t('app', 'YES') : Yii::t('app', 'NO')); ?></span></dd>

        <?php if(trim($model->title)!=''): ?>
            <dt><?=Yii::t('app', 'Title')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/questions/view', 'id' => $model->id]);?>">
                    <b><?php echo $model->title; ?></b>
                </a>
            </span></dd>
        <?php endif; ?>

        <?php if(trim($model->error)!=''): ?>
            <dt><?=Yii::t('app', 'Error text')?></dt>
            <dd><span><?php echo substr($model->error, 0, 300).' ... '; ?></span></dd>
        <?php endif; ?>

        <?php if(trim($model->descr)!=''): ?>
            <dt><?=Yii::t('app', 'Description')?></dt>
            <dd><span><?php echo substr($model->descr, 0, 300).' ... '; ?></span></dd>
        <?php endif; ?>

        <?php if($model->user && trim($model->user->username)!=''): ?>
            <dt><?=Yii::t('app', 'Author')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/users/view', 'id' => $model->user->id]);?>">
                <?php echo "&nbsp;" . $model->user->username; ?>
            </span></dd>
        <?php endif; ?>

        <dt>&nbsp;</dt>
        <dd>
            <a href="<?=Yii::$app->urlManager->createUrl(['/questions/view', 'id' => $model->id]);?>" id="" type="button" class=" btn btn-primary btn-mini pull-right"><?=Yii::t('app', 'watch / answer')?></a>
        </dd>

    </dl>
</div>