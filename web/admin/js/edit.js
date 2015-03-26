var editor;
$(document).ready(function(){
    KindEditor.ready(function(K){
        editor = K.create('#content',{
            width : '100%'
        });
    });
});