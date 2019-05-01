// JavaScript File
/* global $ */

$(document).ready(function() {

    // 3. Send files with ajax
    $('#btn').click(function(e) {
        var file = $("form input[type='file']")[0].files[0]
        var reader = new FileReader();

        reader.onload = function(e) {
            var fileBinary = reader.result;
            var fileMimeType = file.type;
            makeAjaxCall(fileBinary, fileMimeType)
        }

        reader.readAsArrayBuffer(file);
    });

    function makeAjaxCall(blob, mimeType) {
        setProgress(0);

        $.ajax({
                url: "uploadFile.php",
                type: "PUT",
                dataType: "json",
                data: blob,
                processData: false,
                contentType: false,
                mimeType: mimeType,
                cache: false,
                // This part gives up chunk progress of the file upload
                xhr: function() {
                    //upload Progress
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) {
                        xhr.upload.addEventListener('progress', function(event) {
                            var percent = 0;
                            var position = event.loaded || event.position;
                            var total = event.total;
                            if (event.lengthComputable) {
                                percent = Math.ceil(position / total * 100);
                            }
                            //update progressbar
                            setProgress(percent);
                        }, true);
                    }
                    return xhr;
                }
            })
            .done(function(data, status, xhr) {
                console.log('upload done');
                //window.location.href = "<?php echo BASE_PATH?>/assets/<?php echo $controller->group ?>";
                console.log(xhr);
                // $("#results").html(xhr.responseText)
            })
            .fail(function(xhr) {
                console.log('upload failed');
                console.log(xhr);
            })
            .always(function() {
                console.log('done processing upload');
            });
    }

    function setProgress(percent) {
        $(".progress-bar").css("width", +percent + "%");
        $(".progress-bar").text(percent + "%");
    }


    $("#test").on("click", function() {
        // alert("test")
        $.ajax({
            type: "GET",
            url: "getImages.php",
            dataType: "html",
            success: function(data, status) {
                $("#results").html("<h6> Here are the image thumbnails: Click image to zoom. </h6>");
                $("#results").append(data);
                // alert("Success!");
            },
            error: function() {
                alert("Fail!");
            }
        });
    });
    
    // $('#results').on("click", function(){
        // $(this).find('img').css("transform", "scale(1.5)");
    // })
    
   
    

});
