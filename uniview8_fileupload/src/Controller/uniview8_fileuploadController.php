<?php
/**
 * @file
 * Contains \Drupal\uniview8_fileupload\Controller\uniview8_fileuploadController.
 */

namespace Drupal\uniview8_fileupload\Controller;

use Drupal\Core\Controller\ControllerBase;

class uniview8_fileuploadController extends ControllerBase {
  public function content() {
    return array(
        '#type' => 'markup',
        '#markup' => $this->t('Hello, World!'),
    );
  }
}
