<?php
use NoahBuscher\Macaw\Macaw;
// Autoload 自动载入
require '../vendor/autoload.php';

Macaw::get('fuck', function() {
  echo "成功！";
});

Macaw::get('(:all)', function($fu) {
  echo '未匹配到路由<br>'.$fu;
});

Macaw::dispatch();
