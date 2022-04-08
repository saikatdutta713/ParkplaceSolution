var root_path = window.location.href;

$(document).ready(function () {

  // Top nav 2 scroll animation
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 150) {
      $(".top-nav-2").css('height', '60px');
    }
    else {
      $(".top-nav-2").css('height', '0px');
    }
  });

  //Mobile Banner carousel
  $('#m-banner-carousel').owlCarousel({
    items: 1,
    nav: false,
    loop: true,
    margin: 0,
    dots: false,
    autoplay: true
  })

  //Banner carousel
  $('#banner-carousel').owlCarousel({
    items: 1,
    nav: false,
    loop: true,
    margin: 0,
    dots: false,
    autoplay: true
  })

  //Banner carousel
  $('#clients').owlCarousel({
    items: 1,
    nav: false,
    loop: true,
    margin: 0,
    nav: true,
    dots: false,
    autoplay: false
  })

  // Search result for top-nav
  $(document).on('keyup', '.search-input', function (event) {
    let query = $("#search-input").val();
    if (query != "") {
      $.ajax({
        url: "../api/search-result.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
          var html_value = "<ul class='search-list'>";
          for (let n in data) {
            html_value += "<li class='search-listitem' >" + data[n].s_name + " - " + _.first(data[n].service_type.split(" ")) + "</li><hr>";
          }
          html_value += "</ul>"
          $('.search-result').html(html_value);
          console.log(data);
        }
      })
      let element = document.querySelector('.search-box');
      var rect = element.getBoundingClientRect();
      $('.search-result').css({ 'display': 'block', 'left': rect.left, 'top': rect.top + rect.height + 1, 'width': element.offsetWidth });
    }
  })

  // search result for top-nav-2
  $(document).on('keyup', '#search-input-2', function (event) {
    let query = $("#search-input-2").val();
    if (query != "") {
      $.ajax({
        url: "../api/search-result.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
          var html_value = "<ul class='search-list'>";
          for (let n in data) {
            html_value += "<li class='search-listitem' >" + data[n].s_name + " - " + _.first(data[n].service_type.split(" ")) + "</li><hr>";
          }
          html_value += "</ul>"
          $('.search-result').html(html_value);
          console.log(data);
        }
      })
      let element = document.querySelector('.search-box-2');
      var rect = element.getBoundingClientRect();
      $('.search-result').css({ 'display': 'block', 'left': rect.left, 'top': rect.top + rect.height + 1, 'width': element.offsetWidth });
    }
  })

  // Search result for top-nav-2
  // $(document).on('keyup', '#search-input-2', function () {
  //   let query = $("#search-input-2").val();
  //   if (query != "") {
  //     $.ajax({
  //       url: "./api/search-result.php",
  //       method: "POST",
  //       data: { query: query },
  //       success: function (data) {
  //         var html_value = "<ul class='search-list-2'>";
  //         for (let n in data) {
  //           html_value += "<li class='search-listitem-2' >" + data[n].s_name + " - " + _.first(data[n].service_type.split(" ")) + "</li><hr>";
  //         }
  //         html_value += "</ul>"
  //         $('.search-result-2').html(html_value);
  //         console.log(data);
  //       }
  //     })
  //     let element = document.querySelector('.search-box-2');
  //     var rect = element.getBoundingClientRect();
  //     $('.search-result-2').css({ 'display': 'block', 'left': rect.left, 'top': rect.top + rect.height + 1, 'width': element.offsetWidth });
  //   }
  // })

  // Close search results on click
  $(document).on('click', function (event) {
    if (event.target.classList.contains('search-input') || event.target.classList.contains('search-input-2')) {

    } else {
      $('.search-result').css('display', 'none');
      // $('.search-result-2').css('display', 'none');
    }
  })

  // Close Search Results on scroll
  $(window).on('scroll', function () {
    $('.search-result').css('display', 'none');
    // $('.search-result-2').css('display', 'none');
  })

  // $(document).on('keyup', function (event) {
  //   if (event.target.classList.contains('search-btn')) {
  //     let query = $('.search-input').val();
  //     if (query != "") {
  //       $.ajax({
  //         url: "./api/search-result.php",
  //         method: "POST",
  //         data: { query: query },
  //         success: function (data) {
  //           var html_value = "<ul class='search-list'>";
  //           for (let n in data) {
  //             html_value += "<li class='search-listitem' >" + data[n].s_name + " - " + _.first(data[n].service_type.split(" ")) + "</li>";
  //           }
  //           html_value += "</ul>"
  //           $('.search-result').html(html_value);
  //         }
  //       })
  //       let element = document.querySelector('.search-inputbox');
  //       var rect = element.getBoundingClientRect();
  //       $('.search-result').css({ 'display': 'block', 'left': rect.left, 'top': rect.top + rect.height + 1, 'width': element.offsetWidth });
  //     }
  //   }
  //   else if (event.target.classList.contains('search-listitem')) { }
  //   else {
  //     let isClickInsideElement = event.target.classList.contains('search-listitem');
  //     if (!isClickInsideElement) {
  //       $('.search-result').css('display', 'none');
  //     }
  //   }

  //   // search results for top-nav-2
  //   if (event.target.classList.contains('search-btn-2')) {
  //     let query = $('.search-input-2').val();
  //     if (query != "") {
  //       $.ajax({
  //         url: "./api/search-result.php",
  //         method: "POST",
  //         data: { query: query },
  //         success: function (data) {
  //           let html_value = "<ul class='search-list-2'>";
  //           for (let n in data) {
  //             html_value += "<li class='search-listitem-2' >" + data[n].s_name + " - " + _.first(data[n].service_type.split(" ")) + "</li>";
  //           }
  //           html_value += "</ul>"
  //           $('.search-result-2').html(html_value);
  //         }
  //       })
  //       var element = document.querySelector('.search-inputbox-2');
  //       var rect = element.getBoundingClientRect();
  //       var scrolltop = $(window).scrollTop() + 47;
  //       $('.search-result-2').css({ 'display': 'block', 'left': rect.left, 'top': scrolltop, 'width': element.offsetWidth });
  //     }
  //   }
  //   else if (event.target.classList.contains('search-listitem-2')) { }
  //   else {
  //     let isClickInsideElement = event.target.classList.contains('search-listitem-2');
  //     if (!isClickInsideElement) {
  //       $('.search-result-2').css('display', 'none');
  //     }
  //   }

  // })

  // service box
  if ($(window).width() > 500) {
    $('.mobile-service').addClass('d-none');
    service_box_height = document.querySelector(".desktop").offsetHeight; // Detect service box height for large screen devices

  }
  else {
    $('.mobile-service').removeClass('d-none');
    service_box_height = document.querySelector(".mobile-service").offsetHeight; //Detect mobile service box height
  }

  // Youtube triangle box animation
  var service_box_height;
  let triangle_height = document.querySelector('.tm-section-2-box').offsetHeight;
  let polygon_height = document.querySelector('.tm-section').offsetHeight;

  triangle_height = triangle_height + polygon_height;

  let triangle_padding = service_box_height - triangle_height - 10;

  $(window).on("scroll", function () {

    if ($(window).scrollTop() > $(':root').css('--triangle_scroll')) {
      $(".tm-section-2-box").css('padding-top', service_box_height);
    }
    else {
      $(".tm-section-2-box").css('padding-top', triangle_padding);
    }
  });

  // Update the current year in copyright
  $('.tm-current-year').text(new Date().getFullYear());

});

