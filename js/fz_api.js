jQuery(document).ready(function($) {
        var fz = $(".fz_roundtrip");
        if (fz) {
            $(".fz_roundtrip").each(function(){
                var air_port_id = $(this).attr('id');
                var template = $(this).data("template");
                var airport = $('#'+air_port_id).html().toUpperCase();
                var surl = "http://flyzilla.com/widget/asidejson/SIN/"+airport; 
                $.ajax({
                    type: 'GET',
                    url:surl,
                    crossDomain: true,
                    contentType: "text/json; charset=utf-8",
                    dataType: "jsonp",
                    success:function(data){
                        if (data && data.response.status == 'OK') {     
                            var dest_name = data.response.destinations[0].name;
                            var dest_name_lower = dest_name.toLowerCase();
                            var dest_slug = dest_name_lower.replace(" ", "-");
                            var dest_code = data.response.destinations[0].code;
                            var dest_currency = data.response.destinations[0].currency;
                            if (dest_currency == 'SGD') {dest_currency='S$'};
                            var airlineName = data.response.destinations[0].outbound_airline;
                            var airlineLogo = data.response.destinations[0].outbound_airline_logo;
                            var fare = data.response.destinations[0].fare.replace(".00", "");                           
                            var html = '<a title="Singapore to '+dest_name+' round trip airfare by '+airlineName+' from '+dest_currency+''+fare+'" class="airport_tooltip template-inline" href="https://flyzilla.com/flight/fromto/SIN/'+airport+'/cheap-flights-from-singapore-to-'+dest_slug+'" target="_blank">\
                                        <span>SIN <img src="http://magdev.tripzilla.com/web/images/airportDirections.png" width="12px" class="airline_logo"> '+dest_code+': '+dest_currency+''+fare+'\
                                        <img class="airline_logo" src="'+airlineLogo+'"></span></a>'; 
                            if (template == 'block') {
                                var html = '<a href="https://flyzilla.com/flight/fromto/SIN/'+airport+'/cheap-flights-from-singapore-to-'+dest_slug+'" target="_blank"><div class="widget-frame"><div class="title">All-in roundtrip</div>\
                                            <div class="content"><div class="left"><span>Singapore to</span><label>'+dest_name+'</label></div>\
                                                <div class="right"><span class="from">From</span><span class="currency">'+dest_currency+'</span><label class="price">'+fare+'</label>\
                                                </div><div class="checkdates">CHECK FLIGHTS</div></div></div></a>'; 
                            };                          
                            $('#'+air_port_id).html(html);
                            $('#'+air_port_id).show();
                        };
                    },
                    error: function(xhr, status, error) {},
                });
            });
        };
    });