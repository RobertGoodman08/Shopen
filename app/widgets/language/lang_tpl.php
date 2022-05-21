<a><?= \fcs\App::$app->getProperty('language')['code'] ?>
    <i class="fas fa-chevron-down u-s-m-l-9"></i>
</a>
<ul class="g-dropdown" style="width:70px">

    <?php foreach ($this->languages as $k => $v): ?>
        <?php if(\fcs\App::$app->getProperty('language')['code'] == $k) continue; ?>
        <li>
            <a href="/<?= $k ?> " class="u-c-brand" > <?= $v['title'] ?> </a>
        </li>


    <?php endforeach; ?>


</ul>