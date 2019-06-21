(function($) {

    /*
     *  render_map
     *
     *  This function will render a Google Map onto the selected jQuery element
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$el (jQuery element)
     *  @return	n/a
     */

    function render_map( $el ) {

// var
        var $markers = $el.find('.marker');

// vars

        var args = {
            zoom		                : 16,
            center		                : new google.maps.LatLng(0, 0),
            mapTypeId	                : google.maps.MapTypeId.ROADMAP,
            scrollwheel                 : false,

            mapTypeControl              : true,
            mapTypeControlOptions: {
                style                   : google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                position                : google.maps.ControlPosition.TOP_LEFT
            },

            zoomControl                 : true,
            zoomControlOptions: {
                style                   : google.maps.ZoomControlStyle.SMALL,
                position                : google.maps.ControlPosition.RIGHT_CENTER
            },
            
            //styles: []
		    //styles: [{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]}]
		                
           styles: [{featureType: 'all',stylers: [{ saturation: -80 }]},{featureType: 'road.arterial',elementType: 'geometry',stylers: [{ hue: '#00ffee' },{ saturation: 50 }]},{featureType: 'poi.business',elementType: 'labels',stylers: [{ visibility: 'off' }]}]           
           
        };


// create map
        var map = new google.maps.Map( $el[0], args);

// add a markers reference
        map.markers = [];


// add markers
        $markers.each(function(){

            add_marker( $(this), map );

        });

// center map
        center_map( map );


    }

// create info window outside of each - then tell that singular infowindow to swap content based on click
    var infowindow = new google.maps.InfoWindow({
        content		: ''
    });

    /*
     *  add_marker
     *
     *  This function will add a marker to the selected Google Map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	$marker (jQuery element)
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function add_marker( $marker, map ) {

        // var
        var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );


        var $listImage = $marker.attr('data-icon');

        // create marker
        var marker = new google.maps.Marker({
            position	: latlng,
            map			: map,
            icon            : '/wp-content/themes/tkmulti/img/pin.png',
            //icon        : $listImage
        });

        // add to array
        map.markers.push( marker );

        // if marker contains HTML, add it to an infoWindow
        if( $marker.html() )
        {

            // show info window when marker is clicked & close other markers
            google.maps.event.addListener(marker, 'click', function() {
                //swap content of that singular infowindow
                infowindow.setContent($marker.html());
                infowindow.open(map, marker);
            });

            // close info window when map is clicked
            google.maps.event.addListener(map, 'click', function(event) {
                if (infowindow) {
                    infowindow.close(); }
            });


        }

    }

    /*
     *  center_map
     *
     *  This function will center the map, showing all markers attached to this map
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	4.3.0
     *
     *  @param	map (Google Map object)
     *  @return	n/a
     */

    function center_map( map ) {

// vars
        var bounds = new google.maps.LatLngBounds();

// loop through all markers and create bounds
        $.each( map.markers, function( i, marker ){

            var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

            bounds.extend( latlng );

        });

// only 1 marker?
        if( map.markers.length == 1 )
        {
            // set center of map
            map.setCenter( bounds.getCenter() );
            map.setZoom( 14 );
        }
        else
        {
            // fit to bounds
            //map.fitBounds( bounds );
            map.setCenter( bounds.getCenter() );
            map.setZoom( 14 );            
        }

    }

    /*
     *  document ready
     *
     *  This function will render each map when the document is ready (page has loaded)
     *
     *  @type	function
     *  @date	8/11/2013
     *  @since	5.0.0
     *
     *  @param	n/a
     *  @return	n/a
     */

    $(document).ready(function(){

        $('.google-acfmap').each(function(){

            render_map( $(this) );

        });

    });

})(jQuery);