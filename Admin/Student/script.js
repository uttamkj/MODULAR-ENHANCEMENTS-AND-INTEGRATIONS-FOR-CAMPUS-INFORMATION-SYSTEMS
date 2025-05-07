$(document).ready(function() {
    // Initialize Select2 for all filter dropdowns
    $('.filter-select').select2({
        placeholder: "Select options",
        allowClear: true
    });

    // Load initial data and populate filter options
    loadFilterOptions();
    loadData();

    // Event listener for filter changes
    $('.filter-select').on('change', function() {
        loadData();
    });

    // Clear filters button
    $('#clearFilters').click(function() {
        $('.filter-select').val(null).trigger('change');
        loadData();
    });

    // Function to load filter options
    function loadFilterOptions() {
        $.ajax({
            url: 'get_filter_options.php',
            method: 'GET',
            dataType: 'json',
            success: function(options) {
                console.log("Filter options loaded:", options);
                
                // Populate course options
                if (options.courses) {
                    options.courses.forEach(course => {
                        $('#course').append(new Option(course, course));
                    });
                }
                
                // Populate original branch options
                if (options.original_branches) {
                    options.original_branches.forEach(branch => {
                        $('#original_branch').append(new Option(branch, branch));
                    });
                }

                // Populate branch options
                if (options.branches) {
                    options.branches.forEach(branch => {
                        $('#branch').append(new Option(branch, branch));
                    });
                }
                
                // Populate gender options
                if (options.genders) {
                    options.genders.forEach(gender => {
                        $('#gender').append(new Option(gender, gender));
                    });
                }

                // Populate MOA options
                if (options.moa) {
                    options.moa.forEach(moa => {
                        $('#moa').append(new Option(moa, moa));
                    });
                }

                // Populate district options
                if (options.districts) {
                    options.districts.forEach(district => {
                        $('#district').append(new Option(district, district));
                    });
                }

                // Populate year of passing options
                if (options.yearsOfPassing) {
                    options.yearsOfPassing.forEach(year => {
                        $('#yearOfPassing').append(new Option(year, year));
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading filter options:", error);
                console.error("Response:", xhr.responseText);
            }
        });
    }

    // Function to load data based on filters
    function loadData() {
        const filters = {
            course: $('#course').val(),
            original_branch: $('#original_branch').val(),
            branch_change: $('#branch_change').val(),
            branch: $('#branch').val(),
            gender: $('#gender').val(),
            lateral: $('#lateral').val(),
            moa: $('#moa').val(),
            district: $('#district').val(),
            yearOfPassing: $('#yearOfPassing').val()
        };

        console.log("Applying filters:", filters);

        $.ajax({
            url: 'get_filtered_data.php',
            method: 'POST',
            data: { filters: JSON.stringify(filters) },
            dataType: 'json',
            success: function(data) {
                console.log("Data loaded:", data);
                
                if (data.error) {
                    console.error("Server error:", data.error);
                    return;
                }

                let html = '';

                data.forEach(student => {
                    html += `
                        <tr>
                            <td>${student.sl_no || ''}</td>
                            <td>${student.sic_no || ''}</td>
                            <td>${student.name || ''}</td>
                            <td>${student.course || ''}</td>
                            <td>${student.original_branch || ''}</td>
                            <td>${student.branch_change || ''}</td>
                            <td>${student.branch || ''}</td>
                            <td>${student.gender || ''}</td>
                            <td>${student.lateral || ''}</td>
                            <td>${student.moa || ''}</td>
                            <td>${student.district || ''}</td>
                            <td>${student.year_of_passing || ''}</td>
                        </tr>
                    `;
                });

                $('#studentData').html(html);
            },
            error: function(xhr, status, error) {
                console.error("Ajax error:", error);
                console.error("Response:", xhr.responseText);
            }
        });
    }

    // PDF download functionality
    $("#downloadPdf").click(function() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('l', 'mm', 'a4'); // landscape orientation
        
        doc.text("Student Data", 14, 10);
        
        let table = document.querySelector("table");
        let headers = [];
        let data = [];

        // Get table headers
        table.querySelectorAll("thead th").forEach(th => {
            headers.push(th.innerText);
        });

        // Get table data
        table.querySelectorAll("tbody tr").forEach(tr => {
            let row = [];
            tr.querySelectorAll("td").forEach(td => {
                row.push(td.innerText);
            });
            data.push(row);
        });

        doc.autoTable({
            head: [headers],
            body: data,
            startY: 20,
            styles: { fontSize: 8 }, // smaller font size to fit all columns
            margin: { left: 10, right: 10 }
        });

        doc.save("Student_Data.pdf");
    });
});