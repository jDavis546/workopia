<?php 

/**
 * Get the base path
 * 
 * @param string $path
 * @return string
 */
function basePath($path = '')
{
  return __DIR__ . '/' . $path;
}


/**
 * Load a view
 * 
 * @param string $name
 * @return void
 */
function loadView($name)
{
  
  $viewPath = basePath("views/{$name}.view.php");
  if(file_exists($viewPath)){
    require $viewPath
  }else {
    echo "View  {$name} not found!"
  }
}

/**
 * Load a partial
 * 
 * @param string $name
 * @return void
 */
function loadPartial($name)
{
  $PartialPath = basePath("views/{$name}.view.php");
  if(file_exists($PartialPath)){
    require $PartialPath
  }else {
    echo "View  {$name} not found!"
  }
}
}

?>