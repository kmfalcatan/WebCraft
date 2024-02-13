function applySavedColor() {
    var cookies = document.cookie.split(';');
    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf('themeColor=') === 0) {
            var color = cookie.substring('themeColor='.length);
            document.getElementById('body').style.background = color;
            var backContainer = document.getElementById('backContainer');
            backContainer.style.background = color;
            backContainer.style.opacity = (color === 'rgba(185, 26, 26, 0.91)') ? '0.7' : '0.7';
            var textContainer = document.getElementById('textContainer');
            textContainer.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#f0f0f0' : '#000000';

            var subContainers = document.getElementsByClassName('subContainer');
            for (var k = 0; k < subContainers.length; k++) {
                subContainers[k].style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#f0f0f0' : '#000000';
            }

            var subContainer1 = document.getElementById('subContainer1');
            subContainer1.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#000000' : '#000000';

            var subContainer2 = document.getElementById('subContainer2');
            subContainer2.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#000000' : '#000000';
            
            var subContainer2 = document.getElementById('subContainer3');
            subContainer2.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#000000' : '#000000';

            var subContainer2 = document.getElementById('subContainer4');
            subContainer2.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#000000' : '#000000';

            var subContainer2 = document.getElementById('subContainer5');
            subContainer2.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#000000' : '#000000';

            var systemName = document.getElementById('systemName');
            systemName.style.color = (color === 'rgba(185, 26, 26, 0.91)') ? '#f0f0f0' : '#000000';
            break;
        }
    }
}

applySavedColor();