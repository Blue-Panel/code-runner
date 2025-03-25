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

        $scriptName = $this->request->getPost('script_name');
        $this->createScriptFile($scriptName);

        return redirect()->to('/');
    }

    private function createScriptFile($fileName)
    {
        if (!$fileName) {
            $this->response->setStatusCode(404);
            return;
        }


        $directory = APPPATH . 'Automations/';
        $filePath = $directory . $fileName . '_Automation.php';

        if (!file_exists($filePath)) {
            if (!is_dir($directory)) {
                mkdir($directory, 0777, true);
            }

            $fileContent = "<?php\n\n// Automation Script: {$fileName}\n\n// Add your automation logic here\n";

            file_put_contents($filePath, $fileContent);

            echo "Script file {$filePath} created successfully!";
        } else {
            echo "File already exists!";
        }
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
