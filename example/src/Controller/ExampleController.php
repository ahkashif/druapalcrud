<?php
namespace Drupal\example\Controller;
use Drupal\Core\Controller\ControllerBase;
/**
 * Class exampleController.
 *
 * @package Drupal\example\Controller
 */
class exampleController extends ControllerBase {
  /**
   * Display.
   *
   * @return string
   *   Return Hello string.
   */
  public function display() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('This page contain all inforamtion about my data ')
    ];
  }
}