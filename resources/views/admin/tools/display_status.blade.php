<div class="btn-group" data-toggle="buttons">
    @foreach($options as $option => $label)
    <label class="btn btn-sm {{ \Request::get('display', 'all') === (string)$option ? 'active btn-default' : 'btn-info' }}">
        <input type="radio" class="reply-display" value="{{ $option }}">{{$label}}
    </label>
    @endforeach
</div>