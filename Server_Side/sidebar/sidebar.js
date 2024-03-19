// admin transaction
$(document).ready(function(){
  let about = $('#transaction');
  let subAbout = $('#sub-transaction');
  about.on('click', function(){
  subAbout.slideToggle('500');
  $(this).find('.right-arrow').toggleClass('down-arrow');
  });
});

$(document).ready(function(){
  let about = $('#Maintinance');
  let subAbout = $('#sub-maintinance');
  about.on('click', function(){
  subAbout.slideToggle('500');
  $(this).find('.right-arrow').toggleClass('down-arrow');
  });
});




// client admission
$(document).ready(function(){
  let admission = $('#admission');
  let submission = $('.sub-admission');
  admission.on('click', function(){
  submission.slideToggle('500');
  $(this).find('.right-arrow').toggleClass('down-arrow');
  });
});