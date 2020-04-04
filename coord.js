//<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
var script = document.createElement('script');
    script.type = 'text/javascript';

    script.src = 'https://unpkg.com/axios/dist/axios.min.js';
    document.body.appendChild(script);
//const axios = require('axios');
var mysql = require('mysql');

var con = mysql.createConnection({
  host: "localhost",
  user: "mysqladmin",
  password: "Duke2022",
  database: "UserLocation"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
  var sql = "update user set lon = 40.23424, lat = 31.23424 where first_name = 'jack'";
  con.query(sql, function (err, result) {
    if (err) throw err;
    console.log("1 record inserted");
  });
});


    const API = "https://maps.googleapis.com/maps/api/geocode/json?";
    const Address = "Greensboro,NC";
    const Key = "AIzaSyAm4slMQkbU4s8YC_iuVkrsQm8dKJBcLKo";
    axios.get(API, {
        params: {
            address: Address,
            key: Key,
        }
    }).then(response => {
        console.log(response);
        var lat = response.data.results[0].geometry.location.lat;
        var lng = response.data.results[0].geometry.location.lng;

        con.connect(function(err) {
          if (err) throw err;
          console.log("Connected!");
          var sql = "update user set lon =" + lng + " lat =" + lat+ "where first_name = 'sarah'";
          con.query(sql, function (err, result) {
            if (err) throw err;
            console.log("1 record inserted");
          });
        });


    }).catch(err => {
        console.log(err);
    })



//var test3 = getAddress("Greensboro","NC");
//console.log(test3);
// initialize the map
//var map = L.map('map').setView([40, -90], 1);
//var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
//var marker = L.marker(test3).addTo(map);
//map.addLayer(layer);
