<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @php wp_head() @endphp
    @if (file_exists(get_template_directory() . '/dist/styles/' . basename(App\asset_path("styles/main.css"))))
        <style>
            {!! file_get_contents(App\asset_path('styles/main.css')); !!}
        </style>
    @endif
</head>
