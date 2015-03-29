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
            $('textarea').blur(function(){
                check();
            });
        }
        return false;
    });

    if($('#select_gear').length>0){
        var selecter = new selecterGear();
        selecter.init();
    }
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

    if($('.check-null').length>0){
        $('.check-null').each(function(index,item){
            if($(this).val()==''){
                $(this).parent().addClass('has-error');
                $(this).siblings('.error-msg').html('不可为空');
                flag = false;
            }
        });
    }


    if($('.check-eq').length==2){
        if($('.check-eq').eq(0).val()!=$('.check-eq').eq(1).val()){
            $('.check-eq').each(function(index,item){
                $(this).parent().addClass('has-error');
                $(this).siblings('.error-msg').html('两次输入不相同');
                flag = false;
            });
        }
    }

    if($('input[type="file"]').length>0){
        $('input[type="file"]').each(function(index,item){
            if($(this).attr('rel')=='' && $(this).val()==''){
                $(this).parent().addClass('has-error');
                $(this).siblings('.error-msg').html('请上传封面图');
                flag = false;
            }
        });
    }

    return flag;
};

var selecterGear = function(){
    this.parent = $('#select_gear');
    this.son = $('select[name="'+this.parent.attr('rel')+'"]');
    this.list = null;

    this.init = function(){
        _this = this;
        this.parent.change(function(){
            _this.getModelList($(this).val());
            _this.son.html('<option value="">-请选择-</option>');
            $.each(_this.list,function(index,item){
                html = '<option value="'+item.id+'">'+item.title+'</option>';
                _this.son.append(html);
            });
            _this.son.parent().css('display','block');
        });
    };

    this.getModelList = function(brandId){
        var _this = this;
        $.ajax({
            type:'get',
            async:false,
            url: _this.son.attr('rel')+'?brandId='+brandId,
            dataType:'json',
            success:function(data){
                if(data.status=='ok'){
                    _this.list = data.data;
                }
            }
        });
    };
};