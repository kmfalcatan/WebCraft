document.addEventListener('DOMContentLoaded', function() {
    var profileContainer = document.getElementById('profileContainer');
    var sidebar = document.getElementById('sidebar');

    profileContainer.addEventListener('click', function() {
        sidebar.classList.toggle('sidebar-show');
    });
});

function toggleSidebar() {
    var sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('sidebar-show');
}

// logout
function showLogoutConfirmation() {
    document.getElementById("logoutConfirmation").style.display = "block";
}

function hideLogoutConfirmation() {
    document.getElementById("logoutConfirmation").style.display = "none";
}

function logout() {
    window.location.href = "../functions/logout.php";
}