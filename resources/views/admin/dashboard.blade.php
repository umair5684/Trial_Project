<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <slot>
        <div class="container mt-2">
            <div class="row">
                <div class="pull-right">
                    <a class="btn btn-info" href="{{ route('admin.create') }}">Create Notification</a>
                </div>

               
                <div class="pull-right m-2 mr-2">
                    <a class="btn btn-info" href="{{ route('createEmail') }}">Create Email</a>
                </div>


            </div>
        </div>
    </slot>





</x-app-layout>