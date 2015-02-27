(function () {
  'use strict';

  function HomeCtrl ($http) {
    var self = this;

    $http.get("app/home/home.json").then(function(response){
      self.slides = response.data.slides;
    });

  }


  angular.module('Home', [])
    .controller('HomeCtrl', HomeCtrl);

})();