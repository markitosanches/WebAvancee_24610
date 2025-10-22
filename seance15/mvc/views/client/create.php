{{ include('layouts/header.php', {title:'Client List'})}}
    <div class="container">
        <form method="post">
            <h2>New Client</h2>
            <label>Name
                <input type="text" name="name">
            </label>
            <label>Address
                <input type="text" name="address">
            </label>
            <label>Zip Code
                <input type="text" name="zip_code">
            </label>
            <label>Phone
                <input type="text" name="phone">
            </label>
            <label>Email
                <input type="email" name="email">
            </label>
            <label>City
                <select name="city_id">
                    <option value="">Select</option>
                    {% for city in cities %}
                        <option value="{{ city.id }}">{{ city.city }}</option>
                    {% endfor %}
                </select>
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
{{ include('layouts/footer.php')}}