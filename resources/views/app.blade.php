<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title', 'Task Manager')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    </head>
    <body class="bg-light">
        <div class="container mt-5">
            @yield('content')
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script>
            $(function() {
                $("#task-list").sortable({
                    update: function(event, ui) {
                        var order = $(this).sortable('toArray', { attribute: 'data-id' });
                        $.post('/tasks/reorder', { _token: '{{ csrf_token() }}', tasks: order });
                    }
                });
            });
        </script>
    </body>
</html>
