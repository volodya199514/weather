<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
@foreach($weatherData as $airport => $airportWeather)
    <h1>Airport {{ $airport }}</h1>
    @foreach($airportWeather as $parameter)
        <p>{{ $parameter }}</p>
    @endforeach
@endforeach
</body>
</html>
