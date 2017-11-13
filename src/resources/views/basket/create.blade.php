<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Basket create</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.0.0-beta.4/dist/css/bootstrap-material-design.min.css" integrity="sha384-R80DC0KVBO4GSTw+wZ5x2zn2pu4POSErBkf8/fSFhPXHxvHJydT0CSgAP2Yo2r4I" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>

<main class="create">
    <form action="{{ route('basket.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col customer">
                <div class="form-group">
                    <label for="customer_email">Почтовый ящик</label>
                    <input type="text" class="form-control" id="customer_email" placeholder="Enter email" name="customer_email">
                </div>
                <div class="form-group">
                    <label for="customer_password">Пароль</label>
                    <input type="password" class="form-control" id="customer_password" placeholder="Enter password" name="customer_password">
                </div>
                <div class="form-group">
                    <label for="customer_first_name">Имя</label>
                    <input type="text" class="form-control" id="customer_first_name" placeholder="Enter first name" name="customer_first_name">
                </div>
                <div class="form-group">
                    <label for="customer_last_name">Фамилия</label>
                    <input type="text" class="form-control" id="customer_last_name" placeholder="Enter last name" name="customer_last_name">
                </div>
                <div class="form-group">
                    <label for="customer_city_id">Город</label>
                    <select class="form-control" id="customer_city_id" name="customer_city_id">
                        @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col notebook">
                <div class="form-group">
                    <label for="product_notebook_id">Ноутбук</label>
                    <select class="form-control" id="product_notebook_id" name="product_notebook_id">
                        @foreach($notebooks as $notebook)
                            <option value="{{$notebook->id}}">{{$notebook->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="product_quantity">Колличество</label>
                    <input type="text" class="form-control" id="product_quantity" placeholder="Enter quantity" name="product_quantity">
                </div>
                <button type="submit" class="btn btn-raised btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</main>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
