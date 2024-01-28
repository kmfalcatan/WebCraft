 // Set the time to wait before transitioning to the next page (in milliseconds)
    const transitionTime = 4000; // 5 seconds

    // Wait for the specified time, then transition to the second page
    setTimeout(() => {
        document.querySelector('.container').classList.add('hidden');
        document.querySelector('.container1').classList.remove('hidden');
    }, transitionTime);

    function toggleMenu(menuIcon) {
    menuIcon.classList.toggle("change")
}

const popup = document.querySelector('.productContainer');
const toggleElements = document.querySelectorAll('.subItemContainer');

function show() {
    popup.style.display = 'block';
}

toggleElements.forEach(function(container) {
    container.addEventListener('click', show);
});


const header = document.querySelector('.menubarContainer');
const navbar = document.querySelector('.sideNavBarContainer');

header.addEventListener('click', function(){
    if(navbar.classList === 'fadeIn'){
        navbar.classList.remove('fadeIn');
    } else{
        navbar.classList.toggle('fadeIn');
    }
});