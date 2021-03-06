'use strict';

collnetApp.config(function ($locationProvider, $routeProvider) {
  $routeProvider
    .when('/', {
      templateUrl: 'views/main.html',
      controller: 'MainCtrl'
    })
  .when('/login', {
    templateUrl: 'views/login.html',
    controller: 'MainCtrl'
  })
  .when('/contact-us', {
    templateUrl: 'views/contact-us.html',
    controller: 'MainCtrl'
  })
  .when('/search', {
    templateUrl: 'views/search.html',
    controller: 'MainCtrl'
  })
  .when('/profile/institute/:instituteId', {
    templateUrl: 'views/institute-profile.html',
    controller: 'MainCtrl'
  })
  .when('/profile/institute/:instituteId/students', {
    templateUrl: 'views/institute-students.html',
    controller: 'MainCtrl'
  })
  .when('/profile/institute/:instituteId/posts', {
    templateUrl: 'views/institute-posts.html',
    controller: 'MainCtrl'
  })
  .when('/profile/company/:companyId', {
    templateUrl: 'views/company-profile.html',
    controller: 'MainCtrl'
  })
  .when('/profile/company/:companyId/employees', {
    templateUrl: 'views/company-employees.html',
    controller: 'MainCtrl'
  })
  .when('/profile/self', {
    templateUrl: 'views/profile-self.html',
    controller: 'MainCtrl'
  })
  .when('/profile/edit', {
    templateUrl: 'views/edit-profile.html',
    controller: 'MainCtrl'
  })
  .when('/profile/user/:username', {
    templateUrl: 'views/user-profile.html',
    controller: 'MainCtrl'
  })
  // $locationProvider.html5Mode(true);
})
