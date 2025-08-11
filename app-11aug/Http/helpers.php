<?php

function generateBookingNumber($source, $destination, $car, $rideType, $way)
{
    try {
        $source_array = explode('-', $source);
        $source_city = count($source_array) > 2 ? trim($source_array[count($source_array) - 2]) : $source_array[0];

        $source_number = 0;
        $source_cities = [
            'khor fakkan' => 1,
            'abu dhabi' => 2,
            'al ain' => 3,
            'dubai' => 4,
            'ajman' => 5,
            'sharjah' => 6,
            'ras al khaimah' => 7,
            'umm al quwain' => 8,
            'fujairah' => 9
        ];
        $source_number = $source_cities[strtolower($source_city)];

        $destination_array = explode('-', $destination);
        $destination_city = count($destination_array) > 2 ? trim($destination_array[count($destination_array) - 2]) : $destination_array[0];

        $destination_number = 0;
        $destination_cities = [
            'khor fakkan' => 1,
            'abu dhabi' => 2,
            'al ain' => 3,
            'dubai' => 4,
            'ajman' => 5,
            'sharjah' => 6,
            'ras al khaimah' => 7,
            'umm al quwain' => 8,
            'fujairah' => 9
        ];
        $destination_number = !empty($destination_cities[strtolower($destination_city)]) ? $destination_cities[strtolower($destination_city)] : 1;

        // $destination_number = $destination_city;

        //check car type
        $car_types = [
            'economy' => 1,
            'comfort' => 2,
            'business' => 3,
            'suv' => 4,
            'ex-suv' => 5
        ];
        $car_type = strtolower($car);

        //check ride type
        $ride_types = [
            'city' => [
                '1' => 1,
                '2' => 2
            ],
            'airport' => [
                '1' => 3,
                '2' => 4
            ]
        ];
        $ride_type = strtolower($rideType);

        //C2C or airport
        $city_airport = ($rideType === 'city') ? 1 : 2;

        $four_digit_code = mt_rand(100000000,999999999);
        // getFourDigitCode();

        return $source_number . $destination_number .  $city_airport . $four_digit_code;
    } catch (Exception $e) {
        // Handle any potential exceptions here
        // Return a default value or a similar code
        return mt_rand(100000000,999999999);
    }
}

function getFourDigitCode()
{
    $characters = '1234567890';
    $random = array(); //remember to declare $pass as an array
    $characterLength = strlen($characters) - 1; //put the length -1 in cache
    for ($i = 0; $i < 4; $i++) {
        $n = rand(0, $characterLength);
        $random[] = $characters[$n];
    }
    $code = implode($random); //turn the array into a string
    return $code; //turn the array into a string
}

function getRideStatus($ride)
{

    $status = '';
    if ($ride->status === 1) {
        $status = 'Completed';
    } else if ($ride->status === 2) {
        $status = 'Pending';
    } else if ($ride->status === 3) {
        $status = 'Cancelled';
    } else if ($ride->status === 4) {
        $status = 'Confirmed';
    }else if($ride->status == 5){
        $status = 'Assigned';
    }else if($ride->status == 6){
        $status = 'Driver enroute';
    }else if($ride->status == 7){
        $status = 'Driver at Location';
    }else if($ride->status == 8){
        $status = 'En route to Drop off';
    }

    return $status;
}
function currenyformat($amount)
{
    return number_format($amount, 2);
}

 function weekintodays($weeks){
    return 7*$weeks;
}

if (!function_exists('send_email')) {
    function send_email($to_email, $subject, $template, $data)
    {
//         dd($to_email);
        Mail::send($template, ['user' => $data], function ($message) use ($subject, $to_email) {
            $message->to($to_email, $subject)->subject($subject);
            $message->from('support@c2crides.com', $subject);
        });
    }
}
function sendmail($to, $subject, $message, $from = 'info@2minutespsychology.com')
{
//    dd($to);
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From: ' . $from . "\r\n";
    $headers .= 'Reply-To: ' . $from . "\r\n";
    $headers .= 'X-Mailer: PHP/' . phpversion();
    @mail($to, $subject, $message, $headers);
}

