function initializeTimePicker() {
  const hoursOptions = [];
  for (let hour = 1; hour <= 12; hour++) {
    hoursOptions.push(hour < 10 ? "0" + hour : hour);
  }

  const minutesOptions = [];
  for (let minute = 0; minute < 60; minute++) {
    minutesOptions.push(minute < 10 ? "0" + minute : minute);
  }

  const amPmOptions = ["AM", "PM"];

  $(".time-picker-container").each(function () {
    const $container = $(this);
    const $input = $container.find(".time-picker-input");
    const $hoursList = $container.find(".time-picker-hours .time-picker-list");
    const $minutesList = $container.find(
      ".time-picker-minutes .time-picker-list"
    );
    const $amPmList = $container.find(".time-picker-am-pm .time-picker-list");
    const $dropdowns = $container.find(".time-picker-dropdowns");

    $hoursList.empty();
    $minutesList.empty();
    $amPmList.empty();

    hoursOptions.forEach(function (hour) {
      $hoursList.append("<li>" + hour + "</li>");
    });

    minutesOptions.forEach(function (minute) {
      $minutesList.append("<li>" + minute + "</li>");
    });

    amPmOptions.forEach(function (amPm) {
      $amPmList.append("<li>" + amPm + "</li>");
    });

    $input.on("focus", function (e) {
      $dropdowns.show();
      if ($(this).val() == "") {
        setCurrentTime();
      }
    });

    $(document).on("click", function (event) {
      if (!$(event.target).closest($container).length) {
        $dropdowns.hide();
      }
    });

    $container.find(".time-picker-list").on("click", function (event) {
      event.stopPropagation();
    });

    let selectedTime = { hour: "", minute: "", amPm: "" };

    $hoursList.on("click", "li", function () {
      selectedTime.hour = $(this).text();
      $(this).addClass("active").siblings().removeClass("active");
      updateInputValue();
    });

    $minutesList.on("click", "li", function () {
      selectedTime.minute = $(this).text();
      $(this).addClass("active").siblings().removeClass("active");
      updateInputValue();
    });

    $amPmList.on("click", "li", function () {
      selectedTime.amPm = $(this).text();
      $(this).addClass("active").siblings().removeClass("active");
      updateInputValue();
    });

    function updateInputValue() {
      if (selectedTime.hour && selectedTime.minute && selectedTime.amPm) {
        const timeString =
          selectedTime.hour +
          ":" +
          selectedTime.minute +
          " " +
          selectedTime.amPm;

        $input.val(timeString);
      }
    }

    function setCurrentTime() {
      const currentTime = new Date();

      const currentDay = currentTime.getDate();
      const currentHours = currentTime.getHours();
      const currentMinutes = currentTime.getMinutes();

      currentTime.setMinutes(currentTime.getMinutes() + 15);
      let hours = currentTime.getHours();
      let minutes = currentTime.getMinutes();

      let amPm = hours >= 12 ? "PM" : "AM";
      if (hours > 12) hours -= 12;
      if (hours === 0) hours = 12;

      const currentHour = hours < 10 ? "0" + hours : hours;
      const currentMinute = minutes < 10 ? "0" + minutes : minutes;

      if (
        currentTime.getDate() !== currentDay ||
        currentTime.getHours() < currentHours ||
        (currentTime.getHours() === currentHours &&
          currentTime.getMinutes() < currentMinutes)
      ) {
        let tomorrow = new Date();
        tomorrow.setDate(tomorrow.getDate() + 1);
        $(".ride-date").datepicker("setDate", tomorrow);
      }

      $hoursList.find("li").each(function () {
        if ($(this).text() === currentHour) {
          $(this).addClass("active").siblings().removeClass("active");
        }
      });

      $minutesList.find("li").each(function () {
        const liText = $(this).text().trim();

        if (liText == currentMinute) {
          $(this).addClass("active").siblings().removeClass("active");
        }
      });

      $amPmList.find("li").each(function () {
        if ($(this).text() === amPm) {
          $(this).addClass("active").siblings().removeClass("active");
        }
      });

      selectedTime = { hour: currentHour, minute: currentMinute, amPm: amPm };
      updateInputValue();
    }
    setCurrentTime();
  });
}

$(document).ready(function () {
  initializeTimePicker();
});
