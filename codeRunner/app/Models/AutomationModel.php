<?php

namespace App\Models;

use CodeIgniter\Model;

class AutomationModel extends Model
{
    protected $table = 'automations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'script_path', 'schedule_time', 'cron_expression', 'status'];
}
