

function getAddress(City, State) {

    const API = "https://maps.googleapis.com/maps/api/geocode/json?";
    const Address = "+" + City + ",+" + State;
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
        var lat_long = [lat,lng];
        console.log(lat_long);
        return lat_long;
        
    }).catch(err => {
        console.log(err);
    })
}