function validate() {
    var error = [];
    $('input:text').each(function() {
        var labelId = $(this).attr('id') + "-label";
        if ($(this).val() === '') {
            $("#" + labelId).text("Required field.");
            error.push(labelId);
        } else if ($(this).val() !== '') {
            $("#" + labelId).text("");
            var index = error.indexOf(labelId);
            if (index > -1) {
                error.splice(index, 1);
            }
        }
    });
    if (error.length === 0) {
        return true;
    } else {
        return false;
    }
}

function createReviewForm(id, name) {
    var str = "<form id='view'>";
    str += "<input type='text' value='' id='" + id + "'";
    str += "class='fld " + name + "' />";
    str += "</form>";

    return str;
}


$(document).ready(function() {
    $("#btn").on('click', function(e) {
        e.preventDefault();
        if (validate()) {
            var thisUrl = $('#source').data('url');
            var thisArray = $('#source').serializeArray();
            $.post(thisUrl, thisArray, function(data) {
                // console.log(data);

                // hide add-source form
                $("#source").hide();

                // $("#right").append(createReviewForm("1", "type"));
                // // for (var key in data) {
                //     $("#view .type").val(obj.type);                    
                // }
                    
                // load and insert data into populate-data form
                var obj = jQuery.parseJSON(data);
                console.log(obj);
            });
        }
    });
});