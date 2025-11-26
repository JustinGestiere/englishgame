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
        <header class="logo-container">
            <img src="images/logo.png" alt="The Brand Quest" class="logo">
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
                    <div class="rules-images">
                        <img src="images/1.png" alt="Rule 1" class="rule-image">
                        <img src="images/2.png" alt="Rule 2" class="rule-image">
                        <img src="images/3.png" alt="Rule 3" class="rule-image">
                        <img src="images/4.png" alt="Rule 4" class="rule-image">
                        <img src="images/5.png" alt="Rule 5" class="rule-image">
                        <img src="images/6.png" alt="Rule 6" class="rule-image">
                        <img src="images/7.png" alt="Rule 7" class="rule-image">
                        <img src="images/8.png" alt="Rule 8" class="rule-image">
                    </div>
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
