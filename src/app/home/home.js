(function () {
  'use strict'

  function HomeCtrl ($location) {

    this.test = $location.path();

  }


  angular.module('Home', [])
    .controller('HomeCtrl', HomeCtrl);

})();