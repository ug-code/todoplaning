<?php

namespace App\Services;

use App\Repositories\DeveloperRepository;
use App\Repositories\TodoRepository;
use Illuminate\Support\Collection;

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


    protected Collection $developers;

    public function __construct(TodoRepository $todoRepository, DeveloperRepository $developerRepository)
    {
        $this->todoRepository      = $todoRepository;
        $this->developerRepository = $developerRepository;

        $this->developers = $this->developerRepository->getAllDevelopers();

    }


    public function taskList($prodiverId): array
    {
        $tasks                  = $this->todoRepository->getTasksForProvider($prodiverId, self::PERMITTED_LEVELS);
        $developers             = $this->developerRepository->getAllDevelopers();
        $totalEstimatedDuration = $tasks->sum('estimated_duration');


        $week     = 1;
        $schedule = [];

        while ($tasks->isNotEmpty()) {
            $developerTasks = [];

            foreach ($developers as $developer) {
                $developerTasks = array_merge(
                    $developerTasks,
                    $this->assignTasks($tasks, $developer)
                );
            }

            $schedule[] = [
                'period'     => "{$week} week",
                'developers' => $developerTasks,
            ];

            $week++;
        }

        return [
            'totalEstimatedDuration' => $totalEstimatedDuration,
            'schedule'               => $schedule,
        ];


    }

    public function assignTasks(&$tasks, $developer): array
    {
        $assignedTasks  = [];
        $weeklyDuration = 0;
        $developerTasks = [
            'info'     => ['totalTask' => 0,
                           'totalHour' => 0],
            'planning' => [],
        ];

        $level         = $developer->level;
        $developerName = $developer->name;


        foreach ($tasks->where('level', '<=', $level)->toArray() as $key => $task) {
            if ($weeklyDuration + $task['estimated_duration'] <= self::MAX_WEEKLY_HOURS) {
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


        }

        $assignedTasks[$developerName] = $developerTasks;
        return $assignedTasks;
    }


    public function assignTasksEqual(&$tasks, $currentDev, &$developerPlan, $week): void
    {


        foreach ($tasks->where('level', '<=', $currentDev->level)->toArray() as $key => $task) {


            $taskLevel = $task['level'] ?? null;
            if ($taskLevel && $taskLevel <= $currentDev->level) {
                $developerName = $currentDev->name;
                $devTotalHour  = $developerPlan[$week][$developerName]['info']['totalHour'] ?? 0;
                $devTotalTask  = $developerPlan[$week][$developerName]['info']['totalTask'] ?? 0;

                $checkMaxWeeklyHour = $devTotalHour + $task['estimated_duration'];
                if ($checkMaxWeeklyHour <= self::MAX_WEEKLY_HOURS) {
                    $devTotalTask++;
                    $developerPlan[$week][$developerName]['info'] = [
                        'totalTask' => $devTotalTask,
                        'totalHour' => $checkMaxWeeklyHour
                    ];


                    $developerPlan[$week][$developerName]['planning'][] = [
                        'id'                 => $task['id'],
                        'level'              => $task['level'],
                        'estimated_duration' => $task['estimated_duration'],
                        'name'               => "Job Id " . $task['name'],
                    ];

                    $tasks->forget($key);
                    break;

                }


            }
        }

    }

    public function taskListEqual($prodiverId): array
    {
        $tasks                  = $this->todoRepository->getTasksForProvider($prodiverId, self::PERMITTED_LEVELS);
        $totalEstimatedDuration = $tasks->sum('estimated_duration');

        $week     = 1;
        $schedule = [];

        $developerPlan = [];

        foreach ($this->developers as $developer) {
            $developerPlan[$week][$developer->name] = [
                'done'     => false,
                'info'     => ['totalTask' => 0,
                               'totalHour' => 0],
                'planning' => [],
            ];

        }

        while ($tasks->isNotEmpty()) {

            foreach ($this->developers as $developer) {


                $this->assignTasksEqual($tasks, $developer, $developerPlan, $week);
            }


            $schedule[$week]    = [
                'periodName' => "{$week} week",
                'period'     => $week,
                'developers' => $developerPlan,
            ];
            $checkDeveloperDone = collect($developerPlan)->where("done", false)->first();

            if (!$checkDeveloperDone) {
                $week++;
            }


        }

        return [
            'totalEstimatedDuration' => $totalEstimatedDuration,
            'schedule'               => $schedule,
        ];
    }


}
