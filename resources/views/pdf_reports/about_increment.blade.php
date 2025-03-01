<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
         page{
            background: white;
        }

       
        page[size="A4"] {
            width: 210mm;
            height: 297mm;
        }


        @media print {
            body, page {
                margin: 0;
                box-shadow: 0;
            }
        } */

        body {
           font-family: 'pyidaungsu', sans-serif !important;
            font-size: 13px;
        }

        .container {
            width: 100%;
            margin-bottom: 16px;
        }

        .header-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
            text-align: center;
        }

        .table-container {
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
        }

        table {
            width: 100%;
            text-align: center;
            border-collapse: collapse;
        }

        thead tr {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 8px;
            border: 1px solid black;
        }

        tbody tr td {
            height: 32px;
        }
    </style>
</head>
<body>
    <div class="container">
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>INCREMENT DATE</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center h-8 p-2">
                    @if($staffs)
                    @foreach ($staffs as $staff)
                        <tr>
                            <td>
                                {{ $staff->name }}
                            </td>
                            <td>

                                {{$staff->promotionDate }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">
                            No staff data available.
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
</body>
</html>




   
 