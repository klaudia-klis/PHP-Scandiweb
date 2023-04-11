<?php

require __DIR__ . '/inc/header.php';

// Using Autoloading to automatically include the class files from the src/ folder.
include 'inc/autoload.php';
  
?>

<form id="checkbox-form" method="post" action="delete.php">
  <div class="checkboxes">
    <?php foreach(Products::getAll() as $item): ?>
      <label class="delete-checkbox">
        <input class="delete-checkbox" type="checkbox" name="delete_id[]" value="<?= $item->sku ?>">
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
