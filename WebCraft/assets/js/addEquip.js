    const addEquipButtonContainer = document.getElementById('addEquipButtonContainer');
    const additionalContainer = document.getElementById('additionalContainer');
    const closeButton = document.getElementById('closeButton');

    addEquipButtonContainer.addEventListener('click', function() {
        additionalContainer.classList.toggle('visible');
    });

    closeButton.addEventListener('click', function() {
        additionalContainer.classList.remove('visible');
    });