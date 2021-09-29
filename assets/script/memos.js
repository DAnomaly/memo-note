$(document).ready(function(){
    getCategory();
    getMemos();
});

function getCategory() {
    $.ajax({
        type: "GET",
        url: "../models/getCategory.php",
        dataType: "json",
        success: function(data) {
            // 성공 log 출력
            console.log("success: getCategory()")
            console.log(data);
            let $ul = $('#category-ul');
            $.each(data, function(index, item){
                let $a = $('<a>')
                            .text(item.CATEGORY_NAME)
                            .attr('data-no',item.CATEGORY_NO)
                            .attr('data-sort',item.CATEGORY_SORT);
                $('<li>').appendTo($ul).append($a);
            })

        },
        error: function(xhr, status, errMessage) {
            // 에러 log 출력
            console.log('error: getCategory() \n'
                      + 'errMessage: ' + errMessage + "\n"
                      + 'status: ' + status);
        }
    })
}

function getMemos() {

}