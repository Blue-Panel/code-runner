<?php include(__DIR__ . '/../partials/header.php'); ?>


<div class="container mt-5">
    <h2 class="mb-4">Create Automation</h2>
    <form action="process_automation.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Automation Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
        </div>

        <div class="mb-3">
            <label for="script_name" class="form-label">Script Name</label>
            <input type="text" class="form-control" id="script_name" name="script_name" required>
        </div>

        <div class="mb-3">
            <label for="schedule_time" class="form-label">Schedule Time</label>
            <input type="time" class="form-control" id="schedule_time" name="schedule_time" value="00:00:00" required>
        </div>

        <div class="mb-3">
            <label for="schedule_date" class="form-label">Schedule Date</label>
            <input type="date" class="form-control" id="schedule_date" name="schedule_date">
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" id="status" name="status">
                <option value="enabled">Enabled</option>
                <option value="disabled" selected>Disabled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Save Automation</button>
    </form>
</div>


<?php include(__DIR__ . '/../partials/footer.php'); ?>