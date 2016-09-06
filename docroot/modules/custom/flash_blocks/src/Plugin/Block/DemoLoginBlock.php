<?php

namespace Drupal\flash_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a block with demo login information.
 *
 * @Block(
 *   id = "demo_login_block",
 *   admin_label = "Demo Login Information",
 *   category = "Blocks",
 * )
 */
class DemoLoginBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $markup = '<h2>Demo Accounts</h2>';
    $markup .= '<p>You can login with the following accounts with the password "demo":';
    $markup .= '<ul><li>demo-user1</li><li>demo-user2</li><li>demo-admin</li></ul>';
    $markup .= '</p>';

    return array(
      '#markup' => $markup,
    );
  }
}

