<!DOCTYPE html>
<html>
<head>
    <title>Appointment Mail</title>
</head>
<body>
    <h1>Appointment Request from {{ $data['name'] }}</h1>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Appointment Date:</strong> {{ $data['date'] }}</p>
    <p><strong>Department:</strong> {{ $data['department'] }}</p>
    <p><strong>Doctor:</strong> {{ $data['doctor'] }}</p>
    <p> Scheduled appointment.</p>
</body>
</html>
