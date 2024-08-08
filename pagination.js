document.addEventListener('DOMContentLoaded', function() {
    const itemsPerPage = 5; // Number of rows per page
    let currentPage = 1; // Current page number
  
    // Get the table and pagination elements
    const table = document.getElementById('myTable');
    const tbody = table.querySelector('tbody');
    const pagination = document.querySelector('.pagination');
  
    // Get all rows in the table body
    const rows = Array.from(tbody.querySelectorAll('tr'));
  
    function displayItems(page) {
      const startIndex = (page - 1) * itemsPerPage;
      const endIndex = Math.min(startIndex + itemsPerPage, rows.length);
  
      // Hide all rows
      rows.forEach(row => row.style.display = 'none');
  
      // Show only the rows for the current page
      for (let i = startIndex; i < endIndex; i++) {
        rows[i].style.display = '';
      }
    }
  
    function updatePagination() {
      const totalPages = Math.ceil(rows.length / itemsPerPage);
  
      // Clear existing pagination
      pagination.innerHTML = '';
  
      // Create Previous button
      const prevButton = document.createElement('li');
      prevButton.classList.add('page-item');
      prevButton.innerHTML = `<a class="page-link" href="#" data-page="prev">Previous</a>`;
      pagination.appendChild(prevButton);
  
      // Create page number buttons
      for (let i = 1; i <= totalPages; i++) {
        const pageButton = document.createElement('li');
        pageButton.classList.add('page-item');
        pageButton.innerHTML = `<a class="page-link" href="#" data-page="${i}">${i}</a>`;
        pagination.appendChild(pageButton);
      }
  
      // Create Next button
      const nextButton = document.createElement('li');
      nextButton.classList.add('page-item');
      nextButton.innerHTML = `<a class="page-link" href="#" data-page="next">Next</a>`;
      pagination.appendChild(nextButton);
  
      // Handle active class
      pagination.querySelectorAll('.page-item').forEach(item => {
        const pageNum = item.querySelector('.page-link').getAttribute('data-page');
        if (parseInt(pageNum) === currentPage) {
          item.classList.add('active');
        } else {
          item.classList.remove('active');
        }
      });
    }
  
    function handlePaginationClick(event) {
      event.preventDefault();
      const page = event.target.getAttribute('data-page');
  
      if (page === 'prev' && currentPage > 1) {
        currentPage--;
      } else if (page === 'next' && currentPage < Math.ceil(rows.length / itemsPerPage)) {
        currentPage++;
      } else if (!isNaN(page)) {
        currentPage = parseInt(page);
      }
  
      displayItems(currentPage);
      updatePagination();
    }
  
    // Initialize the pagination and display items
    displayItems(currentPage);
    updatePagination();
  
    // Add event listener to handle pagination clicks
    pagination.addEventListener('click', handlePaginationClick);
  });
  