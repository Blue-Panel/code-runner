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
            'description' => $this->request->getPost('description'),
            'script_name' => $this->request->getPost('script_name'),
            'schedule_time' => $this->request->getPost('schedule_time'),
            'schedule_date' => $this->request->getPost('schedule_date'),
            'status' => $this->request->getPost('status') ?? 'disabled'
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
