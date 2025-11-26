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
            <section id="rules" class="page">
                <div class="inner">
                    <h1 class="section-title">RULES OF THE GAME</h1>
                    
                    <div class="rules-container">
                        <div class="rule-item">
                            <h2 class="sub">GAME GOAL</h2>
                            <p>In <strong>The Brand Quest</strong>, players aim to win by fulfilling one of the following conditions:</p>
                            <ol class="goal-list">
                                <li>Be the last player not bankrupt, or</li>
                                <li>Own all 4 family parts agency's color, either:
                                    <ul>
                                        <li><strong>Level 1</strong> — A house on each property</li>
                                        <li><strong>Level 2</strong> — A level-2 skill (building) on each property</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                        
                        <div class="rule-item">
                            <h2 class="sub">PREPARATION</h2>
                            <h3 class="sub green">Equipments</h3>
                            <ul class="bullets">
                                <li>Game board, rules booklet, 1 die</li>
                                <li>4 pieces (Agencies)</li>
                                <li>Banknotes: 40×25€, 28×50€, 20×100€, 12×200€</li>
                                <li>16 property cards</li>
                                <li>20 chance cards</li>
                                <li>32 acquisition tokens + 1 creative lab token</li>
                                <li>Bank (managed by one player)</li>
                                <li>Online bonus: Client Blockage Quiz (via QR)</li>
                            </ul>
                            
                            <h3 class="sub green">The bank</h3>
                            <ul class="bullets">
                                <li>Manages money, cards, taxes and building construction.</li>
                                <li>May play but must keep personal money separate from bank money.</li>
                            </ul>
                        </div>
                        
                        <div class="rule-item">
                            <h3 class="sub">SETTING UP THE GAME</h3>
                            <ul class="bullets">
                                <li>Each player receives <strong>800€</strong> (2×200, 2×100, 2×50, 4×25).</li>
                                <li>All pieces start on the "Start" space.</li>
                                <li>Shuffle the chance cards and place them face down.</li>
                                <li>The bank prepares the bills and the cards for each set.</li>
                            </ul>
                        </div>
                        
                        <div class="rule-item">
                            <h2 class="sub">GAMEPLAY</h2>
                            <h3 class="sub green">1. Game turn</h3>
                            <ul class="bullets">
                                <li>The player rolls the die, moves their token and applies the effect of the space.</li>
                                <li>Rolling a <strong>6</strong> = roll again.</li>
                                <li>3 consecutive doubles = go to the "Client Blockage" space.</li>
                                <li>Turns proceed clockwise.</li>
                            </ul>
                            
                            <h3 class="sub green">2. Board spaces</h3>
                            
                            <div class="space">
                                <h3 class="space-title">"Start" space</h3>
                                <ul class="bullets">
                                    <li>Passing or landing on it → collect <strong>200€</strong>.</li>
                                    <li>No effect if you stay on it or are sent to it by a card.</li>
                                </ul>
                            </div>
                            
                            <div class="space">
                                <h3 class="space-title">Unpurchased Property</h3>
                                <ul class="bullets">
                                    <li>You may buy the property at the listed price. If bought, your turn ends.</li>
                                    <li>If you refuse → your turn ends with no purchase.</li>
                                </ul>
                            </div>
                            
                            <div class="space">
                                <h3 class="space-title">Rent & Properties</h3>
                                <ul class="bullets">
                                    <li>Landing on another player's Family space → pay that player's rent of €100</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">3. Construction</h3>
                            <div class="space">
                                <h4>Acquisition token & cards skill level 2</h4>
                                <ul class="bullets">
                                    <li>Build evenly: max 1 acquisition token per row, per person</li>
                                    <li>You may only buy on your brief client.</li>
                                </ul>
                                
                                <h4>Requirements</h4>
                                <ul class="bullets">
                                    <li>Level 1 (a total of 4 acquisition tokens): 850€</li>
                                    <li>Level 2 (skills): 1650€</li>
                                </ul>
                                
                                <h4>Costs</h4>
                                <ul class="bullets">
                                    <li>Maximum 4 acquisition tokens.</li>
                                    <li>Level 2 skills can only be obtained if an acquisition token has already been purchased.</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">4. Mortgages</h3>
                            <div class="space">
                                <ul class="bullets">
                                    <li>Return the property card to the bank → receive its mortgage value.</li>
                                    <li>Mortgaged properties don't collect rent.</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">5. Chance Cards</h3>
                            <div class="space">
                                <ul class="bullets">
                                    <li>The player on your left reads the card.</li>
                                    <li>Correct answer = bonus</li>
                                    <li>Wrong answer = penalty.</li>
                                    <li>The player places the card at the bottom of the deck.</li>
                                </ul>
                                
                                <h4>Possible effects</h4>
                                <ul class="bullets">
                                    <li>Move to: Client Blockage / INPI / Creative Lab</li>
                                    <li>Pay / receive money</li>
                                    <li>Move forward / backward</li>
                                    <li>Repairs / destroy</li>
                                    <li>Pay taxes</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">6. INPI (similar to Jail)</h3>
                            <div class="space">
                                <h4>Going to INPI</h4>
                                <ul class="bullets">
                                    <li>By landing on the INPI space</li>
                                    <li>OR being sent there by a Chance card.</li>
                                </ul>
                                
                                <h4>Being in INPI</h4>
                                <p>To leave INPI :</p>
                                <ul class="bullets">
                                    <li>Pay 100€ before rolling, OR</li>
                                    <li>Attempt to roll a 1 or 6 (max 2 attempts).
                                        <ul>
                                            <li>Success → leave and move forward by that roll.</li>
                                            <li>Failure after 2 attempts → pay €100 and move forward by the second roll.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">7. Creative Lab</h3>
                            <div class="space">
                                <h4>Going to the Creative Lab</h4>
                                <ul class="bullets">
                                    <li>By landing on the Creative Lab space</li>
                                    <li>OR via a Chance card</li>
                                </ul>
                                
                                <h4>Being in the Creative Lab</h4>
                                <ul class="bullets">
                                    <li>Place the "Creative Lab" token on one of your collectable spaces.</li>
                                    <li>It will replace an acquisition until a player lands on the "Creative Lab" space.</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">8. Client Blockage</h3>
                            <div class="space">
                                <h4>Going to Client Blockage</h4>
                                <h4>Going to Client Blockage</h4>
                                <ul class="bullets">
                                    <li>By landing on the Client Blockage space</li>
                                    <li>Through a Chance card</li>
                                    <li>Rolling 3 consecutive doubles
                                        <ul>
                                            <li>Without passing "Start" space → no 200€</li>
                                        </ul>
                                    </li>
                                </ul>
                                
                                <h4>Two ways to get out:</h4>
                                <ol class="bullets">
                                    <li>Online Quiz: get 2 out of 3 correct → released.</li>
                                    <li>If the quiz is unavailable → try rolling a 6 (3 attempts).
                                        <ul>
                                            <li>Success → leave and move forward by the roll.</li>
                                            <li>Failure → leave and move forward using the 3rd roll.</li>
                                        </ul>
                                    </li>
                                </ol>
                                
                                <h4>During blockage:</h4>
                                <ul class="bullets">
                                    <li>You may still collect rent and sell properties.</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">9. Bankruptcy</h3>
                            <div class="space">
                                <p>A player is eliminated if they cannot pay even after:</p>
                                <ul class="bullets">
                                    <li>Mortgaging</li>
                                </ul>
                                
                                <h4>Consequences:</h4>
                                <ul class="bullets">
                                    <li>Debt to another player → all money goes to that player.</li>
                                    <li>Debt to the bank → cards returned to the bank.</li>
                                </ul>
                            </div>
                            
                            <h3 class="sub green">10. End of the Game</h3>
                            <div class="space">
                                <p>The game ends when:</p>
                                <ol class="bullets">
                                    <li>Only one player is not bankrupt, or</li>
                                    <li>A player owns all 4 family sets of their agency color
                                        <ul>
                                            <li>That player wins the game.</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    
                    <div class="btn-group" style="margin-top: 40px;">
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
                        <button id="finishBtn" class="btn hidden" aria-label="Finish the quiz">Finish</button>
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
