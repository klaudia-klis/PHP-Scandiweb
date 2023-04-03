<?php
//  Let PHP to automatically load (autoload) the class files.
spl_autoload_register(function($className) {
  // __DIR__ confirms that the path starts from the folder where autoload.php is in.
  $file = dirname(__DIR__) . '\\src\\' . $className . '.php';
  // Replace \ to DIRECTORY_SEPARATOR.
  $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
  if (file_exists($file)) {
    include $file;
  }
});

?>