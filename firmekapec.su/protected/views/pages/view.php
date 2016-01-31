<?php
/*
 * @var PagesController $this
 * @var Page $model
 */

$this->pageTitle = $model->title;
CHtml::metaTag($model->keywords, 'keywords');
?>
<div id="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?php echo $model->title;?></h1>
                <?php echo $model->content;?>
            </div>
        </div>
    </div>
</div>