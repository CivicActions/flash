<?php
/**
 * @file
 * Contains Drupal\flash_auth_redirect\EventSubscriber\FlashAuthRedirect.
 */
namespace Drupal\flash_auth_redirect\EventSubscriber;

use Drupal\Core\Url;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Cmf\Component\Routing\RouteObjectInterface;

class FlashAuthRedirect implements EventSubscriberInterface {

  /**
   * Event callback to look for non-auth'd users and redirect them to login.
   */
  public function checkForFlashAuthenticationRedirect(GetResponseEvent $event) {
    $account = \Drupal::currentUser();
    // Check if user not logged in.
    if ($account->id() === 0) {
      $route_name = \Drupal::request()->attributes->get(RouteObjectInterface::ROUTE_NAME);

      //var_dump('route name => ' . $route_name);
      // Define a set of paths it should not redirect from.
      $ignored_routes = array(
        'system.ajax',
        'user.login',
        'user.logout',
      );


      // Check the ignored paths.
      if (!in_array($route_name, $ignored_routes)) {
        //var_dump('redirecting to user.login');
        $url = new Url('user.login');
        $url = $url->setAbsolute(TRUE)->toString();
        $event->setResponse(new RedirectResponse($url));
        drupal_set_message('Please login to access the system', 'error');
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    //TODO - Evaluate if there is a better place to add this check
    $events[KernelEvents::REQUEST][] = array('checkForFlashAuthenticationRedirect');
    return $events;
  }
}
