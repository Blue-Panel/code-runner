<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\AutomationModel;

class AutomationController extends Controller
{

    public function createView()
    {
        return view('automations/create');
    }

    public function create()
    {
        $model = new AutomationModel();
        $data = [
            'name' => $this->request->getPost('name'),
            'script_path' => $this->request->getPost('script_path'),
            'schedule_time' => $this->request->getPost('schedule_time'),
            'cron_expression' => $this->request->getPost('cron_expression'),
            'status' => 'disabled'
        ];
        $model->insert($data);

        return redirect()->to('/');
    }

    public function enable($id)
    {
        $model = new AutomationModel();
        $model->update($id, ['status' => 'enabled']);

        return redirect()->to('/');
    }

    public function disable($id)
    {
        $model = new AutomationModel();
        $model->update($id, ['status' => 'disabled']);

        return redirect()->to('/');
    }
}
