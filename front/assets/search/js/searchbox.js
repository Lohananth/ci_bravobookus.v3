// April 2016 by Patrick God
// Visit http://patrickgod.com/facebook-like-searchbox-with-jquery/

$(document).ready(function () {
    var contacts=[];

//     var contacts = [
//     {
//         "firstName": "Peter",
//         "lastName": "Parker",
//         "heroName": "Spiderman"
//         // "imgUrl": "img/spiderman.png"
//     },
//     {
//         "firstName": "Bruce",
//         "lastName": "Banner",
//         "heroName": "Hulk"
//         // "imgUrl": "img/hulk.png"
//     }, {
//         "firstName": "Tony",
//         "lastName": "Stark",
//         "heroName": "Ironman"
//         // "imgUrl": "img/ironman.png"
//     }, {
//         "firstName": "Bruce",
//         "lastName": "Wayne",
//         "heroName": "Batman"
//         // "imgUrl": "img/batman.png"
//     }
//     ];

// var contacts = [
//     {
//         // "firstName": "Peter",
//         "country": "Cambodia",
//         "heroName": "Siem Reap"
//         // "imgUrl": "img/spiderman.png"
//     },
//     {
//         // "firstName": "Bruce",
//         "country": "Cambodia",
//         "heroName": "Battambang"
//         // "imgUrl": "img/hulk.png"
//     }, {
//         // "firstName": "Tony",
//         "country": "Cambodia",
//         "heroName": "Phnom Penhy"
//         // "imgUrl": "img/ironman.png"
//     }, {
//         // "firstName": "Bruce",
//         "country": "Cambodia",
//         "heroName": "Kompong Soum"
//         // "imgUrl": "img/batman.png"
//     },{
//         // "firstName": "Bruce",
//         "country": "Thai",
//         "heroName": "Bangkork"
//         // "imgUrl": "img/batman.png"
//     },{
//         // "firstName": "Bruce",
//         "country": "Thai",
//         "heroName": "Phatiya"
//         // "imgUrl": "img/batman.png"
//     }
//     ];

    


    for (var i = 0; i < contacts.length; i++)
    {
        // contacts[i].value = contacts[i].firstName + " " + contacts[i].lastName + " " + contacts[i].heroName;
    
        // $img='<img src="'+ contacts[i].imgUrl +'"/>';
        // if(contacts[i].heroName !="Batman"){
            contacts[i].value = contacts[i].heroName
        // }
        
    }
    
    $("#txtBusOrigin").autocomplete({
        source: contacts,
        // minLength: 0,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtBusOrigin").val(ui.item.heroName)         

            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;
            $('#txtBusDestination').focus() 
        },
    }).bind('focus', function(){ $(this).autocomplete("search");} )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");

        var BusDestination=$('#txtBusDestination').val(); //Get Value from Destination
        if(item.heroName !=BusDestination){    // Selected Item destination not show          
        $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);
        
        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.heroName + "</span>");
        $name.append(item.heroName + "<br><span class='fa fa-map-marker' style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>"+ " " + item.country + "</span>");
        $name.appendTo($outerDiv);        
        }     

        $li.appendTo(ul);
        
        return  $li;
    };


    // Destinations
    $("#txtBusDestination").autocomplete({
        source: contacts,
        minLength: 0,
        focus: function (event, ui) {
            $("#txtBusDestination").val(ui.item.heroName)

            return false;
        },
        select: function (event, ui) {
            // location.href = ui.item.imgUrl;
            // return false;
             $('#txtBusDate').focus() //set forcus to Date
        },
    }).bind('focus', function(){ $(this).autocomplete("search"); } )
    .autocomplete("instance")._renderItem = function (ul, item) {
        var $li = $("<li>");
        var BusOrigin=$('#txtBusOrigin').val(); //Get Value from Destination
        if(item.heroName !=BusOrigin){    // Selected Item destination not show 
            $li.addClass("searchItem");

        $outerDiv = $("<div>");
        $outerDiv.appendTo($li);

        // $imageDiv = $("<div>");
        // $imageDiv.addClass("contactImageDiv");
        // $imageDiv.appendTo($outerDiv);

        // $img = $("<img>");
        // $img.addClass("contactImage");
        // $img.attr("src", item.imgUrl);
        // $img.appendTo($imageDiv);

        $name = $("<div>");
        $name.addClass("nameDiv");
        // $name.append(item.firstName + " " + item.lastName + "<br/><span style='font-style:italic'>" + item.heroName + "</span>");
        $name.append(item.heroName + "<br><span style='color:green;font-style:italic; font-size:12px; padding-top:30xp;'>" + item.country + "</span>");
        
        $name.appendTo($outerDiv);


        }
        
        $li.appendTo(ul);
        return $li;

    };

})