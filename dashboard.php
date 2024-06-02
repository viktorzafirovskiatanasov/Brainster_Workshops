<?php
session_start();
if(!isset($_SESSION['username'])){
    header('Location: login.php');
    die();
}

require_once __DIR__ . '/autoload.php';

$pdo = DB::connect();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch ($_POST['action']) {
        case 'create':
            //VALIDATION!!!
            $params = ['text' => $_POST['text'], 'level' => $_POST['level'], 'answer1' => $_POST['answer1'], 'answer2' => $_POST['answer2'], 'answer3' => $_POST['answer3'], 'answer4' => $_POST['answer4'], 'correct' => $_POST['correct']];

            $sql = 'INSERT INTO questions (text, level, answer1, answer2, answer3, answer4, correct) VALUES (:text, :level, :answer1, :answer2, :answer3, :answer4, :correct)';


            echo QuestionSet::query($sql, $params, $pdo);
            break;
        case 'update':
            //VALIDATION!!!
            $params = ['text' => $_POST['text'], 'level' => $_POST['level'], 'answer1' => $_POST['answer1'], 'answer2' => $_POST['answer2'], 'answer3' => $_POST['answer3'], 'answer4' => $_POST['answer4'], 'correct' => $_POST['correct'], 'id' => $_POST['id']];
            
            // echo QuestionSet::updateQuestion($params, $pdo);
            $sql = 'UPDATE questions SET text = :text, level = :level, answer1 = :answer1, answer2 = :answer2, answer3 = :answer3, answer4 = :answer4, correct = :correct WHERE id = :id';


            echo QuestionSet::query($sql, $params, $pdo);
            break;
        case 'delete':
            //VALIDATION!!!
            $params = ['id' => $_POST['id']];
            $sql = "DELETE FROM questions WHERE id = :id";
            echo QuestionSet::query($sql, $params, $pdo);
            break;
        default:
            # code...
            break;
    }
}

$all_questions = QuestionSet::getAllQuestions($pdo);
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
                <div class="col-4">
                    <form method="POST">
                        <input type="hidden" name="action" value="create">
                        <div class="mb-3">
                            <label for="question" class="form-label">Question</label>
                            <input type="text" class="form-control" id="question" aria-describedby="emailHelp" name="text">
                        </div>
                         <label for="">Answers:</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="correct" value="1">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="answer1" value="">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="correct" value="2">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="answer2" value="">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="correct" value="3">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="answer3" value="">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="radio" name="correct" value="4">
                            </div>
                        </div>
                        <input type="text" class="form-control" name="answer4" value="">
                    </div>
                    <div class="form-group mb-4">
                        <label for="level">Level</label>
                        <select class="form-control" id="level" name="level">
                            <option value="0">Easy</option>
                            <option value="1">Medium</option>
                            <option value="2">Hard</option>
                        </select>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-8">
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Level</th>
                            <th scope="col" colspan="3">Question</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_questions as $question){ 
                            $level = 'Easy';
                            if($question['level'] == 1){
                                $level = 'Medium';
                            } else if ($question['level'] == 2) {
                                $level = 'Hard';
                            } 
                        ?>
                        <tr>
                            <td><?= $level ?></td>
                            <td colspan="3"><?= $question['text'] ?></td>
                            <td rowspan="2">
                                <form action="edit_question.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                                <form method="POST">
                                    <input type="hidden" name="action" value="delete">
                                    <input type="hidden" name="id" value="<?= $question['id'] ?>">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td><?= $question['answer1'] ?></td>
                            <td><?= $question['answer2'] ?></td>
                            <td><?= $question['answer3'] ?></td>
                            <td><?= $question['answer4'] ?></td>
                       </tr>
                       <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    </body>
</html>