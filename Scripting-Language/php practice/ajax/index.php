<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AJAX Data Sync Example</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Note</h4>
                    </div>
                    <div class="card-body">
                        <form id="noteForm">
                            <div class="mb-3">
                                <label for="note" class="form-label">Note:</label>
                                <textarea class="form-control" id="note" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Save Note</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Notes <small>(Auto-updates every 5 seconds)</small></h4>
                    </div>
                    <div class="card-body">
                        <div id="notesList"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            function loadNotes() {
                $.ajax({
                    url: 'get_notes.php',
                    type: 'GET',
                    success: function (response) {
                        $('#notesList').html(response);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }

            loadNotes();

            setInterval(loadNotes, 5000);

            $('#noteForm').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    url: 'save_note.php',
                    type: 'POST',
                    data: {
                        note: $('#note').val()
                    },
                    success: function (response) {
                        $('#note').val('');
                        loadNotes();
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
    </script>
</body>

</html>