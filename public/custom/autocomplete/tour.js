$(document).ready(function () {
  //Pickup Location
  var options = {
    componentRestrictions: {
      country: "ae",
    },
  };
  let locationFrom = document.getElementById("cityTour_from");
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
      // $("#cityTour_from").val("");
    }

    $("#cityTour_from")
      .siblings('input[name="is_selected"]')
      .val(placeSelected ? 1 : 0);
    // true if valid place selected
  });

  locationFrom.addEventListener("blur", () => {
    if (
      !$("#cityTour_from").siblings('input[name="is_selected"]').val() ||
      $("#cityTour_from").siblings('input[name="is_selected"]').val() == "0"
    ) {
      // locationFrom.value = "";
      $("#cityTour_from").siblings('input[name="is_selected"]').val("0");
    }
    // $("#cityTour_from").siblings('input[name="is_selected"]').val("0"); // reset for next time
  });

  //Dropdown Location

  let locationTo = document.getElementById("cityTour_to");
  if (!locationTo) {
    return;
  }
  let toAutoComplete = new google.maps.places.Autocomplete(locationTo, options);

  toAutoComplete.addListener("place_changed", () => {
    const place = toAutoComplete.getPlace();
    const placeSelected = !!place && !!place.geometry;

    if (!placeSelected) {
      // $("#cityTour_to").val("");
    }

    $("#cityTour_to")
      .siblings('input[name="is_selected"]')
      .val(placeSelected ? 1 : 0);
    // true if valid place selected
  });

  locationTo.addEventListener("blur", () => {
    if (
      !$("#cityTour_to").siblings('input[name="is_selected"]').val() ||
      $("#cityTour_to").siblings('input[name="is_selected"]').val() == "0"
    ) {
      // locationTo.value = "";
      $("#cityTour_to").siblings('input[name="is_selected"]').val("0"); // reset for next time
    }
    // $("#cityTour_to").siblings('input[name="is_selected"]').val("0"); // reset for next time
  });
});
