<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirar Dau</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        #chart {
            width: 300px;
            margin: 20px auto;
        }

        .bar {
            display: inline-block;
            height: 20px;
            margin: 0 2px;
        }

        .bar-label {
            margin-top: 5px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Tirar Dau</h1>
    <label for="vegades">Nombre de vegades:</label>
    <input type="number" id="vegades" min="1" max="1000">
    <button onclick="tirarDau()">Tirar Dau</button>

    <div id="chart"></div>

    <script>
        function tirarDau() {
            const numTirades = document.getElementById('vegades').value;
            const resultats = {1: 0, 2: 0, 3: 0, 4: 0, 5: 0, 6: 0};

            for (let i = 0; i < numTirades; i++) {
                resultats[Math.floor(Math.random() * 6) + 1]++;
            }

            mostrarGrafic(resultats, numTirades);
        }

        function mostrarGrafic(resultats, numTirades) {
            const chartDiv = document.getElementById('chart');
            chartDiv.innerHTML = '';

            for (let num = 1; num <= 6; num++) {
                const percentatge = (resultats[num] / numTirades) * 100;
                const barraDiv = document.createElement('div');
                barraDiv.className = 'bar';
                barraDiv.style.width = percentatge + '%';

                const labelDiv = document.createElement('div');
                labelDiv.className = 'bar-label';
                labelDiv.textContent = `${num}: ${percentatge.toFixed(2)}%`;

                chartDiv.appendChild(barraDiv);
                chartDiv.appendChild(labelDiv);
            }
        }
    </script>
</body>
</html>
