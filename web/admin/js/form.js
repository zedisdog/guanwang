$(document).ready(function(){
    $('input[type="submit"]').click(function(){
        if(check()){
            if(typeof editor != 'undefined'){
                editor.sync();
            }
            form = $('form').eq(0);
            $.ajax({
                type:'post',
                async:false,
                url:form.attr('action'),
                dataType:'json',
                data:form.serialize(),
                success:function(data){
                    $('#myModal').find('.modal-title').html('系统消息窗');
                    if(data.status=='ok'){
                        $('#myModal').find('.modal-msg').html('提交成功！');
                        $('#myModal').modal('show');
                        $('#myModal').on('hidden.bs.modal', function (e) {
                            location.href=form.attr('rel');
                        })
                    }else if(data.status=='error'){
                        $.each(data.data,function(index,item){
                            input = $('[name="'+index+'"]');
                            input.parent().addClass('has-error');
                            input.siblings('.error-msg').html(item);
                        });
                    }else{
                        $('#myModal').find('.modal-msg').html('提交失败！');
                        $('#myModal').modal('show');
                    }
                }
            });
        }else{
            $('input').blur(function(){
                check();
            });
            $('select').change(function(){
                check();
            });
        }
        return false;
    });
});

var check = function(){
    if(typeof editor != 'undefined'){
        editor.sync();
    }
    var flag = false;
    var form = $('form').eq(0);
    var url = form.attr('action').replace('-save','-validate');
    $.ajax({
        type:'post',
        async:false,
        url: url,
        dataType:'json',
        data:form.serialize(),
        success:function(data){
            $('.has-error').removeClass('has-error');
            $('.error-msg').html('');
            if(data.status=='ok'){
                flag = true;
            }else if(data.status=='error'){
                $.each(data.data,function(index,item){
                    input = $('[name="'+index+'"]');
                    input.parent().addClass('has-error');
                    input.siblings('.error-msg').html(item);
                });
                flag = false;
            }else{
                flag = false;
            }
        }
    });
    return flag;
};