$(document).ready(function(){

   var map = new google.maps.Map(document.getElementById('map-canvas'), {
	   scrollwheel: false,
	   disableDefaultUI: true,
       mapTypeId: google.maps.MapTypeId.ROADMAP,

			// HOW YOU WOULD LIKE TO STYLE THE MAP. 
			// THIS IS WHERE YOU WOULD PASTE ANY STYLE FOUND ON SNAZZY MAPS.
			styles: [
				{
				  "elementType": "geometry.fill",
				  "stylers": [
					{
					  "color": "#1f8a70"
					}
				  ]
				},
				{
				  "elementType": "labels.text",
				  "stylers": [
					{
					  "color": "#ffffff"
					}
				  ]
				},
				{
				  "elementType": "labels.text.stroke",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "landscape.natural",
				  "elementType": "labels",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "poi.park",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "road",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#ff7300"
					}
				  ]
				},
				{
				  "featureType": "road",
				  "elementType": "geometry.fill",
				  "stylers": [
					{
					  "color": "#ff7300"
					}
				  ]
				},
				{
				  "featureType": "road.arterial",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "road.local",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "road.local",
				  "elementType": "geometry.fill",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "road.local",
				  "elementType": "geometry.stroke",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "transit",
				  "stylers": [
					{
					  "visibility": "off"
					}
				  ]
				},
				{
				  "featureType": "water",
				  "elementType": "geometry",
				  "stylers": [
					{
					  "color": "#004344"
					}
				  ]
				}
			  ]

    });

	currentMarker = 0;

	function setMyPosition(){

		if(!!navigator.geolocation) {
		
			navigator.geolocation.getCurrentPosition(function(position) {
			
				var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			    var marker = new google.maps.Marker({
						 position: geolocate,
						 animation: google.maps.Animation.DROP,
						 map: map,
						 title: 'You are here',
						 icon: 'images/maps/you-are-here.png',
						 zIndex: 999999999
					 });
					 map.setCenter(geolocate);

			});

		} else {

			alert('No Geolocation Support.');

		}
    
	}

	function nextAds(){

		currentMarker++;

		if (currentMarker>totalMarkers){
			currentMarker=1;
		}

		while(markers[currentMarker-1].visible===false){
			currentMarker++; 
			if (currentMarker>totalMarkers){
				currentMarker=1;
			}
		}

		map.panTo(markers[currentMarker-1].getPosition());
		google.maps.event.trigger(markers[currentMarker-1], 'click');

	}

	function prevAds(){

		currentMarker--;

		if (currentMarker<1){
			currentMarker=totalMarkers;
		}

		while(markers[currentMarker-1].visible===false){
			currentMarker--; 
			if (currentMarker>totalMarkers){
				currentMarker=1;
			}
		}

		map.panTo(markers[currentMarker-1].getPosition());
		google.maps.event.trigger(markers[currentMarker-1], 'click');

	}

	function ControlSet(leftControlSet, rightControlSet, map) {

		// SET CSS FOR THE ZOOMIN
		var zoomInButton = document.createElement('div');
		zoomInElement = document.createAttribute("class");
		zoomInElement.value = "zoom-in";
		zoomInButton.setAttributeNode(zoomInElement);

		// SET CSS FOR THE ZOOMOUT
		var zoomOutButton = document.createElement('div');
		zoomOutElement = document.createAttribute("class");
		zoomOutElement.value = "zoom-out";
		zoomOutButton.setAttributeNode(zoomOutElement);

		// SET CSS FOR THE CONTROLL POSITION
		var positionButton = document.createElement('div');
		controlPositionWrapper = document.createAttribute("class");
		controlPositionWrapper.value = "set-position";
		positionButton.setAttributeNode(controlPositionWrapper);

		// SET CSS FOR THE CONTROLL POSITION
		var nextButton = document.createElement('div');
		controlPositionWrapper = document.createAttribute("class");
		controlPositionWrapper.value = "next-ads";
		nextButton.setAttributeNode(controlPositionWrapper);

		// SET CSS FOR THE CONTROLL POSITION
		var prevButton = document.createElement('div');
		controlPositionWrapper = document.createAttribute("class");
		controlPositionWrapper.value = "prev-ads";
		prevButton.setAttributeNode(controlPositionWrapper);

		// APPEND ELEMENTS
		leftControlSet.appendChild(zoomInButton);
		leftControlSet.appendChild(zoomOutButton);
		leftControlSet.appendChild(positionButton);
		rightControlSet.appendChild(prevButton);
		rightControlSet.appendChild(nextButton);

		// SETUP THE CLICK EVENT LISTENER - ZOOMIN
		google.maps.event.addDomListener(zoomInButton, 'click', function() {
			map.getZoom() <= 16 ? map.setZoom(map.getZoom() + 1) : null ;
		});

		// SETUP THE CLICK EVENT LISTENER - ZOOMOUT
		google.maps.event.addDomListener(zoomOutButton, 'click', function() {
			map.getZoom() >= 4 ? map.setZoom(map.getZoom() - 1) : null ;
		});

		// SETUP THE CLICK EVENT LISTENER - POSITION
		google.maps.event.addDomListener(positionButton, 'click', function() {
			return setMyPosition();
		});

		// SETUP THE CLICK EVENT LISTENER - PREVIOUS ADS
		google.maps.event.addDomListener(prevButton, 'click', function() {
			return prevAds();
		});

		// SETUP THE CLICK EVENT LISTENER - NEXT ADS
		google.maps.event.addDomListener(nextButton, 'click', function() {
			return nextAds();
		});

	}

  // CREATE THE DIV TO HOLD THE CONTROL AND CALL THE CONTROLSET() CONSTRUCTOR
  // PASSING IN THIS DIV.

