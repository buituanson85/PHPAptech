
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>php new</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <form method="get" action="process_form.php">
                <div class="form-group">
                    <label for="FullName">Full Name:</label>
                    <input type="text" class="form-control" id="fullName" placeholder="Enter FullName" name="fullName">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
                </div>
                <button class="btn btn-success">Register</button>
            </form>
        </div>
    </body>
</html>


