<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2, user-scalable=no" />
    <meta name="description"
        content="Semantic-UI-Forest, collection of design, themes and templates for Semantic-UI." />
    <meta name="keywords" content="Semantic-UI, Theme, Design, Template" />
    <meta name="author" content="PPType" />
    <meta name="theme-color" content="#ffffff" />
    <title>LSO | {{ get_title() }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css"
        type="text/css" />
    <style>
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }
    </style>
    {{ assets.outputInlineCss() }}
    {{ assets.outputCss() }}
</head>

<body class="">

    {{ content() }}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script>
        // Common js script for all views //
        $(document).ready(function () {
            $(".ui.toggle.button").click(function () {
                $(".mobile.only.grid .ui.vertical.menu").toggle(100);
            });
            $('.ui.progress').progress();
            $(".ui.dropdown").dropdown();
            $('select.ui.dropdown').dropdown();
            $('.ui.message .close').on('click', function() {
                $(this)
                    .closest('.message')
                    .transition('fade');
            });

            $('#service-select').on('change', function () {
                $('#next-one').removeClass('disabled');
            });
        });
    </script>

    {{ assets.outputJs() }}
</body>

</html>