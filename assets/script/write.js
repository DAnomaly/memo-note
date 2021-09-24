$(document).ready(function(){
    back_btn_action();
    submit_btn_action();
});

function back_btn_action() {
    $('#back-btn').click(function(){
        location.href = "../index.html";
    });
}

function submit_btn_action() {
    $('#submit_btn').click(function(){
        if($('#textarea-content').val() == '') {
            $('#textarea-content').focus();
            return false;
        }
        $('#form').submit();
    });
}
