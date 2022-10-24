// Getting access to the DOM

let timeText = document.querySelector('.time-text');
let dateText = document.querySelector('.date-text');
let locationCity = document.querySelector('.location-city');
let locationRegion = document.querySelector('.location-region');
let locationCountry = document.querySelector('.location-country');
let weatherTempEmoji = document.querySelector('.weather-temp-emoji');
let weatherReport = document.querySelector('.weather-report');
let weatherTemp = document.querySelector('.weather-temp');
let sunrise = document.querySelector('.sunrise');
let sunset = document.querySelector('.sunset');
let userInput = document.querySelector('.search-input');
let searchIcon = document.querySelector('.search-icon');
let humidity = document.querySelector('.humidity');
let pressure = document.querySelector('.pressure');
let latitude = document.querySelector('.latitude');
let longitude = document.querySelector('.longitude');
let timeZone = document.querySelector('.timezone');
let body = document.querySelector('body');



// Input value check

let inputFormat = /^[A-Za-z ]+$/;

let inputCheckFunc = () => {
 
 if(userInput.value.match(inputFormat)){
  userInput.style.borderColor = 'white';
  searchIcon.style.borderColor = 'white';
  searchIcon.style.color = 'white';
 }
 else{
  userInput.style.borderColor = 'red';
  searchIcon.style.borderColor = 'red';
  searchIcon.style.color = 'red';
 }
 
}

userInput.onkeyup = () => inputCheckFunc();



// Render Date & Time

let time = () =>  {
    
let dateTime = new Date();
let day = dateTime.getDate();
let hours = dateTime.getHours(); 
let mins = dateTime.getMinutes();
let sec = dateTime.getSeconds();
let meridian = '';

if (hours >= 12){
 hours -= 12;
 meridian = 'PM';
}
else{
 meridian = 'AM';
}

/*if(hours < 10){
 hours = '0' + hours;
}*/
hours = hours < 10 ? `0${hours}` : hours;

/*if(mins < 10){
 mins = '0' + mins;
}*/
mins = mins < 10 ? `0${mins}` : mins;

/*if(secs < 10){
 secs = '0' + secs;
}*/
sec = sec < 10 ? `0${sec}` : sec;

timeText.textContent = `${hours}:${mins}:${sec} ${meridian}`;
dateText.textContent = dateTime.toJSON().slice(0, 10);
}

time();
setInterval(time, 1000);



// Weather emoji function

let weatherEmoji = () => {
 
 
	 if(weatherReport.textContent == 'Partly Cloudy' || weatherReport.textContent == 'Cloudy' || weatherReport.textContent == 'Mostly Cloudy' || weatherReport.textContent == 'Haze'){
	  
	  weatherTempEmoji.textContent = '☁️';
	  body.style.background = 'linear-gradient(to bottom, #B2BEB5, #36454F)';
	 }
	 
	 else if (weatherReport.textContent == 'Sunny' || weatherReport.textContent == 'Mostly Sunny' || weatherReport.textContent == 'Partly Sunny' || weatherReport.textContent == 'Sunshine'){
	  
	  weatherTempEmoji.textContent = '☀️';
	  body.style.background = 'linear-gradient( to top right, #FFBC11, #FF9D1F, #FF7E2E, #FF6352)';
	 }
	 
	 else if(weatherReport.textContent == 'Showers' || weatherReport.textContent == 'Rainfall' || weatherReport.textContent == 'Rainy' || weatherReport.textContent == 'Thunderstorms' || weatherReport.textContent == 'Drizzle' || weatherReport.textContent == 'Rainstorm') {
	  
	  weatherTempEmoji.textContent = '🌧️';
	  body.style.background = 'linear-gradient(to bottom left, #B2BEB5, #36454F)';
	 }
	 
	 else{
	  
	  weatherTempEmoji.textContent = '🌤️';
	  body.style.background = 'linear-gradient(to top left, #5800FF, #0096FF, #00D7FF)';
	 }
 
}


// API FETCH FUNCTION

let weatherFunc = () => {

const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '98fccc5bf3msh947408d124ab174p1c4fbajsn77f7604b3592',
		'X-RapidAPI-Host': 'yahoo-weather5.p.rapidapi.com'
	}
};