function return_discount($return_price){
    $discount_rate = 90 / 100;
    $original_price = $return_price * $discount_rate;
    return $original_price;
}

function isThisAirportRide($source, $destination) {
    if (isAirportRide($source) || isAirportRide($destination) ||
        stripos($destination, 'terminal') !== false ||
        stripos($destination, 'airport') !== false) {
        return true;
    }
    return false;
}

function isAirportRide($inputString) {
  $airport_arr = ["airport","مطار","飞机场","飛機場","aéroport","Flughafen","हवाई अड्डा","空港","공항","aeroporto","аэропорт","aeropuerto","havalimanı","bandara","paliparan","luchthaven","aeroporto","lotnisko","aeroport","аеропорт","αεροδρόμιο","letiště","letisko","repülőtér","flygplats","flyplassen","lufthavn","lentokenttä","lennujaam","lidosta","oro uostas","օդանավակայան","hava limanı","aeroport","аэропорт","lapangan terbang","garoonka diyaaradaha","isikhumulo sezindiza","papa ọkọ ofurufu","kwisikhululo senqwelomoya","filin jirgin sama","lughawe","aerodrom","аеродром","zračna luka","letališče","aeroporti","аеродром","летище","аэрапорт","flugvöllur","aerfort","maes awyr","port-adhair","aireportua","aeroport","aeroporto","ajruport","taunga rererangi","malaevaalele","waqavuka e na rairai","fare rererere","kahua mokulele","flughaveno","aeroportus","havalimanı","hava limanı","howa menzili","aeroport","аэропорт","аеропорт","аэрапорт","нисэх онгоцны буудал","lapangan terbang","bandara","paliparan","bandara","bandara","seranam-piaramanidina","uwanja wa ndege","garoonka diyaaradaha","buufata xiyyaaraa","isikhumulo sezindiza","kwisikhululo senqwelomoya","papa ọkọ ofurufu","ọdụ ụgbọ elu","filin jirgin sama","ndege dzendege","lughawe","boemafofane","boema-fofane","eyapoti","seranam-piaramanidina","taunga rererangi","malaevaalele","waqavuka e na rairai","fare rererere","kahua mokulele","flughaveno","aeroportus","Terminal 1","المحطة 1","航站楼1","航廈1","Terminal 1","Terminal 1","टर्मिनल 1","ターミナル1","터미널 1","Terminal 1","Терминал 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Термінал 1","Τερματικό 1","Terminál 1","Terminál 1","Terminál 1","Terminal 1","Terminal 1","Terminal 1","Terminaali 1","Terminal 1","Terminālis 1","Terminalas 1","Տերմինալ 1","Terminal 1","Terminal 1","Терминал 1","Terminal 1","Terminal 1","Isiteshi 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminali 1","Терминал 1","Терминал 1","Тэрмінал 1","Flugstöð 1","Críochfort 1","Terfynell 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Terminal 1","Tauranga 1","Terminal 1","Terminal 1","Terminal 1","Kahua 1","Terminalo 1","Terminalis 1","Terminal 2","المحطة 2","航站楼2","航廈2","Terminal 2","Terminal 2","टर्मिनल 2","ターミナル2","터미널 2","Terminal 2","Терминал 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Термінал 2","Τερματικό 2","Terminál 2","Terminál 2","Terminál 2","Terminal 2","Terminal 2","Terminal 2","Terminaali 2","Terminal 2","Terminālis 2","Terminalas 2","Տերմինալ 2","Terminal 2","Terminal 2","Терминал 2","Terminal 2","Terminal 2","Isiteshi 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminali 2","Терминал 2","Терминал 2","Тэрмінал 2","Flugstöð 2","Críochfort 2","Terfynell 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Terminal 2","Tauranga 2","Terminal 2","Terminal 2","Terminal 2","Kahua 2","Terminalo 2","Terminalis 2","Terminal 3","المحطة 3","航站楼3","航廈3","Terminal 3","Terminal 3","टर्मिनल 3","ターミナル3","터미널 3","Terminal 3","Терминал 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Термінал 3","Τερματικό 3","Terminál 3","Terminál 3","Terminál 3","Terminal 3","Terminal 3","Terminal 3","Terminaali 3","Terminal 3","Terminālis 3","Terminalas 3","Տերմինալ 3","Terminal 3","Terminal 3","Терминал 3","Terminal 3","Terminal 3","Isiteshi 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminali 3","Терминал 3","Терминал 3","Тэрмінал 3","Flugstöð 3","Críochfort 3","Terfynell 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Terminal 3","Tauranga 3","Terminal 3","Terminal 3","Terminal 3","Kahua 3","Terminalo 3","Terminalis 3", "Arrival","الوصول","到达","抵達","Arrivée","Ankunft","आगमन","到着","도착","Chegada","Прибытие","Llegada","Varış","Kedatangan","Pagdating","Aankomst","Arrivo","Przylot","Sosire","Прибуття","Άφιξη","Přílet","Príchod","Érkezés","Ankomst","Ankomst","Ankomst","Saapuminen","Saabumine","Ierašanās","Atvykimas","Ժամանում","Gəliş","Kelish","Келүү","Ketibaan","Imaansho","Ukufika","Wọle","Ukufika","Zuwa","Aankoms","Dolazak","Dolazak","Dolazak","Prihod","Mbërritje","Пристигнување","Пристигане","Прыбыццё","Komuhalli","Teacht","Cyrraedd","Ruighinn","Iristea","Arribada","Chegada","Wasla","Taenga","Taunuu","Yaco","Taeraa","Hoʻea","Alveno","Adventus","Departure","المغادرة","出发","出發","Départ","Abflug","प्रस्थान","出発","출발","Partida","Отправление","Salida","Kalkış","Keberangkatan","Pag-alis","Vertrek","Partenza","Odlot","Plecare","Відправлення","Αναχώρηση","Odlet","Odchod","Indulás","Avgång","Avgang","Afgang","Lähtö","Väljumine","Izlidošana","Išvykimas","Մեկնում","Gediş","Ketish","Учуп кетүү","Berlepas","Bixitaan","Ukuhamba","Ijinna","Ukuhamba","Tafiya","Vertrek","Odlazak","Odlazak","Odlazak","Odhod","Nisje","Заминување","Заминаване","Ад’езд","Brottför","Imeacht","Gadael","Falbh","Irteera","Sortida","Saída","Tluq","Haerenga","Malaga","Biubiu","Haere atu","Haʻalele","Foriro","Discessus"];

  $matchedWords = array_filter($airport_arr, function($word) use ($inputString) {
    return str_contains(strtolower($inputString), strtolower($word));
    });
    
  return count($matchedWords) > 0 ? true : false;
}

