<!DOCTYPE html>
<html>

<head>
    @php
        $title = '';
        if (array_key_exists('body', $details)) {
            $title = $details['title'];
        }
    @endphp
    <title>{{ $title }}</title>
</head>

<body>
    @php
        $body = '';
        if (array_key_exists('body', $details)) {
            $body = $details['body'];
        }
    @endphp

    {!! $body !!}
</body>

</html>