var leftControlSet = document.createElement('div');
	leftWrapperClass = document.createAttribute("class");
	leftWrapperClass.value = "control-left-wrapper";
	leftControlSet.setAttributeNode(leftWrapperClass);

var rightControlSet = document.createElement('div');
	rightWrapperClass = document.createAttribute("class");
	rightWrapperClass.value = "control-right-wrapper";
	rightControlSet.setAttributeNode(rightWrapperClass);

    map.controls[google.maps.ControlPosition.TOP_LEFT].push(leftControlSet);
    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(rightControlSet);
    var ControlSet = new ControlSet(leftControlSet, rightControlSet, map);

    var marker, i;
    var markers = [];
	var markerCluster = null;

    $.ajaxSetup({ cache: false });
	var result = $('.find-result');

	function totalSearch(numResult){
		result.text(numResult + ' Founded').addClass('active');
	}

    $.getJSON("./ajax/marker.json", function(data){

         $.each(data, function(index, locations){

			/* ===================================================================== */


			 iconStandard = 'images/maps/' + locations.propertyType + '-pin.png';

			 marker = new google.maps.Marker({
				 position: new google.maps.LatLng(locations.lat, locations.lon),
				 map: map,
				 animation: google.maps.Animation.DROP,
				 icon: iconStandard,
				 propertyType: locations.propertyType
			 });

			/* ===================================================================== */

			google.maps.event.addListener(marker, 'mouseover', function() {
				this.setIcon('images/maps/' + locations.propertyType + '-hover-pin.png');
			});
			google.maps.event.addListener(marker, 'mouseout', function() {
				this.setIcon('images/maps/' + locations.propertyType + '-pin.png');
			});

			  // ADD MARKER TO MAPS
			  markers.push(marker);
			  google.maps.event.addListener(marker, 'click', (function(marker, i) {

					return function() {

						$('.infoBox').fadeOut(300);
						box = '<div class="property-maps">' +
								  '<a href="' + locations.url + '" class="img-container" style="background-image:url(' + locations.img + ')">' + 
									  '<span class="title">' + locations.title + '</span>' + 
							      '</a>' +
								  '<p class="details">' +
									  '<i class="fas fa-map-marker-alt primary-color"></i>' + locations.address
								  '</p>' + 
							  '</div>';

						infobox = new InfoBox({
							content: box,
							disableAutoPan: false,
							maxWidth: 150,
							pixelOffset: new google.maps.Size(-160, -382),
							zIndex: null,
							position: new google.maps.LatLng(locations.lat, locations.lon),
							boxStyle: {
								width: "330px"
							},
							closeBoxMargin: "0",
							closeBoxURL: "images/maps/close.png",
							infoBoxClearance: new google.maps.Size(1, 1)
						});
						infobox.open(map, marker);
						
						map.panTo(marker.getPosition());
					}

			  })(marker, i));

        });

		totalMarkers = markers.length;

		function autoCenter() {

			// CREATE A NEW VIEWPOINT BOUND
			var bounds = new google.maps.LatLngBounds();

			// GO THROUGH EACH...
			for(x=0; x<totalMarkers; x++) {
				bounds.extend(markers[x].position);
			}

			// FIT THESE BOUNDS TO THE MAP
			map.fitBounds(bounds);
		}

		autoCenter();

		var markerCluster = new MarkerClusterer(map, markers, {
			gridSize: 40,
			minimumClusterSize: 2,
			calculator: function(markers_list, numStyles) {
				return {
					text: markers_list.length,
					index: numStyles
				};
			}
		});

    }).error(function(jqXHR, textStatus, errorThrown){
            alert(textStatus);
    });

});