 // Set the time to wait before transitioning to the next page (in milliseconds)
    const transitionTime = 4000; // 5 seconds

    // Wait for the specified time, then transition to the second page
    setTimeout(() => {
        document.querySelector('.container').classList.add('hidden');
        document.querySelector('.container1').classList.remove('hidden');
    }, transitionTime);