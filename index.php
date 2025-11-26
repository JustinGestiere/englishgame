<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="author" content="Equipe Branding">
    <meta name="keywords" content="branding, quiz, style guide, identité de marque, design, marketing">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Language" content="en">
    <meta name="theme-color" content="#3498db">
    <meta name="description" content="Testez vos connaissances en branding avec ce quiz interactif. Découvrez les règles essentielles des guides de style et d'identité de marque." />
    <title>The Brand Quest - Testez vos connaissances en branding</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Elms+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a href="#main-content" class="skip-link">Skip to main content</a>
    
    <div class="container">
        <header>
            <h1>The Brand Quest</h1>
        </header>

        <main id="main-content">
            <!-- Home Screen -->
            <section id="home" class="section active">
                <div class="btn-group">
                    <button id="startQuiz" class="btn" aria-label="Start the quiz">Start Quiz</button>
                    <button id="showRules" class="btn" aria-label="View game rules">View Rules</button>
                </div>
            </section>

            <!-- Rules Section -->
            <section id="rules" class="section">
                <div class="rules">
                    <h2>Game Rules</h2>
                    <ol>
                        <li>The quiz consists of 3 questions of increasing difficulty (easy, normal, hard).</li>
                        <li>For each question, select the answer that seems correct to you.</li>
                        <li>You must answer all questions to get your score.</li>
                        <li>To win, you need to get at least 2 out of 3 answers correct.</li>
                        <li>Take your time and good luck!</li>
                    </ol>
                    <div class="btn-group">
                        <button id="backFromRules" class="btn" aria-label="Back to home">Back</button>
                    </div>
                </div>
            </section>

            <!-- Quiz Section -->
            <section id="quiz" class="section">
                <div id="quizContainer">
                    <div class="progress" id="progress" aria-live="polite">Question 1 of 3</div>
                    <div class="question-container">
                        <div id="question" class="question" aria-live="polite"></div>
                        <div id="options" class="options" role="radiogroup"></div>
                    </div>
                    <div class="navigation">
                        <button id="backBtn" class="btn hidden" aria-label="Previous question">Previous</button>
                        <button id="nextBtn" class="btn" aria-label="Next question">Next</button>
                    </div>
                </div>

                <!-- Results Section -->
                <div id="results" class="result hidden" role="alert" aria-live="polite">
                    <h2 id="resultTitle"></h2>
                    <p id="scoreText"></p>
                    <div id="feedback"></div>
                    <div class="btn-group">
                        <button id="restartQuiz" class="btn" aria-label="Restart the quiz">New Quiz</button>
                        <button id="backToHome" class="btn" aria-label="Back to home">Home</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
