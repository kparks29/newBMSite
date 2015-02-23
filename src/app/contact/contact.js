(function () {
  'use strict'

  function ContactCtrl ($location) {

    this.test = $location.path();

  }


  angular.module('Contact', [])
    .controller('ContactCtrl', ContactCtrl);

})();