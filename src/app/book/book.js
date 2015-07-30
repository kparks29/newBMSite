(function () {
  'use strict';

  function BookCtrl ($location) {

    this.test = $location.path();

  }
  function SuccessCtrl ($location) {

    this.test = $location.path();

  }

  angular.module('Book', [])
    .controller('BookCtrl', BookCtrl)
    .controller('SuccessCtrl', SuccessCtrl);
})();