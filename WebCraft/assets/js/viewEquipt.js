var paragraphs = document.querySelectorAll('.status p');

      paragraphs.forEach(function(paragraph) {

        if (paragraph.textContent.includes('NEW')) {
          paragraph.style.backgroundColor = 'rgb(101,101,101)';
          paragraph.style.color = 'white';
        }

        if (paragraph.textContent.includes('OLD')) {
          paragraph.style.backgroundColor = 'rgb(189,189,189)';
        }
      });