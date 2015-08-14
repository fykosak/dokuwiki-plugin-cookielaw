jQuery(function() {
    jQuery('.cookielaw-banner button').click(function() {
        var date = new Date();
        date.setFullYear(date.getFullYear() + 10);
        document.cookie = 'cookielaw=1; path=/; expires=' + date.toGMTString();
        jQuery('.cookielaw-banner').hide();
    });
});

