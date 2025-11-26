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
                    <h2 class="rules-title">Règles du jeu</h2>
                    <div class="rules-container">
                        <div class="rule-item">
                            <div class="rule-number">1</div>
                            <div class="rule-content">
                                <h3>Déroulement du quiz</h3>
                                <p>Le quiz est composé de 3 questions de difficulté croissante (facile, normale, difficile).</p>
                            </div>
                        </div>
                        <div class="rule-item">
                            <div class="rule-number">2</div>
                            <div class="rule-content">
                                <h3>Réponses</h3>
                                <p>Pour chaque question, sélectionnez la réponse qui vous semble correcte.</p>
                            </div>
                        </div>
                        <div class="rule-item">
                            <div class="rule-number">3</div>
                            <div class="rule-content">
                                <h3>Validation</h3>
                                <p>Vous devez répondre à toutes les questions pour obtenir votre score.</p>
                            </div>
                        </div>
                        <div class="rule-item">
                            <div class="rule-number">4</div>
                            <div class="rule-content">
                                <h3>Victoire</h3>
                                <p>Pour gagner, vous devez obtenir au moins 2 bonnes réponses sur 3.</p>
                            </div>
                        </div>
                        <div class="rule-item">
                            <div class="rule-number">5</div>
                            <div class="rule-content">
                                <h3>Conseil</h3>
                                <p>Prenez votre temps et bonne chance !</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        <button id="backFromRules" class="btn" aria-label="Retour à l'accueil">Retour</button>
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
