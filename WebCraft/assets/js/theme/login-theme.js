function applySavedColor() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf('themeColor=') === 0) {
            var color = cookie.substring('themeColor='.length);
            document.getElementById('body').style.background = color;
            document.getElementById('image').style.background = color;
            document.getElementById('btn2').style.background = color;
            break;
        }
    }
}
applySavedColor();
