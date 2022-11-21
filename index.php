<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="/myshop/create.php" role="button">New Client</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Adress</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php  //we need to connet to a database create variable that we be used to connet on database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "myshop";
                // now establish connection with database
                $connection = new mysqli($servername, $username, $password, $database);
                // check connection

                if($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                //read all row from database
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if(!$result) {
                    die("Invalid query: " . $connection->error);
                }

                //read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                    <td>$row[id]</td>
                    <td>$row[name]</td>
                    <td>$row[email]</td>
                    <td>$row[phone]</td>
                    <td>$row[address]</td>
                    <td>$row[created_at]</td>
                    <td>
                    <a class='btn btn-primary btn-sm' href='/myshop/edit.php?id=$row[id]'>Edit</a>
                    <a class='btn btn-danger btn-sm' href='/myshop/delete.php?id=$row[id]'>Delete</a>

                    </td>
                </tr>
                    ";

                }

                ?>


            </tbody>
        </table>

    </div>
    
</body>
</html>