(function () {
  'use strict';

  function AboutCtrl () {

    this.test = 'test';

  }


  angular.module('About', [])
    .controller('AboutCtrl', AboutCtrl);

})();