https://www.googleapis.com/geolocation/v1/geolocate?key=AIzaSyA4cyJ5SqXWluPoS2To_pAZTW96Ol-KTmo
      function disable() {
          jQuery("#optionTitle").attr("disabled", "disabled");
      }

      function localisation() {
        var options = {
          enableHighAccuracy: true,
          timeout: 5000,
          maximumAge: 0
        };
        navigator.geolocation.getCurrentPosition(success, error, options);
      }

      function success(pos) {
        var crd = pos.coords;

        /*console.log('Your current position is:');
        console.log('Latitude : ' + crd.latitude);
        console.log('Longitude: ' + crd.longitude);
        console.log('More or less ' + crd.accuracy + ' meters.');*/

        jQuery.ajax({
          method: 'POST',
          url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+crd.latitude+","+crd.longitude+"&key=AIzaSyA4cyJ5SqXWluPoS2To_pAZTW96Ol-KTmo",
        }).done(function(result) {
          console.log(result);
          jQuery("#address").val(result.results[0].address_components[2].long_name);
        });

      };

      function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
      };
