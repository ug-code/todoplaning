<?php

namespace App\Services;

use App\Repositories\DeveloperRepository;
use App\Repositories\TodoRepository;

class TodoService
{
    protected const  MAX_WEEKLY_HOURS = 45;
    protected TodoRepository      $todoRepository;
    protected DeveloperRepository $developerRepository;

    protected const  PERMITTED_LEVELS
        = [1,
           2,
           3,
           4,
           5];


    public function __construct(TodoRepository $todoRepository, DeveloperRepository $developerRepository)
    {
        $this->todoRepository      = $todoRepository;
        $this->developerRepository = $developerRepository;
    }


    public function taskList($prodiverId): array
    {
        $tasks                  = $this->todoRepository->getTasksForProvider($prodiverId, self::PERMITTED_LEVELS);
        $developers             = $this->developerRepository->getAllDevelopers();
        $totalEstimatedduration = $tasks->sum('estimated_duration');


        $week     = 1;
        $schedule = [];

        while ($tasks->isNotEmpty()) {
            $developerTasks = [];

            foreach ($developers as $developer) {
                $developerTasks = array_merge(
                    $developerTasks,
                    $this->assignTasks($tasks, $developer->level, $developer->name)
                );
            }

            $schedule[] = [
                'period'     => "{$week} week",
                'developers' => $developerTasks,
            ];

            $week++;
        }

        return [
            'totalEstimatedduration' => $totalEstimatedduration,
            'schedule'               => $schedule,
        ];


    }

    public function assignTasks(&$tasks, int $level, string $developerName): array
    {
        $assignedTasks  = [];
        $weeklyDuration = 0;
        $developerTasks = [
            'info'     => ['totalTask' => 0,
                           'totalHour' => 0],
            'planning' => [],
        ];

        foreach ($tasks->where('level', '<=', $level)->toArray() as $key => $task) {
            if ($weeklyDuration + $task['estimated_duration'] > self::MAX_WEEKLY_HOURS) {
                // unset($tasks[$key]);
                continue;
            }

            $developerTasks['info']['totalTask']++;
            $weeklyDuration                      += $task['estimated_duration'];
            $developerTasks['info']['totalHour'] = $weeklyDuration;

            $developerTasks['planning'][] = [
                'id'                 => $task['id'],
                'level'              => $task['level'],
                'estimated_duration' => $task['estimated_duration'],
                'name'               => "Job Id " . $task['name'],
            ];

            unset($tasks[$key]);
        }

        $assignedTasks[$developerName] = $developerTasks;
        return $assignedTasks;
    }
}
