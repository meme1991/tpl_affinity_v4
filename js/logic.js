jQuery(document).ready(function($) {

  // $('[data-toggle="offcanvas"]').on('click', function () {
  //   $('.offcanvas-collapse').toggleClass('open')
  // })
  //
  // $('[data-toggle="top-nav"]').on('click', function () {
  //   $('#top-nav').toggleClass('open')
  // })

  $('[data-toggle="offcanvas-collapse"]').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open')
  })

  $('[data-toggle="offcanvas"]').on('click', function () {
    // alert('qui');
    $('.offcanvas-menu').toggleClass('open');
    $('.site-wrap').toggleClass('slide');
    $(this).toggleClass('menu-active');
  })


  /************ Non chiudo i dropdown se clicco sul container ***************/
  $(document).on('click', '.dropdown-menu', function (e) {
      e.stopPropagation();
  });
  /************ Non chiudo i dropdown se clicco sul container ***************/

  /************ ELIMINO chronoforms6_credits ***************/
  if($('.chronoforms6_credits').length){
    $('.chronoforms6_credits').remove();
  }
  /************ ELIMINO chronoforms6_credits ***************/

  /************ ATTIVO I TOOLTIPS ***************/
  $('[data-toggle="tooltip"]').tooltip();
  /************ ATTIVO I TOOLTIPS ***************/

  /************ RUOTO IL BOTTONE NEI COLLAPSE ***************/
  $('body .btn-collapse').click(function(){
    $(this).toggleClass('active');
  })

  $('.nav-side__header').click(function(){
    $(this).toggleClass('active');
    $(this).find('i').toggleClass('active');
  })

  $('.mega-block-header').click(function(){
    $(this).toggleClass('active');
    $(this).find('i').toggleClass('active');
  })
  // ############ ruoto icone nei collapse della navside ################

  $('body .phocadownloadfilelist').click(function(){
    $(this).toggleClass('phocadownloadfilelist--open');
  })
  /************ END RUOTO IL BOTTONE NEI COLLAPSE ***************/

  /************ OBJECT FIT CROSS BROWSER *****************/
  if ( ! Modernizr.objectfit ) {

    // immagini aree tematiche
    if($('.card-block > figure').length){
      $('.card-block > figure').each(function () {
        var $container = $(this),
            imgUrl = $container.find('img').prop('src');
          //  alert(imgUrl)
        if (imgUrl) {
          $container
            .css('backgroundImage', 'url(' + imgUrl + ')')
            .addClass('compat-object-fit')
            .children('img').hide();
        }
      });
    }
    // end immagini aree tematiche

    // immagini di testata degli articoli o categorie
    if($('.cover-image').length){
      $('.cover-image').each(function () {
        var $container = $(this),
            imgUrl = $container.find('img').prop('src');
          //  alert(imgUrl)
        if (imgUrl) {
          $container
            .css('backgroundImage', 'url(' + imgUrl + ')')
            .addClass('compat-object-fit cover-image-ie-fixed')
            .children('img').hide();
        }
      });
    }
    // end immagini di testata degli articoli o categorie

  }
  /************ END OBJECT FIT CROSS BROWSER *******************/

  /************ NAVBAR FIXED ALLO SCROLL ************/
  function fixedNavbar() {
      if ($(document).scrollTop() > 186) {
        // $('.header-nav').addClass("fixed-top animated slideInDown");
        $('.header-nav').addClass("fixed-top");
        $('.header-banner').addClass("scroll");
        // $('#open-button').addClass('menu-scroll');
      } else {
        // $('.header-nav').removeClass("fixed-top animated slideInDown");
        $('.header-nav').removeClass("fixed-top");
        $('.header-banner').removeClass("scroll");
        // $('#open-button').removeClass('menu-scroll');
      }
  }
  $(window).scroll(fixedNavbar);
  $(document).ready(fixedNavbar);
  /************ END NAVBAR FIXED ALLO SCROLL ************/

  // /************ EFFETTO DROPDOWN ************/
  $('.navbar-nav .dropdown').on('show.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideDown(300);
  });

  $('.navbar-nav .dropdown').on('hide.bs.dropdown', function(e){
    $(this).find('.dropdown-menu').first().stop(true, true).slideUp(200);
  });
  // /************ END EFFETTO DROPDOWN ************/

  /************ COLLAPSE DEI MEGA BLOCK SU SCHERMI MINORI DI 576px ************/
  function collapseMegaBlock() {
      if ($(window).width() <= 768) {
        $('.navbar .mega-block > .megablockCollapse').addClass("collapse");
      } else {
        $('.navbar .mega-block > .megablockCollapse').removeClass("collapse");
      }
  }
  $(window).resize(collapseMegaBlock);
  $(document).ready(collapseMegaBlock);
  /************ END COLLAPSE DEI MEGA BLOCK SU SCHERMI MINORI DI 576px ************/

  /************ EASING ************/
	// jQuery for page scrolling feature - requires jQuery Easing plugin
	// $(function() {
	//     $('a.page-scroll').bind('click', function(event) {
	//         var $anchor = $(this);
	//         $('html, body').stop().animate({
	//             // scrollTop: ($($anchor.attr('data-href')).offset().top - 70)
  //             scrollTop: ($($anchor.attr('href')).offset().top - 120)
	//         }, 1500, 'easeOutBack');
	//         event.preventDefault();
	//     });
	// });
	/************ END EASING ************/

  /************ NASCONDO LA SEARCH BAR SE SONO SOTTO I 768PX ************/
  function hideSearchBar() {
      if ($(window).width() <= 991) {
        $('#searchBarCollapse').addClass("collapse");
      } else {
        $('#searchBarCollapse').removeClass("collapse");
      }
  }
  $(window).resize(hideSearchBar);
  $(document).ready(hideSearchBar);

  // se clicco nascondo la lente e metto la close
  $('#searchBarCollapse').on('hide.bs.collapse', function () {
    $('.search-bar-icon > a').html('<i class="fal fa-search"></i>');
  })

  $('#searchBarCollapse').on('show.bs.collapse', function () {
    $('.search-bar-icon > a').html('<i class="fal fa-times"></i>');
  })
  /************ END NASCONDO LA SEARCH BAR SE SONO SOTTO I 768PX ************/


  /************ SIDE NAV ACTIVE ***************/
  // $('#open-button').click(function(){
  //   $('#open-button').toggleClass('menu-active');
  //   $('.st-container').toggleClass('st-menu-open');
  // })


  // $('body').click(function(){
  //   if($(this).hasClass('show-menu')){
  //     $('#open-button').addClass('menu-active');
  //   } else{
  //     $('#open-button').removeClass('menu-active');
  //   }
  // })
  /************ END SIDE NAV ACTIVE ***************/

  /************ SKIP LINK ***************/
  $('.goto-burger').focusin(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-burger').focusout(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-content').focusin(function(){
    $(this).toggleClass('focus');
  })
  $('.goto-content').focusout(function(){
    $(this).toggleClass('focus');
  })

  $('.goto-burger').click(function(){
    $('#open-button').focus();
  })

  $('#open-button').click(function(){
    $('.menu-side .nav-side a:eq(0)').focus();
  })
  /************ END SKIP LINK ***************/
});



// Add missing Mootools when Bootstrap is loaded
(function($)
{
    $(document).ready(function(){
        var bootstrapLoaded = (typeof $().carousel == 'function');
        var mootoolsLoaded = (typeof MooTools != 'undefined');
        if (bootstrapLoaded && mootoolsLoaded) {
            Element.implement({
                hide: function () {
                    return this;
                },
                show: function (v) {
                    return this;
                },
                slide: function (v) {
                    return this;
                }
            });
        }
    });
})(jQuery);
