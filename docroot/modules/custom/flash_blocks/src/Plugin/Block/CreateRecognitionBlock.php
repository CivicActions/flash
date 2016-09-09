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
    $markup = '<a href="/node/add/recognition" class="pull-left"><span class="glyphicon glyphicon-thumbs-up" aria-hidden="true" style="font-size:50px"></span>
Recognize a co-worker</a>

<a href="/leaderboard" class="pull-left"><span class="glyphicon glyphicon-list-alt" aria-hidden="true" style="font-size:50px"></span>
View the leaderboard</a>

<div class="clearfix"></div>';

    return array(
      '#markup' => $markup,
    );
  }
}



