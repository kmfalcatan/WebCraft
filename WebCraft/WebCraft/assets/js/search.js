function filterByYear(selectedYear) {
    const rows = document.querySelectorAll('.tableContainer tbody tr');
    rows.forEach(row => {
        const year = row.getAttribute('data-year');
        if (year == selectedYear || selectedYear == 'all') {
            row.style.display = 'table-row';
        } else {
            row.style.display = 'none';
        }
    });
}

function liveSearch() {
    const input = document.getElementById('searchInput').value;

    const xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('tblBody').innerHTML = this.responseText;
        }
    };
    xmlhttp.open('GET', 'search.php?search=' + input, true);
    xmlhttp.send();
}

liveSearch();