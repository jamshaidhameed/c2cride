<div class="rides_form">
    <input type="hidden" name="step_one_url" value="{{ route('rides.step.one') }}">
    <input type="hidden" name="rides_csrf_token" value="{{ csrf_token() }}">
    <input type="hidden" name="ride_type_id" value="1">
    <input type="hidden" name="is_return_ride" value="0">
    <div class="form_row">
        <div class="form_cell">
            <div class="form_field">
                <input type="text" name="rides_from" id="city_tocity_from"
                    class="floating-input autocomplete-input"
                    placeholder="Enter Pick Up Location" />
                    <input type="hidden" name="is_selected" value="">
                <label class="floating-label">From</label>
                <i class="field_icon"><svg width="21" height="21"
                        viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.4995 11.7491C12.0073 11.7491 13.2295 10.5268 13.2295 9.01906C13.2295 7.51133 12.0073 6.28906 10.4995 6.28906C8.99179 6.28906 7.76953 7.51133 7.76953 9.01906C7.76953 10.5268 8.99179 11.7491 10.4995 11.7491Z"
                            stroke="#8D8D8D" stroke-width="1.3125" />
                        <path
                            d="M3.16749 7.42875C4.89124 -0.148748 16.1175 -0.139998 17.8325 7.4375C18.8387 11.8825 16.0737 15.645 13.65 17.9725C11.8912 19.67 9.10874 19.67 7.34124 17.9725C4.92624 15.645 2.16124 11.8738 3.16749 7.42875Z"
                            stroke="#8D8D8D" stroke-width="1.3125" />
                    </svg>
                </i>
            </div>
        </div>
    </div>
    <div class="form_row">
        <div class="form_cell">
            <div class="form_field">
                <input type="text" name="rides_to"  id="city_tocity_to" 
                    class="floating-input autocomplete-input destination"
                    placeholder="Enter drop off location" />
                    <input type="hidden" name="is_selected" value="">
                <label class="floating-label">To</label>
                <i class="field_icon"><svg width="21" height="21"
                        viewBox="0 0 21 21" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.4995 11.7491C12.0073 11.7491 13.2295 10.5268 13.2295 9.01906C13.2295 7.51133 12.0073 6.28906 10.4995 6.28906C8.99179 6.28906 7.76953 7.51133 7.76953 9.01906C7.76953 10.5268 8.99179 11.7491 10.4995 11.7491Z"
                            stroke="#8D8D8D" stroke-width="1.3125" />
                        <path
                            d="M3.16749 7.42875C4.89124 -0.148748 16.1175 -0.139998 17.8325 7.4375C18.8387 11.8825 16.0737 15.645 13.65 17.9725C11.8912 19.67 9.10874 19.67 7.34124 17.9725C4.92624 15.645 2.16124 11.8738 3.16749 7.42875Z"
                            stroke="#8D8D8D" stroke-width="1.3125" />
                    </svg>
                </i>
            </div>
        </div>
    </div>

    <div class="form_row">
        <div class="form_cell cellCol50">
            <div class="form_field">

                <input type="text" name="rides_date"
                    class="floating-input datepicker ride-date" readonly
                    placeholder="Pickup Date" />
                <label class="floating-label">Pickup Date</label>
                <i class="field_icon"> <svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8 2V5" stroke="#8D8D8D" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M16 2V5" stroke="#8D8D8D" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M3.5 9.08984H20.5" stroke="#8D8D8D"
                            stroke-width="1.5" stroke-miterlimit="10"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path
                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                            stroke="#8D8D8D" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M11.9955 13.6992H12.0045" stroke="#8D8D8D"
                            stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8.29431 13.6992H8.30329" stroke="#8D8D8D"
                            stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M8.29431 16.6992H8.30329" stroke="#8D8D8D"
                            stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </i>
            </div>
        </div>
        <div class="form_cell cellCol50">
            <div class="form_field time-picker-container">
                <input type="text" name="rides_time" readonly
                    class="floating-input time-picker-input"
                    placeholder="Pickup Time" />
                <label class="floating-label">Pickup Time</label>
                <i class="field_icon"><svg width="24" height="24"
                        viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z"
                            stroke="#8D8D8D" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M12 8V13" stroke="#8D8D8D" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M9 2H15" stroke="#8D8D8D" stroke-width="1.5"
                            stroke-miterlimit="10" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </svg>
                </i>
                <div class="time-picker-dropdowns">
                    <div class="time-picker-hours">
                        <ul class="time-picker-list">
                            <!-- Hour options will be dynamically generated  from customTimePicker.js-->
                        </ul>
                    </div>
                    <div class="time-picker-minutes">
                        <ul class="time-picker-list">
                            <!-- Minute options will be dynamically generated  from customTimePicker.js-->
                        </ul>
                    </div>
                    <div class="time-picker-am-pm">
                        <ul class="time-picker-list">
                            <!-- AM/PM options will be dynamically generated  from customTimePicker.js-->
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="has_return_btn">
        <div class="form_row">
            <div class="form_cell">
                <div
                    class="all_btn outlined_green_btn btn_large flexible icon_btn justify_content_between uppercase search_return_plan_btn">
                    <i><svg width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.07006 4.59891C2.87006 1.13891 8.08006 1.13891 8.87006 4.59891C9.34006 6.62891 8.05006 8.34891 6.93006 9.41891C6.11006 10.1989 4.82006 10.1889 4.00006 9.41891C2.89006 8.34891 1.60006 6.62891 2.07006 4.59891Z"
                                stroke="#0FA85B" stroke-width="1.5" />
                            <path
                                d="M15.07 16.5989C15.87 13.1389 21.11 13.1389 21.91 16.5989C22.38 18.6289 21.09 20.3489 19.96 21.4189C19.14 22.1989 17.84 22.1889 17.02 21.4189C15.89 20.3489 14.6 18.6289 15.07 16.5989Z"
                                stroke="#0FA85B" stroke-width="1.5" />
                            <path
                                d="M12.0002 5H14.6802C16.5302 5 17.3902 7.29 16.0002 8.51L8.01019 15.5C6.62019 16.71 7.48019 19 9.32019 19H12.0002"
                                stroke="#0FA85B" stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5.48622 5.5H5.49777" stroke="#0FA85B"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M18.4862 17.5H18.4978" stroke="#0FA85B"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                    <span class="mr_auto">Get <b>15% </b> Off on Return Ride!</span>
                    <div class="tootip_infosearch_return_plan_btn">
                        <i>
                            {{-- <svg width="25" height="25" viewBox="0 0 18 18"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.99935 13.3346C10.2077 13.3346 12.8327 10.7096 12.8327 7.5013C12.8327 4.29297 10.2077 1.66797 6.99935 1.66797C3.79102 1.66797 1.16602 4.29297 1.16602 7.5013C1.16602 10.7096 3.79102 13.3346 6.99935 13.3346Z"
                                    stroke="#0FA85B" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M6.99957 8.29297V8.17049C6.99957 7.77382 7.24458 7.56381 7.48958 7.39465C7.72875 7.23131 7.96789 7.02132 7.96789 6.63632C7.96789 6.09966 7.53623 5.66797 6.99957 5.66797C6.4629 5.66797 6.03125 6.09966 6.03125 6.63632"
                                    stroke="#0FA85B" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                
                            </svg> --}}

                            <svg width="25" height="25" viewBox="0 0 18 18" 
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <!-- Circle -->
                                <circle cx="9" cy="9" r="8" stroke="#0FA85B" stroke-width="1.5" fill="none"/>

                                <!-- Plus sign -->
                                <line x1="9" y1="5" x2="9" y2="13" stroke="#0FA85B" stroke-width="1.5" />
                                <line x1="5" y1="9" x2="13" y2="9" stroke="#0FA85B" stroke-width="1.5" />
                            </svg>


                        </i>
                        {{-- <div class="tooltiptext tooltipRight">Add return and get <b>10% </b> discount!</div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="has_return_fields">
        <div class="form_row">
            <div class="form_cell cellCol50">
                <div class="form_field">
                    <input type="text" name="rides_return_date"
                        class="floating-input datepicker" readonly
                        placeholder="Pickup Date" />
                    <label class="floating-label">Pickup Date</label>
                    <i class="field_icon"> <svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 2V5" stroke="#8D8D8D" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M16 2V5" stroke="#8D8D8D"
                                stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M3.5 9.08984H20.5" stroke="#8D8D8D"
                                stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                stroke="#8D8D8D" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M11.9955 13.6992H12.0045" stroke="#8D8D8D"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8.29431 13.6992H8.30329" stroke="#8D8D8D"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M8.29431 16.6992H8.30329" stroke="#8D8D8D"
                                stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                </div>
            </div>
            <div class="form_cell cellCol50">
                <div class="form_field time-picker-container">
                    <input type="text" name="rides_return_time" class="floating-input time-picker-input" placeHolder="Pickup Time" value="" readonly/>
                    <label class="floating-label">Pickup Time</label>
                    <i class="field_icon"><svg width="24" height="24"
                            viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20.75 13.25C20.75 18.08 16.83 22 12 22C7.17 22 3.25 18.08 3.25 13.25C3.25 8.42 7.17 4.5 12 4.5C16.83 4.5 20.75 8.42 20.75 13.25Z"
                                stroke="#8D8D8D" stroke-width="1.5"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M12 8V13" stroke="#8D8D8D"
                                stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M9 2H15" stroke="#8D8D8D"
                                stroke-width="1.5" stroke-miterlimit="10"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                    <div class="time-picker-dropdowns">
                        <div class="time-picker-hours">
                            <ul class="time-picker-list">
                                <!-- Hour options will be dynamically generated  from customTimePicker.js-->
                            </ul>
                        </div>
                        <div class="time-picker-minutes">
                            <ul class="time-picker-list">
                                <!-- Minute options will be dynamically generated  from customTimePicker.js-->
                            </ul>
                        </div>
                        <div class="time-picker-am-pm">
                            <ul class="time-picker-list">
                                <!-- AM/PM options will be dynamically generated  from customTimePicker.js-->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <a href="javascript:void(0)" class="addReturnCloseBtn">
                <i>
                    <svg width="26" height="26" viewBox="0 0 26 26" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.78418 17.2162L17.2152 8.78516"
                            stroke="#EEEEEE" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M17.2152 17.2162L8.78418 8.78516"
                            stroke="#EEEEEE" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </i>
            </a>
        </div>
    </div>
    <div class="form_row">
        <div class="form_cell">
            <div class="passengers_fieldBox">
                <div class="form_field disabledFieldDropdownShow">
                    <input type="text" class="floating-input total-sum"
                        placeholder="Select Passengers" />

                    <label class="floating-label">Passengers</label>

                    <i class="field_icon">
                        <svg width="22" height="22" viewBox="0 0 22 22"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M11.1468 9.96286C11.0552 9.9537 10.9452 9.9537 10.8443 9.96286C8.66268 9.88953 6.93018 8.10203 6.93018 5.90203C6.93018 3.6562 8.74518 1.83203 11.0002 1.83203C13.246 1.83203 15.0702 3.6562 15.0702 5.90203C15.061 8.10203 13.3285 9.88953 11.1468 9.96286Z"
                                stroke="#8D8D8D" stroke-width="1.375"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path
                                d="M6.56316 13.348C4.34483 14.833 4.34483 17.253 6.56316 18.7288C9.084 20.4155 13.2182 20.4155 15.739 18.7288C17.9573 17.2438 17.9573 14.8238 15.739 13.348C13.2273 11.6705 9.09316 11.6705 6.56316 13.348Z"
                                stroke="#8D8D8D" stroke-width="1.375"
                                stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                    <i class="field_icon field_icon_right"> <svg width="20"
                            height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16.5999 7.45703L11.1666 12.8904C10.5249 13.532 9.4749 13.532 8.83324 12.8904L3.3999 7.45703"
                                stroke="#8D8D8D" stroke-width="1.5"
                                stroke-miterlimit="10" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </i>
                </div>
                <!-- increament popup box -->
                <div class="customDropdownBox">
                    <div class="adults_box_main">
                        <div class="adults_row">
                            <div class="adults_info">
                                <h4>Adults</h4>
                                <p>+12 years</p>
                            </div>

                            <div class="adults_fields">
                                <div class="increment-box">
                                    <button class="decrement">-</button>
                                    <input type="number" name="adults"
                                        class="floating-input number-input"
                                        placeholder="0" value="" min="0">
                                    <button class="increment">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="adults_row">
                            <div class="adults_info">
                                <h4>Children</h4>
                                <p>2-12 years</p>
                            </div>

                            <div class="adults_fields">
                                <div class="increment-box">
                                    <button class="decrement">-</button>
                                    <input type="number" name="children" 
                                        class="floating-input number-input"
                                        placeholder="0" value="" min="0">
                                    <button class="increment">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="adults_row">
                            <div class="adults_info">
                                <h4>Infants</h4>
                                <p>0-2 years</p>
                            </div>

                            <div class="adults_fields">
                                <div class="increment-box">
                                    <button class="decrement">-</button>
                                    <input type="number" name="infants"
                                        class="floating-input number-input"
                                        placeholder="0" value="" min="0">
                                    <button class="increment">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form_row">
        <div class="form_cell padb-0">
            <a
                class="all_btn  btn_large flexible icon_btn justify_content_between uppercase rides_search_btn btn-check-ride-fare">
                <span class="mr_auto">CHECK FARE</span>
            </a>
        </div>
    </div>
</div>