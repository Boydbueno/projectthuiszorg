// Todo: Place in external js file

//Make friends draggable
$(".friend").draggable({ 
    cursor: 'move',
    containment: 'document',
    revert: true 
});

//Make jobs droppable 
$('.droppableJob').droppable( {
    drop: handleDropEvent,
    hoverClass: "droppable"
});

function handleDropEvent(event, ui) {

    //Get dragged object and text
    var draggable = ui.draggable;
    var friendsName = draggable.context.innerText;
    var friendsId = draggable.context.id;

    //Add class and edit text
    $(this).addClass("active");
    $(this).find("#droppableName").text(friendsName);

    //Edit rel attribute and add friendsId to it
    var oldRel = $(this).find("a.accept").attr('rel');
    $(this).find("a.accept").attr('rel', oldRel + "-" + friendsId);
}

//Button events
$(".jobs").on( "click", "a.cancel", function(e) {
    e.preventDefault();

    //Remove the overlay
    $(this).parent().parent().removeClass("active");
});

$(".jobs").on( "click", "a.accept", function(e) {
    e.preventDefault();

    var button = $(this);

    //Change text to busy and split rel attribute
    button.html("Bezig...");
    var rel = button.attr('rel').split("-");

    var userId = rel[1];
    var jobId = rel[0];

    var url;
    var baseUrl = 'http://projectthuiszorg.dev/api/jobs/';
    var url = baseUrl + jobId + '/invite/' + userId;

    //Ajax request to execute the invite
    var inviteRequest = $.ajax({
        type: "GET",
        dataType: "text",
        url: url
    });

    //When it's done, give the user feedback
    inviteRequest.done(function(result){
        if(result == "succes"){
            button.html("Gelukt!");

            //Remove the overlay
            setTimeout(function(){
                button.parent().parent().removeClass("active");
            },2000);
        }
    });
    
    //When the request fails, give them an ugly alert!
    inviteRequest.fail(function( jqXHR, textStatus ) {
        alert( "Helaas, probeer het nogmaals: " + textStatus );
    });

});