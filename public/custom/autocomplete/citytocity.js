$(document).ready(function () {
  //Pickup Location
  var options = {
    componentRestrictions: {
      country: "ae",
    },
  };
  let locationFrom = document.getElementById("city_tocity_from");

  if (!locationFrom) {
    return;
  }
  let fromAutoComplete = new google.maps.places.Autocomplete(
    locationFrom,
    options
  );

  fromAutoComplete.addListener("place_changed", () => {
    const place = fromAutoComplete.getPlace();
    const placeSelected = !!place && !!place.geometry;

    if (!placeSelected) {
      // $("#city_tocity_from").val("");
    }

    $("#city_tocity_from")
      .siblings('input[name="is_selected"]')
      .val(placeSelected ? 1 : 0);
    // true if valid place selected
  });

  locationFrom.addEventListener("blur", () => {
    if (
      !$("#city_tocity_from").siblings('input[name="is_selected"]').val() ||
      $("#city_tocity_from").siblings('input[name="is_selected"]').val() == "0"
    ) {
      // locationFrom.value = "";
      $("#city_tocity_from").siblings('input[name="is_selected"]').val("0"); // reset for next time
    }
    // $("#city_tocity_from").siblings('input[name="is_selected"]').val("0"); // reset for next time
  });

  //Dropdown Location

  let locationTo = document.getElementById("city_tocity_to");
  if (!locationTo) {
    return;
  }
  let toAutoComplete = new google.maps.places.Autocomplete(locationTo, options);

  toAutoComplete.addListener("place_changed", () => {
    const place = toAutoComplete.getPlace();
    const placeSelected = !!place && !!place.geometry;

    if (!placeSelected) {
      // $("#city_tocity_to").val("");
    }

    $("#city_tocity_to")
      .siblings('input[name="is_selected"]')
      .val(placeSelected ? 1 : 0);
    // true if valid place selected
  });

  locationTo.addEventListener("blur", () => {
    if (
      !$("#city_tocity_to").siblings('input[name="is_selected"]').val() ||
      $("#city_tocity_to").siblings('input[name="is_selected"]').val() == "0"
    ) {
      // locationTo.value = "";
      $("#city_tocity_to").siblings('input[name="is_selected"]').val("0");
    }
    // $("#city_tocity_to").siblings('input[name="is_selected"]').val("0"); // reset for next time
  });
});
