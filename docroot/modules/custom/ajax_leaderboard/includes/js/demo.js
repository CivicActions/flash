

/**
 * Just demonstrating some calls to the REST API endpoints
 */

(function($, Drupal) {
  Drupal.behaviors.govready_connect = {
    attach: function(context, settings) {

    // Settings in hacky object
    console.log('Settings in hacky object', LeaderboardSettings);

    jQuery.ajax({
      url: settings.leaderboard.api_leaderboard + '?_format=xml',
      method: 'GET',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-Token': settings.token
      },
      success: function (leaderboard) {
        console.log(leaderboard);

        jQuery.ajax({
          url: settings.leaderboard.api_user + leaderboard[0].uid + '?_format=xml',
          method: 'GET',
          success: function (account) {
            //console.log(account);
            alert('see console');

          }
        });


      }
    });



    } // attach
  };
})(jQuery, Drupal);

