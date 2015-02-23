(function () {
  'use strict'

  function BookCtrl ($location) {

    this.test = $location.path();

  }


  angular.module('Book', [])
    .controller('BookCtrl', BookCtrl);

})();