<h2>Create Automation</h2>
<form method="post" action="/automations/store">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Script Path:</label>
    <input type="text" name="script_path" required>

    <label>Schedule:</label>
    <select name="schedule_time">
        <option value="hourly">Hourly</option>
        <option value="daily">Daily</option>
        <option value="weekly">Weekly</option>
        <option value="custom">Custom (Cron)</option>
    </select>

    <label>Cron Expression (if custom):</label>
    <input type="text" name="cron_expression">

    <button type="submit">Create</button>
</form>