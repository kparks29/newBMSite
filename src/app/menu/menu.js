(function() {
  'use strict';

  function MenuCtrl($http) {
    var self = this;

    $http.get('app/menu/menu.json').then(function(response) {
      self.burgers = response.data.burgers;
    });
  }

  angular
    .module('Menu', [])
    .controller('MenuCtrl', MenuCtrl);
})();
