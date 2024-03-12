
const Confettiful = function (el) {
  this.el = el;
  this.containerEl = null;

  this.confettiFrequency = 3;
  this.confettiColors = ["#fce18a", "#ff726d", "#b48def", "#f4306d"];
  this.confettiAnimations = ["slow", "medium", "fast"];

  this._setupElements();
  this._renderConfetti();
};

Confettiful.prototype._setupElements = function () {
  const containerEl = document.createElement("div");
  const elPosition = this.el.style.position;

  if (elPosition !== "relative" || elPosition !== "absolute") {
    this.el.style.position = "relative";
  }

  containerEl.classList.add("confetti-container");

  this.el.appendChild(containerEl);

  this.containerEl = containerEl;
};

Confettiful.prototype._renderConfetti = function () {
  this.confettiInterval = setInterval(() => {
    const confettiEl = document.createElement("div");
    const confettiSize = Math.floor(Math.random() * 3) + 7 + "px";
    const confettiBackground =
      this.confettiColors[
        Math.floor(Math.random() * this.confettiColors.length)
      ];
    const confettiLeft = Math.floor(Math.random() * this.el.offsetWidth) + "px";
    const confettiAnimation =
      this.confettiAnimations[
        Math.floor(Math.random() * this.confettiAnimations.length)
      ];

    confettiEl.classList.add(
      "confetti",
      "confetti--animation-" + confettiAnimation
    );
    confettiEl.style.left = confettiLeft;
    confettiEl.style.width = confettiSize;
    confettiEl.style.height = confettiSize;
    confettiEl.style.backgroundColor = confettiBackground;

    confettiEl.removeTimeout = setTimeout(function () {
      confettiEl.parentNode.removeChild(confettiEl);
    }, 3000);

    this.containerEl.appendChild(confettiEl);
  }, 25);
};

window.confettiful = new Confettiful(document.querySelector(".js-container"));



      
let prevScrollPos = window.pageYOffset;
const header = document.getElementById("header");

window.onscroll = () => {
    const currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
        header.style.transform = "translateY(0)";
    } else {
        header.style.transform = "translateY(-100%)";
    }

    prevScrollPos = currentScrollPos;
};

      

      

          /* Get the element you want displayed in fullscreen */
        var iframe = document.getElementById("myvideo");

$(document).on("click", "ul li", function () {
  $(this).addClass("active").siblings().removeClass("active");
});


// window.onload = function() {
//     // Get preloader element
//     var preloader = document.getElementById("preloader_container");
//     // Hide preloader
//     preloader.style.opacity = "0";
//     preloader.style.visibility = "hidden";
// }

// mobile menu

$(document).ready(function(){
 
  $("#browse_icon").click(function () {
    $("#mobile_sidebar").fadeIn();
  });
  $("#browse_icon").click(function () {
    $("#mobile_searchbar").hide();
  });
  $("#close_icon").click(function () {
    $("#mobile_sidebar").fadeOut();
    $("#mobilesearchBar").hide();
  });
  
});


$(document).ready(function () {
  $("#search_icon").click(function () {
      $("#mobilesearchBar").fadeIn();
      $(".search_data").focus();
  });
  $("#search_icon").click(function () {
      $("#sidebar").hide();
  });
  $("#close_search").click(function () {
      $("#mobilesearchBar").fadeOut();
  });
});


 $(".slider__items").slick({
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  });



const items = document.querySelectorAll(".accordion button");

function toggleAccordion() {
  const itemToggle = this.getAttribute("aria-expanded");

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute("aria-expanded", "false");
  }

  if (itemToggle == "false") {
    this.setAttribute("aria-expanded", "true");
  }
}

items.forEach((item) => item.addEventListener("click", toggleAccordion));


$(document).ready(function () {
  $("#toggle_password").click(function () {
    $("#password_change").slideToggle("fast");
  });
});

const togglePassword = document.querySelectorAll(".toggle-password");

togglePassword.forEach((icon) => {
  icon.addEventListener("click", function () {
    const target = document.querySelector(icon.getAttribute("data-target"));

    if (target.type === "password") {
      target.type = "text";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    } else {
      target.type = "password";
      icon.classList.remove("fa-eye");
      icon.classList.add("fa-eye-slash");
    }
  });
});



