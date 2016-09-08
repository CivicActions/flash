angular.module('app').run(['$templateCache', function($templateCache) {
  'use strict';

  $templateCache.put('views/charts.html',
    "<h2>Charts</h2><highchart id=\"chart1\" config=\"chartConfig\"></highchart>"
  );


  $templateCache.put('views/home.html',
    "<h1>Home Page</h1>"
  );

}]);
