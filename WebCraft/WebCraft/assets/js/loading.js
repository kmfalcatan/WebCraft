 // Set the time to wait before transitioning to the next page (in milliseconds)
 const transitionTime = 4000; // 4 seconds
 const redirectToLink = '/WebCraft/admin panel/dashboard.html'; // Replace this with your local link
 
 // Wait for the specified time, then redirect to the local link
 setTimeout(() => {
     window.location.href = redirectToLink;
 }, transitionTime);
 

    