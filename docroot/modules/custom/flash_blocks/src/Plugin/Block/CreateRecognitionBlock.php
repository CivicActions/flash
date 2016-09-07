<?php

namespace Drupal\flash_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with the Recognize Coworker button.
 *
 * @Block(
 *   id = "create_recognition_block",
 *   admin_label = "Recognize Button",
 *   category = "Blocks",
 * )
 */
class CreateRecognitionBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $markup = '<a class="btn-default btn-lg btn" href="/node/add/recognition">Recognize a coworker</a>';

    return array(
      '#markup' => $markup,
    );
  }
}



