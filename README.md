# xyLog

> 记录日志

```
<?php

require_once('../vendor/autoload.php');

use Rdisme\Xylog\Log;


$config = array(
    'api_url' => 'localhost/',
    'app_id' => '223fesdf'
);

$log = new Log($config);
$log->set_uid('222')->set_uid_t(2)->set_lid(333)->log();
```