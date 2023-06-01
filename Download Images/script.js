$(document).ready(function() {
    // if user focus out from the input field
    $("#field").on("focusout", function() {
        // getting user entered img URL
        var imgURL = $("#field").val();
        if (imgURL !== "") { // if input field isn't blank
            var regPattern = /\.(jpe?g|png|gif|bmp)$/i; // pattern to validate img extension
            if (regPattern.test(imgURL)) { // if pattern matched to image URL
                var imgTag = '<img src="' + imgURL + '" alt="">'; // creating a new img tag to show img
                $(".img-preview").append(imgTag); // appending img tag with user entered img URL
                
                // adding new classes using jQuery
                $(".preview-box").addClass("imgActive");
                $("#button").addClass("active");
                $("#field").addClass("disabled");
                
                $(".cancel-icon").on("click", function() {
                    // we'll remove all newly added classes on cancel icon click
                    $(".preview-box").removeClass("imgActive");
                    $("#button").removeClass("active");
                    $("#field").removeClass("disabled");
                    $(".img-preview img").remove();
                    // that's all in JavaScript/jQuery, now the main part is PHP
                });
            } else {
                alert("Invalid img URL - " + imgURL);
                $("#field").val(''); // if pattern not matched, we'll leave the input field blank
            }
        }
    });
});
