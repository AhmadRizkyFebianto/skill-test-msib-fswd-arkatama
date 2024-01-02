<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data</title>
</head>
<body>
    <h1>Form Input Data</h1>

    <form action="{{ url('/store-data') }}" method="post">
        @csrf
        <label for="data">Input Data (Format: NAMA USIA KOTA): </label>
        <input type="text" name="data" required>
        <button type="submit">Submit</button>
    </form>

    @if(isset($inputData) && isset($outputData))
        <h2>Hasil:</h2>
        <p>Input Data: {{ $inputData }}</p>
        <p>Nama: {{ $outputData['nama'] }}</p>
        <p>Usia: {{ $outputData['usia'] }}</p>
        <p>Kota: {{ $outputData['kota'] }}</p>
    @endif
</body>
</html>
