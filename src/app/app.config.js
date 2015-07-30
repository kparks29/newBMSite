(function () {
  'use strict';

  function config ($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl: 'app/home/home.html',
        controller: 'HomeCtrl',
        controllerAs: 'home'
      })
      .when('/home/data', {
        template: 'app/home/home.json'
      })
      .when('/about', {
        templateUrl: 'app/about/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/schedule', {
        templateUrl: 'app/schedule/schedule.html',
        controller: 'ScheduleCtrl',
        controllerAs: 'schedule'
      })
      .when('/menu', {
        templateUrl: 'app/menu/menu.html',
        controller: 'MenuCtrl',
        controllerAs: 'menu'
      })
      .when('/book', {
        templateUrl: 'app/book/book.html',
        controller: 'BookCtrl',
        controllerAs: 'book'
      })
      .when('/book/success', {
        templateUrl: 'app/book/success.html',
        controller: 'BookCtrl',
        controllerAs: 'book'
      })
      .when('/contact', {
        templateUrl: 'app/contact/contact.html',
        controller: 'ContactCtrl',
        controllerAs: 'contact'
      })
      .otherwise('/');

  }

  angular.module('BURGERMONSTER')
    .config(['$routeProvider', config]);

})();