fetch(`https://yahoo-weather5.p.rapidapi.com/weather?location=${userInput.value}&format=json&u=c`, options)
	.then(response => response.json())
	.then(response => { 
	 console.log(response);
	 
	 // The weather info in the API were stored as objects in an array. The various info are extracted from the object key-value pair...Eg...The 'sunrise' data is gotten from the object key-value pair current_observation >> astronomy >> sunrise...
	 
	 
//	 console.log(response.current_observation.astronomy.sunrise);
	 sunrise.textContent = response.current_observation.astronomy.sunrise;
	 
//	 console.log(response.current_observation.astronomy.sunset);
	 sunset.textContent = response.current_observation.astronomy.sunset;
	 
//	 console.log(response.current_observation.condition.temperature);
	 weatherTemp.textContent = `${response.current_observation.condition.temperature}°c`;
	 
//	 console.log(response.current_observation.condition.text);
	 weatherReport.textContent = response.current_observation.condition.text;
	 
// console.log(response.current_observation.atmosphere.pressure);
	 pressure.textContent = response.current_observation.atmosphere.pressure;
	 
	// console.log(response.current_observation.atmosphere.humidity);
	 humidity.textContent = response.current_observation.atmosphere.humidity;
	 
//	 console.log(response.location.timezone_id);
	 timeZone.textContent = response.location.timezone_id;
	 
//	 console.log(response.location.lat);
	 latitude.textContent = response.location.lat;
	 
//	 console.log(response.location.long);
	 longitude.textContent = response.location.long;
	 
	// console.log(response.location.country);
	 locationCountry.textContent = response.location.country;
	 
//	 console.log(response.location.region);
	 locationRegion.textContent = response.location.region;
	 
	// console.log(response.location.city);
	 locationCity.textContent = response.location.city;
	 

	 weatherEmoji();
	 empezar();
     insertar();
     cargardata();
     cargardataciudad()
	})
	
	.catch(err => console.error(err));

}


// Search Icon Onclick

function  insertar(){
    $.ajax({
            type:"ajax",
            url: '/historial',
            type: 'POST',
            data: {city: locationCity.textContent,
                country:locationCountry.textContent,
                lat:latitude.textContent,
                long:longitude.textContent,
                region:locationRegion.textContent,
                timezone_id:timeZone.textContent,
                temperature:weatherTemp.textContent,
                text:weatherReport.textContent,
                sunrise:sunrise.textContent,
                sunset:sunset.textContent,
                humidity:humidity.textContent,
                pressure:pressure.textContent,
                _token: "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(data){
                console.log(data);
            },
            error: function(){
                console.log(data);
            },
    })
}
let iniciar = () => {
    var mapOptions = {
        center: new google.maps.LatLng(latitude.textContent, longitude.textContent),
        zoom: 10,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"),mapOptions);
}


let empezar = () => {

	iniciar();
}


// Updating the DOM with the weather report of the user's location.

let userLocationSuccess = (position) => {
 
 //console.log(position.coords.latitude);
 //console.log(navigator.geolocation);

 const options = {
	method: 'GET',
	headers: {
		'X-RapidAPI-Key': '98fccc5bf3msh947408d124ab174p1c4fbajsn77f7604b3592',
		'X-RapidAPI-Host': 'yahoo-weather5.p.rapidapi.com'
	}
};

fetch(`https://yahoo-weather5.p.rapidapi.com/weather?lat=${position.coords.latitude}&long=${position.coords.longitude}&format=json&u=f`, options)
	.then(response => response.json())
	.then(response => {
	 
	 console.log(response)
	 
	 locationCity.textContent = response.location.city;
	 locationRegion.textContent = response.location.region;
	 locationCountry.textContent = response.location.country;
	 weatherTemp.textContent = `${response.current_observation.condition.temperature}°c`;
	 weatherReport.textContent = response.current_observation.condition.text;
	 sunset.textContent = response.current_observation.astronomy.sunset;
	 sunrise.textContent = response.current_observation.astronomy.sunrise;
	 longitude.textContent = response.location.long;
	 latitude.textContent = response.location.lat;
	 humidity.textContent = response.current_observation.atmosphere.humidity;
	 timeZone.textContent = response.location.timezone_id;
	 pressure.textContent = response.current_observation.atmosphere.pressure;
	 
	 weatherEmoji();
	 empezar();
	})
	.catch(err => console.error(err));
 
}

let userLocationError = (error) => {
 console.log(error);
}

function cargardata(){
    $.ajax({
        type: "GET",
        url: '/indexciudades',
        dataType: "JSON",
        success: function(data){
            console.log(data);
            $("#datos-log").html("");
            for(var i=0; i<11; i++){
                
                var tr = `<div class="entry" >
                <div class="title">
                    <h6>`+data[i].city+`</h6>
                </div>
                <div class="body">
                <p>Humedad consultada: `+data[i].humidity+` fecha: `+data[i].created_at+`</p>
                </div>`;
                $("#datos-log").append(tr)
            }
        }
    });
}
function cargardataciudad(){
    $.ajax({
        type: "GET",
        url: '/cargardataciudad',
        dataType: "JSON",
        success: function(data){
            console.log(data);
            $("#tablaciudades").html("");
            for(var i=0; i<11; i++){
                
                var tr = `<tr>
                            <td class="border-top-0">
                                <div class="media">
                                    <div class="media-body ml-2">
                                        <p class="mb-0">`+data[i].city+` </p>
                                    </div>
                                </div>                                                                            
                            </td> 
                            <td class="border-top-0 text-right">
                                <a href="#" class="btn btn-light btn-sm"><i class=" mr-2 text-success"></i>`+data[i].total+`</a>
                            </td>                                                                        
                        </tr>`;   


                $("#tablaciudades").append(tr)
            }
        }
    });
}
body.onload = () => {
cargardata();
cargardataciudad()
navigator.geolocation.getCurrentPosition(userLocationSuccess, userLocationError);

}
		
      
  
