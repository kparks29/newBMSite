(function () {
  'use strict'

  function MenuCtrl ($location) {

    this.test = $location.path();

  }


  angular.module('Menu', [])
    .controller('MenuCtrl', MenuCtrl);

})();