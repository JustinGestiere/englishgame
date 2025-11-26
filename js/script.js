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
    const finishBtn = document.getElementById('finishBtn');
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
                question: "What is a brand style guide?",
                options: [
                    "A document that defines a brand's visual and editorial rules",
                    "An internal HR manual",
                    "An annual marketing audit",
                    "Graphic design software"
                ],
                correctIndex: 0
            },
            {
                id: 2,
                question: "What basic elements does a style guide include?",
                options: [
                    "Social media statistics",
                    "Logo, colors, typography, brand voice",
                    "The company's pricing",
                    "The full editorial calendar"
                ],
                correctIndex: 1
            },
            {
                id: 3,
                question: "What is the difference between a primary and a secondary logo?",
                options: [
                    "The secondary is always larger",
                    "The secondary permanently replaces the primary",
                    "The primary is used only on social media",
                    "The primary is the main identity; the secondary is a variation"
                ],
                correctIndex: 3
            },
            {
                id: 4,
                question: "Why define a color palette?",
                options: [
                    "To reduce printing costs",
                    "To ensure the brand's visual consistency",
                    "To limit designers' creativity",
                    "To block competitors from using certain colors"
                ],
                correctIndex: 1
            },
            {
                id: 5,
                question: "What is the purpose of typography?",
                options: [
                    "To optimize SEO",
                    "To give text a visual personality and improve readability",
                    "To turn text into images",
                    "To speed up website loading"
                ],
                correctIndex: 1
            },
            {
                id: 6,
                question: "What does 'brand voice' mean?",
                options: [
                    "The brand's official soundtrack",
                    "The style and tone used in communication",
                    "The voice of the person who reads ads",
                    "A tool to analyze customer comments"
                ],
                correctIndex: 1
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
        document.querySelectorAll('.section, .page').forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none';
        });
        
        // Show the requested section
        const section = document.getElementById(sectionToShow);
        if (section) {
            section.classList.add('active');
            section.style.display = 'block';
            
            // Special case for quiz section to show the container
            if (sectionToShow === 'quiz') {
                document.getElementById('quizContainer').style.display = 'block';
                document.getElementById('results').style.display = 'none';
            }
        }
    }

    // Événements
    startQuizBtn.addEventListener('click', startQuiz);
    showRulesBtn.addEventListener('click', () => showSection('rules'));
    backFromRulesBtn.addEventListener('click', () => showSection('home'));
    backBtn.addEventListener('click', previousQuestion);
    nextBtn.addEventListener('click', nextQuestion);
    finishBtn.addEventListener('click', showResults);
    restartQuizBtn.addEventListener('click', startQuiz);
    backToHomeBtn.addEventListener('click', () => showSection('home'));

    // Fonctions du quiz
    function startQuiz() {
        // Mélanger les questions pour chaque niveau de difficulté et en sélectionner une de chaque
        const easyQuestions = [...questions.easy].sort(() => Math.random() - 0.5).slice(0, 1);
        const normalQuestions = [...questions.normal].sort(() => Math.random() - 0.5).slice(0, 1);
        const hardQuestions = [...questions.hard].sort(() => Math.random() - 0.5).slice(0, 1);
        
        // Combiner les questions dans un ordre aléatoire
        const allSelectedQuestions = [...easyQuestions, ...normalQuestions, ...hardQuestions];
        quizQuestions = allSelectedQuestions.sort(() => Math.random() - 0.5);
        
        // Réinitialiser l'état du quiz
        userAnswers = new Array(quizQuestions.length).fill(null);
        currentQuestionIndex = 0;
        score = 0;
        
        // Afficher la section quiz et charger la première question
        showSection('quiz');
        quizContainer.classList.remove('hidden');
        // Mettre à jour les boutons de navigation
        backBtn.classList.toggle('hidden', currentQuestionIndex === 0);
        nextBtn.classList.toggle('hidden', currentQuestionIndex === quizQuestions.length - 1);
        finishBtn.classList.toggle('hidden', currentQuestionIndex !== quizQuestions.length - 1);
        
        // Focus sur la première option pour l'accessibilité
        if (optionsContainer.firstChild) {
            optionsContainer.firstChild.focus();
        }
    }

    function loadQuestion() {
        // Afficher la question et les options
        questionText.textContent = quizQuestions[currentQuestionIndex].question;
        optionsContainer.innerHTML = '';
        
        quizQuestions[currentQuestionIndex].options.forEach((option, index) => {
            const optionElement = document.createElement('div');
            optionElement.className = 'option';
            optionElement.textContent = option;
            optionElement.addEventListener('click', () => selectOption(optionElement, index));
            
            optionsContainer.appendChild(optionElement);
        });
        
        // Afficher la section quiz et charger la première question
        showSection('quiz');
        quizContainer.classList.remove('hidden');
        // Mettre à jour les boutons de navigation
        backBtn.classList.toggle('hidden', currentQuestionIndex === 0);
        nextBtn.classList.toggle('hidden', currentQuestionIndex === quizQuestions.length - 1);
        finishBtn.classList.toggle('hidden', currentQuestionIndex !== quizQuestions.length - 1);
        
        // Focus sur la première option pour l'accessibilité
        if (optionsContainer.firstChild) {
            optionsContainer.firstChild.focus();
        }
    }

    function selectOption(optionElement, optionIndex) {
        // Désélectionner l'option précédente
        const options = document.querySelectorAll('.option');
        options.forEach(opt => {
            opt.classList.remove('selected');
            opt.setAttribute('aria-checked', 'false');
        });
        
        // Sélectionner la nouvelle option
        optionElement.classList.add('selected');
        optionElement.setAttribute('aria-checked', 'true');
        selectedOption = optionIndex;
        userAnswers[currentQuestionIndex] = optionIndex;
        
        // Activer le bouton suivant s'il y a une sélection
        if (nextBtn.disabled) {
            nextBtn.disabled = false;
        }
    }

    function nextQuestion() {
        if (selectedOption === null && userAnswers[currentQuestionIndex] === null) {
            return; // Ne pas avancer si aucune option n'est sélectionnée
        }
        
        if (currentQuestionIndex < quizQuestions.length - 1) {
            currentQuestionIndex++;
            selectedOption = userAnswers[currentQuestionIndex];
            loadQuestion();
        } else {
            showResults();
        }
    }

    function previousQuestion() {
        if (currentQuestionIndex > 0) {
            currentQuestionIndex--;
            selectedOption = userAnswers[currentQuestionIndex];
            loadQuestion();
        }
    }

    function showResults() {
        // Calculer le score
        score = 0;
        
        quizQuestions.forEach((question, index) => {
            const userAnswer = userAnswers[index];
            const isCorrect = userAnswer === question.correctIndex;
            
            if (isCorrect) {
                score++;
            }
        });
        
        // Afficher le score et le message de félicitations
        const percentage = Math.round((score / quizQuestions.length) * 100);
        const isSuccess = percentage >= 66;
        
        resultTitle.textContent = isSuccess ? '🎉 Congratulations!' : '😕 Try again';
        resultTitle.parentElement.className = `result ${isSuccess ? 'success' : 'failure'}`;
        scoreText.textContent = `Your score: ${score} out of ${quizQuestions.length}`;
        
        // Afficher les réponses
        feedback.innerHTML = '';
        
        quizQuestions.forEach((question, index) => {
            const userAnswerIndex = userAnswers[index];
            const isCorrect = userAnswerIndex === question.correctIndex;
            const userAnswer = userAnswerIndex !== null && userAnswerIndex !== undefined 
                ? question.options[userAnswerIndex] 
                : 'No answer';
            
            const answerElement = document.createElement('div');
            answerElement.className = isCorrect ? 'correct-answer' : 'incorrect-answer';
            
            answerElement.innerHTML = `
                <p><strong>Question ${index + 1}:</strong> ${question.question}</p>
                <p>${isCorrect ? '✅' : '❌'} Your answer: ${userAnswer}</p>
            `;
            
            feedback.appendChild(answerElement);
        });
        
        // Afficher la section des résultats
        quizContainer.classList.add('hidden');
        resultsSection.classList.remove('hidden');
        
        // Focus sur le bouton de redémarrage pour l'accessibilité
        restartQuizBtn.focus();
    }

    // Gestion du clavier pour l'accessibilité
    document.addEventListener('keydown', function(e) {
        if (!quizSection.classList.contains('active')) return;
        
        const options = Array.from(document.querySelectorAll('.option'));
        const focusedOption = document.activeElement;
        const focusedIndex = options.indexOf(focusedOption);
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (focusedIndex < options.length - 1) {
                    options[focusedIndex + 1].focus();
                } else if (options.length > 0) {
                    options[0].focus();
                }
                break;
                
            case 'ArrowUp':
                e.preventDefault();
                if (focusedIndex > 0) {
                    options[focusedIndex - 1].focus();
                } else if (options.length > 0) {
                    options[options.length - 1].focus();
                }
                break;
                
            case ' ':
            case 'Enter':
                if (options.includes(focusedOption)) {
                    e.preventDefault();
                    const optionIndex = options.indexOf(focusedOption);
                    selectOption(focusedOption, optionIndex);
                } else if (document.activeElement === nextBtn) {
                    nextQuestion();
                } else if (document.activeElement === backBtn) {
                    previousQuestion();
                }
                break;
                
            case 'ArrowRight':
                if (document.activeElement === nextBtn || document.activeElement === backBtn) {
                    nextBtn.focus();
                }
                break;
                
            case 'ArrowLeft':
                if (document.activeElement === nextBtn || document.activeElement === backBtn) {
                    if (!backBtn.classList.contains('hidden')) {
                        backBtn.focus();
                    }
                }
                break;
        }
    });
});
