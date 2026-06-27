<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Livros - Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Spectral:wght@600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #221E1A;
            --surface: #2F2A24;
            --surface-alt: #3A332B;
            --border: #463E35;
            --text: #F2E9DD;
            --text-muted: #B7A998;
            --accent: #9A1B1B;
            --accent-hover: #C23030;
            --success-bg: #1F2A1C;
            --success-text: #9CCB8A;
            --danger: #6E1A1A;
            --danger-hover: #8C2424;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            max-width: 880px;
            margin: 48px auto;
            padding: 0 24px;
            line-height: 1.5;
        }

        h1 {
            font-family: 'Spectral', Georgia, serif;
            font-weight: 700;
            font-size: 2.1rem;
            letter-spacing: 0.01em;
            color: var(--text);
            padding-left: 18px;
            border-left: 5px solid var(--accent);
            margin-bottom: 28px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid var(--border);
            color: var(--text);
        }

        th {
            background: var(--surface-alt);
            font-family: 'Spectral', Georgia, serif;
            font-weight: 600;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
        }

        tbody tr:hover { background: rgba(154, 27, 27, 0.08); }
        tbody tr:last-child td { border-bottom: none; }

        a {
            color: var(--accent-hover);
            text-decoration: none;
            margin-right: 14px;
            font-weight: 500;
        }

        a:hover { text-decoration: underline; }
        a:focus-visible, button:focus-visible {
            outline: 2px solid var(--accent-hover);
            outline-offset: 2px;
        }

        form { display: inline; }

        button {
            background: var(--danger);
            color: var(--text);
            border: none;
            padding: 6px 14px;
            border-radius: 5px;
            cursor: pointer;
            font-family: inherit;
            font-size: 0.9rem;
            transition: background 0.15s ease;
        }

        button:hover { background: var(--danger-hover); }

        .alert {
            background: var(--success-bg);
            color: var(--success-text);
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 18px;
            border: 1px solid rgba(156, 203, 138, 0.25);
        }

        label {
            display: block;
            margin-top: 16px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 6px;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 6px;
            color: var(--text);
            font-family: inherit;
            font-size: 1rem;
        }

        input:focus {
            outline: none;
            border-color: var(--accent-hover);
            box-shadow: 0 0 0 3px rgba(154, 27, 27, 0.2);
        }

        .btn-submit {
            background: var(--accent);
            color: var(--text);
            border: none;
            padding: 11px 22px;
            border-radius: 6px;
            margin-top: 20px;
            cursor: pointer;
            font-family: inherit;
            font-weight: 600;
            font-size: 0.95rem;
            transition: background 0.15s ease;
        }

        .btn-submit:hover { background: var(--accent-hover); }

        .error {
            color: #E08585;
            font-size: 0.85em;
            margin-top: 4px;
            display: block;
        }

        @media (max-width: 600px) {
            body { margin: 24px auto; padding: 0 16px; }
            h1 { font-size: 1.6rem; }
            th, td { padding: 10px; font-size: 0.9rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>