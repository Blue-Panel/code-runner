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
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-code me-1"></i> Automations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fas fa-history me-1"></i> Logs</a>
                </li>
            </ul>
            <div class="navbar-nav">
                <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> Admin User
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog me-1"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Automation Dashboard</h4>
        <button class="btn btn-primary">
            <i class="fas fa-plus-circle me-1"></i> New Automation
        </button>
    </div>

    <!-- Status Overview -->
    <div class="row mb-4">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white p-3 rounded me-3">
                        <i class="fas fa-code"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">5</h5>
                        <span class="text-muted">Total Automations</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-success text-white p-3 rounded me-3">
                        <i class="fas fa-play-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">2</h5>
                        <span class="text-muted">Running</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-warning text-white p-3 rounded me-3">
                        <i class="fas fa-pause-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5>
                        <span class="text-muted">Paused</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card h-100 p-3">
                <div class="d-flex align-items-center">
                    <div class="bg-danger text-white p-3 rounded me-3">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <div>
                        <h5 class="mb-0">1</h5>
                        <span class="text-muted">Failed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Automations List -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="mb-0"><i class="fas fa-robot me-2 text-primary"></i>My Automations</h6>
                    <div class="dropdown">
                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            Sort By
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Name</a></li>
                            <li><a class="dropdown-item" href="#">Status</a></li>
                            <li><a class="dropdown-item" href="#">Last Run</a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        <!-- Server Health Check -->
                        <?php foreach ($automations as $automation): ?>
                            <div class="list-group-item automation-card p-3">
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
                                        <a href="/automations/enable/<?= $automation['id']; ?>">Enable</a>
                                    <?php else: ?>
                                        <a href="/automations/disable/<?= $automation['id']; ?>">Disable</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Panel -->
        <div class="col-lg-4">
            <!-- Recent Activity -->
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Recent Activity</h6>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item queue-list-item failed p-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1 small">
                                <i class="fas fa-exclamation-circle me-1"></i>
                                Website Backup
                            </h6>
                            <small>02:15</small>
                        </div>
                        <small class="d-block text-muted">Disk space insufficient</small>
                    </div>
                </div>
            </div>

            <!-- Upcoming Jobs -->
            <div class="card mt-4">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-calendar-alt me-2 text-primary"></i>Upcoming Jobs</h6>
                </div>
                <div class="list-group list-group-flush">
                    <div class="list-group-item queue-list-item pending p-2">
                        <div class="d-flex justify-content-between">
                            <h6 class="mb-1 small">
                                <i class="fas fa-clock me-1"></i>
                                Instagram Engagement Analyzer
                            </h6>
                            <small>Mar 12</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php') ?>