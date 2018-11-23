
@extends('master')
<?php
//echo '<pre>',print_r($settings,true),'</pre>';die();
?>
@section('title', 'Home Page')
@section('content')
    @include('partials.home_page.slider')
    @include('partials.home_page.about',$about_section)


    <!--=============Edenmill Farm=============-->

    @include('partials.home_page.latest_products')
    @include('partials.home_page.gallery')



    <!--    <div class="ls section_padding_top_120 section_padding_bottom_100 img-holder parallax parallax1">

         <div class="container">

          <div class="row">

           <div class="col-lg-6 col-md-6 col-sm-6">

            <blockquote class="blockquote-type-2">

             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>

            </blockquote>

            <div class="blockquote-type-2__user">

             <figure class="blockquote-type-2__user-img">

              <img src="assets/images/img_user-blockquote-01.jpg" alt="">

             </figure>

             <div class="blockquote-type-2__user-info">

              <h4 class="blockquote-type-2__user-title">

               <a href="#">Francis M. Hartzell</a>

              </h4>

              <p class="blockquote-type-2__user-sub-title">Customer</p>

             </div>

            </div>

           </div>

           <div class="col-lg-6 col-md-6 col-sm-6">

            <blockquote class="blockquote-type-2">

             <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores.</p>

            </blockquote>

            <div class="blockquote-type-2__user">

             <figure class="blockquote-type-2__user-img">

              <img src="assets/images/users/img_user-01.jpg" alt="">

             </figure>

             <div class="blockquote-type-2__user-info">

              <h4 class="blockquote-type-2__user-title">

               <a href="#">Clarice C. Gray</a>

              </h4>

              <p class="blockquote-type-2__user-sub-title">Customer</p>

             </div>

            </div>

           </div>

          </div>

         </div>

        </div>-->



    <!--=============Our Up Coming Events =============-->

    <!--    <div class="ls section_padding_top_110">

         <div class="container">

          <div class="row">

           <section class="col-lg-12">

            <h2 class="title-t1 text-center">Our</h2>

            <h2 class="title-t2 text-center">Up Coming Events</h2>

           </section>

          </div>

         </div>

        </div>-->

    <!--    <div class="ls section_padding_top_55 section_padding_bottom_65 top-posts">

         <div class="container">

          <div class="row">

           <div class="col-lg-12">

            <div class="row">

             <div class="col-lg-4 col-md-4 col-sm-4 text-center">

              <div class="post">

               <figure class="post__img">

                <a href="#">

                 <img src="assets/images/edenmillfarm/b5.jpg" alt="">

                </a>

               </figure>

               <article class="post__content">

                <div class="post__meta">

                 <p class="post__meta-date">23.03.2016</p>

                 <span>by</span>

                 <a href="#" class="post__meta-autor">Admin</a>

                </div>

                <h3 class="post__title">

                 <a href="#">Lorem ipsum dolor sit consetetur</a>

                </h3>

                <p>Lorem ipsum dolor sit amet, consetetur sadipscing esed diam nonumy eirmod tempor invidunt.</p>

               </article>

               <div class="post__meta-info">

                <p class="post__meta-views">

                 <i class="rt-icon2-eye"></i>

                 <span class="post__meta-in">23,527</span>

                </p>

                <a href="#" class="post__meta-likes">

                 <i class="rt-icon2-heart-outline"></i>

                 <span class="post__meta-in">4,783</span>

                </a>

                <a href="#" class="post__meta-comments">

                 <i class="rt-icon2-message"></i>

                 <span class="post__meta-in">3,896</span>

                </a>

               </div>

              </div>

             </div>

             <div class="col-lg-4 col-md-4 col-sm-4 text-center">

              <div class="post">

               <figure class="post__img">

                <a href="#">

                 <img src="assets/images/edenmillfarm/b9.jpg" alt="">

                </a>

               </figure>

               <article class="post__content">

                <div class="post__meta">

                 <p class="post__meta-date">23.03.2016</p>

                 <span>by</span>

                 <a href="#" class="post__meta-autor">User</a>

                </div>

                <h3 class="post__title">

                 <a href="#">Sadipscing elitr sed diam nonumy</a>

                </h3>

                <p>Magna aliquyam erat, sed diam voluptua at vero eos et accusam et justo duo dolores et ea rebum.</p>

               </article>

               <div class="post__meta-info">

                <p class="post__meta-views">

                 <i class="rt-icon2-eye"></i>

                 <span class="post__meta-in">23,527</span>

                </p>

                <a href="#" class="post__meta-likes">

                 <i class="rt-icon2-heart-outline"></i>

                 <span class="post__meta-in">4,783</span>

                </a>

                <a href="#" class="post__meta-comments">

                 <i class="rt-icon2-message"></i>

                 <span class="post__meta-in">3,896</span>

                </a>

               </div>

              </div>

             </div>

             <div class="col-lg-4 col-md-4 col-sm-4 text-center">

              <div class="post">

               <figure class="post__img">

                <a href="#">

                 <img src="assets/images/edenmillfarm/b7.jpg" alt="">

                </a>

               </figure>

               <article class="post__content">

                <div class="post__meta">

                 <p class="post__meta-date">23.03.2016</p>

                 <span>by</span>

                 <a href="#" class="post__meta-autor">User</a>

                </div>

                <h3 class="post__title">

                 <a href="blog-single-right.html">Eirod tempor invidunt</a>

                </h3>

                <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet lorem.</p>

               </article>

               <div class="post__meta-info">

                <p class="post__meta-views">

                 <i class="rt-icon2-eye"></i>

                 <span class="post__meta-in">23,527</span>

                </p>

                <a href="#" class="post__meta-likes">

                 <i class="rt-icon2-heart-outline"></i>

                 <span class="post__meta-in">4,783</span>

                </a>

                <a href="#" class="post__meta-comments">

                 <i class="rt-icon2-message"></i>

                 <span class="post__meta-in">3,896</span>

                </a>

               </div>

              </div>

             </div>

            </div>

           </div>

          </div>

         </div>

        </div>-->

    {{--<div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_75 section_padding_bottom_85 parallax parallax2">

        <div class="container">

            <div class="row">

                <div class="col-lg-12">

                    <p class="parallax2__text">You like edenmill  food? Buy now!</p>

                    <p class="parallax2__sub-text">Just contact us!</p>

                    <a href="#" class="button-t1__parallax2">Purchase</a>

                </div>

            </div>

        </div>

    </div>--}}

    <!--    <div class="ls section_padding_top_110 section_padding_bottom_50">

         <div class="container">

          <div class="row">

           <section class="col-lg-12">

            <h2 class="title-t1 text-center">Our</h2>

            <h2 class="title-t2 text-center">Advantages</h2>

           </section>

          </div>

         </div>

        </div>

        <div class="ls section_padding_top_45 section_padding_bottom_95">

         <div class="container">

          <div class="row">

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t1">

             <h3 class="block_01__title">

              <a href="blog-right.html">Reputable Company</a>

             </h3>

             <p class="block_01__content">

              Lorem ipsum dolor sit amet onsetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt.

             </p>

            </div>

           </div>

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t2">

             <h3 class="block_01__title">

              <a href="blog-right.html">Free Consultations</a>

             </h3>

             <p class="block_01__content">

              Ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eoset accusam et justo duo dolores.

             </p>

            </div>

           </div>

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t3">

             <h3 class="block_01__title">

              <a href="blog-right.html">Day Scheduling</a>

             </h3>

             <p class="block_01__content">

              Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsumlor lorem ipsum dolor ipsumlor.

             </p>

            </div>

           </div>

          </div>

          <div class="row">

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t4">

             <h3 class="block_01__title">

              <a href="blog-right.html">Specialized Company</a>

             </h3>

             <p class="block_01__content">

              Consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.

             </p>

            </div>

           </div>

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t5">

             <h3 class="block_01__title">

              <a href="blog-right.html">Licensed & Insured</a>

             </h3>

             <p class="block_01__content">

              Aliquyam erat, voluptua sed diam voluptua voluptua vero eos et accusam et voluptua justo duo dolores et ea rebum.

             </p>

            </div>

           </div>

           <div class="col-lg-4 col-md-4 col-sm-4">

            <div class="block_01 block_01-t6">

             <h3 class="block_01__title">

              <a href="blog-right.html">Dependable Services</a>

             </h3>

             <p class="block_01__content">

              Stet clita kasd gubergren, no seeta seeta takimata sanctus seeta esorem ipsum dolor seeta sit amet.

             </p>

            </div>

           </div>

          </div>

         </div>

        </div>-->


   
    <div class="container page_map" style="margin: 20px auto;">
        <div id="map" class="contact-map"></div>
    </div>
   
    @if(!isset($theme['hide-home-contact_info']['value']) || $theme['hide-home-contact_info']['value'] == 1)
      
    @endif
