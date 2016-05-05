<div class="" style="border: solid #CCC 1px; margin: 10px; padding: 10px;">


    <dl class="dl-horizontal">
        <dt><?=Yii::t('app', 'Title')?></dt>
        <dd><span class="text-info"><?php echo $model->title; ?></span></dd>

        <dt><?=Yii::t('app', 'Error text')?></dt>
        <dd><span class="muted"><?php echo $model->error; ?></span></dd>

        <dt><?=Yii::t('app', 'Description')?></dt>
        <dd><span class="label label-important"><?php echo $model->descr; ?></span></dd>

        <dt><?=Yii::t('app', 'Author')?></dt>
        <dd><span class="text-info"><?php echo "&nbsp;" . $model->user->username; ?></span></dd>

        <dt>&nbsp;</dt>
        <dd>
            <a href="/questions/<?php echo $model->id; ?>" id="" type="button" class=" btn btn-primary  btn-mini pull-right"><?=Yii::t('app', 'watch/answer')?></a>
        </dd>
    </dl>

</div>