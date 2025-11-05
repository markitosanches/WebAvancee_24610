<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ title }}</title>
    <link rel="stylesheet" href="{{ asset }}css/style.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{base}}/clients">Clients</a></li>
            <li><a href="{{base}}/user/create">New User</a></li>
            {%if guest %}
            <li><a href="{{base}}/login">Login</a></li>
            {% else %}
            <li><a href="{{base}}/logout">Logout</a></li>
            {% endif %}
        </ul>
    </nav>
    <main>
        {%if guest is empty %}
            Hello {{ session.user_name }}
        {% endif %}
    