// Mobile Sidebar Toggle
$(document).ready(function () {
  $(document).on('click', '.m-closesidebar', function () {
    $('.m-sidebar').css('left', '-325px');
  });
});

$(document).on('click', '.m-nevigation', function () {
  $('.m-sidebar').css('left', '0');
});

// Sidebar Toggle
$(document).ready(function () {

  $(document).ready(function () {
    $(".owl-carousel").owlCarousel();
  });

  let sidebar_open = false;
  let m_sidebar_open = false;

  $(".closesidebar").on("click", function () {
    $(".sidebar").css('right', '-302px');
    sidebar_open = false;
  });

  $(document).mouseup(function (e) {
    if ($(e.target).closest(".service-type").length === 0) {
      $(".closesidebar").click();
    }
    else if ($(e.target).closest(".sidebar").length === 0) {
      $(".closesidebar").click();
    }
  });

  $(".service-type").on("click", function (event) {

    if (sidebar_open) {
      $('.sidebar').css('right', '-302px');
      sidebar_open = false;
    } else {
      $('.sidebar').css('right', '0');
      sidebar_open = true;
    }

  });

  // mobile service sidebar toggle
  $(document).ready(function () {
    $('.m-service-closesidebar').on('click', function () {
      $('.m-service-sidebar').css('right', '-302px');
      m_sidebar_open = false;
    })

    $(document).mouseup(function (e) {
      if ($(e.target).closest(".m-service-type").length === 0) {
        $(".m-service-closesidebar").click();
      }
      else if ($(e.target).closest(".m-service-sidebar").length === 0) {
        $(".m-service-closesidebar").click();
      }
    });

    $('.m-service-type').on('click', function (event) {

      if (m_sidebar_open) {
        $('.m-service-sidebar').css('right', '-302px');
        m_sidebar_open = false;
      } else {
        $('.m-service-sidebar').css('right', '0');
        m_sidebar_open = true;
      }
    })
  })

  // service sidebar loader
  $(document).on('click', '.service-type', function (event) {

    let type = $(this).data('type');

    $('.sidebar-title-text').text(type);

    $.ajax({
      url: root_path + '/api/sidebar-ajax-load.php',
      type: 'POST',
      data: { type: type },

      success: function (data) {
        $('.sidebar-content').html(data);
      }
    })
  });
});

