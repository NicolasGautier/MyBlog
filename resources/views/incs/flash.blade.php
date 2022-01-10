@if ($message = Session::get('success'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>{{$message}}</strong>
        </div>
@endif