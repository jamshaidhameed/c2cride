<div class="modal fade gerenric-popup"  id="reschedule_popup" tabindex="-1" aria-labelledby="reschedule_popup" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="reschedule-popup">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Enter time and date</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="reschedule-content">
                            <div class="rsd-row">
                                <div class="rsd-filed">
{{--                                    <div class="rsd-icon"><img src="images/date_icon.svg" alt=""></div>--}}
                                    <input type="date" class="rsd-input ride_date" placeholder="Ride Date">
                                </div>
                                <div class="rsd-filed">
{{--                                    <div class="rsd-icon"><img src="images/time_icon.svg" alt=""></div>--}}
                                    <input type="time" class="rsd-input ride_time" placeholder="Time">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="reschedule_btn">Reschedule</button>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
