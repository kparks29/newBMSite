(function () {
  'use strict';

  function BookCtrl ($location) {

    this.test = $location.path();

  }
  function SuccessCtrl () {

    function submit () {
    window.open("http://www.burgermonster.net/book/success");
    }
      
      this.submit = submit;

  }

  angular.module('Book', [])
    .controller('BookCtrl', BookCtrl)
    .controller('SuccessCtrl', SuccessCtrl);
})();