@endsection

@section('scripts')
  <script>
      $(document).ready(function () {
          if (jQuery().flexslider) {
              var $introSlider = jQuery(".intro_section .flexslider");
              $introSlider.each(function(index){
                  // if ($introSlider.length) {
                  var $currentSlider = jQuery(this);
                  $currentSlider.flexslider({
                              animation: "{{ isset($SliderSettings['animation']['value'])?$SliderSettings['animation']['value']:'fade' }}",
                              direction: "{{ isset($SliderSettings['direction']['value'])?$SliderSettings['direction']['value']:'horizontal' }}",
                              pauseOnHover: true,
                              useCSS: true,
                              reverse: {{ isset($SliderSettings['reverse']['value'])?$SliderSettings['reverse']['value']:'false' }},
                              controlNav: false,
                              directionNav: true,
                              prevText: "Prev",
                              nextText: "Next",
                              randomize: {{ isset($SliderSettings['random']['value'])?$SliderSettings['random']['value']:'false' }},
                              smoothHeight: false,
                              slideshowSpeed:{{ isset($SliderSettings['slide-show-speed']['value'])?$SliderSettings['slide-show-speed']['value']:5000 }},
                              animationSpeed:{{ isset($SliderSettings['animation-speed']['value'])?$SliderSettings['animation-speed']['value']:600 }},
                              start: function( slider ) {
                                  slider.find('.slide_description').children().css({'visibility': 'hidden'});
                                  slider.find('.flex-active-slide .slide_description').children().each(function(index){
                                      var self = jQuery(this);
                                      var animationClass = !self.data('animation') ? 'fadeInRight' : self.data('animation');
                                      setTimeout(function(){
                                          self.addClass("animated "+animationClass);
                                      }, index*200);
                                  });
                              },
                              after :function( slider ){
                                  slider.find('.flex-active-slide .slide_description').children().each(function(index){
                                      var self = jQuery(this);
                                      var animationClass = !self.data('animation') ? 'fadeInRight' : self.data('animation');
                                      setTimeout(function(){
                                          self.addClass("animated "+animationClass);
                                      }, index*200);
                                  });
                              },
                              end :function( slider ){
                                  slider.find('.slide_description').children().each(function() {
                                      var self = jQuery(this);
                                      var animationClass = !self.data('animation') ? 'fadeInRight' : self.data('animation');
                                      self.removeClass('animated ' + animationClass).css({'visibility': 'hidden'});
                                      // jQuery(this).attr('class', '');
                                  });
                              },
                              // });
                          })
                          //wrapping nav with container
                          .find('.flex-control-nav')
                          .wrap('<div class="container nav-container"/>')
              });
              //}//eof introSlider check
              jQuery(".flexslider").each(function(index){
                  var $currentSlider = jQuery(this);
                  //exit if intro slider already activated
                  if ($currentSlider.find('.flex-active-slide').length) {
                      return;
                  }
                  $currentSlider.flexslider({
                      animation: "fade",
                      useCSS: true,
                      controlNav: true,
                      directionNav: false,
                      prevText: "",
                      nextText: "",
                      smoothHeight: false,
                      slideshowSpeed:5000,
                      animationSpeed:800,
                  })
              });
          }
      });
  </script>
        <!-- Map Scripts -->
