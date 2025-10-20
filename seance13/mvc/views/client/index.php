{{ include('layouts/header.php', {title:'Client List'})}}
    <h1>Client List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Phone</th>
        </tr>
        {% for client in clients %}
        <tr>
            <td><a href="{{base}}/client/show?id={{ client.id }}">{{ client.name }}</a></td>
            <td>{{ client.address }}</td>
            <td>{{ client.email }}</td>
            <td>{{ client.phone }}</td>
        </tr>
        {% endfor %}
    </table>
    <br><br>
    <a href="client-create.php" class="btn">New Client</a>
    
{{ include('layouts/footer.php')}}