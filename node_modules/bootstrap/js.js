// Back to top
var amountScrolled = 200;
var amountScrolledNav = 25;

$(window).scroll(function() {
  if ( $(window).scrollTop() > amountScrolled ) {
    $('button.back-to-top').addClass('show');
  } else {
    $('button.back-to-top').removeClass('show');
  }
});

$('button.back-to-top').click(function() {
  $('html, body').animate({
    scrollTop: 0
  }, 800);
  return false;
});

// Ignore this
// This is just for content manipulation
var skeleton = '<div class="skeleton"><div class="skeleton-wrapper"><div class="skeleton-wrapper-inner"><div class="skeleton-wrapper-body"><div class="skeleton-avatar"></div><div class="skeleton-author"></div><div class="skeleton-label"></div><div class="skeleton-content-1"></div><div class="skeleton-content-2"></div><div class="skeleton-content-3"></div></div></div></div></div>';
for(var i=0;i<10;i++){
  $('#content').append(skeleton); 
}

// Add waves effect
Waves.attach('button.back-to-top', 'waves-effect');
Waves.init();