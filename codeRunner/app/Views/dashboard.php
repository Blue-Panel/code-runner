<?php include('partials/header.php') ?>
<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <i class="fas fa-robot me-2 text-primary"></i><strong>Code Runner</strong>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> Admin User
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <!-- <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-1"></i> Profile</a></li> -->
                        <li><a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

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
                                <i class="fas fa-check-circle"></i><?= $automation['status']; ?>
                            </span>
                        </h6>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </div>
                    <p class="mb-1 small">Monitors server health metrics and sends alerts</p>
                    <div class="d-flex mt-2">
                        <small class="text-muted me-3">
                            <i class="fas fa-calendar-check me-1"></i> Last: Mar 11, 09:00
                        </small>
                        <small class="text-muted">
                            <i class="fas fa-repeat me-1"></i> <?= $automation['schedule_time']; ?>
                        </small>
                        <?php if ($automation['status'] == 'disabled'): ?>
                            <a href="/automation/enable/<?= $automation['id']; ?>">Enable</a>
                        <?php else: ?>
                            <a href="/automation/disable/<?= $automation['id']; ?>">Disable</a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>



        </div>

    </div>
</div>

<?php include('partials/footer.php') ?>