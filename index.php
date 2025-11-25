<?php
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Game</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .container {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            min-height: 70vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }

        .btn {
            display: inline-block;
            background: #3498db;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            margin: 10px;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            width: 200px;
        }

        .btn:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn:focus {
            outline: 3px solid #3498db;
            outline-offset: 2px;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        .section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .active {
            display: block;
        }

        /* Rules section */
        .rules {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            margin-top: 20px;
        }

        .rules h2 {
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .rules ol {
            padding-left: 20px;
        }

        .rules li {
            margin-bottom: 10px;
        }

        /* Quiz section */
        .question-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .question {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
        }

        .options {
            display: grid;
            grid-template-columns: 1fr;
            gap: 10px;
            margin-bottom: 2rem;
        }

        .option {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid #ddd;
        }

        .option:hover {
            background: #e0e0e0;
        }

        .option.selected {
            background: #3498db;
            color: white;
            border-color: #2980b9;
        }

        .option.correct {
            background: #2ecc71;
            color: white;
            border-color: #27ae60;
        }

        .option.wrong {
            background: #e74c3c;
            color: white;
            border-color: #c0392b;
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 2rem;
        }

        .progress {
            text-align: center;
            margin: 1rem 0;
            font-weight: bold;
            color: #7f8c8d;
        }

        .result {
            text-align: center;
            margin-top: 2rem;
            padding: 20px;
            border-radius: 8px;
            font-size: 1.2rem;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .failure {
            background-color: #f8d7da;
            color: #721c24;
        }

        .hidden {
            display: none;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive design */
        @media (min-width: 768px) {
            .btn-group {
                flex-direction: row;
                justify-content: center;
            }

            .options {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (min-width: 1024px) {
            .container {
                padding: 3rem;
            }

            .options {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Focus styles for accessibility */
        button:focus-visible, 
        [tabindex="0"]:focus-visible {
            outline: 3px solid #3498db;
            outline-offset: 2px;
        }

        /* Skip to content link */
        .skip-link {
            position: absolute;
            left: -9999px;
            z-index: 999;
            padding: 1em;
            background-color: white;
            color: #3498db;
            opacity: 0;
        }

        .skip-link:focus {
            left: 50%;
            transform: translateX(-50%);
            opacity: 1;
        }
    </style>
</head>
<body>
    <a href="#main-content" class="skip-link">Aller au contenu principal</a>
    
    <div class="container">
        <header>
            <h1>Quiz Game</h1>
        </header>

        <main id="main-content">
            <!-- Home Screen -->
            <section id="home" class="section active">
                <div class="btn-group">
                    <button id="startQuiz" class="btn" aria-label="Commencer le quiz">Faire le quiz</button>
                    <button id="showRules" class="btn" aria-label="Voir les règles du jeu">Voir les règles</button>
                </div>
            </section>

            <!-- Rules Section -->
            <section id="rules" class="section">
                <div class="rules">
                    <h2>Règles du jeu</h2>
                    <ol>
                        <li>Le quiz est composé de 3 questions de difficulté croissante (facile, normale, difficile).</li>
                        <li>Pour chaque question, sélectionnez la réponse qui vous semble correcte.</li>
                        <li>Vous devez répondre à toutes les questions pour obtenir votre score.</li>
                        <li>Pour gagner, vous devez avoir au moins 2 bonnes réponses sur 3.</li>
                        <li>Prenez votre temps et bonne chance !</li>
                    </ol>
                    <div class="btn-group">
                        <button id="backFromRules" class="btn" aria-label="Retour à l'accueil">Retour</button>
                    </div>
                </div>
            </section>

            <!-- Quiz Section -->
            <section id="quiz" class="section">
                <div id="quizContainer">
                    <div class="progress" id="progress" aria-live="polite">Question 1 sur 3</div>
                    <div class="question-container">
                        <div id="question" class="question" aria-live="polite"></div>
                        <div id="options" class="options" role="radiogroup"></div>
                    </div>
                    <div class="navigation">
                        <button id="backBtn" class="btn hidden" aria-label="Question précédente">Précédent</button>
                        <button id="nextBtn" class="btn" aria-label="Question suivante">Suivant</button>
                    </div>
                </div>

                <!-- Results Section -->
                <div id="results" class="result hidden" role="alert" aria-live="polite">
                    <h2 id="resultTitle"></h2>
                    <p id="scoreText"></p>
                    <div id="feedback"></div>
                    <div class="btn-group">
                        <button id="restartQuiz" class="btn" aria-label="Recommencer le quiz">Nouveau quiz</button>
                        <button id="backToHome" class="btn" aria-label="Retour à l'accueil">Accueil</button>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DOM Elements
            const homeSection = document.getElementById('home');
            const rulesSection = document.getElementById('rules');
            const quizSection = document.getElementById('quiz');
            const quizContainer = document.getElementById('quizContainer');
            const resultsSection = document.getElementById('results');
            
            const startQuizBtn = document.getElementById('startQuiz');
            const showRulesBtn = document.getElementById('showRules');
            const backFromRulesBtn = document.getElementById('backFromRules');
            const backBtn = document.getElementById('backBtn');
            const nextBtn = document.getElementById('nextBtn');
            const restartQuizBtn = document.getElementById('restartQuiz');
            const backToHomeBtn = document.getElementById('backToHome');
            
            const questionElement = document.getElementById('question');
            const optionsContainer = document.getElementById('options');
            const progressElement = document.getElementById('progress');
            const resultTitle = document.getElementById('resultTitle');
            const scoreText = document.getElementById('scoreText');
            const feedbackElement = document.getElementById('feedback');

            // Quiz state
            let currentQuestionIndex = 0;
            let score = 0;
            let selectedOption = null;
            let quizQuestions = [];
            let userAnswers = [];

            // Questions database
            const questions = {
                easy: [
                    {
                        id: 1,
                        question: "What is a brand style guide ?",
                        options: ["A document that defines a brand’s visual and editorial rules", 
                        "An internal HR manual", 
                        "An annual marketing audit", 
                        "Graphic design software"],
                        correctIndex: 0
                    },
                    {
                        id: 2,
                        question: "What basic elements does a style guide include ?",
                        options: ["Social media statistics", 
                        "Logo, colors, typography, brand voice", 
                        "The company’s pricing", 
                        "The full editorial calendar"],
                        correctIndex: 1
                    },
                    {
                        id: 3,
                        question: "What is the difference between a primary and a secondary logo ?",
                        options: ["The secondary is always larger", 
                        "The secondary permanently replaces the primary", 
                        "The primary is used only on social media", 
                        "The primary is the main identity; the secondary is a variation"],
                        correctIndex: 3
                    },
                    {
                        id: 4,
                        question: "Why define a color palette ?",
                        options: ["To reduce printing costs", 
                        "To ensure the brand’s visual consistency", 
                        "To limit designers’ creativity", 
                        "To block competitors from using certain colors"],
                        correctIndex: 1
                    },
                    {
                        id: 5,
                        question: "What is the purpose of typography ?",
                        options: ["To optimize SEO", 
                        "To give text a visual personality and improve readability", 
                        "To turn text into images", 
                        "To speed up website loading"],
                        correctIndex: 1
                    },
                    {
                        id: 6,
                        question: "What does “brand voice” mean ?",
                        options: ["The brand’s official soundtrack", 
                        "The voice of the person who reads ads", 
                        "The style and tone used in communication", 
                        "A tool to analyze customer comments"],
                        correctIndex: 2
                    }
                ],
                normal: [
                    {
                        id: 7,
                        question: "How do you define logo usage rules?",
                        options: [
                            "By choosing only one color",
                            "By specifying sizes, spacing, restrictions, and variations",
                            "By letting each designer use it freely",
                            "By imposing a single mandatory format"
                        ],
                        correctIndex: 1
                    },
                    {
                        id: 8,
                        question: "Why aim for visual consistency across platforms?",
                        options: [
                            "To reduce the number of graphic files",
                            "To strengthen brand recognition",
                            "To prevent dynamic visuals",
                            "To limit communication channels"
                        ],
                        correctIndex: 1
                    },
                    {
                        id: 9,
                        question: "What is a moodboard?",
                        options: [
                            "Photo-editing software",
                            "A music playlist",
                            "A chart tracking customer emotions",
                            "A visual collage defining a brand's aesthetic world"
                        ],
                        correctIndex: 3
                    },
                    {
                        id: 10,
                        question: "Difference between primary, secondary and accent colors?",
                        options: [
                            "Accent colors are only for logos",
                            "Primary colors are forbidden",
                            "Primary are main, secondary support, accents highlight",
                            "Secondary replace primary colors"
                        ],
                        correctIndex: 2
                    },
                    {
                        id: 11,
                        question: "How do you define typographic hierarchy?",
                        options: [
                            "By organizing sizes, weights, and roles",
                            "By using only capital letters",
                            "By choosing a single font size",
                            "By replacing text with images"
                        ],
                        correctIndex: 0
                    },
                    {
                        id: 12,
                        question: "How do you include iconography rules?",
                        options: [
                            "By allowing only vector illustrations",
                            "By defining style, framing, colors, and usage",
                            "By banning photographs",
                            "By using random images"
                        ],
                        correctIndex: 1
                    }
                ],
                hard: [
                    {
                        id: 13,
                        question: "How does a guide evolve during rebranding?",
                        options: [
                            "It becomes useless",
                            "It adapts to the new identity and updates all rules",
                            "It is replaced by an internal website",
                            "It serves only as an archive"
                        ],
                        correctIndex: 1
                    },
                    {
                        id: 14,
                        question: "How does editorial tone influence user experience?",
                        options: [
                            "It shapes brand perception and audience relationship",
                            "It changes website loading speed",
                            "It controls paid advertising",
                            "It auto-generates content"
                        ],
                        correctIndex: 0
                    },
                    {
                        id: 15,
                        question: "How do you formalize prohibited logo usages?",
                        options: [
                            "By removing alternate versions",
                            "By banning all usage",
                            "By giving only verbal rules",
                            "By showing clear don'ts (wrong colors, distortions, etc.)"
                        ],
                        correctIndex: 3
                    },
                    {
                        id: 16,
                        question: "How does a modular system reinforce consistency?",
                        options: [
                            "It prevents design evolution",
                            "It forces everyone to use the same document",
                            "It eliminates the need for designers",
                            "It provides reusable grids and components"
                        ],
                        correctIndex: 3
                    },
                    {
                        id: 17,
                        question: "How do you include accessibility guidelines?",
                        options: [
                            "By banning decorative fonts",
                            "By using highly detailed visuals",
                            "By limiting bright colors",
                            "By defining contrast, readability, and text alternatives"
                        ],
                        correctIndex: 3
                    },
                    {
                        id: 18,
                        question: "What metrics help evaluate a brand style guide?",
                        options: [
                            "The number of pages",
                            "Consistency across materials & brand recognition",
                            "Annual marketing budget",
                            "Number of logos created by teams"
                        ],
                        correctIndex: 1
                    }
                ]
            };

            // Navigation functions
            function showSection(sectionToShow) {
                // Hide all sections
                document.querySelectorAll('.section').forEach(section => {
                    section.classList.remove('active');
                });
                // Show the requested section
                sectionToShow.classList.add('active');
                // Focus on the first focusable element
                const focusable = sectionToShow.querySelector('button, [tabindex="0"]');
                if (focusable) focusable.focus();
            }

            // Event Listeners for navigation
            startQuizBtn.addEventListener('click', startQuiz);
            showRulesBtn.addEventListener('click', () => showSection(rulesSection));
            backFromRulesBtn.addEventListener('click', () => showSection(homeSection));
            backToHomeBtn.addEventListener('click', () => {
                showSection(homeSection);
                resetQuiz();
            });
            restartQuizBtn.addEventListener('click', startQuiz);

            // Start a new quiz
            function startQuiz() {
                // Reset quiz state
                currentQuestionIndex = 0;
                score = 0;
                userAnswers = [];
                selectedOption = null;
                
                // Select one question from each difficulty level
                const easyQuestion = getRandomQuestion('easy');
                const normalQuestion = getRandomQuestion('normal');
                const hardQuestion = getRandomQuestion('hard');
                
                // Combine and shuffle the questions (optional)
                quizQuestions = [easyQuestion, normalQuestion, hardQuestion];
                // Uncomment the line below to randomize the order
                // quizQuestions = shuffleArray([easyQuestion, normalQuestion, hardQuestion]);
                
                // Show quiz section and hide results
                showSection(quizSection);
                quizContainer.classList.remove('hidden');
                resultsSection.classList.add('hidden');
                
                // Load the first question
                loadQuestion();
            }

            // Get a random question from a difficulty level
            function getRandomQuestion(difficulty) {
                const availableQuestions = questions[difficulty];
                const randomIndex = Math.floor(Math.random() * availableQuestions.length);
                return {
                    ...availableQuestions[randomIndex],
                    difficulty: difficulty
                };
            }

            // Shuffle array (Fisher-Yates algorithm)
            function shuffleArray(array) {
                const newArray = [...array];
                for (let i = newArray.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [newArray[i], newArray[j]] = [newArray[j], newArray[i]];
                }
                return newArray;
            }

            // Load question into the UI
            function loadQuestion() {
                const question = quizQuestions[currentQuestionIndex];
                questionElement.textContent = question.question;
                progressElement.textContent = `Question ${currentQuestionIndex + 1} sur ${quizQuestions.length}`;
                
                // Clear previous options
                optionsContainer.innerHTML = '';
                
                // Create option elements
                question.options.forEach((option, index) => {
                    const optionElement = document.createElement('div');
                    optionElement.className = 'option';
                    optionElement.textContent = option;
                    optionElement.tabIndex = 0;
                    optionElement.setAttribute('role', 'radio');
                    optionElement.setAttribute('aria-checked', 'false');
                    optionElement.setAttribute('aria-label', option);
                    
                    // Check if this option was previously selected
                    if (userAnswers[currentQuestionIndex] === index) {
                        optionElement.classList.add('selected');
                        optionElement.setAttribute('aria-checked', 'true');
                        selectedOption = index;
                    }
                    
                    // Add click and keyboard event listeners
                    optionElement.addEventListener('click', () => selectOption(optionElement, index));
                    optionElement.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            selectOption(optionElement, index);
                        }
                    });
                    
                    optionsContainer.appendChild(optionElement);
                });
                
                // Update navigation buttons
                backBtn.classList.toggle('hidden', currentQuestionIndex === 0);
                nextBtn.textContent = currentQuestionIndex === quizQuestions.length - 1 ? 'Terminer' : 'Suivant';
                
                // Disable next button if no option is selected
                nextBtn.disabled = userAnswers[currentQuestionIndex] === undefined;
                
                // Focus on the first option for keyboard navigation
                if (optionsContainer.firstChild) {
                    optionsContainer.firstChild.focus();
                }
            }

            // Handle option selection
            function selectOption(optionElement, index) {
                // Deselect all options
                document.querySelectorAll('.option').forEach(opt => {
                    opt.classList.remove('selected');
                    opt.setAttribute('aria-checked', 'false');
                });
                
                // Select the clicked option
                optionElement.classList.add('selected');
                optionElement.setAttribute('aria-checked', 'true');
                selectedOption = index;
                userAnswers[currentQuestionIndex] = index;
                
                // Enable the next button
                nextBtn.disabled = false;
                
                // Focus the selected option for keyboard navigation
                optionElement.focus();
            }

            // Navigation between questions
            backBtn.addEventListener('click', () => {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    loadQuestion();
                }
            });

            nextBtn.addEventListener('click', () => {
                // If it's the last question, show results
                if (currentQuestionIndex === quizQuestions.length - 1) {
                    showResults();
                } else {
                    // Otherwise, go to the next question
                    currentQuestionIndex++;
                    loadQuestion();
                }
            });

            // Show quiz results
            function showResults() {
                // Calculate score
                score = 0;
                let resultsHtml = '';
                
                quizQuestions.forEach((question, index) => {
                    const userAnswer = userAnswers[index];
                    const isCorrect = userAnswer === question.correctIndex;
                    if (isCorrect) score++;
                    
                    // Add question result to feedback
                    resultsHtml += `
                        <div class="question-feedback" style="margin: 15px 0; padding: 10px; border-radius: 5px; 
                            background: ${isCorrect ? '#d4edda' : '#f8d7da'};">
                            <p><strong>Question ${index + 1}:</strong> ${question.question}</p>
                            <p>Votre réponse: <span style="color: ${isCorrect ? '#155724' : '#721c24'}; font-weight: bold;">
                                ${userAnswer !== undefined ? question.options[userAnswer] : 'Non répondue'}
                            </span></p>
                            ${!isCorrect ? `<p>Réponse correcte: <span style="color: #155724; font-weight: bold;">${question.options[question.correctIndex]}</span></p>` : ''}
                        </div>
                    `;
                });
                
                // Update UI
                const isWin = score >= 2;
                resultTitle.textContent = isWin ? '🎉 Félicitations ! 🎉' : 'Dommage...';
                resultTitle.setAttribute('aria-live', 'polite');
                scoreText.textContent = `Vous avez obtenu ${score} bonne(s) réponse(s) sur ${quizQuestions.length}.`;
                feedbackElement.innerHTML = resultsHtml;
                
                // Show appropriate result section
                resultsSection.className = `result ${isWin ? 'success' : 'failure'}`;
                
                // Hide quiz container and show results
                quizContainer.classList.add('hidden');
                resultsSection.classList.remove('hidden');
                
                // Save score to localStorage
                saveScore(score);
            }

            // Save score to localStorage
            function saveScore(score) {
                try {
                    localStorage.setItem('lastQuizScore', score);
                } catch (e) {
                    console.error('Erreur lors de la sauvegarde du score:', e);
                }
            }

            // Reset quiz state
            function resetQuiz() {
                currentQuestionIndex = 0;
                score = 0;
                selectedOption = null;
                userAnswers = [];
                quizQuestions = [];
            }

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                // Only handle keyboard events if we're on the quiz section
                if (!quizSection.classList.contains('active')) return;
                
                const options = Array.from(document.querySelectorAll('.option'));
                const currentOption = document.activeElement;
                const currentIndex = options.indexOf(currentOption);
                
                // Handle arrow key navigation between options
                if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                    e.preventDefault();
                    if (currentIndex < options.length - 1) {
                        options[currentIndex + 1].focus();
                    }
                } else if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                    e.preventDefault();
                    if (currentIndex > 0) {
                        options[currentIndex - 1].focus();
                    }
                }
                
                // Handle space/enter to select option
                if ((e.key === ' ' || e.key === 'Enter') && currentOption.classList.contains('option')) {
                    e.preventDefault();
                    const index = options.indexOf(currentOption);
                    selectOption(currentOption, index);
                }
                
                // Handle tab navigation for accessibility
                if (e.key === 'Tab') {
                    // Ensure focus stays within the current question
                    if (e.shiftKey) {
                        // Shift+Tab
                        if (document.activeElement === options[0] || document.activeElement === backBtn) {
                            e.preventDefault();
                            nextBtn.focus();
                        }
                    } else {
                        // Tab
                        if (document.activeElement === nextBtn || 
                            (document.activeElement === options[options.length - 1] && !backBtn.classList.contains('hidden'))) {
                            e.preventDefault();
                            backBtn.focus();
                        }
                    }
                }
            });
            
            // Initialize
            if (localStorage.getItem('lastQuizScore') !== null) {
                // Optional: Show last score on home screen
                // const lastScore = localStorage.getItem('lastQuizScore');
                // console.log('Dernier score:', lastScore);
            }
        });
    </script>
</body>
</html>