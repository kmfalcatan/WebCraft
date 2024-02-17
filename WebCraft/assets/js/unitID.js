document.addEventListener("DOMContentLoaded", function() {
    var articleSelect = document.querySelector('select[name="article"]');
    var unitSelect = document.getElementById('unitSelect');
    
    articleSelect.addEventListener('change', function() {
        var article = this.value; 
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../functions/getUnits.php?article=' + article, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    unitSelect.innerHTML = '';
                    var units = JSON.parse(xhr.responseText);
                    units.forEach(function(unit) {
                        var option = document.createElement('option');
                        option.value = unit.unit_ID;
                        option.textContent = unit.unit_ID;
                        unitSelect.appendChild(option);
                    });
                } else {
                    console.error('Error fetching units');
                }
            }
        };
        xhr.send();
    });
});
