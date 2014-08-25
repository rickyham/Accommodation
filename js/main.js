//quick access menu controls
var quickAccess = document.getElementById('quick-access-menu');

var postionQuickAccess = function () {

    var quickAccessHeight = quickAccess.offsetHeight;
    var clientScreenHeight = document.documentElement.clientHeight;
    var quickAccessPos = (clientScreenHeight - quickAccessHeight) / 2;
    quickAccess.style.top = "" + quickAccessPos + "px";
};


postionQuickAccess();

var openCloseQuickAccessMenu = function () {
    var scrollheight = window.pageYOffset;
    if (scrollheight >= 100) {
        quickAccess.style.right = "0px";
    } else {
        quickAccess.style.right = "-80px";
    }
};


//controls transitions to view and exit get started content
var getStartedButton = document.getElementById('letsgetStarted');
var getStartedContent = document.getElementById('getStartedContent');
var exitGetStarted = document.getElementById('exitGetStarted');
var getstartedWrap = document.getElementById('getStarted');

function checkGetStartedView() {
    var getstartedwrapheight = getstartedWrap.offsetHeight;
    //console.log(getstartedwrapheight);
    var pagePostion = window.pageYOffset;
    if (pagePostion > (getstartedwrapheight + 50)) {
        getStartedContent.style.maxHeight = "0px";
        /*preventDefault(e);
		return;*/
    }
}

getStartedButton.onclick = function () {
    getStartedContent.style.maxHeight = "1200px";
    checkGetStartedView();
};

exitGetStarted.onclick = function () {
    getStartedContent.style.maxHeight = "0px";
};

//controls to close mobile menu
var responsiveMenuButton = document.getElementById('responsiveMenuButton');
var menuClose = document.getElementById('menu-close');
var responsiveNavWrap = document.getElementById('nav-wrap-responsive');

responsiveMenuButton.onclick = function () {
    responsiveNavWrap.style.right = "0";
};

menuClose.onclick = function () {
    responsiveNavWrap.style.right = "-300px";
};

//Continuous event checks
window.onscroll = function () {
    checkGetStartedView();
    openCloseQuickAccessMenu();
};


var ajax = ajax || {};

ajax.x = function () {
    if (typeof XMLHttpRequest !== 'undefined') {
        return new XMLHttpRequest();
    }
    var versions = [
        "MSXML2.XmlHttp.5.0",
        "MSXML2.XmlHttp.4.0",
        "MSXML2.XmlHttp.3.0",
        "MSXML2.XmlHttp.2.0",
        "Microsoft.XmlHttp"
    ];

    var xhr;
    for (var i = 0; i < versions.length; i++) {
        try {
            xhr = new ActiveXObject(versions[i]);
            break;
        } catch (e) {}
    }
    return xhr;
};


ajax.send = function (url, callback, method, data, sync) {
    var x = ajax.x();
    x.open(method, url, sync);
    x.onreadystatechange = function () {
        if (x.readyState === 4) {
            callback(x.responseText);
        }
    };
    if (method === 'POST') {
        x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    }
    x.send(data);
};

ajax.get = function (url, data, callback, sync) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url + '?' + query.join('&'), callback, 'GET', null, sync);
};

ajax.post = function (url, data, callback, sync) {
    var query = [];
    for (var key in data) {
        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
    }
    ajax.send(url, callback, 'POST', query.join('&'), sync);
};
