<?php

class Vikinger_Scheduler {
  private $tasks;
  private $completed_tasks;

  public function __construct() {
    $this->tasks = [];
    $this->completed_tasks = [];
  }

  public function addTask($task) {
    $this->tasks[] = $task;
  }

  public function run() {
    for ($i = 0; $i < count($this->tasks); $i++) {
      $task = $this->tasks[$i];

      // if task is not the first,
      // pass the previous completed task result as parameter for the task
      if ($i > 0) {
        $result = $task->execute(($this->completed_tasks[$i - 1])->getExecuteResult());
      } else {
        $result = $task->execute();
      }

      // if task executed correctly
      if ($result) {
        // send to completed tasks
        $this->completed_tasks[] = $task;
      } else {
      // if task failed
        // rewind completed tasks
        foreach ($this->completed_tasks as $completed_task) {
          $completed_task->rewind();
        }

        return false;
      }
    }

    return true;
  }
}

?>