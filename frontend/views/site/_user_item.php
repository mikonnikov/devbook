<div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">
    <dl class="dl-horizontal">

        <?php if(trim($model->username)!=''): ?>
            <dt><?=Yii::t('user', 'Login')?></dt>
            <dd><span class="text-info">
                <a href="<?=Yii::$app->urlManager->createUrl(['/user/view', 'id' => $model->id]);?>">
                    <b><?php echo $model->username; ?></b>
                </a>
            </span></dd>
        <?php endif; ?>

        <dt><?=Yii::t('user', 'Status')?></dt>
        <dd><span><?php echo ($model->status==10 ? Yii::t('user', 'Active') : Yii::t('user', 'Not active')) ?></span></dd>

        <dt><?=Yii::t('user', 'Regisration date')?></dt>
        <dd><span><?php echo date("Y-m-d", $model->created_at); ?></span></dd>

        <dt>&nbsp;</dt>
        <dd>
            <a href="<?=Yii::$app->urlManager->createUrl(['/user/view', 'id' => $model->id]);?>" id="" type="button" class=" btn btn-primary btn-mini pull-right"><?=Yii::t('app', 'Details')?></a>
        </dd>

    </dl>
</div>