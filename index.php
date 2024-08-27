<?php
require_once('./partials/database.php');
$players = $database->get_all("players");
// echo "<pre>";
// print_r($players);
// echo "</pre>";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Players</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="m-0">Players</h2>
                            </div>
                            <div class="col-6 text-end">
                                <a href="./add-player.php" class="btn btn-outline-primary">Add Player</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($players) { ?>
                            <table class="table table-bordered m-0">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        <th>Strong Foot</th>
                                        <th>Position</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach ($players as $player) { ?>
                                        <tr>
                                            <td><?php echo $sr++; ?></td>
                                            <td><?php echo $player['name'] ?></td>
                                            <td><?php echo $player['strong_foot'] ?></td>
                                            <td><?php echo $player['position'] ?></td>
                                            <td>
                                                <a href="./edit-player.php?id=<?php echo $player['id'] ?>" class="btn btn-primary">Edit</a>
                                                <a href="./delete-player.php?id=<?php echo $player['id'] ?>" class="btn btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        <?php
                        } else { ?>
                            <div class="alert alert-info m-0">No record found!</div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>