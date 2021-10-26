const quizData = [
    {
        question: "How to find area under a curve?",
        a: "Differentiatian",
        b: "Permutation",
        c: "Addition",
        d: "Integration",
        correct: "d",
    },
    {
        question: "How to find slope of a curve?",
        a: "Intgration",
        b: "Differentiation",
        c: "Stirling Number",
        d: "Multiplication",
        correct: "b",
    },
    {
        question: "Divergence of a curl = ?",
        a: "0",
        b: "1",
        c: "-1",
        d: "Infinity",
        correct: "a",
    },
    {
        question: "Minimum no. of colours required to colour any map?",
        a: "10",
        b: "4",
        c: "7",
        d: "5",
        correct: "b",
    },
];

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
           <h2>You answered ${score}/${quizData.length} questions correctly</h2>

           <button onclick="location.reload()">Reload</button>
           `
       }
    }
})