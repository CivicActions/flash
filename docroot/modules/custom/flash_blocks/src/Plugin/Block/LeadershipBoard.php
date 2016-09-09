<?php

namespace Drupal\flash_blocks\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Leadership board.
 *
 * @Block(
 *   id = "leadership_board",
 *   admin_label = "Leadership Board",
 *   category = "Blocks",
 * )
 */
class LeadershipBoard extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $markup = '<table width="100%"><tr><th>Employee Name</th><th>Teamwork</th><th>Improvement</th><th>Delivery</th><th>Experiment</th><th>Total Points</th></tr>';
    $user = \Drupal::entityTypeManager()->getStorage('user');
    $users = [];
    $recognitions = \Drupal::entityTypeManager()->getStorage('node')->loadByProperties(['type'=>'recognition']);

    foreach($recognitions as $recognition) {
      $user_ids = $recognition->field_nominee->value;
      $category = $recognition->field_recognition_type->value;
      foreach ($recognition->field_nominee->list as $user_id) {
        dpm($user_id);
        $user_id = $user_id->target_id;
        $users[$user_id]['total']++;
        $users[$user_id][$category]++;
      }
    }


    foreach ($users as $user_id) {
      $user_info = $user->load($user_id);
      $markup .= '<tr><td>' . $user_info->field_first_name->value;
      $markup .= ' ' . $user_info->field_last_name->value . '</td>';
      $markup .= '<td>' . $users[$user_id]['teamwork'] . '</td>';
      $markup .= '<td>' . $users[$user_id]['improvement'] . '</td>';
      $markup .= '<td>' . $users[$user_id]['delivery'] . '</td>';
      $markup .= '<td>' . $users[$user_id]['experiment'] . '</td>';
      $markup .= '<td>' . $users[$user_id]['total'] . '</td>';
      $markup .= '</tr>';
    }

    $markup .= '</table>';

    return array(
      '#markup' => $markup,
    );
  }
}



