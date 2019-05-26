// // jQuery(function($) {

// //     var loader_h = $('#loader').height();
// //     $('.after_loading_visible').css('opacity','0');
// //     $('#loader-bg ,#loader').css('display','block');
// //     $('#loader').css({
// //     'height' : loader_h + 'px',
// //     // 'margin-top' : '-' + loader_h + 'px'
// //     });


// //     $('.football_wrap')

// //     .animate({
// //         'opacity': '1'
// //     },{
// //         'duration': 2500,
// //         'easing': 'easeInOutQuint'
// //     })
// //     $('.unites_wrap')

// //     .animate({
// //         'opacity': '1'
// //     },{
// //         'duration': 2500,
// //         'easing': 'easeInOutQuint'
// //     })
// //     $('.globe_wrap')

// //     .animate({
// //         'opacity': '1'
// //     },{
// //         'duration': 2500,
// //         'easing': 'easeInOutQuint',
// //         'complete': function(){
// //             // いらない文字を消す
// //             $('.unites_wrap')
// //             .animate({
// //                 'opacity': '0'
// //             },{
// //                 'duration': 1000,
// //                 'easing': 'easeInOutQuint'
// //             })
// //             $('.the')
// //             .animate({
// //                 'opacity': '0'
// //             },{
// //                 'duration': 1000,
// //                 'easing': 'easeInOutQuint'
// //             })
// //             $('.period')
// //             .animate({
// //                 'opacity': '0'
// //             },{
// //                 'duration': 1000,
// //                 'easing': 'easeInOutQuint'
// //             })
// //             $('.globe_wrap')
// //             .animate({
// //                 'left': '-72'
// //             },{
// //                 'duration': 1000,
// //                 'easing': 'easeInOutQuint',
// //                 complete:function() {
// //                     // 回転
// //                     $({deg:0}).animate({deg:360}, {
// //                         'duration':2500,
// //                         'easing':'easeInOutCirc',
// //                         // 途中経過
// //                         progress:function() {
// //                             $('.animation_parts_wrap').css({
// //                                 transform:'rotate(' + this.deg + 'deg)'
// //                             });
// //                         },
// //                     });
// //                     // 縦に合流
// //                     $('.football_wrap')
// //                     .animate({
// //                         'top': '50%', 'margin-top': -14.4, 'opacity' : '0'
// //                     },{
// //                         'duration': 2500,
// //                         'easing': 'easeInOutCirc'
// //                     })
// //                     $('.globe_wrap')
// //                     .animate({
// //                         'bottom': '50%', 'margin-bottom': -16.58, 'opacity' : '0'
// //                     },{
// //                         'duration': 2500,
// //                         'easing': 'easeInOutCirc',
// //                         complete:function() {
// //                             $('.logo_wrap')
// //                             .animate({
// //                                 'opacity': '1'
// //                             },{
// //                                 'duration': 1500,
// //                                 'easing': 'easeInOutQuint',
// //                                 complete:function() {
// //                                     $('#loader-bg').delay(300).fadeOut(2500);
// //                                     $( '#loader' ).delay(300).fadeOut(2500, function() {
// //                                         // $('.after_loading_visible').css('display','block');

// //                                     });

// //                                             $('.after_loading_visible')
// //                                             .animate({
// //                                                 'opacity': '1'
// //                                             },{
// //                                                 'duration': 3000,
// //                                                 'easing': 'easeInOutQuint'
// //                                             })
// //                                     // // // loading画面から離脱
// //                                 }
// //                             })
// //                         }
// //                     })
// //                 }
// //             })
// //         }
// //     })
// // });

// // //10秒たったら強制的にロード画面を非表示
// // jQuery(document).ready(function($){
// //   setTimeout('stopload()',10000);
// // });

jQuery(document).ready(function($){  //gifの表示位置の調整と「ローディング後に表示される要素」を非表示にする。
  var loader_h = $('#loader').height();
  $('.after_loading_visible').css('display','none');
  $('#loader-bg ,#loader').css('display','block');
  $('#loader').css({
    'height' : loader_h + 'px',
    // 'margin-top' : '-' + loader_h + 'px'
  });
});
         
jQuery(document).ready(function($){
	$(window).load(function () {  //全ての読み込みが完了したら「ローディング後に表示される要素」を表示する。
		
	  $('#loader-bg').delay(2400).fadeOut(1600);
	  $('#loader').delay(1800).fadeOut(600);
	  $('.after_loading_visible').css('display', 'block');
	});
});
 
//10秒たったら強制的にロード画面を非表示
jQuery(document).ready(function($){
  setTimeout('stopload()',10000);

});
            

jQuery(document).ready(function($){
	function stopload(){
	  $('.after_loading_visible').css('display','block');
	  $('#loader-bg').delay(2400).fadeOut(1600);
	  $('#loader').delay(1800).fadeOut(600);
	  alert("1")
	}
});