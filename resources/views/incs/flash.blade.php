@if ($message = Session::get('success'))
            <div class="alert alert-block alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{{ $message }}</strong>
            </div>
@endif