<?php

/**
 * @file
 * Drush commands for Flash Badges module.
 */

/**
 * Implements hook_drush_command().
 */
// function flash_demo_users_drush_command() {

//   $items['flash-demo-users-controller'] = array(
//     'description' => 'Create or delete flash demo users and content.',
//     'aliases' => array('demo-users'),
//     'arguments' => array(),
//     'examples' => array(
//       'demo-users' => 'Create flash demo users and content.',
//     ),
//   );

//   return $items;
// }

/**
 * Callback for the govready-collect command
 */
// function drush_flash_demo_users_controller($type = 'create') {
//   switch($type) {
//     case 'create':
//       if(flash_demo_users_create()) {
//         drush_print(dt('Demo users and content created'));        
//       }
//       else {
//         return drush_set_error(dt('There was an error creating demo users, they were likely already created.'));
//       }
//       break;
//   }
// }
