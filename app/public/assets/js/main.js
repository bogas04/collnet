'use strict';

angular.module('collnet', [
    'ngCookies'
    ,'ngResource'
    ,'ngSanitize'
    ,'ngRoute'
    ,'ui.bootstrap'
])
.config(function ($locationProvider, $routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: 'views/main.html',
      controller: 'MainCtrl'
    })
  .when('/login', {
    templateUrl: 'views/login.html',
    controller: 'MainCtrl'
  })
  .when('/register', {
    templateUrl: 'views/register.html',
    controller: 'MainCtrl'
  })
  .when('/contact-us', {
    templateUrl: 'views/contact-us.html',
    controller: 'MainCtrl'
  })
  .when('/search', {
    templateUrl: 'views/search.html',
    controller: 'MainCtrl'
  });
  //$locationProvider.html5Mode(true);
})
.controller('MainCtrl', function ($scope) {
  $scope.message = "successful? I guess!";
  $scope.items = [{
    title: 'NSIT',
    rating: 4.5,
    description: 'Best college ever. Our college is the best college, we have no place for studies.'
  }, {
    title: 'DTU',
    rating: 4.49,
    description: 'Best engineering kaalege only after NSIT!'
  }];
});
