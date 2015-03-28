$(document).ready(function(){
    if($('#shareToSinaWeibo').length>0){
        $('#shareToSinaWeibo').click(function(){
            document.write('<iframe frameborder="0" scrolling="no" src="http://hits.sinajs.cn/A1/weiboshare.html?url=%url%&appkey=&type=3" width="16" height="16"></iframe>'.replace(/%url%/,encodeURIComponent(location.href)));
        });
    }
});