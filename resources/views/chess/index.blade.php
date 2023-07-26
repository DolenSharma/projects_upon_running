<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Game</title>
    <style>
        #chessboard {
            display: flex;
            flex-wrap: wrap;
            width: 400px; /* Adjust the width to fit your design */
        }

        .square {
            width: 50px; /* Adjust the size of each square */
            height: 50px;
            background-color: #f0d9b5; /* Set the light square color */
        }

        .square:nth-child(even) {
            background-color: #b58863; /* Set the dark square color */
        }
    </style>
</head>
<body>
    <div id="chessboard"></div>

    <script src="chess.js"></script>
    <script src="app.js"></script>
</body>
</html>
