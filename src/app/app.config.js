(function() {
  'use strict';

  function config($routeProvider) {
    $routeProvider
      .when('/', {
        templateUrl:  'app/home/home.html',
        controller:   'HomeCtrl',
        controllerAs: 'home'
      })
      .when('/schedule', {
        templateUrl:  'app/schedule/schedule.html',
        controller:   'ScheduleCtrl',
        controllerAs: 'schedule'
      })
      .when('/menu', {
        templateUrl:  'app/menu/menu.html',
        controller:   'MenuCtrl',
        controllerAs: 'menu'
      })
      .when('/book', {
        templateUrl:  'app/book/book.php',
        controller:   'BookCtrl',
        controllerAs: 'book'
      })
      .when('/contact', {
        templateUrl:  'app/contact/contact.php',
        controller:   'ContactCtrl',
        controllerAs: 'contact'
      })
      .when('/about', {
        templateUrl:  'app/about/about.html',
        controller:   'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/success', {
        templateUrl:  'app/success/success.html',
        controller:   'SuccessCtrl',
        controllerAs: 'success'
      })
      .otherwise('/');
  }

  angular
    .module('BURGERMONSTER')
    .config(['$routeProvider', config]);
})();
