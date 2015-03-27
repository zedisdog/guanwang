$(document).ready(function(){
    if($('#datepicker').length>0){
        $('#datepicker').datetimepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            minView:2,
            todayBtn:true,
            todayHighlight:true,
            language:'zh-CN'
        });
    }
});