<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body>
    <table class="table" id="example">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <!-- Full jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('table') }}", // Adjust to match your Laravel route
                    type: "GET"
                },
                columns: [
                    { data: 'id', name: 'id' },       // JSON key for the "#" column
                    { data: 'name', name: 'name' },   // JSON key for the "name" column
                    { data: 'email', name: 'email' }  // JSON key for the "email" column
                ]
            });

            // Verify DataTables is loaded
            console.log(typeof $.fn.DataTable); // Should output "function"
        });
    </script>
</body>
</html>
