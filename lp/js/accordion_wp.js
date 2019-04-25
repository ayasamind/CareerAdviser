$(function(){
  $("#main-drop > li > p.accordion_icon").removeClass('active');
  $("#main-drop > li > ul").hide();
  $("#main-drop > li").on("click",function(){
    $(this).siblings("li").find('> ul').slideUp();
    $(this).siblings("li").find('> p.accordion_icon').removeClass('active');
    $(this).find('> ul').slideToggle();
    $(this).find('> p.accordion_icon').toggleClass('active');
  });
});

$(function(){
  $("#main-drop02 > li > p.accordion_icon").removeClass('active');
  $("#main-drop02 > li > ul").hide();
  $("#main-drop02 > li").on("click",function(){
    $(this).siblings("li").find('> ul').slideUp();
    $(this).siblings("li").find('> p.accordion_icon').removeClass('active');
    $(this).find('> ul').slideToggle();
    $(this).find('> p.accordion_icon').toggleClass('active');
  });
});

$(function(){
  $('.faq_more_btn_wrap').click(function() {
      $(this).next().slideToggle();
      $(".faq_more_btn").toggleClass('faq_more_btn_active');
      // $('.faq_more_btn_active > .faq_more_btn').html('閉じる');


        if($(".faq_more_btn").hasClass('faq_more_btn_active')){
            var text = $(".faq_more_btn").data('text-clicked');
        } else {
            var text = $(".faq_more_btn").data('text-default');
        }

        $(".faq_more_btn").html(text);

  }).next().hide();
});