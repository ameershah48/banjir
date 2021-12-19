<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <button onclick="location.href='{{ route('places.index') }}'">View places</button>
    <hr>
    <form action="{{ route('places.store') }}" method="POST">
        @csrf

        <table>
            <tr>
                <td>
                    <label for="lat">latitude</label>
                </td>
                <td>
                    <input type="text" name="latitude" placeholder="latitude" id="lat">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="lon">longitude</label>
                </td>
                <td>
                    <input type="text" name="longitude" placeholder="longitude" id="lon">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <a href="#" onclick="getLocation()">Get current location</a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">name</label>
                </td>
                <td>
                    <input type="text" name="name" placeholder="name" id="name">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="phone">phone</label>
                </td>
                <td>
                    <input type="phone" name="phone" placeholder="phone" id="phone">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">details</label>
                </td>
                <td>
                    <textarea name="details" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">submit</button>
                </td>
            </tr>
        </table>
    </form>


    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                console.log("Geolocation is not supported by this browser.");
            }
        }

        function showPosition(position) {
            x = document.getElementById('lat').value = position.coords.latitude;
            y = document.getElementById('lon').value = position.coords.longitude;
        }
    </script>

</body>

</html>
