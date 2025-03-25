<?php include('partials/header.php') ?>



<div class="container py-4">
    <!-- Status Overview -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white p-3 rounded me-3">
                        <i class="fas fa-code"></i>
                    </div>
                    <div>
                        <h5 class="mb-0"><?php echo count($automations)  ?></h5>
                        <span class="text-muted">Total Automations</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-8">
            <?php foreach ($automations as $automation): ?>
                <div class="list-group-item automation-card p-3 border rounded">
                    <div class="d-flex justify-content-between">
                        <h6 class="mb-1">
                            <?= $automation['name']; ?>
                            <span class="badge text-white status-badge status-completed">
                                <i class="fas fa-check-circle me-2"></i><?= $automation['status']; ?>
                            </span>
                        </h6>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mb-1 small"><?= $automation['description']; ?></p>
                    <div class="d-flex mt-2">
                        <small class="text-muted">
                            <i class="fas fa-calendar-check me-1"></i> <?= $automation['schedule_date']; ?>
                            at <?= $automation['schedule_time']; ?>
                        </small>
                        <?php if ($automation['status'] == 'disabled'): ?>
                            <a style="--bs-btn-padding-y: .12rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn  btn-sm btn-secondary ms-2" href="/automation/enable/<?= $automation['id']; ?>">Enable</a>
                        <?php else: ?>
                            <a style="--bs-btn-padding-y: .12rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn  btn-sm btn-secondary ms-2" href="/automation/disable/<?= $automation['id']; ?>">Disable</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>



        </div>

    </div>
</div>

<?php include('partials/footer.php') ?>