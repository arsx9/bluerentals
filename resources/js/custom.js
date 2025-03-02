$(function() {
  
    $(".sidebar-dropdown > a").click(function() {
      $(".sidebar-submenu").slideUp(200);
      if (
        $(this)
          .parent()
          .hasClass("active")
      ) {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
          .parent()
          .removeClass("active");
      } else {
        $(".sidebar-dropdown").removeClass("active");
        $(this)
          .next(".sidebar-submenu")
          .slideDown(200);
        $(this)
          .parent()
          .addClass("active");
      }
    });
  
    $("#close-sidebar").click(function() {
      $(".page-wrapper").removeClass("toggled");
    });
    $("#show-sidebar").click(function() {
      $(".page-wrapper").addClass("toggled");
    });
  
    $(window).on('resize', function () {
      $('.class1').toggleClass('class2', $(window).width() < 768);
      if($(window).width() < 768){
        $(".page-wrapper").removeClass("toggled");
      }else{
        $(".page-wrapper").addClass("toggled");
      }
    });

    var swiper1 = new Swiper(".mySwiper", {
      slidesPerView: 1,
      spaceBetween: 10,
      loop: true,
      pagination: {
        el: ".mySwiper .swiper-pagination",
        // clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 50,
        },
      },
    });

  $(".minas_but").on('click', function(e){
      e.preventDefault();
      let minasval = parseInt($(".bath_inp").val());
      if (minasval > 0){
          $(".bath_inp").val(minasval - 1);
      }
  });

  $(".plus_but").on('click', function(e){
      e.preventDefault();
      let plusval = parseInt($(".bath_inp").val());
      $(".bath_inp").val(plusval + 1);
  });

  $(".filter").on('click', function(e){
      e.preventDefault();
      // console.log("CLICKED");
      // $(".pop_up_area, .pop_up").addClass("active");
  });

  // $(".close_btn").on('click', function(e){
  //     e.preventDefault();
  //     $(".pop_up_area, .pop_up").removeClass("active");
  // });

  //Multistage Form
  var current_fs, next_fs, previous_fs; //fieldsets
  var opacity;

  $(".next").click(function(){
    current_fs = $(this).parent();
    next_fs = $(this).parent().next();

    //Add Class Active
    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

    //show the next fieldset
    next_fs.show();
    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
    step: function(now) {
    // for making fielset appear animation
    opacity = 1 - now;

    current_fs.css({
    'display': 'none',
    'position': 'relative'
    });
    next_fs.css({'opacity': opacity});
    },
    duration: 600
    });
  });

  $(".previous").click(function(){
    current_fs = $(this).parent();
    previous_fs = $(this).parent().prev();

    //Remove class active
    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

    //show the previous fieldset
    previous_fs.show();

    //hide the current fieldset with style
    current_fs.animate({opacity: 0}, {
      step: function(now) {
        // for making fielset appear animation
        opacity = 1 - now;

        current_fs.css({
          'display': 'none',
          'position': 'relative'
        });
        previous_fs.css({'opacity': opacity});
      },
      duration: 600
    });
  });

  $('.radio-group .radio').click(function(){
    $(this).parent().find('.radio').removeClass('selected');
    $(this).addClass('selected');
  });

  $(".submit").click(function(){
  return false;
  })

  $('.home-page-search').select2({
    theme: "classic",
    dropdownParent: $('.home_search'),
    // minimumInputLength: 3,
    // matcher: matchCustom
  });

  $('.home-page-search').on('select2:opening select2:closing', function( event ) {
      var $searchfield = $(this).parent().find('.select2-search__field');
      // $searchfield.prop('disabled', true);
  });

  //Multistage Application form
  $(".ready").on('click', function(e){
    e.preventDefault();
    $(".step_1").addClass("form_active");
  });
  $(".ready").on('click', function(e){
    e.preventDefault();
    $(".app_pros").addClass("form_font");
  });

  $(".continue_1").on('click', function(e){
    e.preventDefault();
    $(".step_1").removeClass("form_active");
  });

  $(".continue_1").on('click', function(e){
    e.preventDefault();
    $(".step_2").addClass("form_active");
  });

  $(".continue_2").on('click', function(e){
    e.preventDefault();
    $(".step_2").removeClass("form_active");
  });

  $(".continue_2").on('click', function(e){
    e.preventDefault();
    $(".step_3").addClass("form_active");
  });

  $(".continue_3").on('click', function(e){
    e.preventDefault();
    $(".step_3").removeClass("form_active");
  });

  $(".continue_3").on('click', function(e){
    e.preventDefault();
    $(".step_4").addClass("form_active");
  });

  $(".continue_4").on('click', function(e){
    e.preventDefault();
    $(".step_4").removeClass("form_active");
  });

  $(".continue_4").on('click', function(e){
    e.preventDefault();
    $(".step_5").addClass("form_active");
  });

  $(".continue_5").on('click', function(e){
    e.preventDefault();
    $(".step_5").removeClass("form_active");
  });

  $(".continue_5").on('click', function(e){
    e.preventDefault();
    $(".step_6").addClass("form_active");
  });

  $(".continue_6").on('click', function(e){
    e.preventDefault();
    $(".step_6").removeClass("form_active");
  });

  $(".continue_6").on('click', function(e){
    e.preventDefault();
    $(".step_7").addClass("form_active");
  });

  $(".continue_7").on('click', function(e){
    e.preventDefault();
    $(".step_7").removeClass("form_active");
  });

  $(".continue_7").on('click', function(e){
    e.preventDefault();
    $(".step_8").addClass("form_active");
  });

  // Go back start 
  $(".go_back_1").on('click', function(e){
    e.preventDefault();
    $(".step_1").removeClass("form_active");
  });

  $(".go_back_1").on('click', function(e){
    e.preventDefault();
    $(".app_pros").removeClass("form_font");
  });

  $(".go_back_2").on('click', function(e){
    e.preventDefault();
    $(".step_2").removeClass("form_active");
  });

  $(".go_back_2").on('click', function(e){
    e.preventDefault();
    $(".step_1").addClass("form_active");
  });

  $(".go_back_3").on('click', function(e){
    e.preventDefault();
    $(".step_3").removeClass("form_active");
  });

  $(".go_back_3").on('click', function(e){
    e.preventDefault();
    $(".step_2").addClass("form_active");
  });

  $(".go_back_4").on('click', function(e){
    e.preventDefault();
    $(".step_4").removeClass("form_active");
  });

  $(".go_back_4").on('click', function(e){
    e.preventDefault();
    $(".step_3").addClass("form_active");
  });

  $(".go_back_5").on('click', function(e){
    e.preventDefault();
    $(".step_5").removeClass("form_active");
  });

  $(".go_back_5").on('click', function(e){
    e.preventDefault();
    $(".step_4").addClass("form_active");
  });

  $(".go_back_6").on('click', function(e){
    e.preventDefault();
    $(".step_6").removeClass("form_active");
  });

  $(".go_back_6").on('click', function(e){
    e.preventDefault();
    $(".step_5").addClass("form_active");
  });

  $(".go_back_7").on('click', function(e){
    e.preventDefault();
    $(".step_7").removeClass("form_active");
  });

  $(".go_back_7").on('click', function(e){
    e.preventDefault();
    $(".step_6").addClass("form_active");
  });

  $(".go_back_8").on('click', function(e){
    e.preventDefault();
    $(".step_8").removeClass("form_active");
  });

  $(".go_back_8").on('click', function(e){
    e.preventDefault();
    $(".step_7").addClass("form_active");
  });


  function matchCustom(params, data) {
    // If there are no search terms, return all of the data
    if ($.trim(params.term) === '') {
      return data;
    }
    // Do not display the item if there is no 'text' property
    if (typeof data.text === 'undefined') {
      return null;
    }
    // `params.term` should be the term that is used for searching
    // `data.text` is the text that is displayed for the data object
    if (data.text.indexOf(params.term) > -1) {
      var modifiedData = $.extend({}, data, true);
      modifiedData.text += ' (matched)';
      // You can return modified objects from here
      // This includes matching the `children` how you want in nested data sets
      return modifiedData;
    }
    // Return `null` if the term should not be displayed
    return null;
  }



  $('.venobox').venobox(); 

  $(".home_banner_button").on('click', function(e) {
    e.preventDefault();
    console.log("HERE")
    $('#subscriptionModal').modal('show');
  });

  $(".modal_close").on('click', function(e) {
    e.preventDefault();
    $(".modal_subscription").fadeOut();
  });

  $('#kids_under18').on('change', function() {
      $('#kid-form-items').empty();
      if(this.value>0){
          for (let i = 1; i <= this.value; i++) {
              //alert( i );
              var e = $('<div class="row"><div class="col-sm-6"><div class="form-group"><label for="kid_name" class="control-label">Name</label><input type="text" class="form-control" name="kid_name[]" placeholder="Enter kid full name"></div></div><div class="col-sm-6"><div class="form-group"><label for="kid_age" class="control-label">Age</label><input type="numeric" class="form-control" name="kid_age[]" placeholder="Enter kid age"></div></div></div>');
              $('#kid-form-items').append(e);
              e.attr('id', 'kid_item'+i);
          } 
      }
  });


  $('.m-burger').on('click', function(e){
    e.preventDefault();
    $('.m-close, .nav_menu').addClass('active');
  });
  $('.m-close').on('click', function(e){
    e.preventDefault();
    $('.m-close, .nav_menu').removeClass('active');
  });

  $('.share_btn').on('click', function(e){
    e.preventDefault();
    $('.share_box').addClass('active');
    $('#shareModal').modal('show');
  });
  $('.share_close').on('click', function(e){
    e.preventDefault();
    $('.share_box').removeClass('active');
  });

  document.getElementById('copyLinkButton').addEventListener('click', function(e) {
      e.preventDefault(); 
      navigator.clipboard.writeText(window.location.href).then(function() {
          alert('Link copied to clipboard!');
      }, function(err) {
          console.error('Could not copy text: ', err);
      });
  });

});

function openNav(){
  document.getElementById("N_sidenav").style.width = "";
  document.getElementById("N_sidenav").style.display = "block";
}

function closeNav(){
  document.getElementById("N_sidenav").style.width = "0";
  document.getElementById("N_sidenav").style.display = "block";
}