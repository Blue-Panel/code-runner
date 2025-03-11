<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Runner - Automation Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --danger: #f72585;
            --warning: #f8961e;
            --info: #4895ef;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f8fa;
        }

        .automation-card {
            transition: all 0.2s;
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
            margin-bottom: 15px;
        }

        .automation-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .status-badge {
            font-size: 0.7rem;
            padding: 4px 8px;
            border-radius: 50px;
        }

        .status-running {
            background-color: var(--success);
        }

        .status-scheduled {
            background-color: var(--info);
        }

        .status-failed {
            background-color: var(--danger);
        }

        .status-completed {
            background-color: var(--secondary);
        }

        .status-paused {
            background-color: var(--warning);
        }

        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 15px 20px;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
        }

        .nav-link {
            color: #495057;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
        }

        .queue-list-item {
            border-left: 3px solid transparent;
            padding: 8px 12px;
        }

        .queue-list-item.pending {
            border-left-color: var(--warning);
        }

        .queue-list-item.processing {
            border-left-color: var(--info);
        }

        .queue-list-item.completed {
            border-left-color: var(--success);
        }

        .queue-list-item.failed {
            border-left-color: var(--danger);
        }
    </style>
</head>

<body>
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
                            <!-- TikTok Follower Tracker -->
                            <div class="list-group-item automation-card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        TikTok Follower Tracker
                                        <span class="badge text-white status-badge status-running">
                                            <i class="fas fa-play-circle"></i> Running
                                        </span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-1 small">Monitors TikTok followers count and records changes</p>
                                <div class="d-flex mt-2">
                                    <small class="text-muted me-3">
                                        <i class="fas fa-calendar-check me-1"></i> Last: Mar 11, 09:30
                                    </small>
                                    <small class="text-muted">
                                        <i class="fas fa-repeat me-1"></i> Hourly
                                    </small>
                                </div>
                            </div>

                            <!-- Instagram Engagement Analyzer -->
                            <div class="list-group-item automation-card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        Instagram Engagement Analyzer
                                        <span class="badge text-white status-badge status-scheduled">
                                            <i class="fas fa-clock"></i> Scheduled
                                        </span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-1 small">Analyzes Instagram post engagement metrics</p>
                                <div class="d-flex mt-2">
                                    <small class="text-muted me-3">
                                        <i class="fas fa-calendar-check me-1"></i> Last: Mar 11, 00:00
                                    </small>
                                    <small class="text-muted">
                                        <i class="fas fa-repeat me-1"></i> Daily
                                    </small>
                                </div>
                            </div>

                            <!-- Website Backup -->
                            <div class="list-group-item automation-card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        Website Backup
                                        <span class="badge text-white status-badge status-failed">
                                            <i class="fas fa-exclamation-circle"></i> Failed
                                        </span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-1 small">Creates full backup of website files and database</p>
                                <div class="d-flex mt-2">
                                    <small class="text-muted me-3">
                                        <i class="fas fa-calendar-check me-1"></i> Last: Mar 11, 02:00
                                    </small>
                                    <small class="text-muted">
                                        <i class="fas fa-repeat me-1"></i> Daily
                                    </small>
                                </div>
                            </div>

                            <!-- Email Campaign Sender -->
                            <div class="list-group-item automation-card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        Email Campaign Sender
                                        <span class="badge text-white status-badge status-paused">
                                            <i class="fas fa-pause-circle"></i> Paused
                                        </span>
                                    </h6>
                                    <div>
                                        <button class="btn btn-sm btn-outline-secondary">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                    </div>
                                </div>
                                <p class="mb-1 small">Sends scheduled email campaigns to subscribers</p>
                                <div class="d-flex mt-2">
                                    <small class="text-muted me-3">
                                        <i class="fas fa-calendar-check me-1"></i> Last: Mar 08, 15:00
                                    </small>
                                    <small class="text-muted">
                                        <i class="fas fa-repeat me-1"></i> Weekly
                                    </small>
                                </div>
                            </div>

                            <!-- Server Health Check -->
                            <div class="list-group-item automation-card p-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-1">
                                        Server Health Check
                                        <span class="badge text-white status-badge status-completed">
                                            <i class="fas fa-check-circle"></i> Completed
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
                                        <i class="fas fa-repeat me-1"></i> Hourly
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Panel -->
            <div class="col-lg-4">
                <!-- Recent Jobs -->
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-history me-2 text-primary"></i>Recent Activity</h6>
                    </div>
                    <div class="list-group list-group-flush">
                        <div class="list-group-item queue-list-item completed p-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1 small">
                                    <i class="fas fa-check-circle me-1"></i>
                                    TikTok Follower Tracker
                                </h6>
                                <small>09:31</small>
                            </div>
                            <small class="d-block text-muted">Followers: 1243 (+5)</small>
                        </div>
                        <div class="list-group-item queue-list-item completed p-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1 small">
                                    <i class="fas fa-check-circle me-1"></i>
                                    Server Health Check
                                </h6>
                                <small>09:00</small>
                            </div>
                            <small class="d-block text-muted">All systems operational</small>
                        </div>
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
                                    TikTok Follower Tracker
                                </h6>
                                <small>10:30</small>
                            </div>
                        </div>
                        <div class="list-group-item queue-list-item pending p-2">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1 small">
                                    <i class="fas fa-clock me-1"></i>
                                    Server Health Check
                                </h6>
                                <small>10:00</small>
                            </div>
                        </div>
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

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>