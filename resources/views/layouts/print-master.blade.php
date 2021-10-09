<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style>
        @page {
            size: A4 landscape;
            margin: 8mm 8mm 8mm 8mm;
        }

        * {
            font-family: 'Roboto', Arial, Helvetica, sans-serif;
            line-height: 1.5;
        }
        .transaction-table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 35px;
        }
        .transaction-table, .transaction-table td, th {
            border: 1px solid #eaeaea;
        }
        .transaction-table td {
            padding: 5px 8px;
            font-size: 14px;
        }
        .transaction-table tfoot th {
            text-align: right;
        }
        .transaction-table tfoot th, .transaction-table tfoot td {
            padding: 3px;
        }
        .transaction-table__thead {
            background: rgba(0, 0, 0, 0.02);
        }
        .transaction-table__thead th {
            padding: 5px 8px;
        }
        td p {
            padding: 0;
            margin: 0;
            margin-block-end: 1rem
        }

        header {
            text-transform: uppercase;
            text-align: center;
            width: 100%;
        }
        .debt-info {
            display: flex;
            justify-content: space-between;
        }
        .debt-info__retail {
            width: 50%;
            text-align: left;
        }
        .debt-info__customer {
            width: 40%;
            text-align: right;
        }

        .fit {
            white-space: nowrap;
            width: 1%
        }

        .align-top {
            vertical-align: top !important
        }

        .invoice-info {
            display: flex;
            justify-content: space-between;
        }
        .invoice-info__retail {
            width: 50%;
            text-align: left;
        }
        .invoice-info__customer {
            width: 40%;
            text-align: right;
        }

    </style>
</head>
<body>
    <header>
        <div style="">
            <h2 style="margin-bottom: 0">@yield('title')</h2>
            <div style="msrgin-right: auto; margin-left:auto; display: flex; justify-content: center; align-items:center">
                <img src="{{ asset('img/logo.png') }}" alt="logo" width="48" > <strong style="font-size: 20px; margin-left: 20px">  Dijaya Computer</strong> <br>
            </div>
        </div>
    </header>

    @yield('content')


    <script>
        window.print();
    </script>
</body>
</html>