window.addEventListener('load', function() {
  var element = document.getElementById('bounceText');
  element.classList.add('bounceText'); // add the class on load
for (var i = 1; i <= 1000; i++) {
  
  setTimeout(function() {
    element.classList.remove('bounceText'); // remove the class after 3 seconds
    setTimeout(function() {
      element.classList.add('bounceText'); // add the class again after another 3 seconds
    }, 1000);
  }, i * 1000, i);
}
});

window.addEventListener('load', function() {
  var element = document.getElementById('interact_btn');
  element.classList.add('shake'); // add the class on load
for (var i = 1; i <= 1000; i++) {
  
  setTimeout(function() {
    element.classList.remove('shake'); // remove the class after 3 seconds
    setTimeout(function() {
      element.classList.add('shake'); // add the class again after another 3 seconds
    },1000);
  }, i * 1000, i);
}
  
});


$(document).ready(function () {
  $("#sidebar__close i").on("click", function () {
    $(".header__sidebar").css("right", "-1000px");
  });



  $("#header__notification--btn").on("click", function () {
    var z = document.getElementById("header__notification");
    if (z.style.display === "block") {
      z.style.display = "none";
    } else {
      z.style.display = "block";
    }
  });

  $("#sidebar__toggle--btn").on("click", function () {
    var y = document.getElementById("header__sidebar");
    if (y.style.right === "0px") {
      y.style.right = "-1000px";
    } else {
      y.style.right = "0";
    }
  });

  $(document).ready(function(){
    $("#header .header__sidebar").on("click", function(){
      $(".header__sidebar").css("right", "-1000px");
    })
  })
})
 





   
  // -------------------- icon slider start---------//
  $(".icon__card__items").slick({
    infinite: true,
    speed: 300,
    slidesToShow: 8,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        },
      },
      {
        breakpoint: 576,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
        },
      },
    ],
  });




let colors = ["#fff", "#e7ffff", "#f1f2f2", "#f9edff"];
function createSquare() {
  const section = document.querySelector("#square_animation");

  const square = document.createElement("label");
  let size = Math.random() * 15;
  square.style.width = 5 + size + "px";
  square.style.height = 5 + size + "px";
  let bg = colors[Math.floor(Math.random() * colors.length)];
  square.style.background = bg;
  square.style.top = Math.random() * innerHeight + "px";
  square.style.left = Math.random() * innerWidth + "px";
  section.appendChild(square);

  setTimeout(() => {
    square.remove();
  }, 5000);
}

setInterval(createSquare, 100);

  $(".open").click(function() {
  var container = $(this).parents(".topic");
  var answer = container.find(".answer");
  var trigger = container.find(".faq-t");

  answer.slideToggle(200);

  if (trigger.hasClass("faq-o")) {
    trigger.removeClass("faq-o");
  } else {
    trigger.addClass("faq-o");
  }

  if (container.hasClass("expanded")) {
    container.removeClass("expanded");
  } else {
    container.addClass("expanded");
  }
});

jQuery(document).ready(function($) {
  $('.question').each(function() {
    $(this).attr('data-search-term', $(this).text().toLowerCase() + $(this).find("ptag").text().toLowerCase());

  });

  $('.live-search-box').on('keyup', function() {

    var searchTerm = $(this).val().toLowerCase();

    $('.question').each(function() {

      if ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1) {
        $(this).parent().parent().show();
      } else {
        $(this).parent().parent().hide();
      }

    });

  });

});


// Datalayer Button

(function() {
  
    
  var button = document.getElementById("datalayer");
  button.addEventListener("click", function() {
  window.dataLayer = window.dataLayer || [];
  window.dataLayer.push({
'event': 'new_user'
});
  });
  
   
})();


//add this code in the last of u re code
jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchstart", handle, { passive: !ns.includes("noPreventDefault") });
    }
};
jQuery.event.special.touchmove = {
    setup: function( _, ns, handle ) {
        this.addEventListener("touchmove", handle, { passive: !ns.includes("noPreventDefault") });
    }
};




// tournament slider 
// =============================

// $(".tournament_slider").slick({
//   infinite: true,
//   speed: 1000,
//   slidesToShow: 1,
//   adaptiveHeight: true,
//   slidesToScroll: 1,
//   autoplay: true,
//   autoplaySpeed: 3000,
//   dots: true,
//   fade: true,
//   cssEase: 'linear',
//   pauseOnHover:false,
// });