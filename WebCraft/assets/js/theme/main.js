// Function to change the color theme
function changeColor(color) {
    document.getElementById('container2').style.background = color;

    if (color === 'rgba(185, 26, 26, 0.91)') {
        document.getElementById('container2').style.color = '#f0f0f0';
        document.getElementById('container2').querySelector('p').style.color = '#f0f0f0';
        document.getElementById('container2').querySelector('h1').style.color = '#f0f0f0';
    } else {
        document.getElementById('container2').style.color = '#535353';
        document.getElementById('container2').querySelector('p').style.color = '#535353';
        document.getElementById('container2').querySelector('h1').style.color = '#535353';
    }

    document.cookie = "themeColor=" + color + "; path=/";
}

function applySavedColor() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf('themeColor=') === 0) {
            var color = cookie.substring('themeColor='.length);
            changeColor(color);
            break;
        }
    }
}

document.getElementById('setting-icon').addEventListener('click', function() {
    var colorOptions = document.getElementById('color-options');
    if (colorOptions.style.display === 'none') {
        colorOptions.style.display = 'block';
    } else {
        colorOptions.style.display = 'none';
    }
});

document.querySelectorAll('.color-options li.color').forEach(function(colorOption) {
    colorOption.addEventListener('click', function() {
        var color = this.style.backgroundColor;
        changeColor(color);
    });
});

document.querySelector('.color-options li.radial-gradient').addEventListener('click', function() {
    var color = this.style.backgroundImage;
    changeColor(color);
});

applySavedColor();
