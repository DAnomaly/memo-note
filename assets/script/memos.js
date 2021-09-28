$(document).ready(function(){
    categroyForCss();
    deleteForCss();
    deleteAction();
});

// category에 class를 부여하여 CSS를 관리합니다.
function categroyForCss() {
    // 현재 Category에 클래스 now-category를 지정합니다.
    function pageLoadEvenet(){
        let searchParams = new URLSearchParams(window.location.search);
        let findId = "cat-";
        let param = "0";
        if(searchParams.has('cat')) {
            param = searchParams.get('cat');
        }
        findId = findId + param; 
        let $categoryTag = $('#' + findId);
        $categoryTag.addClass('now-category');
    };
    pageLoadEvenet();

    // category 추가 버튼의 ClickEvent
    $('#add-category-btn').click(function(){
        $('#category-add-li').toggle();
        $('.delete-category-btn').toggle();
    });

}

// category 삭제
function deleteCategory(no){
    if(no == null)
        return;
    if(!confirm("해당 카테고리의 모든 메모가 삭제됩니다!\n 정말 삭제하시겠습니까?")){
        return;
    }
    location.href = '../models/m_category_delete.php?no=' + no;
}

// 노트삭제 버튼의 활성화 조건을 부여합니다.
function deleteForCss(){
    $('#delete').hide();
    
    $('.index-check').click(function(){
        $('#delete').show();
        var isbool = false;
        $.each($('.index-check'), function (index, item){
            if($($('.index-check')[index]).is(":checked") == true){
                isbool = true;
                return false;
            }
        })
        if(!isbool)
            $('#delete').hide();
    });
    
}

// 삭제버튼 입력시
function deleteAction() {
    $('#delete').click(function(){
        $('#memos-form').attr('action','../models/m_delete.php');
        $('#memos-form').submit();
    });
}

