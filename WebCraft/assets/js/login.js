
    setTimeout(function () {
        var alertDiv = document.getElementById('alert');
        if (alertDiv) {
            alertDiv.style.transition = 'opacity 1s ease';
            alertDiv.style.opacity = 0;

            setTimeout(function () {
                alertDiv.style.display = 'none';
            }, 1000);
        }
    }, 3000);