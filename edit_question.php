<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once __DIR__ . '/autoload.php';
    $question = QuestionSet::getSingleQuestion($_POST['id'])[0];
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FS13-Workshop22-dashboard</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <style>
            table,
            .bordered {
                border-bottom: 2px solid black;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Millionaire</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="quiz.php">Start quiz</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hi Admin
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 offset-3">
                    <form action="dashboard.php" method="POST">
                        <input type="hidden" name="action" value="update">
                        <input type="hidden" name="id" value="<?= $question['id'] ?>">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question" aria-describedby="emailHelp" name="text" value="<?= $question['text'] ?>">
                        </div>
                         <label for="">Answers:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="1" <?= $question['correct'] == '1' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="answer1" value="<?= $question['answer1'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="2" <?= $question['correct'] == '2' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="answer2" value="<?= $question['answer2'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="3" <?= $question['correct'] == '3' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="answer3" value="<?= $question['answer3'] ?>">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="radio" name="correct" value="4" <?= $question['correct'] == '4' ? 'checked' : ''; ?>>
                                </div>
                            </div>
                            <input type="text" class="form-control" name="answer4" value="<?= $question['answer4'] ?>">
                        </div>
                        <div class="form-group mb-4">
                            <label for="level">Level</label>
                            <select class="form-control" id="level" name="level">
                                <option value="0" <?= $question['level'] == '0' ? 'selected' : ''; ?>>Easy</option>
                                <option value="1" <?= $question['level'] == '1' ? 'selected' : ''; ?>>Medium</option>
                                <option value="2" <?= $question['level'] == '2' ? 'selected' : ''; ?>>Hard</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>