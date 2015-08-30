var adminObject = {
        
        /* MAJORS IN ADD PAGE */

        addMajorInAdd : function(thisIdentity) {
            "use strict";
            $(document).on('click', thisIdentity, function(e) {
               e.preventDefault();
                var lastRow = $('#majors tr:last');
                var lastRowId = lastRow.data('id');
                var newRowId = lastRowId + 1;
                var newRow = lastRow.clone();
                newRow.attr('id', 'row' + newRowId);
                newRow.attr('data-id', newRowId);
                newRow.find('td:eq(4) a').attr('data-id', newRowId);
                newRow.insertAfter(lastRow);
            });
        },

        removeMajorInAdd : function (thisIdentity) {
            "use strict";
            $(document).on('click', thisIdentity, function(e) {
                var rowCount = $('#majors tr').length;
                if(rowCount > 2) {
                    e.preventDefault();
                    var thisObj = $(this);
                    var removeId = $(thisObj).data('id');
                    var rowId = "row" + removeId;
                    $('#' + rowId).remove();
                }
                 
            });
        },
        
        /* MAJORS IN LIST PAGE*/
        
        confirmRemoveMajor : function(thisIdentity) {
            $(document).on('click', thisIdentity, function(e) {
                e.preventDefault();
                var thisObj = $(this);
                var thisParent = thisObj.closest('tr');
                var thisId = thisParent.attr('id').split('-')[1];
                var thisURL = thisObj.data('url')+ thisId;
                if ($('#clickRemove-' + thisId).length === 0) {
                    thisParent.before(adminObject.removeMajorTemplate(thisId, thisURL));
                } 
            });
        },
        
        removeMajorTemplate : function(id, url) {
            "use strict";
            var thisTemp = '<tr id="clickRemove-' + id + '">';
            thisTemp += '<td colspan="5" class="br_td">';
            thisTemp += '<div class="fl_r">';
            thisTemp += '<a href="#" data-url="' + url;
            thisTemp += '" class="removeMajorInList mrr5">Yes</a> | ';
            thisTemp += '<a href="#" class="clickRemoveRowConfirm">No</a>';
            thisTemp += '</div>';
            thisTemp += '<span class="warn">Are you sure you wish to remove this major?<br />';
            thisTemp += 'This action CANNOT be reversed!</span>';
            thisTemp += '</td>';
            thisTemp += '</tr>';
            return thisTemp;
        },
        
        removeMajorInList : function(thisIdentity) {
            $(document).on('click', thisIdentity, function(e) {
                e.preventDefault();
                var thisObj = $(this);
                var thisId = thisObj.closest('tr').attr('id').split('-')[1];
                var thisURL = thisObj.data('url');
                $.getJSON(thisURL, function(data) {
                    if (data) {
                        $('#major-' + thisId).remove(); // remove row
                        thisObj.closest('tr').remove(); // remove confirmation message                        
                    } 
                }); 
            });
        },

        clickRemoveRowConfirm : function (thisIdentity) {
            "use strict";
            $(document).on('click', thisIdentity, function(e) {
                e.preventDefault();
                $(this).closest('tr').remove(); 
            });
        },

        editInRow : function(thisIdentity) {
            $(document).on('click', thisIdentity, function(e) {
                e.preventDefault();
                var thisObj = $(this);
                var thisId = thisObj.closest('tr').attr('id').split('-')[1];
                var thisRow = thisObj.closest('tr');
                var thisName = thisRow.find('td:eq(0)');
                var val = thisName.html();
                thisName.replaceWith('<input type="text" value="' + val + '" class="fld box" data-edit="1"/>');
                // thisName.contentEditable = "true";
            });
        },

        updateMajor : function() {
            console.log('update major');
        },

        updateMajorEnter : function(thisIdentity) {
                $(document).on('keypress', function(e) {
                    var code = e.keyCode ? e.keyCode : e.which;
                    if (code == 13) {
                        adminObject.updateMajor();
                        // console.log("enter");
                    }
                });
                //$(thisIdentity).bind('focusout', updateMajor);
        }

    }

    $(function() {
        "use strict";
        
        /* ADD MAJOR PAGE */
        adminObject.addMajorInAdd('.addMajorInAdd');
        adminObject.removeMajorInAdd('.removeMajorInAdd');
        
        /* LIST MAJOR PAGE */
        adminObject.confirmRemoveMajor('.confirmRemoveMajor');
        adminObject.clickRemoveRowConfirm('.clickRemoveRowConfirm');
        adminObject.removeMajorInList('.removeMajorInList');
        adminObject.editInRow('.editInRow');

        adminObject.updateMajorEnter('.box');

    })


