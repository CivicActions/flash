<?php

/**
 * @file
 * Contains \Drupal\govreday\Controller\GovReadyController.
 */

namespace Drupal\ajax_leaderboard\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Provides route responses for the Example module.
 */
class ajaxLeaderboardPage extends ControllerBase {

  public function leaderboard_page() {

    // Save some JS variables (available at govready.siteId, etc)
    global $base_url;
    $path = $base_url .'/'. drupal_get_path('module', 'govready') .'/includes/js/client/dist/';
    $js_settings = array(
      'base' => $path,
      'base_url' => $base_url .'/',
      'api_leaderboard' => $base_url . '/api/leaderboard', // @todo: Drupal::url('/api/leaderboard'),
      'api_user' => $base_url . '/user/', // @todo: Drupal::url('/api/leaderboard'),
      'api_node' => $base_url . '/node/', // @todo: Drupal::url('/api/leaderboard'),
    ); 

    // Assemble the markup.
    $build = array();
    $build['#theme'] = 'angular_leaderboard';
    $build['#js_settings'] = $js_settings;
    $build['#base'] = $path;  
    $build['#attached']['library'][] = 'ajax_leaderboard/angular-leaderboard';

    $path = drupal_get_path('module', 'govready');

    /*$build['#attached']['html_head'][] = array(
      '#type' => 'html_tag',
      '#tag' => 'base',
      '#attributes' => array(
        'href' => $path .'/includes/js/client/dist/',
      ),
    );*/

    // @todo: We are using a hacky D7-esque Drupal.settings injection instead of what we should be using:
    $build['#attached']['drupalSettings']['leaderboard'] = $js_settings;
    $build['#js_settings'] = 'var LeaderboardSettings = ' . json_encode($js_settings);   
    return $build;
  }

}

