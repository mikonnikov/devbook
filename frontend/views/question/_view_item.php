<div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">
    <dl class="dl-horizontal">

        <?php if(trim($model->title)!=''): ?>
            <!--dt><?=Yii::t('app', 'Title')?></dt-->
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/questions/view', 'id' => $model->id]);?>" style="font-size:12pt;">
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
                </a>
            </span></dd>
        <?php endif; ?>

        <?php if(isset($model->category) && trim($model->category->name)!=''): ?>
            <dt><?=Yii::t('app', 'Category')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/questions', 'QuestionSearch[category_id]' => $model->category->id]);?>">
                    <?php echo "&nbsp;" . $model->category->name; ?>
                </a>
            </span></dd>
        <?php endif; ?>

        <?php if(isset($model->language) && trim($model->language->name)!=''): ?>
            <dt><?=Yii::t('app', 'Language')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/questions', 'QuestionSearch[language_id]' => $model->language->id]);?>">
                    <?php echo "&nbsp;" . $model->language->name; ?>
                </a>
            </span></dd>
        <?php endif; ?>

        <dt><?=Yii::t('app', 'Problem solved?')?></dt>
        <dd><span><?php echo ($model->solved ? Yii::t('app', 'YES') : Yii::t('app', 'NO')); ?></span></dd>

        <dt><?=Yii::t('app', 'Private question?')?></dt>
        <dd><span><?php echo ($model->private ? Yii::t('app', 'YES') : Yii::t('app', 'NO')); ?></span></dd>

        <dt>&nbsp;</dt>
        <dd>
            <a href="<?=Yii::$app->urlManager->createUrl(['/questions/view', 'id' => $model->id]);?>" id="" type="button" class=" btn btn-primary btn-mini pull-right"><?=Yii::t('app', 'watch / answer')?></a>
        </dd>

    </dl>
</div>