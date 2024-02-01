var paragraphs = document.querySelectorAll('.status p');

      // Loop through each paragraph
      paragraphs.forEach(function(paragraph) {
        // Check if the paragraph contains 'NEW'
        if (paragraph.textContent.includes('NEW')) {
          // Apply style for 'NEW'
          paragraph.style.backgroundColor = 'rgb(101,101,101)';
          paragraph.style.color = 'white';
        }

        // Check if the paragraph contains 'OLD'
        if (paragraph.textContent.includes('OLD')) {
          // Apply style for 'OLD'
          paragraph.style.backgroundColor = 'rgb(189,189,189)';
        }
      });