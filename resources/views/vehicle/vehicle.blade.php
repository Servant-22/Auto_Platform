<!DOCTYPE html>
<html>
<head>
    <title>Voertuig Informatie</title>
    <!-- Voeg hier eventueel extra CSS toe -->
</head>
<body>
    <h1>Voertuig Informatie Opvragen</h1>
    <form id="vehicleForm">
        <label for="vin">VIN:</label>
        <input type="text" id="vin" name="vin">
        <button type="submit">Zoek Voertuig</button>
    </form>
    <div id="vehicleInfo"></div>

    <script>
        document.getElementById('vehicleForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const vin = document.getElementById('vin').value;
            fetch(`/vehicle/${vin}`)
                .then(response => response.json())
                .then(data => {
                    const info = document.getElementById('vehicleInfo');
                    info.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
                })
                .catch(error => console.error('Fout bij het ophalen van de gegevens:', error));
        });
    </script>
</body>
</html>
