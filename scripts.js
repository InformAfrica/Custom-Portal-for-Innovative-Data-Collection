// Function to navigate between form sections
document.addEventListener('DOMContentLoaded', function () {
    let currentSectionIndex = 0;
    const sections = document.querySelectorAll('.section');
    const nextButton = document.createElement('button');
    nextButton.innerText = "Next";
    nextButton.classList.add("next-btn");
    const submitButton = document.createElement('button');
    submitButton.innerText = "Submit";
    submitButton.classList.add("submit-btn");
    submitButton.style.display = "none";
    
    // Create a next button for each section
    function showSection(index) {
        sections.forEach((section, i) => {
            if (i === index) {
                section.classList.add('active-section');
                section.scrollIntoView({ behavior: 'smooth' });
            } else {
                section.classList.remove('active-section');
            }
        });

        // Show the next button or submit button
        if (index < sections.length - 1) {
            if (document.querySelector('.next-btn')) {
                document.querySelector('.next-btn').remove();
            }
            sections[index].appendChild(nextButton);
            nextButton.style.display = 'block';
            submitButton.style.display = 'none';
        } else {
            if (document.querySelector('.submit-btn')) {
                document.querySelector('.submit-btn').remove();
            }
            sections[index].appendChild(submitButton);
            nextButton.style.display = 'none';
            submitButton.style.display = 'block';
        }
    }

    // Handle the next button click event
    nextButton.addEventListener('click', function () {
        if (currentSectionIndex < sections.length - 1) {
            currentSectionIndex++;
            showSection(currentSectionIndex);
        }
    });

    // Handle the submit button click event
    submitButton.addEventListener('click', function () {
        document.querySelector('form').submit();
    });

    // Initial setup: Show the first section
    showSection(currentSectionIndex);
});

// Fetch the data from fetch_data.php when the page loads

window.onload = function() {
    fetch('fetch_data.php')
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector("#data-table tbody");

            // If no data is found, show a message
            if (data.message) {
                tableBody.innerHTML = `<tr><td colspan="16">${data.message}</td></tr>`;
            } else {
                // Loop through the data and append rows to the table
                data.forEach(row => {
                    const tr = document.createElement('tr');
                    for (let key in row) {
                        const td = document.createElement('td');
                        td.textContent = row[key];
                        tr.appendChild(td);
                    }
                    tableBody.appendChild(tr);
                });
            }
        })
        .catch(error => {
            console.error('Error fetching data:', error);
            document.querySelector("#data-table tbody").innerHTML = "<tr><td colspan='16'>Error loading data</td></tr>";
        });
};

// Handle the CSV download
document.getElementById('download-btn').addEventListener('click', function() {
    window.location.href = 'download_csv.php';
});

then(data => {
    console.log(data); // Add this line to see the response in the console
    const tableBody = document.querySelector("#data-table tbody");
    
})


