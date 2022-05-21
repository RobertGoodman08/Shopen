<?php
$parent_id = \fcs\App::$app->getProperty('parent_id');
$get_id = get('id');
?>

<option value="<?= $id ?>" <?php if ($id == $parent_id) echo ' selected'; ?> <?php if ($get_id == $id) echo ' disabled'; ?>>
    <?= $tab . $category['title'] ?>
</option>
<?php if(isset($category['children'])): ?>
    <?= $this->getMenuHtml($category['children'], '&nbsp;' . $tab. '-') ?>
<?php endif; ?>