@if(!isset($theme['hide-home-map']['value']) || $theme['hide-home-map']['value'] == 1)
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1RaWWrKsEf2xeBjiZ5hk1gannqeFxMmw"></script>
<script type="text/javascript">
    var lat;
    var lng;
    var map;
    var styles = [
        {
            "featureType": "landscape.man_made",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "{{ (isset($map['man-made-color']['value']) && !empty($map['man-made-color']['value']) && strlen(trim($map['man-made-color']['value'])) == 7)?trim($map['man-made-color']['value']):'#f7f1df' }}"
                }]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#d0e3b4"
                }]
        },
        {
            "featureType": "landscape.natural.terrain",
            "elementType": "geometry",
            "stylers": [
                {
                    "visibility": "off"
                }]
        },
        {
            "featureType": "poi",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }]
        },
        {
            "featureType": "poi.business",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }]
        },
        {
            "featureType": "poi.medical",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "#fbd3da"
                }]
        },
        {
            "featureType": "poi.park",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "{{ (isset($map['park-color']['value']) && !empty($map['park-color']['value']) && strlen(trim($map['park-color']['value'])) == 7)?trim($map['park-color']['value']):'#bde6ab' }}"
                }]
        },
        {
            "featureType": "road",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "visibility": "off"
                }]
        },
        {
            "featureType": "road",
            "elementType": "labels",
            "stylers": [
                {
                    "visibility": "off"
                }]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#ffe15f"
                }]
        },
        {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [
                {
                    "color": "{{ (isset($map['highway-color']['value']) && !empty($map['highway-color']['value']) && strlen(trim($map['highway-color']['value'])) == 7)?trim($map['highway-color']['value']):'#ffe15f' }}"
                }]
        },
        {
            "featureType": "road.arterial",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "{{ (isset($map['road-color']['value']) && !empty($map['road-color']['value']) && strlen(trim($map['road-color']['value'])) == 7)?trim($map['road-color']['value']):'#ffffff' }}"
                }]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "black"
                }]
        },
        {
            "featureType": "transit.station.airport",
            "elementType": "geometry.fill",
            "stylers": [
                {
                    "color": "#cfb2db"
                }]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [
                {
                    "color": "{{ (isset($map['water-color']['value']) && !empty($map['water-color']['value']) && strlen(trim($map['water-color']['value'])) == 7)?trim($map['water-color']['value']):'#a2daf2' }}"
                }]
        }];
    <?php
        $map_lat = "40.714224";
        $map_lng = "-73.961452";

        if(isset($map['lat']['value']) && !empty($map['lat']['value'])){
            $map_lat = $map['lat']['value'];
        }
        if(isset($map['lng']['value']) && !empty($map['lng']['value'])){
            $map_lng = $map['lng']['value'];
        }
    ?>
    jQuery.getJSON('http://maps.googleapis.com/maps/api/geocode/json?latlng={{ $map_lat }},{{ $map_lng }}', function (data)
    {
        lat = data.results[0].geometry.location.lat;
        lng = data.results[0].geometry.location.lng;
    }).complete(function ()
    {
        dxmapLoadMap();
    });
    function attachSecretMessage(marker, message)
    {
        var infowindow = new google.maps.InfoWindow(
                {
                    content: message
                });
        google.maps.event.addListener(marker, 'click', function ()
        {
            infowindow.open(map, marker);
        });
    }
    window.dxmapLoadMap = function ()
    {
        var center = new google.maps.LatLng(lat, lng);
        var settings = {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: {{ (isset($map['zoom']['value']) && !empty($map['zoom']['value'])?$map['zoom']['value']:15)  }},
            draggable: {{ (isset($map['scrollwheel']['value']) && !empty($map['scrollwheel']['value'])?$map['scrollwheel']['value']:'false')  }},
            scrollwheel: {{ (isset($map['scrollwheel']['value']) && !empty($map['scrollwheel']['value'])?$map['scrollwheel']['value']:'false')  }},
            center: center,
            styles: styles
        };
        map = new google.maps.Map(document.getElementById('map'), settings);
        var image = '{{ asset('assets/images/settings/'.(isset($map['marker']['value']) && !empty($map['marker']['value'])?$map['marker']['value']:'google_marker.png')) }}';
        var marker = new google.maps.Marker(
                {
                    position: center,
                    title: '{{ (isset($map['title']['value']) && !empty($map['title']['value'])?$map['title']['value']:'Map Title')  }}',
                    map: map,
                    icon: image
                });
        marker.setTitle('Map title'.toString());
        //type your map title and description here
        attachSecretMessage(marker, '<h3>Map title</h3><p>Map HTML description</p>');
    }
