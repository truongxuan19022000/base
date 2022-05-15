function submitbutton(pressbutton, type) {
    submitform(pressbutton, type);
}

function submitform(pressbutton, type) {
    // change task
    if (type == 0 || type == undefined)
        if (pressbutton != undefined)
            document.adminForm.task.value = pressbutton;

    // change action form
    if (type == 1)
        document.adminForm.action = pressbutton;

    if (typeof document.adminForm.onsubmit == "function") {
        document.adminForm.onsubmit();
    }
    document.adminForm.submit();
}

var admin_form_boxchecked = 0;

function checkAll(n, fldName) {
    if (!fldName) {
        fldName = 'cb';
    }
    if (!n) {
        n = $(".cb-element").length;
    }
    var f = document.adminForm;
    var c = f.toggle.checked;
    var n2 = 0;
    for (i = 0; i < n; i++) {
        cb = eval('f.' + fldName + '' + i);
        if (cb) {
            cb.checked = c;
            n2++;
        }
    }
    if (c) {
        admin_form_boxchecked = n2;
    } else {
        admin_form_boxchecked = 0;
    }
    return true;
}

function isChecked(isitchecked) {
    if (isitchecked == true) {
        admin_form_boxchecked++;
    }
    else {
        admin_form_boxchecked--;
    }

    let n = $(".cb-element").length;
    if (admin_form_boxchecked == n) {
        $(".checkall-element").attr('checked', true);
    } else {
        $(".checkall-element").removeAttr('checked');
    }
}

$(document).ready(function () {

    $('.btn-delete-many').click(function () {
        if (admin_form_boxchecked == 0) {
            alert('Please select one or more item to delete!');
        }
        else {
            let action = $(this).data('rel');
            document.adminForm.method = 'POST';
            document.adminForm.action = action;
            document.adminForm.submit();
        }
    });

    $('.btn-delete-one').click(function () {
        let action = $(this).data('rel');
        document.adminForm._method.value = 'DELETE';
        document.adminForm.action = action;
        document.adminForm.submit();
    });
    
    $('.btn-save-form').click(function () {
        document.adminForm.submit();
    });

    checkAlertTime()

});

function checkAlertTime() {
    if ($(".alert").length) {
        $(".alert").each(function (stt, el) {
            var time_close = $(el).attr("data-time-close");
            if (time_close != undefined && isNaN(time_close) == false) {
                time_close = parseInt(time_close);
                setTimeout(function () {
                    $(el).fadeOut('slow', function () { $(this).remove(); });
                }, time_close);
            }
        });
    }
}
