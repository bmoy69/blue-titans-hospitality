(function ($) {

  $('#popout-area').click(
    function () {
      if ($(this).css('left') == '-215px') {    // if it is closed, open it
        $(this).animate({ left: -15 }, 'slow', function () { });
        $(this).animate({ height: 550 }, 'fast', function () { });
        // setTimeout(() => $(this).css('overflow-y', 'auto'), 850);
      } else {                                  // if it is open, close it
        // $(this).css('overflow-y', 'hidden');
        $(this).animate({ height: 50 }, 'fast', function () { });
        $(this).animate({ left: -215 }, 'slow', function () { });
      }
    },
  );

  // Hide dropdown menu on click outside
  $(document).on("click", function (event) {
    if (!$(event.target).closest("#popout-area").length) {
      $("#popout-area").animate({ height: 50 }, 'fast', function () { });
      $("#popout-area").animate({ left: -215 }, 'slow', function () { });
    }
  });

  $('#popout-titan').click(
    function () {
      if ($(this).css('left') == '-215px') {    // if it is closed, open it
        $(this).animate({ left: -15 }, 'slow', function () { });
        $(this).animate({ height: 185 }, 'fast', function () { });
        // setTimeout(() => $(this).css('overflow-y', 'auto'), 850);
      } else {                                  // if it is open, close it
        // $(this).css('overflow-y', 'hidden');
        $(this).animate({ height: 50 }, 'fast', function () { });
        $(this).animate({ left: -215 }, 'slow', function () { });
      }
    },
  );

  // Hide dropdown menu on click outside
  $(document).on("click", function (event) {
    if (!$(event.target).closest("#popout-titan").length) {
      $("#popout-titan").animate({ height: 50 }, 'fast', function () { });
      $("#popout-titan").animate({ left: -215 }, 'slow', function () { });
    }
  });

  $('#popout-map').click(
    function () {
      if ($(this).css('left') == '-315px') {    // if it is closed, open it
        $(this).animate({ left: -15 }, 'slow', function () { });
        $(this).animate({ height: 430 }, 'fast', function () { });
        // setTimeout(() => $(this).css('overflow-y', 'auto'), 850);
      } else {                                  // if it is open, close it
        // $(this).css('overflow-y', 'hidden');
        $(this).animate({ height: 50 }, 'fast', function () { });
        $(this).animate({ left: -315 }, 'slow', function () { });
      }
    },
  );

  // Hide dropdown menu on click outside
  $(document).on("click", function (event) {
    if (!$(event.target).closest("#popout-map").length) {
      $("#popout-map").animate({ height: 50 }, 'fast', function () { });
      $("#popout-map").animate({ left: -315 }, 'slow', function () { });
    }
  });


})(jQuery);
