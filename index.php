<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>[M3-FORMATIVE] PHP Arrays and User Defined Functions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #996216;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="https://i.postimg.cc/HxqPdwb1/gianatics-logo-white.png" class="header-img" alt="Logo">
            </a>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="centered-container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="greetings">
                                <h1>Hello!</h1>
                            </div>
                            <div>
                                <h2>You can place 10 numbers, and I would add, subtract, multiply, and divide them!</h2>
                                <form id="data-form" method="post" enctype="multipart/form-data">
                                    <label for="number1">Number 1:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number1" name="number1" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number2">Number 2:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number2" name="number2" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number3">Number 3:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number3" name="number3" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number4">Number 4:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number4" name="number4" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number5">Number 5:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number5" name="number5" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number6">Number 6:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number6" name="number6" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number7">Number 7:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number7" name="number7" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number8">Number 8:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number8" name="number8" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number9">Number 9:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number9" name="number9" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <label for="number10">Number 10:</label><br>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="number10" name="number10" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
                                    </div>

                                    <button type="submit" class="green-button">Calculate Data</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="image-container">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/22/Da_Vinci_Vitruve_Luc_Viatour.jpg" class="img-fluid" alt="Responsive image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    $data_calculated = false; // Flag to check if data is calculated

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete_all'])) {
            // Handle the delete action
            $numbers = [];
            $sum = $difference = $product = $quotient = "";
        } else {
            // Initialize an empty array to store the numbers
            $numbers = array();

            // Retrieve and store the numbers from the form
            for ($i = 1; $i <= 10; $i++) {
                $input_name = "number" . $i;
                if (isset($_POST[$input_name])) {
                    $numbers[] = $_POST[$input_name];
                }
            }

            // Calculate sum
            $sum = array_sum($numbers);

            // Calculate subtraction
            $difference = $numbers[0];
            foreach (array_slice($numbers, 1) as $num) {
                $difference -= $num;
            }

            // Calculate multiplication
            $product = array_product($numbers);

            // Calculate division
            $quotient = $numbers[0];
            foreach (array_slice($numbers, 1) as $num) {
                if ($num != 0) {
                    $quotient /= $num;
                } else {
                    $quotient = "Cannot divide by zero";
                    break; // Exit the loop if division by zero occurs
                }
            }

            $data_calculated = true; // Set the flag to true when data is calculated
        }
    }
    ?>

        <div class="container d-flex justify-content-center align-items-center vh-50">
            <h1>You can find your data here!</h1>
        </div>

        <?php if ($data_calculated): ?>
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="centered-container">
                        <h2>Array list: <?= implode(', ', $numbers) ?></h2>
                        <h3>Addition: <?= $sum ?></h3>
                        <h3>Subtraction: <?= $difference ?></h3>
                        <h3>Multiplication: <?= $product ?></h3>
                        <h3>Division: <?= $quotient ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    
    <p></p>

    <div class="container d-flex justify-content-center align-items-center vh-50">
        <form method="post">
            <button type="submit" name="delete_all" class="btn btn-danger">Delete All Data</button>
        </form>
    </div>

    <p></p>
    
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footerBottom text-center text-md-start">
                        <h1>APPLICATIONS DEVELOPMENT AND EMERGING TECHNOLOGIES</h1>
                        <p></p>
                        <h4>[M3-FORMATIVE] PHP Arrays and User Defined Functions</h4>
                        <h4>Pre Summative 3 - 2</h4>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footerBottom text-center text-md-center">
                        <img src="https://i.postimg.cc/HxqPdwb1/gianatics-logo-white.png" class="collab-img img-fluid">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="footerBottom text-center text-md-end">
                        <h1>DISCLAIMER</h1>
                        <p>This website is for educational purposes only and no copyright infringement is intended.</p>
                        <p>Copyright &copy;2024; All images used in this website are from the Internet.</p>
                        <p>Designed by <a href="https://github.com/giancarlo0326">GIAN CARLO S. VICTORINO</a>, BSITWMA - FEU TECH</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
