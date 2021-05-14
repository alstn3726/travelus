const weather = document.querySelector(".js-weather");
const apiId = "ead13315e61be757375f96a1fac189c4";
const COORDS = "coords";

function getWeather(lat, lng) {
  fetch(
    `https:api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=${apiId}&units=metric`
  )
    .then(function (response) {
      return response.json();
    })
    .then(function (json) {
      const currentTemp = json.main.temp;
      // const tempMin = json.main.temp_min;
      // const tempMax = json.main.temp_max;
      // const feelTemp = json.main.feels_like;
      const place = json.name;
      // const humidity = json.main.humidity;
      const currentWeather = json.weather[0].description;

      weather.innerText = `Address : ${place}
                            Weather: ${currentWeather} / ${currentTemp}℃
                             `;
    });
}

function saveCoords(coordsObj) {
  localStorage.setItem(COORDS, JSON.stringify(coordsObj));
}

function handleGeoSucces(position) {
  const latitude = position.coords.latitude;
  const longitude = position.coords.longitude;
  const coordsObj = {
    latitude,
    longitude,
  };
  saveCoords(coordsObj);
  getWeather(latitude, longitude);
}
function handleGeoError() {
  console.log("Cant access geo location");
}

function askForCoords() {
  navigator.geolocation.getCurrentPosition(handleGeoSucces, handleGeoError);
}

function loadCoords() {
  const loadedCoords = localStorage.getItem(COORDS);
  if (loadedCoords == null) {
    askForCoords();
  } else {
    const parsedCoords = JSON.parse(loadedCoords);
    getWeather(parsedCoords.latitude, parsedCoords.longitude);
  }
}
function init() {
  loadCoords();
}
init();
