
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            margin-bottom: 20px;
        }

        h2 {
            font-weight: 600;
            font-size: 18px;
            text-align: center;
            margin: 20px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        thead tr {
            background-color: #f3f3f3;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <div class="container">
        <h2>
            {{ $title }} နေ့စားဝန်ထမ်းအင်အားစာရင်း
        </h2>
        <table>
            <thead>
                <tr>
                    <th>စဥ်</th>
                    <th>အမည်</th>
                    <th>တာဝန်ထမ်းဆောင်သည့်ဌာန</th>
                    <th>မှတ်ချက်</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $key => $staff)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->current_division->name }}</td>
                    <td>{{ $staff->currentRank?->name }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

