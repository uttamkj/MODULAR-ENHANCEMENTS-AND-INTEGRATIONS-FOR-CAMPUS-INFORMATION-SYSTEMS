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
                
                // Populate scholarship year options
                if (options.scholarship_year) {
                    options.scholarship_year.forEach(year => {
                        $('#scholarship_year').append(new Option(year, year));
                    });
                }
                
                // Populate course options
                if (options.course) {
                    options.course.forEach(course => {
                        $('#course').append(new Option(course, course));
                    });
                }
                
                // Populate branch options
                if (options.branch) {
                    options.branch.forEach(branch => {
                        $('#branch').append(new Option(branch, branch));
                    });
                }
                
                // Populate year_of_study options
                if (options.year_of_study) {
                    console.log("Adding year_of_study options:", options.year_of_study);
                    options.year_of_study.forEach(year => {
                        $('#year_of_study').append(new Option(year, year));
                    });
                } else {
                    console.warn("No year_of_study found in the options");
                }
                
                // Populate department options
                if (options.department) {
                    options.department.forEach(department => {
                        $('#department').append(new Option(department, department));
                    });
                }
                
                // Populate scholarship type options
                if (options.scholarship_type) {
                    options.scholarship_type.forEach(type => {
                        $('#scholarship_type').append(new Option(type, type));
                    });
                }
                
                // Populate gender options
                if (options.gender) {
                    options.gender.forEach(gender => {
                        $('#gender').append(new Option(gender, gender));
                    });
                }
                
                // Populate state options
                if (options.state) {
                    options.state.forEach(state => {
                        $('#state').append(new Option(state, state));
                    });
                }
                
                // Populate payment status options
                if (options.payment_status) {
                    options.payment_status.forEach(status => {
                        $('#payment_status').append(new Option(status, status));
                    });
                }
                
                // Populate scholarship name options
                if (options.scholarship_name) {
                    options.scholarship_name.forEach(name => {
                        $('#scholarship_name').append(new Option(name, name));
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
            scholarship_year: $('#scholarship_year').val(),
            course: $('#course').val(),
            branch: $('#branch').val(),
            year_of_study: $('#year_of_study').val(),
            department: $('#department').val(),
            scholarship_type: $('#scholarship_type').val(),
            gender: $('#gender').val(),
            state: $('#state').val(),
            payment_status: $('#payment_status').val(),
            scholarship_name: $('#scholarship_name').val()
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

                data.forEach(scholarship => {
                    // Format date if it exists
                    let applicationDate = scholarship.date_of_application ? 
                        new Date(scholarship.date_of_application).toLocaleDateString() : '';
                    
                    // Format amount with 2 decimal places if it exists
                    let amount = scholarship.sanctioned_amount ? 
                        parseFloat(scholarship.sanctioned_amount).toFixed(2) : '';
                        
                    html += `
                        <tr>
                            <td>${scholarship.id || ''}</td>
                            <td>${scholarship.scholarship_year || ''}</td>
                            <td>${scholarship.application_number || ''}</td>
                            <td>${scholarship.student_name || ''}</td>
                            <td>${scholarship.sic_no || ''}</td>
                            <td>${scholarship.regd_no || ''}</td>
                            <td>${scholarship.course || ''}</td>
                            <td>${scholarship.branch || ''}</td>
                            <td>${scholarship.year_of_study || ''}</td>
                            <td>${scholarship.department || ''}</td>
                            <td>${scholarship.scholarship_type || ''}</td>
                            <td>${scholarship.gender || ''}</td>
                            <td>${scholarship.state || ''}</td>
                            <td>${scholarship.caste || ''}</td>
                            <td>${scholarship.application_type || ''}</td>
                            <td>${applicationDate}</td>
                            <td>${scholarship.payment_status || ''}</td>
                            <td>${scholarship.scholarship_name || ''}</td>
                            <td>${amount}</td>
                        </tr>
                    `;
                });

                $('#scholarshipData').html(html);
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
        const doc = new jsPDF('l', 'mm', 'a3'); // landscape orientation, larger A3 size for more columns
        
        doc.text("Scholarship Data", 14, 10);
        
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
            styles: { fontSize: 7 }, // smaller font size to fit all columns
            margin: { left: 10, right: 10 }
        });

        doc.save("Scholarship_Data.pdf");
    });
});