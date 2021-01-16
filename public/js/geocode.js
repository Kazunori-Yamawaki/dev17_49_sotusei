//****************************************************************************************
// BingMaps&BmapQuery
//****************************************************************************************
//Init
function GetMap(){
    
// マップ表示～出発地
    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    const map_dep = new Bmap("#myMap_dep");
    
    //------------------------------------------------------------------------
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);
    //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
    //--------------------------------------------------
    map_dep.startMap(34.85776616041068, 133.01720730913956, "load", 14);

    //----------------------------------------------------
    //3. Geocode(2 patterns)
    // getGeocode("searchQuery",callback);
    //----------------------------------------------------
    
    //A. Address "Seattle"
    // map.getGeocode("Shobara", function(data){
    //     console.log(data);          //Get Geocode ObjectData
    //     const lat = data.latitude;  //Get latitude
    //     const lon = data.longitude; //Get longitude
    //     document.querySelector("#geocode").innerHTML=lat+','+lon;
    // });
    
    //B.Get geocode of click location
    map_dep.onGeocode("click", function(data){
        console.log(data);                   //Get Geocode ObjectData
        const lat = data.location.latitude;  //Get latitude
        const lon = data.location.longitude; //Get longitude
        // document.querySelector("#geocode").innerHTML=lat+','+lon;
        document.querySelector("#dep_lat").value=lat;
        document.querySelector("#dep_lon").value=lon;
        
        let pin = map_dep.pin(lat, lon, "red");
    });

// マップ表示～目的地
    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    const map_des = new Bmap("#myMap_des");
    
    //------------------------------------------------------------------------
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);
    //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
    //--------------------------------------------------
    map_des.startMap(34.85776616041068, 133.01720730913956, "load", 14);

    //----------------------------------------------------
    //3. Geocode(2 patterns)
    // getGeocode("searchQuery",callback);
    //----------------------------------------------------
    
    //A. Address "Seattle"
    // map.getGeocode("Shobara", function(data){
    //     console.log(data);          //Get Geocode ObjectData
    //     const lat = data.latitude;  //Get latitude
    //     const lon = data.longitude; //Get longitude
    //     document.querySelector("#geocode").innerHTML=lat+','+lon;
    // });
    
    //B.Get geocode of click location
    map_des.onGeocode("click", function(data){
        console.log(data);                   //Get Geocode ObjectData
        const lat = data.location.latitude;  //Get latitude
        const lon = data.location.longitude; //Get longitude
        // document.querySelector("#geocode").innerHTML=lat+','+lon;
        document.querySelector("#des_lat").value=lat;
        document.querySelector("#des_lon").value=lon;
        
        let pin = map_des.pin(lat, lon, "blue");
    });

    //------------------------------------------------------------------------
    //1. Instance
    //------------------------------------------------------------------------
    const map = new Bmap("#myMap");
    
    //------------------------------------------------------------------------
    //2. Display Map
    //   startMap(lat, lon, "MapType", Zoom[1~20]);
    //   MapType:[load, aerial,canvasDark,canvasLight,birdseye,grayscale,streetside]
    //--------------------------------------------------
    map.startMap(47.6149, -122.1941, "load", 10);

}