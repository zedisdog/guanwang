$(document).ready(function () {
    //sticky nav
    $("nav").sticky({topSpacing: 0, className: 'sticky', center: true});

    $(window).resize(function(){
        $("nav").unstick();
        $("nav").sticky({topSpacing: 0, className: 'sticky', center: true});
    });

    //fancybox
    /* This is basic - uses default settings */

    $("a.single_image").fancybox();

    /* Using custom settings */

    $("a#inline").fancybox({
        'hideOnContentClick': true
    });

    /* Apply fancybox to multiple items */

    $("a.group").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });
});