const form = document.querySelector('form');
const submitBtn = document.querySelector('.submit-btn');
const error = document.querySelector('.error-msg');
form.addEventListener('submit', handleSubmit);
submitBtn.addEventListener('click', handleSubmit);
 
function handleSubmit(e) {
    e.preventDefault();
    FetchWeather();
  }
 
async function GetWeatherAPI(location){
  console.log(location);
   const response = await fetch (`https://api.Weatherapi.com/v1/forecast.json?key=e0d672df7939490db6d92551240805&q=${location}`
, {mode:'cors'})
 
if (response.status === 400) {
    throwErrorMsg()
  } else {
    error.style.display = 'none';
    const WeatherData = await response.json();
    console.log(WeatherData);
    const NewData = processData(WeatherData);
    DisplayData(NewData);
 
    reset()
  }
 
 
   
}
 
 
function throwErrorMsg() {
    error.style.display = 'block';
    if (error.classList.contains('fade-in')) {
      error.style.display = 'none';
      error.classList.remove('fade-in2');
      error.offsetWidth;
      error.classList.add('fade-in');
      error.style.display = 'block';
    } else {
      error.classList.add('fade-in');
    }
  }
 
 
function processData(WeatherData) {
//her skal jeg hente ut spesefikk data som jeg vil ha fra API ved å konvertere API
//URL til JSON data via en promise som lover meg at oppgaven blir gjort via
//Resolve or Reject
const DetailedData = {
    condition: WeatherData.current.condition.text,
 
    feelslike: {
        f: Math.round(WeatherData.current.feelslike_f),
        c: Math.round(WeatherData.current.feelslike_c),
    },
    currentTemp: {
      f: Math.round(WeatherData.current.temp_f),
      c: Math.round(WeatherData.current.temp_c),
    },
 
    wind: Math.round(WeatherData.current.wind_mph),
    humidity: WeatherData.current.humidity,
    location: WeatherData.location.name.toUpperCase()
}
 
 
if (WeatherData.location.country === 'United States of America') {
    DetailedData['region'] = WeatherData.location.region.toUpperCase();
  } else {
    DetailedData['region'] = WeatherData.location.country.toUpperCase();
  }
  console.log(DetailedData);
 
  return DetailedData;
}
 
 
function DisplayData(NewData) {
  //her skal jeg convertere dataen jeg henter ut fra process data (WeatherData) til
  // synlig data pÃ¥ HTML siden min
  const weatherInfo = document.getElementsByClassName('info');
  Array.from(weatherInfo).forEach((div) => {
    if (div.classList.contains('fade-in2')) {
      div.classList.remove('fade-in2');
      div.offsetWidth;
      div.classList.add('fade-in2');
    } else {
      div.classList.add('fade-in2');
    }
  });
  document.querySelector('.condition').textContent = NewData.condition;
  document.querySelector(
    '.location'
  ).textContent = `${NewData.location}, ${NewData.region}`;
  document.querySelector('.degrees').textContent = NewData.currentTemp.c;
  document.querySelector(
    '.feels-like'
  ).textContent = `FEELS LIKE: ${NewData.feelslike.c}`;
  document.querySelector('.wind-mph').textContent = `WIND: ${NewData.wind} MPH`;
  document.querySelector(
    '.humidity'
  ).textContent = `HUMIDITY: ${NewData.humidity}`;
}
 
function reset() {
  form.reset();
}
 
 
 
 
function FetchWeather(){
const input = document.querySelector('input[type="text"]');
let Inputlocation = input.value;
GetWeatherAPI(Inputlocation)
 
}