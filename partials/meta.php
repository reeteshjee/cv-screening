<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities | ACME Corp</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #4f46e5;
            --secondary-color: #4338ca;
            --accent-color: #818cf8;
            --light-bg: #f9fafb;
            --dark-text: #1f2937;
            --light-text: #f3f4f6;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
            background-color: var(--light-bg);
        }
        
        /* Navbar styling */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 15px 0;
        }
        
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.5rem;
        }
        
        .nav-link {
            font-weight: 500;
            color: var(--dark-text) !important;
            margin: 0 10px;
            transition: color 0.3s;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        /* Hero section */
        .hero {
            background: linear-gradient(to right, rgba(79, 70, 229, 0.9), rgba(67, 56, 202, 0.8)), 
                        url('/api/placeholder/1600/600') no-repeat center center/cover;
            color: white;
            padding: 100px 0;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 40px;
        }
        
        .hero h1 {
            font-size: 3.25rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.25rem;
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            opacity: 0.9;
        }
        
        .search-container {
            max-width: 700px;
            margin: 30px auto 0;
            position: relative;
            background-color: white;
            border-radius: 50px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.15);
            display: flex;
            padding: 8px;
        }
        
        .search-input {
            flex: 1;
            border: none;
            background: transparent;
            padding: 15px 20px;
            font-size: 1.1rem;
            outline: none;
        }
        
        .search-btn {
            border-radius: 50px;
            padding: 12px 30px;
            background-color: var(--primary-color);
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .search-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Job listings section */
        .jobs-container {
            position: relative;
            margin-bottom: 60px;
        }
        
        .section-header {
            margin-bottom: 40px;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .job-details{
        	font-size: 14px;
        }
        
        .section-title {
            font-weight: 700;
            position: relative;
            display: inline-block;
            color: var(--dark-text);
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .filter-btn {
            background-color: white;
            border: 1px solid #e5e7eb;
            padding: 8px 16px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: 500;
            color: var(--dark-text);
            transition: all 0.3s;
        }
        
        .filter-btn:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }
        
        .job-card {
            background-color: white;
            border-radius: 16px;
            padding: 25px 30px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
            transition: all 0.3s;
            border-left: 5px solid var(--primary-color);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .job-info {
            flex: 1;
            padding-right: 20px;
        }
        
        .job-title {
            font-weight: 700;
            color: var(--dark-text);
            margin-bottom: 10px;
            font-size: 1.25rem;
        }
        
        .job-meta {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 12px;
        }
        
        .job-type {
            display: inline-flex;
            align-items: center;
            padding: 6px 14px;
            background-color: #ede9fe;
            color: #6d28d9;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 50px;
        }
        
        .job-location, .job-salary {
            color: #6b7280;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        
        .job-description {
            color: #4b5563;
            margin-bottom: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            line-height: 1.5;
        }
        
        .job-actions {
            display: flex;
            flex-direction: column;
            gap: 15px;
            align-items: flex-end;
        }
        
        .posted-date {
            color: #6b7280;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .apply-btn {
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .apply-btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.3);
        }
        
        /* Load more button */
        .load-more {
            text-align: center;
            margin-top: 40px;
        }
        
        .load-more-btn {
            background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .load-more-btn:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        /* CTA section */
        .cta-section {
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            padding: 70px 0;
            color: white;
            text-align: center;
            border-radius: 20px;
            margin-bottom: 60px;
        }
        
        .cta-section h2 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .cta-btn {
            background-color: white;
            color: var(--primary-color);
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s;
        }
        
        .cta-btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        /* Footer */
        footer {
            background-color: #1f2937;
            color: #e5e7eb;
            padding: 60px 0 20px;
        }
        
        .footer-title {
            color: white;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
            padding: 0;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #d1d5db;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .footer-links a:hover {
            color: white;
            transform: translateX(5px);
        }
        
        .social-media {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }
        
        .social-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: white;
            transition: all 0.3s;
        }
        
        .social-icon:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .bottom-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
        }
        
        /* Badge component */
        .badge-featured {
            background-color: #fef3c7;
            color: #92400e;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            margin-left: 10px;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .job-card {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .job-actions {
                flex-direction: row;
                margin-top: 20px;
                align-items: center;
                width: 100%;
                justify-content: space-between;
            }
        }
        
        @media (max-width: 768px) {
            .hero {
                padding: 80px 0;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
            
            .section-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .search-container {
                flex-direction: column;
                border-radius: 16px;
                padding: 15px;
            }
            
            .search-input {
                width: 100%;
                margin-bottom: 10px;
            }
            
            .search-btn {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            .hero h1 {
                font-size: 1.75rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .job-meta {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>