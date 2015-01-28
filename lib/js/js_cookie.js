function setCookie(name, value, pesistant_days) {
    var now = new Date();
    now.setTime( now.getTime() + (pesistant_days * 86400));
    var expires = "expires=" + now.toUTCString();
    document.cookie = name + "=" + value + "; " + expires;
}

setCookie("js_enabled",true,1);