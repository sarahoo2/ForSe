
    //Navigation
    $("a[data-tab-destination]").on('click', function() {
            var tab = $(this).attr('data-tab-destination');
            $("#"+tab).click();
        });
    //End Navigation


    //image upload Jquery filter
        $(document).ready(function() {
         $('#filer_input').filer();
    });
    //End image upload Jquery filter


    //Jquery  image viewer
    $(document).ready(function () {
                $('#divId ').on({
                    mouseover: function () {
                        $(this).css({
                            'cursor': 'hand',
                            'border-Color': 'red'
                        });
                    },
                    mouseout: function () {
                        $(this).css({
                            'cursor': 'default',
                            'border-Color': 'grey'
                        });
                    },
                    click: function () {
                        var imageURL = $(this).attr('src');
                        $('#mainImage').fadeOut(1000, function () {
                            $(this).attr('src', imageURL);
                        }).fadeIn(1000);
                    }
                });
            });
    // Jquery image viewer end


// rotate image
var angle = 0, img = document.getElementById('mainImage');
document.getElementById('buttonR').onclick = function() {
  
    angle = (angle+90)%360;
    img.className = "rotate"+angle;
}
// emd
