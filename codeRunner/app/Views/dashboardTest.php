<table>
    <tr>
        <th>Name</th>
        <th>Schedule</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($automations as $automation): ?>

        <tr>
            <td><?= $automation['name']; ?></td>
            <td><?= $automation['schedule_time']; ?></td>
            <td><?= $automation['status']; ?></td>
            <td>
                <?php if ($automation['status'] == 'disabled'): ?>
                    <a href="/automations/enable/<?= $automation['id']; ?>">Enable</a>
                <?php else: ?>
                    <a href="/automations/disable/<?= $automation['id']; ?>">Disable</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>