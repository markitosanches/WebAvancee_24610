{{ include('layouts/header.php', {title:'Client Show'})}}
    <div class="container">
        <h1>Client Show</h1>
        <p><strong>Name: </strong>{{ client.name }}</p>
        <p><strong>Address: </strong>{{ client.address }}</p>
        <p><strong>Phone: </strong>{{ client.phone }}</p>
        <p><strong>Email: </strong>{{ client.email }}</p>
        <p><strong>Zip Code: </strong>{{ client.zip_code }}</p>
        <p><strong>City: </strong>{{ city }}</p>
        <a href="{{base}}/client/edit?id={{ client.id }}" class="btn block">Edit</a>
        <form action="client-delete.php" method="post">
                <input type="hidden" name="id" value="{{ client.id }}">
                <input type="submit" value="Delete" class="btn red">
        </form>
    </div>
{{ include('layouts/footer.php')}}