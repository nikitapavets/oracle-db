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

<main>
    <form action="{{ route('basket.store') }}" method="post">
        <div class="row">
            <div class="col customer">
                <div class="form-group">
                    <label for="customer_id">Покупатель</label>
                    <select class="form-control" id="customer_id" name="customer_id">
                        @foreach($customers as $customer)
                            <option value="{{$customer->id}}">{{$customer->full_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col notebook">
                <div class="form-group">
                    <label for="notebook_id">Ноутбук</label>
                    <select class="form-control" id="notebook_id" name="notebook_id">
                        @foreach($notebooks as $notebook)
                            <option value="{{$notebook->id}}">{{$notebook->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Колличество</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
                </div>
                <button type="submit" class="btn btn-raised btn-primary">Добавить</button>
            </div>
        </div>
    </form>
</main>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
