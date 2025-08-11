$(document).ready(function () {
  var options = {
    componentRestrictions: {
      country: "ae",
    },
  };
  let locationFrom = document.getElementById("byHours_from");
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
      // $("#byHours_from").val("");
    }

    $("#byHours_from")
      .siblings('input[name="is_selected"]')
      .val(placeSelected ? 1 : 0);
    // true if valid place selected
  });

  locationFrom.addEventListener("blur", () => {
    if (
      !$("#byHours_from").siblings('input[name="is_selected"]').val() ||
      $("#byHours_from").siblings('input[name="is_selected"]').val() == "0"
    ) {
      // locationFrom.value = "";
      $("#byHours_from").siblings('input[name="is_selected"]').val("0"); // reset for next time
    }
    // $("#byHours_from").siblings('input[name="is_selected"]').val("0"); // reset for next time
  });
});
