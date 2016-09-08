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
          resolve: {
            data: function($state, $stateParams, Path) {
              return Path.get({path: 'recognitions'}).$promise.then(function(data) {
                return data;
              });
            }
          },
          controller: function($scope, $rootScope, $state, data){
            // $scope.data = [
            //   {
            //     month: '2016-09'
            //   },
            //   {
            //     month: '2016-09'
            //   },
            //   {
            //     month: '2016-09'
            //   },
            //   {
            //     month: '2016-09'
            //   },
            //   {
            //     month: '2016-09'
            //   },
            //   {
            //     month: '2016-08'
            //   },
            //   {
            //     month: '2016-09'
            //   }
            // ];

            console.log(data);

            var seriesInfo = {};
            _.map(data, function(item) {
              console.log(item);
              if(!seriesInfo[item.month]) {
                seriesInfo[item.month] = {
                  name: item.month,
                  data: [1]
                }
              }
              else {
                seriesInfo[item.month].data[0]++;
              }
            });
            console.log(seriesInfo);

            seriesInfo = _.sortBy(_.values(seriesInfo), 'name');
            console.log(seriesInfo);
            var seriesCat = _.map(seriesInfo, 'name');
            console.log(seriesCat);

            //This is not a highcharts object. It just looks a little like one!
            var chartConfig = {

              options: {
                  //This is the Main Highcharts chart config. Any Highchart options are valid here.
                  //will be overriden by values specified below.
                  chart: {
                      type: 'column'
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
              series: seriesInfo,
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
                title: {text: 'Month'},
                categories: seriesCat
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
