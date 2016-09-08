'use strict';

angular.module('app.page', [
  'ui.router',
])

.config(
  [          '$stateProvider', '$urlRouterProvider',
    function ($stateProvider,   $urlRouterProvider) {

      $stateProvider

        .state("charts", {
          url: "/charts",
          data: { 
            title: 'Charts',                 // Sets meta title
            skipScroll: false               // Skips scroll animation (embedded ui-views)
          },
          templateUrl: 'views/charts.html',
          controller: function($scope, $rootScope, $state){
            $scope.data = [
              {
                month: '2016-09'
              },
              {
                month: '2016-09'
              },
              {
                month: '2016-09'
              },
              {
                month: '2016-09'
              },
              {
                month: '2016-09'
              },
              {
                month: '2016-08'
              },
              {
                month: '2016-09'
              }
            ];

            //This is not a highcharts object. It just looks a little like one!
            var chartConfig = {

              options: {
                  //This is the Main Highcharts chart config. Any Highchart options are valid here.
                  //will be overriden by values specified below.
                  chart: {
                      type: 'bar'
                  },
                  tooltip: {
                      style: {
                          padding: 10,
                          fontWeight: 'bold'
                      }
                  }
              },
              //The below properties are watched separately for changes.

              //Series object (optional) - a list of series using normal Highcharts series options.
              series: [
                {
                  name: 'July',
                  data: [
                    10
                  ]
                },
                {
                  name: 'August',
                  data: [
                    15
                  ]
                },
                {
                  name: 'September',
                  data: [
                    17
                  ]
                },
                {
                  name: 'October',
                  data: [
                    0
                  ]
                }
              ],
              //Title configuration (optional)
              title: {
                 text: 'Recognitions per month'
              },
              //Boolean to control showing loading status on chart (optional)
              //Could be a string if you want to show specific loading text.
              loading: false,
              //Configuration for the xAxis (optional). Currently only one x axis can be dynamically controlled.
              //properties currentMin and currentMax provided 2-way binding to the chart's maximum and minimum
              xAxis: {
              // currentMin: 0,
              // currentMax: 20,
                title: {text: 'Month'}
              },
              yAxis: {
              // currentMin: 0,
              // currentMax: 20,
                title: {text: 'Total Count'}
              },
              //Whether to use Highstocks instead of Highcharts (optional). Defaults to false.
              useHighStocks: false,
              //size (optional) if left out the chart will default to size of the div or something sensible.
              //function (optional)
              func: function (chart) {
               //setup some logic for the chart
              }
            };

            $scope.chartConfig = chartConfig;
          }
        })


    }
  ]
);
