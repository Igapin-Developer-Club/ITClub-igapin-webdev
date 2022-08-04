<?php

class Vikinger_Task {
  private $executeArgs;
  private $executeResult;
  private $executeCallback;
  private $rewindCallback;

  public function __construct($executeCallback, $rewindCallback, $executeArgs = []) {
    $this->executeArgs = $executeArgs;
    $this->executeCallback = $executeCallback;
    $this->rewindCallback = $rewindCallback;
  }

  public function getExecuteResult() {
    return $this->executeResult;
  }

  private function setExecuteResult($executeResult) {
    $this->executeResult = $executeResult;
  }

  public function execute($args = []) {
    $executeResult = ($this->executeCallback)($this->executeArgs, $args);

    $this->setExecuteResult($executeResult);

    return $executeResult;
  }

  public function rewind() {
    return ($this->rewindCallback)($this->executeArgs, $this->executeResult);
  }
}

?>