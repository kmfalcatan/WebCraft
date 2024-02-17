function applySavedColor() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf('themeColor=') === 0) {
            var color = cookie.substring('themeColor='.length);
            document.getElementById('body').style.background = color;
            document.getElementById('btn').style.background = color;
            document.getElementById('btn2').style.background = color;
            var buttonContainer = document.querySelector('.buttonContainer');
            buttonContainer.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#f0f0f0' : '#535353';
            var buttons = document.getElementsByClassName('button1');
            for (var j = 0; j < buttons.length; j++) {
                buttons[j].style.color = (color === '#b80f0A') ? '#ddd' : '#535353';
            }

            break;
        }
    }
}
applySavedColor();
