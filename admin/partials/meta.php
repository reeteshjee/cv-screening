<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #2980b9;
            --success-color: #27ae60;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-bg: #1a202c;
            --text-color: #2d3748;
            --text-muted: #718096;
            --border-color: #e2e8f0;
            --sidebar-width: 260px;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--light-bg);
            color: var(--text-color);
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: linear-gradient(to bottom, #1e3c72, #2a5298);
            color: white;
            transition: all 0.3s;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            z-index: 100;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 20px 25px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 15px;
        }

        .sidebar-brand h3 {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .sidebar-brand img {
            margin-right: 10px;
        }

        .sidebar-menu {
            padding: 0;
            list-style: none;
            margin-top: 20px;
        }

        .sidebar-menu-header {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 10px 25px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .sidebar-menu-item {
            margin-bottom: 5px;
        }

        .sidebar-menu-link {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            padding: 12px 25px;
            display: flex;
            align-items: center;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar-menu-link i {
            min-width: 25px;
            margin-right: 10px;
            font-size: 1.1rem;
        }

        .sidebar-menu-link span {
            font-size: 0.95rem;
            font-weight: 500;
        }

        .sidebar-menu-link:hover, .sidebar-menu-link.active {
            color: white;
            background-color: rgba(255, 255, 255, 0.1);
            border-left-color: var(--secondary-color);
        }

        .sidebar-menu-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 15px 25px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 20px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-name {
            font-weight: 600;
            margin: 0;
            font-size: 0.95rem;
        }

        .user-role {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.8rem;
        }

        /* Content area */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s;
        }

        .top-bar {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            padding: 15px 25px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            margin: 0;
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--primary-color);
        }

        .top-bar-actions {
            display: flex;
            align-items: center;
        }

        .top-bar-search {
            position: relative;
            margin-right: 20px;
        }

        .top-bar-search input {
            padding: 10px 15px 10px 40px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            background-color: var(--light-bg);
            width: 250px;
            transition: all 0.3s;
        }

        .top-bar-search i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
        }

        .top-bar-search input:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        .notification-icon {
            position: relative;
            margin-right: 20px;
            color: var(--text-muted);
            cursor: pointer;
            font-size: 1.1rem;
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: var(--danger-color);
            color: white;
            font-size: 0.7rem;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Dashboard cards */
        .overview-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            overflow: hidden;
            height: 100%;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .dashboard-card {
            background-color: white;
            display: flex;
            flex-direction: column;
        }

        .dashboard-card-header {
            padding: 20px 25px 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dashboard-card-title {
            font-weight: 600;
            margin: 0;
            color: var(--primary-color);
        }

        .dashboard-card-icon {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 1.5rem;
            color: white;
        }

        .icon-openings {
            background: linear-gradient(45deg, #3498db, #2980b9);
        }

        .icon-applications {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .icon-settings {
            background: linear-gradient(45deg, #f39c12, #f1c40f);
        }

        .dashboard-card-content {
            padding: 5px 25px 20px;
            flex-grow: 1;
        }

        .dashboard-card-value {
            font-weight: 700;
            font-size: 2rem;
            margin: 0 0 10px;
        }

        .dashboard-card-subtitle {
            color: var(--text-muted);
            margin: 0;
            font-size: 0.9rem;
        }

        .dashboard-card-progress {
            margin-top: 15px;
        }

        .progress {
            height: 8px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .card-action {
            border-top: 1px solid var(--border-color);
            padding: 15px 25px;
            text-align: center;
        }

        .card-action-link {
            text-decoration: none;
            color: var(--secondary-color);
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-action-link i {
            margin-left: 5px;
            transition: transform 0.2s;
        }

        .card-action-link:hover i {
            transform: translateX(3px);
        }

        /* Recent activity section */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: 700;
            margin: 0;
            color: var(--primary-color);
        }

        .view-all {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .activity-card {
            padding: 25px;
        }

        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .activity-item {
            display: flex;
            align-items: flex-start;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            color: white;
        }

        .activity-icon-new {
            background: linear-gradient(45deg, #3498db, #2980b9);
        }

        .activity-icon-interview {
            background: linear-gradient(45deg, #9b59b6, #8e44ad);
        }

        .activity-icon-hired {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .activity-content {
            flex-grow: 1;
        }

        .activity-title {
            margin: 0 0 5px;
            font-weight: 600;
        }

        .activity-time {
            color: var(--text-muted);
            font-size: 0.8rem;
            margin: 0;
        }

        .activity-status {
            padding: 4px 10px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 10px;
        }

        .status-new {
            background-color: rgba(52, 152, 219, 0.1);
            color: #3498db;
        }

        .status-pending {
            background-color: rgba(243, 156, 18, 0.1);
            color: #f39c12;
        }

        .status-completed {
            background-color: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
            .main-content.sidebar-active {
                margin-left: var(--sidebar-width);
            }
            .toggle-sidebar {
                display: block;
            }
        }

        @media (max-width: 768px) {
            .top-bar-search input {
                width: 180px;
            }
            .overview-cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 576px) {
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
            }
            .top-bar-actions {
                width: 100%;
                margin-top: 15px;
            }
            .top-bar-search {
                flex-grow: 1;
            }
            .top-bar-search input {
                width: 100%;
            }
        }
    </style>
</head>