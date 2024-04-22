<?php

namespace App\Controllers;

use App\Controllers\AdminPageController;
use App\Models\MigrationModel;
use Core\ResponseHandler;

class MigrationController extends AdminPageController
{
    public function migrate()
    {
        $this->requireAuth();
        $files = glob('migrations/*.sql');
        if (!empty($files)) {
            $model = new MigrationModel();
            $migrations = $model->checkMigrations($files);
            if (!empty($migrations)) {
                $model->runMigrations($migrations);
                echo '<br>Finished migrations';
            }else{
                echo 'All right!';
            }
        } else {
            ResponseHandler::sendError('migrations is empty', 500);
        }
    }
}