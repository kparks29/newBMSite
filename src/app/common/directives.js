(function() {
  'use strict';

  function isActive($location) {
    return {
      link: function(scope, elm, attr) {
        scope.$on('$routeChangeSuccess', function() {
          var href = '/' + attr.href.split('/')[2];

          if ($location.path() === href) {
            elm.addClass('nav-active');
          } else {
            elm.removeClass('nav-active');
          }
        });
      }
    };
  }

  function isTransparent($location) {
    return {
      link: function(scope, elm) {
        scope.$on('$routeChangeSuccess', function() {
          if ($location.path() === '/') {
            elm.addClass('transparent');
          } else {
            elm.removeClass('transparent');
          }
        });
      }
    };
  }

  angular
    .module('Directives', [])
    .directive('isActive', isActive)
    .directive('isTransparent', isTransparent);
})();
