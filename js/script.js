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
                question: "What is the purpose of a color palette in branding?",
                options: [
                    "To make the brand look pretty",
                    "To ensure visual consistency across all brand materials",
                    "To limit design creativity",
                    "To match the CEO's favorite colors"
                ],
                correctIndex: 1
            },
            {
                id: 4,
                question: "What is typography in the context of branding?",
                options: [
                    "The study of typewriters",
                    "The art of arranging type to make written language legible and appealing",
                    "A type of photography",
                    "A printing technique"
                ],
                correctIndex: 1
            },
            {
                id: 5,
                question: "Why is consistency important in branding?",
                options: [
                    "It makes the brand look professional and trustworthy",
                    "It's easier for designers",
                    "It's required by law",
                    "It saves money on printing"
                ],
                correctIndex: 0
            },
            {
                id: 6,
                question: "What is a brand's tone of voice?",
                options: [
                    "The volume at which the brand speaks",
                    "The brand's personality expressed through words",
                    "The jingle in commercials",
                    "The font used in the logo"
                ],
                correctIndex: 1
            }
        ],
        normal: [
            {
                id: 7,
                question: "How do you define logo usage rules?",
                options: [
                    "By allowing any color variation",
                    "By specifying minimum size, clear space, and color variations",
                    "By letting each designer decide",
                    "By using it only in digital format"
                ],
                correctIndex: 1
            },
            {
                id: 8,
                question: "What is the difference between primary and secondary colors in a brand palette?",
                options: [
                    "Primary colors are for print, secondary for digital",
                    "Primary colors are main brand colors, secondary support and complement them",
                    "Primary colors are brighter than secondary",
                    "There is no difference"
                ],
                correctIndex: 1
            },
            {
                id: 9,
                question: "What is the purpose of a brand style guide?",
                options: [
                    "To limit creativity",
                    "To ensure consistency across all brand communications",
                    "To make marketing more difficult",
                    "To increase printing costs"
                ],
                correctIndex: 1
            },
            {
                id: 10,
                question: "How should a brand handle social media imagery?",
                options: [
                    "Use any image that looks good",
                    "Follow the same visual guidelines as other brand materials",
                    "Let each social media manager decide",
                    "Only use stock photos"
                ],
                correctIndex: 1
            },
            {
                id: 11,
                question: "What is the role of negative space in logo design?",
                options: [
                    "To save on printing costs",
                    "To create balance and improve readability",
                    "To make the logo look bigger",
                    "Negative space should always be avoided"
                ],
                correctIndex: 1
            },
            {
                id: 12,
                question: "Why is it important to define typography hierarchy?",
                options: [
                    "To make documents look more professional",
                    "To guide the reader through content in order of importance",
                    "To use as many fonts as possible",
                    "It's not actually important"
                ],
                correctIndex: 1
            }
        ],
        hard: [
            {
                id: 13,
                question: "How does a guide evolve during rebranding?",
                options: [
                    "It remains unchanged",
                    "It's completely deleted and recreated",
                    "It's updated to reflect new visual and strategic directions",
                    "Only the logo is changed"
                ],
                correctIndex: 2
            },
            {
                id: 14,
                question: "What is the difference between brand identity and brand image?",
                options: [
                    "They are the same thing",
                    "Brand identity is how the company presents itself, brand image is how it's perceived",
                    "Brand identity is for internal use, brand image for external",
                    "Brand identity changes frequently, brand image stays the same"
                ],
                correctIndex: 1
            },
            {
                id: 15,
                question: "How do you handle brand guidelines for global markets?",
                options: [
                    "Create completely different guidelines for each market",
                    "Maintain core elements while allowing for cultural adaptations",
                    "Ignore cultural differences",
                    "Let each country office decide"
                ],
                correctIndex: 1
            },
            {
                id: 16,
                question: "What is the role of semiotics in brand identity?",
                options: [
                    "It's the study of brand names",
                    "It analyzes how meaning is created and communicated through signs and symbols",
                    "It's a type of logo design",
                    "It's not relevant to branding"
                ],
                correctIndex: 1
            },
            {
                id: 17,
                question: "How do you measure the effectiveness of brand guidelines?",
                options: [
                    "By the number of pages in the guide",
                    "Through consistent application and brand recognition metrics",
                    "By how strictly they're enforced",
                    "It's not possible to measure"
                ],
                correctIndex: 1
            },
            {
                id: 18,
                question: "What is the importance of brand archetypes in identity?",
                options: [
                    "They limit creativity",
                    "They provide a framework for consistent brand personality and messaging",
                    "They're only useful for large corporations",
                    "They're an outdated concept"
                ],
                correctIndex: 1
            }
        ]
    };

    // Fonctions de navigation
    function showSection(sectionToShow) {
        document.querySelectorAll('.section').forEach(section => {
            section.classList.remove('active');
        });
        document.getElementById(sectionToShow).classList.add('active');
    }

    // Événements
    startQuizBtn.addEventListener('click', startQuiz);
    showRulesBtn.addEventListener('click', () => showSection('rules'));
    backFromRulesBtn.addEventListener('click', () => showSection('home'));
    backBtn.addEventListener('click', previousQuestion);
    nextBtn.addEventListener('click', nextQuestion);
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
        resultsSection.classList.add('hidden');
        loadQuestion();
    }

    function loadQuestion() {
        const question = quizQuestions[currentQuestionIndex];
        questionElement.textContent = question.question;
        progressElement.textContent = `Question ${currentQuestionIndex + 1} of ${quizQuestions.length}`;
        
        // Mettre à jour les options
        optionsContainer.innerHTML = '';
        question.options.forEach((option, index) => {
            const optionElement = document.createElement('div');
            optionElement.className = 'option';
            optionElement.textContent = option;
            optionElement.setAttribute('role', 'radio');
            optionElement.setAttribute('aria-checked', 'false');
            optionElement.setAttribute('tabindex', '0');
            
            if (userAnswers[currentQuestionIndex] === index) {
                optionElement.classList.add('selected');
                optionElement.setAttribute('aria-checked', 'true');
                selectedOption = index;
            }
            
            optionElement.addEventListener('click', () => selectOption(optionElement, index));
            optionElement.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    selectOption(optionElement, index);
                }
            });
            
            optionsContainer.appendChild(optionElement);
        });
        
        // Mettre à jour les boutons de navigation
        backBtn.classList.toggle('hidden', currentQuestionIndex === 0);
        nextBtn.textContent = currentQuestionIndex === quizQuestions.length - 1 ? 'Finish' : 'Next';
        
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
        let resultsHtml = '';
        
        quizQuestions.forEach((question, index) => {
            const userAnswer = userAnswers[index];
            const isCorrect = userAnswer === question.correctIndex;
            
            if (isCorrect) {
                score++;
            }
            
            resultsHtml += `
                <div class="result-item">
                    <p><strong>Question ${index + 1}:</strong> ${question.question}</p>
                    <p>Your answer: ${question.options[userAnswer]}</p>
                    <p>${isCorrect ? '✅ Correct!' : `❌ Incorrect. The correct answer is: ${question.options[question.correctIndex]}`}</p>
                </div>
                <hr>
            `;
        });
        
        // Afficher les résultats
        const percentage = Math.round((score / quizQuestions.length) * 100);
        const isSuccess = percentage >= 70;
        
        resultTitle.textContent = isSuccess ? '🎉 Congratulations!' : '😕 Try Again';
        resultTitle.parentElement.className = `result ${isSuccess ? 'success' : 'failure'}`;
        scoreText.textContent = `You scored ${score} out of ${quizQuestions.length} (${percentage}%)`;
        feedbackElement.innerHTML = resultsHtml;
        
        quizContainer.classList.add('hidden');
        resultsSection.classList.remove('hidden');
    }

    // Gestion du clavier pour l'accessibilité
    document.addEventListener('keydown', function(e) {
        // Ne traite les événements clavier que si nous sommes dans la section quiz
        if (!quizSection.classList.contains('active')) return;
        
        const options = Array.from(document.querySelectorAll('.option'));
        const focusedOption = document.activeElement;
        const focusedIndex = options.indexOf(focusedOption);
        
        switch(e.key) {
            case 'ArrowDown':
                e.preventDefault();
                if (focusedIndex < options.length - 1) {
                    options[focusedIndex + 1].focus();
                } else {
                    options[0].focus();
                }
                break;
                
            case 'ArrowUp':
                e.preventDefault();
                if (focusedIndex > 0) {
                    options[focusedIndex - 1].focus();
                } else {
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
