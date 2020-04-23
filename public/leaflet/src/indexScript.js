
    var osmUrl = 'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
    osmAttrib = '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    osm = L.tileLayer(osmUrl, { maxZoom: 20, attribution: osmAttrib }),
    map = new L.Map('map', { center: new L.LatLng(15.369445, 44.191006), zoom: 9.4}),
    drawnItems = L.featureGroup().addTo(map);

var mapControl=L.control.layers({
'osm': osm.addTo(map),
"google": L.tileLayer('http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}', {
    attribution: 'google'
})
}, { 'drawlayer': drawnItems }, { position: 'bottomleft', collapsed: false }).addTo(map);







//draw on map control_____________________________________________________
map.addControl(new L.Control.Draw({
edit: {
   featureGroup: drawnItems,
   poly: {
       allowIntersection: false
   }
},
draw: {
   polygon: {
       allowIntersection: false,
       showArea: true
   }
}
}));

map.on(L.Draw.Event.CREATED, function (event) {
var layer = event.layer;

drawnItems.addLayer(layer);
});


//________________________________________________________________________

var YemenLayer;
function randomColor(){
var randColor='#'+Math.floor(Math.random()*16777215).toString(16);
return randColor;
}

//when the mouse hover
function highlightFeature(e,feature) { 	
//var stateName=feature.properties.adm1_en.toString();
    
var layer = e.target; 			
  layer.setStyle({ 				
        weight: 2,
        fillColor:'#f0f0ef' ,				
        color: '#fa8065', 				
        dashArray: '', 				
        fillOpacity: 0.1 			
     }); 		
   if (!L.Browser.ie && !L.Browser.opera) { 				
          layer.bringToFront(); 			
     } 			
 } 
//when the mouse out
function resetHighlight(e) { 			
YemenLayer.resetStyle(e.target); 			
      
} 
//when click
function zoomToFeature(e) { 			
map.fitBounds(e.target.getBounds()); 
        
} 

//applay all the events when the mouse hover
function onEachFeature(feature, layer) { 
layer.bindTooltip(feature.properties.nam_ref_ar.toString(), {
    permanent: false,
    direction: 'auto',
    sticky: true
    });
           
layer.on({ 				
    mouseover: highlightFeature, 				
    mouseout: resetHighlight, 				
    click: zoomToFeature 			
  }); 		
}

//_________________________________________________________________________
//specify the color of each state 

function getStateColor(stateName){
var rndcolor=randomColor();

        if(stateName=="Shu'aub"){
            return '#8B0000';
        }else if(stateName=="Assafi'yah"){
            return '#FF4500';
        }else if(stateName=="As Sabain"){
            return '#00CED1';
        }else if(stateName=="Old Sana'a"){
            return '#3CB371';
        } else if(stateName=="Al Wahdah"){
            return '#FFD700';
        }else if(stateName=="At Tahrir"){
            return '#20B2AA';
        }else if(stateName=="Ma'ain"){
            return '#00FFFF';
        }else if(stateName=="Arhab"){
            return '#00CED1';
        }else if(stateName=="Ath'thaorah"){
            return '#FF69B4';
        }else if(stateName=="Bani Al Harith"){
            return '#DC143C';
        }else if(stateName=="Az'zal"){
            return '#DA70D6';
        }else if(stateName=="Hamdan"){
            return '#A52A2A';
        }else if(stateName=="Nihm"){
            return '#008000';
        }else if(stateName=="Bani Hushaysh"){
            return '#483D8B';
        }else if(stateName=="Sanhan"){
            return '#0000FF';
        }else if(stateName=="Bilad Ar Rus"){
            return '#8e9088';
        }else if(stateName=="Attyal"){
            return '#2f4a7b';
        }else if(stateName=="Bani Matar"){
            return '#FF8C00';
        }else if(stateName=="Al Haymah Ad Dakhiliyah"){
            return 'rosybrown';
        }else if(stateName=="Sa'fan"){
            return '#ADFF2F';
        }else if(stateName=="Al Haymah Al Kharijiyah"){
            return '#00FF00';
        }else if(stateName=="Khwlan"){
            return '#9ACD32';
        }else if(stateName=="Manakhah"){
            return '#8B008B';
        }else if(stateName=="Bani Dhabyan"){
            return '#d34646';
        }else if(stateName=="Al Husn"){
            return '#00688B';
        }else if(stateName=="Jihanah"){
            return '#8B1C62';
        }
        else{
            return '#fbeeb8';
        }
    }


//end function

//add style to map
function yemenStyle(feature){
return{
    fillColor:getStateColor(feature.properties.name_en),
    weight:2,
    opacity:1,
    color:'white',
    dashArray:3,
    fillOpacity:0.6

}
}


//add geoJson data
YemenLayer=L.geoJson(yemen_map,{
style:yemenStyle,
onEachFeature:  onEachFeature  
}).addTo(map);


//________________________________________________________________________________

//when click to set color for each area

function setLayerColor(feature,layer){

var markerArray=[];

var rndcolor=randomColor();
//add hint on each layer
layer.bindTooltip(feature.properties.nam_ref_ar.toString(), {
    permanent: false,
    direction: 'auto',
    sticky: true
    });

    
layer.on({
    click:function (e) {
     //  map.fitBounds(e.target.getBounds());
        var layer =e.target;
        layer.setStyle(
            {
                weight:1,
                color:'red',
                dashArray:'',
                fillOpacity:0.9,
                fillColor:rndcolor
            }
        );

        //add marker when click on the target layer
        var marker=L.marker([e.latlng.lat,e.latlng.lng]).addTo(map).bindPopup(feature.properties.nam_ref_ar.toString()).openPopup();
       // layerGroup.clearLayers();
        marker.addTo(layerGroup);
        var coordinates=[marker.getLatLng().lat,marker.getLatLng().lng];
        markerArray.push(coordinates);
        
        if(!L.Browser.ie && !L.Browser.opera && !L.Browser.edge ){
           layer.bringToFront();
        }
    }
});
}

//color the areas
function getAreaColor(stateName){
var rndcolor=randomColor();
if(stateName=="Sana'a" || stateName=='Amanat Al Asimah'){
    return '#fac57c';
}
else{
    return '#fbeeb8';
}
}

//add style to map
function areaStyle(feature){
return{
    fillColor:getAreaColor(feature.properties.adm1_en),
    weight:2,
    opacity:1,
    color:'white',
    dashArray:3,
    fillOpacity:0.4

}
}

function setAreaColor(){
//add geoJson data
map.removeLayer(YemenLayer);
var area_layer;
area_layer=L.geoJson(yemen_map,{
style:areaStyle,
onEachFeature: setLayerColor    
}).addTo(map);
}



//_____________________________________________________________________
//print map


//_______________________________________________________________________



