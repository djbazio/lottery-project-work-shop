$(document).ready(function () {

    var latitude = 51.5255069,
        longitude = -0.0836207,
        map_zoom = 14;

    //we define here the style of the map
    var style =  [{
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#333333"
            }]
        },
        {
            "elementType": "labels.text",
            "stylers": [{
                "color": "#999999"
            }]
        },
        {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "landscape.natural",
            "elementType": "labels",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "poi",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "poi.park",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road",
            "stylers": [{
                "color": "#2a2c2c"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "color": "#282828"
            }]
        },
        {
            "featureType": "road",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#282828"
            }]
        },
        {
            "featureType": "road.arterial",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road.local",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry.fill",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "road.local",
            "elementType": "geometry.stroke",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "transit",
            "stylers": [{
                "visibility": "off"
            }]
        },
        {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#004344"
            }]
        },
        {
            "featureType": "water",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#2b2b2b"
            }]
        }
    ]

    //set google map options
    var map_options = {
        center: new google.maps.LatLng(latitude, longitude),
        zoom: map_zoom,
        panControl: false,
        zoomControl: false,
        mapTypeControl: false,
        streetViewControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        scrollwheel: false,
        disableDefaultUI: true,
        styles: style,
    }
    //inizialize the map
    var map = new google.maps.Map(document.getElementById('map-canvas'), map_options);

});