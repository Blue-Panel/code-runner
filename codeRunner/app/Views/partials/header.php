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
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url() ?>">
                <i class="fas fa-robot me-2 text-primary"></i><strong>Code Runner</strong>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="ms-auto"> <!-- Push profile dropdown to the right -->
                    <div class="nav-item dropdown me-4">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo base_url() ?>logout"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>