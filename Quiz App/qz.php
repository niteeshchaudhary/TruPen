<?php 
session_start(); 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "trupendb";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- Coding with nick -->
    <title>Quiz App</title>
</head>
<body>

    <div class="quiz-container" id="quiz">
        <div class="quiz-header">
            <h2 id="question">Question Text</h2>
            <ul>
                <li>
                    <input type="radio" name="answer" id="a" class="answer">
                    <label for="a" id="a_text">Answer</label>
                </li>

                <li>
                    <input type="radio" name="answer" id="b" class="answer">
                    <label for="b" id="b_text">Answer</label>
                </li>

                <li>
                    <input type="radio" name="answer" id="c" class="answer">
                    <label for="c" id="c_text">Answer</label>
                </li>

                <li>
                    <input type="radio" name="answer" id="d" class="answer">
                    <label for="d" id="d_text">Answer</label>
                </li>

            </ul>
        </div>
        <button id="submit">Submit</button>

    </div>

    <?php
     $qryst="select * from ".$_GET["quiz_choosed"].";";
     $result = $conn->query($qryst);
 
     if ($result && $result->num_rows > 0) {
         /*echo "<h1>welcome ".$_SESSION['user']."<h1>";*/
         echo "<script> const quizData = [";
           while($row = $result->fetch_assoc()) {
             echo "
                 {
                     question: '".$row["question"]."',
                     a: '".$row["option_a"]."',
                     b: '".$row["option_b"]."',
                     c: '".$row["option_c"]."',
                     d: '".$row["option_d"]."',
                     correct: '".$row["answer"]."',
                 },";
         }
         echo  "];
         const quiz= document.getElementById('quiz')
         const answerEls = document.querySelectorAll('.answer')
         const questionEl = document.getElementById('question')
         const a_text = document.getElementById('a_text')
         const b_text = document.getElementById('b_text')
         const c_text = document.getElementById('c_text')
         const d_text = document.getElementById('d_text')
         const submitBtn = document.getElementById('submit')
         
         
         let currentQuiz = 0
         let score = 0
         
         loadQuiz()
         
         function loadQuiz() {
         
             deselectAnswers()
         
             const currentQuizData = quizData[currentQuiz]
         
             questionEl.innerText = currentQuizData.question
             a_text.innerText = currentQuizData.a
             b_text.innerText = currentQuizData.b
             c_text.innerText = currentQuizData.c
             d_text.innerText = currentQuizData.d
         }
         
         function deselectAnswers() {
             answerEls.forEach(answerEl => answerEl.checked = false)
         }
         
         function getSelected() {
             let answer
             answerEls.forEach(answerEl => {
                 if(answerEl.checked) {
                     answer = answerEl.id
                 }
             })
             return answer
         }
         
         
         submitBtn.addEventListener('click', () => {
             const answer = getSelected()
             if(answer) {
                if(answer === quizData[currentQuiz].correct) {
                    score++
                }
         
                currentQuiz++
         
                if(currentQuiz < quizData.length) {
                    loadQuiz()
                } else {
                    quiz.innerHTML = `
                    <h2>You answered `+score+`/`+quizData.length+` questions correctly</h2>
         
                    <button onclick='location.reload()'>Reload</button>
                    `
                }
             }
         })    
     </script>";
     } else {
           echo "0 results";
     }
    
    ?>


</body>

</html>