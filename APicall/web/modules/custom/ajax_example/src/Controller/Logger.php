<?php

namespace Drupal\ajax_example\Controller;

/**
 *
 */
class Logger {

  /**
   *
   */
  public function simple() {
    $logger = \Drupal::service('logger.factory');
    // dpm($logger);
    // Log a message with dynamic variables.
    $nodeType = 'Article';
    $userName = 'Admin';
    $moduleName = 'ajax_example';
    // dpm($userName);
    $logger->get($moduleName)->notice('A new "@nodeType" created by %userName.', [
      '@nodeType' => $nodeType,
      '%userName' => $userName,

    ]);
    dpm($logger);
    return [
     // $simpleform,
     // [
     // '#type' => 'table',
     // '#header' => $header,
     // '#rows' => $rows,]
      "#markup" => "hello",

    ];

  }

}
