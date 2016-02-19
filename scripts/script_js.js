function init()
{
  var autoComplete = new google.maps.places.Autocomplete(
  document.getElementById("address"), {
    types: ['(cities)'],
    componentRestrictions: {country: 'fr'}
  });
}

function controlForm() {

  var listeSpe = jQuery("#listeSpe");
  var address = jQuery("#address");

  if(listeSpe.val() == "")
  {
    var msg = "Veuillez choisir une spécialité";
    displayError("searchNav", msg)
    return false;
  }
  else if(address.val() == "")
  {
    var msg = "Veuillez renseignez une ville ou vous géolocaliser";
    displayError("searchNav", msg)
    return false;
  }
  else { return true }
}

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
  //console.warn('ERROR(' + err.code + '): ' + err.message);
  if(err.code == 1)
  {
    var msg = "votre navigateur n'autorise pas la géolocalisation <br/> modifiez les paramètres pour pouvoir utiliser cette fonction";
    displayError("searchNav", msg)
  }
};

function displayError(elemtoappend, msg) {
  var error = "<p id='errorMsg' style='color: #e74c3c'>"+msg+"</p>";
  if(jQuery("#errorMsg").length){
    jQuery("#errorMsg").remove();
    jQuery("#"+elemtoappend).append(error);
  } else {
    jQuery("#"+elemtoappend).append(error);
  }
}
