// function myFunction() {
//     var input, filter, table, tr, td, i, j, txtValue;
//     input = document.getElementById("myInput");
//     filter = input.value.toUpperCase();
//     table = document.getElementById("myTable");
//     tr = table.getElementsByTagName("tr");

//     for (i = 0; i < tr.length; i++) {
//         tr[i].style.display = "none";
//         td = tr[i].getElementsByTagName("td");
//         for (j = 0; j < td.length; j++) {
//             if (td[j]) {
//                 txtValue = td[j].textContent || td[j].innerText;
//                 if (txtValue.toUpperCase().indexOf(filter) > -1) {
//                     tr[i].style.display = "";
//                     break;
//                 }
//             }
//         }
//     }
// }


// document.addEventListener("DOMContentLoaded", function() {
//     document.getElementById("filterLanguage").addEventListener("change", filterTable);
//     document.getElementById("filterGenre").addEventListener("change", filterTable);
// });

// function filterTable() {
//     var filterLanguage = document.getElementById("filterLanguage").value.toUpperCase();
//     var filterGenre = document.getElementById("filterGenre").value;
//     var table = document.getElementById("myTable");
//     var tr = table.getElementsByTagName("tr");

//     for (var i = 1; i < tr.length; i++) {
//         var tdLanguage = tr[i].getElementsByTagName("td")[5]; // Index 5 for Language column
//         var tdGenre = tr[i].getElementsByTagName("td")[7]; // Index 7 for Genre column

//         if (tdLanguage && tdGenre) {
//             var txtValueLanguage = tdLanguage.textContent || tdLanguage.innerText;
//             var txtValueGenre = tdGenre.textContent || tdGenre.innerText;

//             var showRow = (filterLanguage === "" || txtValueLanguage.toUpperCase().indexOf(filterLanguage) > -1) &&
//                           (filterGenre === "" || txtValueGenre === filterGenre);

//             tr[i].style.display = showRow ? "" : "none";
//         }
//     }
// }
// document.addEventListener("DOMContentLoaded", function() {
//     function fetchFilteredData() {
//       const query = document.getElementById('myInput').value;
//       const language = document.getElementById('filterLanguage').value;
//       const genre = document.getElementById('filterGenre').value;
  
//       const xhr = new XMLHttpRequest();
//       xhr.open('POST', 'search.php', true);
//       xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      
//       xhr.onload = function() {
//         if (this.status == 200) {
//           document.querySelector('#myTable tbody').innerHTML = this.responseText;
//         }
//       };
  
//       xhr.send(`query=${encodeURIComponent(query)}&language=${encodeURIComponent(language)}&genre=${encodeURIComponent(genre)}`);
//     }
  
//     document.getElementById('myInput').addEventListener('keyup', fetchFilteredData);
//     document.getElementById('filterLanguage').addEventListener('change', fetchFilteredData);
//     document.getElementById('filterGenre').addEventListener('change', fetchFilteredData);
//   });


  