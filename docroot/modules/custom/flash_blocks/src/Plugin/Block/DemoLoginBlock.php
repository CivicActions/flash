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
    $markup .= '<p>You can login with the following accounts with a password that matches the username (ex: employee1:employee1):';
    $markup .= '<ul><li>employee1 (through employee9)</li><li>admin1 (through admin3)</li></ul>';
    $markup .= '</p>';

    return array(
      '#markup' => $markup,
    );
  }
}

