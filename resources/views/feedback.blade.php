<!-- resources/views/feedback.blade.php -->
<form action="{{ url('/feedback/' . $email) }}" method="post">
    @csrf
    <label for="score">Score:</label>
    <input type="number" id="score" name="score" required>
    <button type="submit">Verstuur Feedback</button>
</form>