</script>
    <script>
      var map;
      function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 30.3753, lng: 69.3451},
          zoom: 6
        });
         var marker = new google.maps.Marker({
          position: myLatLng,
          map: map,
          title: 'Hello World!'
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1RaWWrKsEf2xeBjiZ5hk1gannqeFxMmw&callback=initMap"
    async defer></script>
@endif
            <!--=================Scroll with Menu================-->
    <script>

        $(document).ready(function(){

            // Add smooth scrolling to all links in navbar + footer link

            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior

                if (this.hash !== "") {

                    // Prevent default anchor click behavior

                    event.preventDefault();



                    // Store hash

                    var hash = this.hash;



                    // Using jQuery's animate() method to add smooth page scroll

                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area

                    $('html, body').animate({

                        scrollTop: $(hash).offset().top

                    }, 900, function(){



                        // Add hash (#) to URL when done scrolling (default click behavior)

                        window.location.hash = hash;

                    });

                } // End if

            });
            $(window).scroll(function() {

                $(".slideanim").each(function(){

                    var pos = $(this).offset().top;



                    var winTop = $(window).scrollTop();

                    if (pos < winTop + 600) {

                        $(this).addClass("slide");

                    }

                });

            });

        })

    </script>

    <!--=================Scroll with Menu================-->

@endsection