</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; 2023 </div>
            <div>
                <div class="text-muted">Forst Car Usa</div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<!-- JavaScript -->
<script src="js/alertfyjs.js"></script>

<script>
    // ===============insert alert  message===========
    <?php if (isset($_SESSION['message'])) { ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('<?= $_SESSION['message'] ?>'); // Add single quotes around the message
        <?php unset($_SESSION['message']); ?>
    <?php } ?>

    // ===============Delete alert  message===========
    <?php if (isset($_SESSION['delete'])) { ?>
        alertify.set('notifier', 'position', 'top-right');
        alertify.error('<?= $_SESSION['delete'] ?>'); // Add single quotes around the message
        <?php unset($_SESSION['delete']); ?>
    <?php } ?>
</script>

<script>
    // Function to filter the table rows based on the search input
    function filterTable() {
        var input, filter, table, tr, td, i, j, txtValue, noDataMessage;
        input = document.getElementById("search");
        filter = input.value.toLowerCase();
        table = document.getElementById("data-table");
        tr = table.getElementsByTagName("tr");
        noDataMessage = document.getElementById("no-data-message");

        var found = false;

        for (i = 0; i < tr.length; i++) {
            var rowMatches = false;
            td = tr[i].getElementsByClassName("searchable");

            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toLowerCase().indexOf(filter) > -1) {
                    rowMatches = true;
                    found = true;
                    break;
                }
            }

            if (rowMatches) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }

        // Show/hide the "Data Not Found" message
        if (found) {
            noDataMessage.style.display = "none";
        } else {
            noDataMessage.style.display = "block";
        }
    }

    // Attach an event listener to the search input field
    document.getElementById("search").addEventListener("keyup", filterTable);

    let exportButton = document.getElementById("export");

    exportButton.addEventListener("click", function() {
        alertify.set('notifier', 'position', 'top-right');
        alertify.success('File Downloaded');
    });
</script>
</body>

</html>