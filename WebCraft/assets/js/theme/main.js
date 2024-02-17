function toggleColorContainer() {
    var colorContainer = document.getElementById('colorContainer');
    if (colorContainer.style.display === 'none' || colorContainer.style.display === '') {
        colorContainer.style.display = 'block';
    } else {
        colorContainer.style.display = 'none';
    }
}

function changeColor(color) {
    var subContainer = document.getElementById('subContainer');
    subContainer.style.background = color;

    var btn1 = document.getElementById('btn1');
    btn1.style.background = color;

    var btn2 = document.getElementById('btn2');
    btn2.style.background = color;

    var btn3 = document.getElementById('btn3');
    btn3.style.background = color;

    if (color === '#b80f0A') {
        var subWelcomeContainer = document.querySelector('.subWelcomeContainer');
        subWelcomeContainer.style.color = '#FFE0E0E0'; 

        var subParagraphContainer = document.querySelector('.subParagraphContainer');
        subParagraphContainer.style.color = '#FFBDBDBD'; 

        var button1 = document.querySelector('.button1');
        button1.style.color = '#ddd'; 

        var button2 = document.querySelector('.button2');
        button2.style.color = '#ddd';

        var button3 = document.querySelector('.button3');
        button3.style.color = '#ddd'; 

    } else {
        var subWelcomeContainer = document.querySelector('.subWelcomeContainer');
        subWelcomeContainer.style.color = '#000000'; 

        var subParagraphContainer = document.querySelector('.subParagraphContainer');
        subParagraphContainer.style.color = '#535353'; 

        var button1 = document.querySelector('.button1');
        button1.style.color = '#000000'; 

        var button2 = document.querySelector('.button2');
        button2.style.color = '#000000';

        var button3 = document.querySelector('.button3');
        button3.style.color = '#000000'; 
            
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

applySavedColor();