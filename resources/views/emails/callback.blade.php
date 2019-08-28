<p>Имя: {{ $data['name'] }}</p>
<p>Телефон: {{ $data['phone'] }}</p>
@if(isset($data['message']))
    <p>{{ $data['message'] }}</p>
@endif