function isIncludeDAndA($source){

    $airport_arr = [""];
}

function currencies(){

    if (!empty(\Illuminate\Support\Facades\Session::get("currency_list"))) {
        
        return \Illuminate\Support\Facades\Session::get("currency_list");
    }
    $response = Http::get('https://cdn.jsdelivr.net/npm/@fawazahmed0/currency-api@latest/v1/currencies/aed.json');
    
    if ($response->ok()) {
        $rates = $response->json()['aed'];  // All exchange rates based on USD

        \Illuminate\Support\Facades\Session::put("currency_list",$rates);
        return $rates;
    }else{

        return [];
    }

    return ['error' => 'Could not fetch exchange rates'];
}

function currency_format($amount){
    $currencies = currencies();
    $symbol = '';

    if (count($currencies) > 0) {
          
        $code = !empty(\Illuminate\Support\Facades\Session::get("currency")) ? strtolower(\Illuminate\Support\Facades\Session::get("currency")) : 'aed';

        $change_rate = $currencies[$code] ?? 0;
        $changed_rate = number_format($change_rate * (float) $amount,2);

        if ($change_rate == 0) {
            
            $change_rate = number_format($amount,2);
        }

        if ($code == 'eur') {
            $symbol = '€';
        }elseif ($code == 'usd') {
            
            $symbol = '$';
        }
        elseif ($code == 'gbp') {
            
            $symbol = '£';
        }
        elseif ($code == 'aed') {
            
            $symbol = 'د.إ';
        }
        elseif ($code == 'sar') {
            
            $symbol = 'ر.س';
        }

        
        // $return_price .=" ".$changed_rate;

        return strtoupper($code)." ".$changed_rate." ".$symbol;
    }
}

