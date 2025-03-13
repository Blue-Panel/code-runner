<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Tasks.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Tasks\Config\Tasks as BaseTasks;
use CodeIgniter\Tasks\Scheduler;
use App\Models\AutomationModel;

class Tasks extends BaseTasks
{
    /**
     * --------------------------------------------------------------------------
     * Should performance metrics be logged
     * --------------------------------------------------------------------------
     *
     * If true, will log the time it takes for each task to run.
     * Requires the settings table to have been created previously.
     */
    public bool $logPerformance = true;

    /**
     * --------------------------------------------------------------------------
     * Maximum performance logs
     * --------------------------------------------------------------------------
     *
     * The maximum number of logs that should be saved per Task.
     * Lower numbers reduced the amount of database required to
     * store the logs.
     */
    public int $maxLogsPerTask = 10;

    /**
     * Register any tasks within this method for the application.
     * Called by the TaskRunner.
     */
    public function init(Scheduler $schedule)
    {
        $model = new AutomationModel();
        $automations = $model->where('status', 'enabled')->findAll();

        foreach ($automations as $automation) {
            $schedule = $automation['schedule_time'];
            $scriptPath = 'automations/' . $automation['script_path'];

            // Dynamically schedule based on user selection
            $task = Tasks::add($automation['name'], $scriptPath);

            switch ($schedule) {
                case 'hourly':
                    $task->hourly();
                    break;
                case 'daily':
                    $task->daily();
                    break;
                case 'weekly':
                    $task->weekly();
                    break;
                case 'custom':
                    $task->cron($automation['cron_expression']); // Use custom cron syntax
                    break;
            }
        }
    }
}
