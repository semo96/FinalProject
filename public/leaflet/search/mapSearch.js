  
  
    function formatJSON(rawjson) {	//callback that remap fields name
        var json = {},
          key, loc, disp = [];
          
        for(var i in rawjson)
        {	
          disp = rawjson[i].display_name.split(',');	
    
          key = disp[0] +', '+ disp[1];
          
          loc = L.latLng( rawjson[i].lat, rawjson[i].lon );
          
          json[ key ]= loc;	//key,value format
        }
        
        return json;
      }
          
      var mobileOpts = {
        url: 'http://nominatim.openstreetmap.org/search?format=json&q={s}',
        jsonpParam: 'json_callback',
        formatData: formatJSON,		
        textPlaceholder: 'Search...',
        autoType: false,
        tipAutoSubmit: true,
        autoCollapse: false,
        autoCollapseTime: 20000,
        delayType: 800,	//with mobile device typing is more slow
        marker: {
          icon: true
        }		
      };
      
      map.addControl( new L.Control.Search(mobileOpts) );
      //view source of search.php for more details
      
      map.addControl(new L.Control.Zoom());
      