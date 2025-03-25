<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AutomationModel;

class DashboardController extends Controller
{
    public function index()
    {
        $model = new AutomationModel();
        $data['automations'] = $model->findAll();

        return view('dashboard', $data);
    }
}