function calculate_distance($source, $destination)
    {
        try {

            // https://maps.googleapis.com/maps/api/distancematrix/json
            
            $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'origins' => $source,
            'destinations' => $destination,
            'departure_time' => 'now',
            'traffic_model' => 'best_guess',
            'mode' => 'driving',
            'units' => 'metric',
            'avoidHighways' => false,
            'avoidTolls' => false,
            'key' => 'AIzaSyAjb2hexnJxmJNktoaBX5cdvk12GKdzwMY', // Your Google Maps API Key
        ]);

        if ($response->successful()) {
            $data = $response->json();

            if ($data['status'] === 'OK') {
                foreach ($data['rows'] as $row) {
                    foreach ($row['elements'] as $element) {
                        if ($element['status'] === 'OK') {
                            $distance = $element['distance']['text'] ?? '0 km';
                            $duration = $element['duration']['text'] ?? '0 mins';


                            // Extract numerical value from distance
                            $distanceValue = (float) explode(' ', $distance)[0];

                            return [
                                'distance' => $distanceValue,
                                'duration' => $duration,
                            ];
                        }
                    }
                }
            }
        }

        return response()->json(['error' => 'Unable to calculate distance'], 422);

        } catch (\Throwable $th) {
            
            // return ['distance' => 0,'duration' => ''];
            return null;
        }
    }

//Calculate pricing for normal ride
function rides_pricing($car_type,$distance,$airportRide){
  
    $base_price = $car_type->fixed_price;
    $ride_amount = 0;

    if ($distance <= 20) {
        $ride_amount = $base_price;
    }elseif ($distance > 20 && $distance <= 30) {
        
        $ride_amount = $distance * $car_type->above_twenty;
    }elseif ($distance > 30 && $distance <= 50) {
        
        $ride_amount = $distance * $car_type->above_thirty;
    }
    elseif ($distance > 50 && $distance <= 70) {
        
        $ride_amount = $distance * $car_type->above_fifty;
    }elseif ($distance > 70 && $distance <= 100) {
        
        $ride_amount = $distance * $car_type->above_seventy;
    }elseif ($distance > 100 && $distance <= 130) {
        
        $ride_amount = $distance * $car_type->above_hundred;
    }elseif ($distance > 130) {
        
        $ride_amount = $distance * $car_type->above_hundred_thirty;
    }

    if ($ride_amount < $car_type->fixed_price) {
        
        $ride_amount = $car_type->fixed_price;
    }

    if ($airportRide) {
        
        $ride_amount += $car_type->ariport_additional;
    }

    return $ride_amount;
}

//Calculate Hourly Ride Pricing
function hourly_pricing($ride_pricing,$car_id,$hours){

    $ride_price = 0;
    $calculated_kms = 0;

    

    if ($ride_pricing->hourly_price) {
        
        if ($hours == 1) {
            $ride_price =$ride_pricing->hourly_price;
            $calculated_kms = 40;
        } elseif ($hours == 2 ) {
            
           $ride_price =$ride_pricing->hourly_price + ($ride_pricing->increment * ($hours -1));
           $calculated_kms = 80; 
        }else{

            $ride_price =$ride_pricing->hourly_price + ($ride_pricing->increment * ($hours -1));
            $calculated_kms = $ride_pricing->km * $hours + 20; 
        }
    }

    return ['ride_price' =>$ride_price,'kms' => $calculated_kms];
}

function citytour_pricing($ride_pricing,$hours){

    $ride_price = 0;
    
    if ($hours == 5) {
            
        $ride_price = $ride_pricing->five_hour_price;
    }else{
         $ride_price = $ride_pricing->ten_hour_price;
    }

    return $ride_price;
    


}

//Duration to minates

function convertToMinutes($timeString) {
    preg_match('/(\d+)\s*hour/', $timeString, $hours);
    preg_match('/(\d+)\s*minute/', $timeString, $minutes);

    $totalMinutes = 0;
    if (!empty($hours[1])) {
        $totalMinutes += $hours[1] * 60;
    }
    if (!empty($minutes[1])) {
        $totalMinutes += $minutes[1];
    }

    return $totalMinutes;
}


