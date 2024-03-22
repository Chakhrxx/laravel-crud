<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laravel CRUD index</title>
</head>

<body class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 antialiased">
    @php
    $listTablConfig = [
    'title'=>"Laravel CRUD",
    'actionBtn'=>"Add product" ,
    'filterBtn'=>"Filter options",
    'insertRoute'=>route('companies.create'),
    'serchRoute'=>url('/api/company/search'),
    'ColumnHeaders'=>['No.','Name','Email','Address','Action'],
    'companies'=>$companies
    ];
    @endphp

    @component('components.listTable',$listTablConfig)
    @endcomponent


    <script>
        function fadeDiv(divId, timeOut) {
            const element = document.getElementById(divId);

            if (element) {
                setTimeout(() => {
                element.style.display = "none";
                }, (timeOut) * 1000);
                setTimeout(() => {
                    window.location.href = "{{ route('companies.index') }}";
                }, (timeOut+1) * 1000);
            }

            
        };

        fadeDiv("alert", 3);
        fadeDiv("alert-search", 5);
    </script>

</body>

</html>