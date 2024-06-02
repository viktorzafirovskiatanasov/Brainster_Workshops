<?php
session_start();

require_once __DIR__ . '/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $pdo = DB::connect();

    $questions_easy = QuestionSet::getLeveledQuestions(0, $pdo);

    $questions_medium = QuestionSet::getLeveledQuestions(1, $pdo);

    $questions_hard = QuestionSet::getLeveledQuestions(2, $pdo);

    $all_questions = array_merge($questions_easy, $questions_medium, $questions_hard);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $millionaire = true;

    for ($i=1; $i <= 15; $i++) {
        $_SESSION['given_answers']['answer' . $i] = '';
        if(isset($_POST['answer' . $i])){
            $_SESSION['given_answers']['answer' . $i] = $_POST['answer' . $i];
        }
    }

    for ($i=1; $i <= 15; $i++) { 
        if(isset($_POST['answer' . $i])){
            if($_POST['correctAnswer' . $i] != $_POST['answer' . $i]){
                $millionaire = false;
            }
        } else {
            $_SESSION['error'] = 'Please give answer to every question!';
            header('Location: quiz.php');
            die();
        }
    }
    session_unset();
}
echo '<pre>';
//$_SESSION['given_answers'] = ['answer1' => '', 'answer1' => '1', 'answer1' => '3', 'answer1' => 2', 'answer1' => '4']
echo '</pre>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Quiz</title>
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand">Millionaire</a>
                <div class="d-flex">
                    <a class="nav-link me-4">Start Over</a>
                    <a href="login.php" class="nav-link">Admin Panel</a>
                </div>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <div class="col-8 offset-2">
                    <?php if(isset($_SESSION['error'])){
                        echo $_SESSION['error'];
                    }  ?>
                    <?php if($_SERVER['REQUEST_METHOD'] == 'GET'){ ?>
                    <form action="" method="POST" class="pb-5">
                        <!-- main foreach start -->
                        <?php $q_counter = 1 ?>
                        <?php foreach($all_questions as $question){ ?>
                        <?php 
                            $checked['1'] = isset($_SESSION['given_answers']['answer' . $q_counter]) && $_SESSION['given_answers']['answer' . $q_counter] ==  '1' ? 'checked' : '';
                            $checked['2'] = isset($_SESSION['given_answers']['answer' . $q_counter]) && $_SESSION['given_answers']['answer' . $q_counter] ==  '2' ? 'checked' : '';
                            $checked['3'] = isset($_SESSION['given_answers']['answer' . $q_counter]) && $_SESSION['given_answers']['answer' . $q_counter] ==  '3' ? 'checked' : '';
                            $checked['4'] = isset($_SESSION['given_answers']['answer' . $q_counter]) && $_SESSION['given_answers']['answer' . $q_counter] ==  '4' ? 'checked' : '';
                        ?>
                        <div class="row my-4">

                            <div class="col-12 text-center">
                                <small>Question number <?= $q_counter ?>: </small>
                                <span><b><?= $question['text'] ?></b></span>
                            </div>
                            <input type="hidden" name="correctAnswer<?= $q_counter ?>" value="<?= $question['correct'] ?>">
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-between">
                                    <div class="border rounded p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer<?= $q_counter ?>" id="answer1<?= $q_counter ?>" value="1" <?= $checked['1'] ?>>
                                            <label class="form-check-label" for="answer1<?= $q_counter ?>"><?= $question['answer1'] ?></label>
                                        </div>
                                    </div>
                                    <div class="border rounded p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer<?= $q_counter ?>" id="answer2<?= $q_counter ?>"  value="2" <?= $checked['2'] ?>>
                                            <label class="form-check-label" for="answer2<?= $q_counter ?>"><?= $question['answer2'] ?></label>
                                        </div>
                                    </div>
                                    <div class="border rounded p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer<?= $q_counter ?>" id="answer3<?= $q_counter ?>"  value="3" <?= $checked['3'] ?>>
                                            <label class="form-check-label" for="answer3<?= $q_counter ?>"><?= $question['answer3'] ?></label>
                                        </div>
                                    </div>
                                    <div class="border rounded p-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="answer<?= $q_counter ?>" id="answer4<?= $q_counter ?>"  value="4" <?= $checked['4'] ?>>
                                            <label class="form-check-label" for="answer4<?= $q_counter ?>"><?= $question['answer4'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <?php $q_counter++ ?>
                        <?php } ?>
                        <!-- main foreach end -->
                        <div class="row">
                            <div class="col-12 mt-5">
                                <button type="submit" class="btn btn-outline-success">Check if i am a millionaire </button>
                            </div>
                        </div>
                    </form>
                    <?php } else {
                            if($millionaire){
                    ?>
                        <h1>MILLIONAIRE! congratz</h1>
                    <?php } else {  ?>
                        <h1>Not a Millionaire. Try again.</h1>
                    <?php } ?>
                        <a href="quiz.php" class="btn btn-primary">Try again</a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
            integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
