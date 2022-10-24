/*
 Template Name: Zoogler - Bootstrap 4 Admin Dashboard
 Author: Mannatthemes
 Website: www.mannatthemes.com
 File: Google Maps
 */

!function($) {
    "use strict";

    var GoogleMap = function() {};


    //creates map with markers
    GoogleMap.prototype.createMarkers = function($container, $lat, $lng, $city) {
        var map = new GMaps({
          div: $container,
          lat : $lat,
          lng : $lng
        });

        //sample markers, but you can pass actual marker data as function parameter
        map.addMarker({
          lat : $lat,
          lng : $lng,
          title: $city,
          details: {
            database_id: 42,
            author: 'HPNeo'
          },
          click: function(e){
            if(console.log)
              console.log(e);
            alert('You clicked in this marker');
          }
        });

        return map;
    },

   alert($('latitude').html());
    //init
    GoogleMap.prototype.init = function() {
      var $this = this;
      $(".search-input").change(function() {
        //with sample markers
        $this.createMarkers('#gmaps-markers', $('latitude').val(), $('longitude').val(), $('.location-city').val());

        
      });
    },
    //init
    $.GoogleMap = new GoogleMap, $.GoogleMap.Constructor = GoogleMap
}(window.jQuery),

//initializing 
function($) {
    "use strict";
    $.GoogleMap.init()
}(window.jQuery);