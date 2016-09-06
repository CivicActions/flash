angular.module('app').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('views/about.html',
    "<h1>About page</h1>"
  );


  $templateCache.put('views/home.html',
    "<h1>Home Page</h1>"
  );

}]);
