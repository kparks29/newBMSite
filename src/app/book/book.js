(function() {
  'use strict';

  function BookCtrl(jQuery) {
    var date       = jQuery('#date');
    var startTime  = jQuery('#time-start');
    var endTime    = jQuery('#time-end');

    date.datetimepicker({
      format:             'MMM Do YYYY',
      minDate:            new Date(),
      useCurrent:         false,
      ignoreReadonly:     true,
      showClose:          true,
      widgetPositioning:  { horizontal: 'right' }
    });

    startTime.datetimepicker({
      format:             'LT',
      disabledHours:      [0,1,2,3,4,5,6,7],
      ignoreReadonly:     true,
      showClose:          true,
      widgetPositioning:  { horizontal: 'right' }
    });

    endTime.datetimepicker({
      format:             'LT',
      useCurrent:         false,
      disabledHours:      [3,4,5,6,7,8,9],
      ignoreReadonly:     true,
      showClose:          true,
      widgetPositioning:  { horizontal: 'right' }
    });

    startTime.on('dp.change', function(event) {
      endTime.data('DateTimePicker').minDate(event.date);
    });

    endTime.on('dp.change', function(event) {
      startTime.data('DateTimePicker').maxDate(event.date);
    });
  }

  angular
    .module('Book', [])
    .controller('BookCtrl', ['jQuery', BookCtrl]);
})();
