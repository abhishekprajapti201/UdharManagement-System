<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel · Udharmanagement</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap"
        rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f4f7fc;
        }

        /* subtle glassmorphism for cards */
        .glass-card {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .sidebar-icon {
            transition: all 0.2s ease;
        }

        .sidebar-icon:hover {
            transform: translateX(4px);
            color: #2563eb;
        }

        .stat-card {
            transition: transform 0.15s ease, box-shadow 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 25px -8px rgba(0, 0, 0, 0.08);
        }

        .admin-logo {
            letter-spacing: -0.02em;
        }

        .avatar-ring {
            box-shadow: 0 0 0 2px white, 0 0 0 4px #e2e8f0;
        }

        /* custom scroll for table */
        .table-wrap::-webkit-scrollbar {
            width: 5px;
            height: 5px;
        }

        .table-wrap::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 8px;
        }

        .table-wrap::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 8px;
        }

        .badge-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                opacity: 0.7;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0.7;
            }
        }
    </style>
</head>

<body class="antialiased text-slate-700">
    <div class="flex h-screen overflow-hidden">
        @include('admin.layout.sidebar')
        <main class="flex-1 flex flex-col h-screen overflow-y-auto p-4 md:p-6 bg-[#f4f7fc]">
            @include('admin.layout.topbar')

            @yield('content')

        </main>
    </div>
    @include('admin.layout.footer')

</body>

</html>
