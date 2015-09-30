<<<<<<< HEAD
unction validate() {
    var error = new Array();
=======
function validate() {
    var error = [];
>>>>>>> 7a7a796be8b02dfb77e43e9059ad9cdca151f3ef
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
/*
Create form with input fields, each field declared with format:
<input type='text' value='' id='[id]' class='fld [class]' />
 */
function createInputField(inputId, inputClass, fieldName, value) {
    var str = "<tr><th><label for='";
    str += inputId + "'>" + fieldName;
    str += ": *</label></th><td>";
    str += "<input type='text' value='" + value + "' id='" + inputId + "' ";
    str += "class='fld " + inputClass + "' /> </td> </tr>";
    return str;
}

function createForm(formId, formClass) {
    var str = "<form id='" + formId + "'>";
    str += "<table class='tbl_insert' cellpadding='0' cellspacing='0' border='0'>";
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

                /* load and insert data into populate-data form */
                var form = createForm("view");
                var obj = jQuery.parseJSON(data);

                $.each(obj, function(key, value) {
                    form += createInputField(key, key, key, value);
                });
                form += "</table></form>";
                $("#right").append(form);
            });
        }
    });
});