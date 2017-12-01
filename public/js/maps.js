var map, infoWindow, geocode;

var marker_color_green = "img/green.png";
var marker_color_yellow = "img/yellow.png";

//elementi del content, valorizzate con esempi
var user = "Pippo";
var address = "Via Brecce Bianche, 46";
var bill = "50 €";
var reward = "5 €";
var n_item = "13";

var infowindow;
var x = 0
var currentMarker;
var markers = [];

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 15
    });
    infoWindow = new google.maps.InfoWindow;

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };


            infoWindow.setPosition(pos);
            infoWindow.setContent('Tu sei qui!');
            infoWindow.open(map);
            map.setCenter(pos);

            console.log("map " + map.getCenter());



        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        handleLocationError(false, infoWindow, map.getCenter());
    }
    codeAddress(addresses[x]);
}

function callback_click_marker(marker) {

    if (infowindow) {
        infowindow.close();
    }

    infowindow = new google.maps.InfoWindow({
        content: this.content
    });

    google.maps.event.addListener(infowindow, 'closeclick', function() {
        infowindow = null;
    });

    infowindow.open(map, this);


    currentMarker = this;
}

function codeAddress(address) {
    geocoder = new google.maps.Geocoder();
    var marker;
    var address;
    geocoder.geocode({
        'address': address
    }, function(results, status) {
        if (status == 'OK') {
            marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location,
                content: "<b>Utente:</b> " + user + "<br><b>Indirizzo</b>: " + address + "<br><b>N° Pezzi</b>: " + n_item + "<br><b>Scontrino</b>: " + bill + "<br><b>Ricompensa</b>: " + reward
            });
            if (x % 2 == 0) marker.setIcon(marker_color_green);
            if (x % 3 == 0) marker.setIcon(marker_color_yellow);
            markers[x] = marker;
            google.maps.event.addListener(markers[x], 'click',
                callback_click_marker);
            console.log("address " + address + " markers " + markers[x]);
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
        x++;
        if (x < addresses.length) codeAddress(addresses[x]);
    });


}

function generateRandomNumber() {
    var min = 0.0200,
        max = 0.120,
        highlightedNumber = Math.random() * (max - min) + min;

    var sign;

    if (Math.random() > 0.5) sign = 1;
    else sign = -1;

    return highlightedNumber * sign;
};

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(map);
}

function isInfoWindowOpen(infoWindow) {
    var b = typeof(infoWindow) != 'undefined' && infoWindow != null;
    return b
}