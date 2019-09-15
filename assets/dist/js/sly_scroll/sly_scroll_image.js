(function() {
  var $frame = $('#cycleitems');
  var $wrap = $frame.parent();

  // Call Sly on frame
  $frame.sly({
    horizontal: 1,
    itemNav: 'basic',
    smart: 1,
    activateOn: 'click',
    mouseDragging: 1,
    touchDragging: 1,
    releaseSwing: 1,
    startAt: 0,
    speed: 3000,
    elasticBounds: 1,
    easing: 'easeOutExpo',
    dragHandle: 1,
    dynamicHandle: 1,
    clickBar: 1,

    // Cycling
    cycleBy: 'items',
    cycleInterval: 2000,
    pauseOnHover: 1,

    // Buttons
    prev: $wrap.find('.prev'),
    next: $wrap.find('.next')
  });

  // Pause button
  $wrap.find('.pause').on('click', function() {
    $frame.sly('pause');
  });

  // Resume button
  $wrap.find('.resume').on('click', function() {
    $frame.sly('resume');
  });

  // Toggle button
  $wrap.find('.toggle').on('click', function() {
    $frame.sly('toggle');
  });
}());

// (function() {
//   var $frame = $('#cycleitems2');
//   var $wrap = $frame.parent();

//   // Call Sly on frame
//   $frame.sly({
//     horizontal: 1,
//     itemNav: 'basic',
//     smart: 1,
//     activateOn: 'click',
//     mouseDragging: 1,
//     touchDragging: 1,
//     releaseSwing: 1,
//     startAt: 0,
//     speed: 300,
//     elasticBounds: 1,
//     easing: 'easeOutExpo',
//     dragHandle: 1,
//     dynamicHandle: 1,
//     clickBar: 1,

//     // Cycling
//     cycleBy: 'items',
//     cycleInterval: 500,
//     pauseOnHover: 1,

//     // Buttons
//     prev: $wrap.find('.prev2'),
//     next: $wrap.find('.next2')
//   });

//   // Pause button
//   $wrap.find('.pause2').on('click', function() {
//     $frame.sly('pause');
//   });

//   // Resume button
//   $wrap.find('.resume2').on('click', function() {
//     $frame.sly('resume');
//   });

//   // Toggle button
//   $wrap.find('.toggle2').on('click', function() {
//     $frame.sly('toggle');
//   });
// }());