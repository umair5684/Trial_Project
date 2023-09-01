<x-app-layout>

    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Notifications</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <center>
                                <table id="tables_id" class="table" border="2px solid white">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Purpose</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($notifications as $notification)
                                        <tr>
                                            <td>{{ $notification->subject }}</td>
                                            <td>{{ $notification->purpose }}</td>
                                            <td>
                                                @if ($notification->status === 'Unread')
                                                <a href="{{ route('change-status', ['id' => $notification->id]) }}" class="badge badge-success">Mark as Read</a>
                                                @else
                                                {{ $notification->status }}
                                                @endif
                                            </td>

                                            @endforeach
                                    </tbody>

                                </table>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>





</x-app-layout>