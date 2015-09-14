unction validate() {
    var error = new Array();
    $('input:text').each(function() {
        var labelId = $(this).attr('id') + "-label";
        if ($(this).val() == '') {
            $("#" + labelId).text("Required field.");
            error.push(labelId);
        } else if ($(this).val() != '') {
            $("#" + labelId).text("");
            var index = error.indexOf(labelId);
            if (index > -1) {
                error.splice(index, 1);
            }
        }
    });
    if (error.length == 0) {
        return true;
    } else {
        return false;
    }
}
$(document).ready(function() {
    $("#btn").on('click', function(e) {
        e.preventDefault();
        if (validate()) {
            var thisUrl = $('#source').data('url');
            var thisArray = $('#source').serializeArray();
            $.post(thisUrl, thisArray, function(data) {
                console.log(data);
            });
        }
        // window.location.href = thisUrl;
        // console.log(thisArray);
    });
});