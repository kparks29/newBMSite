(function() {
  'use strict';
    
  function jQueryFactory($window) {
    return $window.jQuery;
  }

  angular
    .module('Factories', [])
    .factory('jQuery', ['$window', jQueryFactory]);
})();
