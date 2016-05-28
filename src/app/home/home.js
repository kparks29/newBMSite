(function() {
  'use strict';

  function HomeCtrl($http) {
    var self = this;

    $http.get('app/home/home.json').then(function(response) {
      self.images = response.data.images;
    });
  }

  angular
    .module('Home', [])
    .controller('HomeCtrl', HomeCtrl);
})();
