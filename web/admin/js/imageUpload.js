$(document).ready(function () {
    if ($('input[name="pic"]').length > 0) {
        $('input[name="pic"]').each(function (index,item) {
            var id = $(this).attr('id');
            $(this).change(function(){
                $.ajaxFileUpload({
                    url: $(this).attr('rel'), //用于文件上传的服务器端请求地址
                    secureuri: false, //是否需要安全协议，一般设置为false
                    fileElementId: $(this).attr('id'), //文件上传域的ID
                    dataType: 'json', //返回值类型 一般设置为json
                    success: function (data,status)  //服务器成功响应处理函数
                    {
                        if(data.status=='ok'){
                            $('#img_'+id).attr('src',data.data.imageUrl);
                            $('#input_'+id).val(data.data.imageName);
                        }else {
                            alert('上传错误，请重试');
                        }
                    },
                    error: function (data, status, e)//服务器响应失败处理函数
                    {
                        alert(e);
                    }
                });
            });
        });
    }
});