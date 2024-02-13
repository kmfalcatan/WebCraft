function changeColor(button) {
    // Reset the background color of all buttons
    var filters = document.querySelectorAll('.equipment');
    filters.forEach(function(filter) {
        filter.style.backgroundColor = '';
    });

    button.style.backgroundColor = 'gray'; 
}