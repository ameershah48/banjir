<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button onclick="location.href='{{ route('places.create') }}'">Add new place</button>
    <hr>

    <a href="#" onclick="getLocation()">Get current location</a>

    <form>
        <input type="text" name="latitude" placeholder="latitude" id="lat">
        <input type="text" name="longitude" placeholder="longitude" id="lon">
        <button>Check</button>
    </form>

    <hr>


    @if (!empty($longitude) && !empty($latitude))
        <table border="1">
            <thead>
                <th>
                    Name
                </th>
                <th>
                    Phone
                </th>
                <th>
                    Details
                </th>
                <th>
                    Google Maps
                </th>
                <th>
                    Radius
                </th>
                <th>
                    Location
                </th>
            </thead>
            <tbody>
                @foreach ($places as $place)
                    <tr>
                        <td>
                            {{ $place->name }}
                        </td>
                        <td>
                            {{ $place->phone }}

                        </td>
                        <td>
                            {{ $place->details }}

                        </td>
                        <td>
                            <a target="_blank"
                                href="https://www.google.com/maps/search/{{ $place->latitude }},{{ $place->longitude }}">
                                Check
                            </a>
                        </td>
                        <td>
                            {{ $place->radius }}
                        </td>
                        <td>
                            <input onclick="copy({{ $place->id }})" type="text" id="{{ $place->id }}"
                                value="{{ number_format($place->latitude, 4) }},{{ number_format($place->longitude, 4) }}">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif


    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            x = document.getElementById('lat').value = position.coords.latitude;
            y = document.getElementById('lon').value = position.coords.longitude;
        }

        function copy(id) {
            var copyText = document.getElementById(id);
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */
        }
    </script>

</body>

</html>
