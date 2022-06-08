setTimeout(() => {
    const box = document.getElementById('updatestuff');
    const admin = document.getElementById('updateadminstuff');
  
    // 👇️ removes element from DOM
    box.style.display = 'none';
    admin.style.display = 'none';
  
    // 👇️ hides element (still takes up space on page)
    // box.style.visibility = 'hidden';
  }, 1000); // 👈️ time in milliseconds