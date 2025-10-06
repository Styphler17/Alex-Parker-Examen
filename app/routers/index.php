<?php

use App\controllers\postsController;

require_once '../app/controllers/postsController.php';
require_once '../app/controllers/pagesController.php';

if (isset($_GET['posts'])) {
    require_once '../app/routers/postsRouter.php';
} else {
    \App\Controllers\PagesController\indexAction($conn);
}
