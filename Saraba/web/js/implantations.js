    function myMap() {
      var SarabaAssoc = new google.maps.LatLng(48.836703,2.334345);
      var VillageWarang = new google.maps.LatLng(14.37,-16.94);
      var CenterMap = new google.maps.LatLng(33.57,-7.589);
      var mapCanvas = document.getElementById("map");
      var mapOptions = {center: CenterMap, zoom: 3};
      var map = new google.maps.Map(mapCanvas, mapOptions);
      var marker1 = new google.maps.Marker({position:SarabaAssoc});

      var marker2 = new google.maps.Marker({position:VillageWarang});

      marker1.setMap(map);
      marker2.setMap(map);

      google.maps.event.addListener(marker1,'click',function() {
      map.setZoom(10);
      map.setCenter(marker1.getPosition());
        });

        google.maps.event.addListener(marker2,'click',function() {
      map.setZoom(10);
      map.setCenter(marker2.getPosition());
      });
    };
