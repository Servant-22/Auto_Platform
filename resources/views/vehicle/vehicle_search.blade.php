<form method="post" action="{{ url('/vehicle') }}">
    @csrf
    <input type="text" name="vin" placeholder="Enter VIN">
    <button type="submit">Get Vehicle Data</button>
</form>
