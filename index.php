<?php

require __DIR__ . '/inc/header.php';

include 'inc/autoload.php';
  
?>

<form id="checkbox-form" method="post" action="delete.php">
  <div class="checkboxes">
    <?php foreach(Products::getAll() as $item): ?>
      <label class="delete-checkbox">
        <input type="checkbox" name="delete_id[]" value="<?= $item->id ?>">
          <p style="text-transform: uppercase"><?= $item->sku ?></p>
          <p><?= $item->name ?></p>
          <p><?= $item->price . " $"?></p>
          <p><?= $item->description ?></p>
      </label>
    <?php endforeach; ?>
  </div>
  
</form>
<br><br>
<?php

require __DIR__ . '/inc/footer.php';

?>