// mobile service sidebar loader
$(document).on('click', '.m-service-type', function (event) {

  let type = $(this).data('type');

  $('.m-sidebar-title-text').text(type);

  $.ajax({
    url: root_path + '/api/sidebar-ajax-load.php',
    type: 'POST',
    data: { type: type },

    success: function (data) {
      $('.m-sidebar-content').html(data);
    }
  })

});

/* Place Selection */
$(document).ready(function () {
  // $('.Address-selecter').select2();
  // $('select').selectpicker();
})

var x, y, z, i;

x = document.getElementsByClassName("selected")[0];

$(document).ready(function () {
  $(".select-box").on('click', function () {
    $(".option-box").toggle();
  });
});

$(".option-box").ready(function () {
  $(".options").on('click', function () {
    x.innerHTML = $(this).html();
  });
  $(".option-box").css('display', 'none');
});

/* Mobile Place Selection */
var x, y, z, i;

x = document.getElementsByClassName("m-selected")[0];

$(document).ready(function () {
  $(".m-select-box").on('click', function () {
    $(".m-option-box").toggle();
  });
});

$(".m-option-box").ready(function () {
  $(".m-options").on('click', function () {
    x.innerHTML = $(this).html();
  });
  $(".m-option-box").css('display', 'none');
});

// owl carousel
$('#offer-carousel').owlCarousel({
  nav: true,
  stagePadding: 40,
  loop: true,
  margin: 40,
  dots: false,
  responsiveClass: true,
  responsive: {
    0: {
      items: 1,
      nav: false,
      stagePadding: 18,
      loop: true,
      margin: 10
    },
    359: {
      items: 1,
      nav: false,
      stagePadding: 40,
      loop: true,
      margin: 10
    },
    400: {
      items: 1,
      nav: false,
      stagePadding: 50
    },
    600: {
      items: 1,
      nav: false,
      stagePadding: 120,
      loop: true,
      margin: 10
    },
    700: {
      items: 2,
      nav: false,
      stagePadding: 50,
      loop: true,
      margin: 10
    },
    1000: {
      items: 3,
      nav: false,
      loop: true,
      stagePadding: 50,
      loop: true,
      margin: 10
    },
    1100: {
      items: 4,
      stagePadding: 40,
      loop: true,
      margin: 20
    }
  }
})

$(document).ready(function () {
  $('.contact-button').click(function () {
    let name = $('#contact_name').val();
    let email = $('#contact_email').val();
    let subject = $('#contact_subject').val();
    let msg = $('#contact_message').val();

    $.ajax({
      url: '../api/contact/contact-ajax-message.php',
      type: 'POST',
      data: { name: name, email: email, subject: subject, msg: msg },

      success: function (data) {
        if (data != 0) {
          $('.alert-modal-body').html('Message Sent Successfully');
          $('.alert-modal').click();
        }
        else {
          alert("Failed! Try again");
        }
      }
    })
  })
})