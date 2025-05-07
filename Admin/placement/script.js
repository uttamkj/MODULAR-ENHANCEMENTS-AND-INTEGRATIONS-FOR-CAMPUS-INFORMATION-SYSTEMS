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

    // Download PDF button
    $('#downloadPdf').click(function() {
        generatePDF();
    });

    // Function to load filter options
    function loadFilterOptions() {
        $.ajax({
            url: 'get_filter_options.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                console.log("Filter options received:", response);
                try {
                    // Populate course options
                    if (Array.isArray(response.courses)) {
                        response.courses.forEach(course => {
                            $('#course').append(new Option(course, course));
                        });
                    }

                    // Populate branch options
                    if (Array.isArray(response.branches)) {
                        response.branches.forEach(branch => {
                            $('#branch').append(new Option(branch, branch));
                        });
                    }

                    // Populate yearOfPassing options
                    if (Array.isArray(response.yearsOfPassing)) {
                        response.yearsOfPassing.forEach(year => {
                            $('#yearOfPassing').append(new Option(year, year));
                        });
                    }

                    // Populate company options
                    if (Array.isArray(response.companies)) {
                        response.companies.forEach(company => {
                            if (company) { // Only add non-null companies
                                $('#company').append(new Option(company, company));
                            }
                        });
                    }
                    
                    // Populate batch year options
                    if (Array.isArray(response.batchYears)) {
                        response.batchYears.forEach(batchYear => {
                            if (batchYear) { // Only add non-null batch years
                                $('#batchYear').append(new Option(batchYear, batchYear));
                            }
                        });
                    }
                } catch (e) {
                    console.error("Error processing filter options:", e);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error loading filter options:", status, error);
            }
        });
    }

    // Function to load data based on filters
    function loadData() {
        const filters = {
            course: $('#course').val(),
            branch: $('#branch').val(),
            yearOfPassing: $('#yearOfPassing').val(),
            company: $('#company').val(),
            batchYear: $('#batchYear').val()
        };

        console.log("Applied filters:", filters);

        $.ajax({
            url: 'get_filtered_data.php',
            method: 'POST',
            dataType: 'json',
            data: { filters: JSON.stringify(filters) },
            success: function(response) {
                try {
                    // Check if we have data array in the response
                    console.log("Server response:", response);
                    if (response.error) {
                        console.error("Server error:", response.error);
                        $('#studentData').html('<tr><td colspan="11">Error: ' + response.error + '</td></tr>');
                        return;
                    }
                    
                    const data = response.data || [];
                    
                    if (data.length === 0) {
                        $('#studentData').html('<tr><td colspan="11">No matching records found</td></tr>');
                        return;
                    }
                    
                    let html = '';
                    let rowNum = 1;

                    data.forEach(student => {
                        html += `
                            <tr>
                                <td>${rowNum++}</td>
                                <td>${student.sic_no || '-'}</td>
                                <td>${student.branch || '-'}</td>
                                <td>${student.name || '-'}</td>
                                <td>${student.course || '-'}</td>
                                <td>${student.placed || '-'}</td>
                                <td>${student.company || '-'}</td>
                                <td>${student.package || '-'}</td>
                                <td>${student.job_domain || '-'}</td>
                                <td>${student.batch_year || '-'}</td>
                                <td>${student.year_of_passing || '-'}</td>
                            </tr>
                        `;
                    });

                    $('#studentData').html(html);
                } catch (e) {
                    console.error("Error processing data:", e, response);
                    $('#studentData').html('<tr><td colspan="11">Error processing data. Check console for details.</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error loading data:", status, error);
                $('#studentData').html('<tr><td colspan="11">Failed to load data. Server error.</td></tr>');
            }
        });
    }

    // Function to generate PDF
    function generatePDF() {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF('landscape');

        doc.text("Student Placement Data", 14, 10);
        
        let headers = [];
        let data = [];

        // Get table headers
        document.querySelectorAll("#studentTable thead th").forEach(th => {
            headers.push(th.innerText);
        });

        // Get table data
        document.querySelectorAll("#studentTable tbody tr").forEach(tr => {
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
            theme: 'grid',
            styles: { fontSize: 8 },
            columnStyles: { 0: { cellWidth: 10 } }
        });

        doc.save("Student_Placement_Data.pdf");
    }
});