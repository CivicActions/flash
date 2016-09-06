<?php

/**
 * @file
 * Contains \Drupal\govreday\Controller\GovReadyController.
 */

namespace Drupal\ajax_leaderboard\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\Controller;
use Drupal\Core\Form\FormState;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Provides route responses for the Example module.
 */
class ajaxLeaderboardPage extends ControllerBase {

  // @TODO figure out user register for app development
  // For now set permissions to anon
  public function register() {
    $values = array(
      'name' => 'demo-admin',
      'pass' => 'demo'
    );
    $form_state = (new FormState())
      ->setValues($values);
    // $form = \Drupal::formBuilder()->submitForm('\Drupal\user\RegisterForm', $form_state);
    // print_r($form);
    // exit();
    // return new JsonResponse($form_state);

    // // Check for errors from the from
    // if ($errors = $form_state->getErrors()) {
    //   // Return errors to notify the client.
    //   return new JsonResponse( array( 'error' => $errors ));
    // }
    // else {
    //   // Return new user session to client.
    //   $uid = \Drupal::service('user.auth')->authenticate($_POST['name'], $_POST['pass']);
    //   return new JsonResponse( array( 'uid' => $uid, 'name' => $_POST['name'] ) );
    // }
  }

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

