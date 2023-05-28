<!DOCTYPE html>
<html>

<head>
    <title>Kalkulator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 mx-auto bg-dark rounded">
                <div class="d-flex gap-5 justify-content-center mt-5 mb-5">
                    <div>
                        <form method="POST" action="/calculate">
                            @csrf
                            <input class="form-control w-100 mb-2" type="number" name="operand1"
                                placeholder="First Number">
                            <input class="form-control w-100 mb-2" type="number" name="operand2"
                                placeholder="Second Number">
                            <div class="d-flex justify-align-between">
                                <select class="form-select w-50 mb-2" name="operator">
                                    <option value="+">+</option>
                                    <option value="-">-</option>
                                    <option value="*">*</option>
                                    <option value="/">/</option>
                                </select>
                            </div>
                            <button class="btn btn-success mt-3" type="submit">Calculate</button>
                        </form>
                        <div>
                            <div class="text-light h2 mt-2">
                                Result : {{$riwayat->result}}
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <h3 class="text-light">Calculation History</h3>
                        <div class="list-group">
                            @foreach ($calculations as $calculation)
                            <button class="list-group-item list-group-item-action">
                                <a href="/{{$calculation->result}}">
                                    {{ $calculation->operand1 }} {{ $calculation->operator }} {{
                                    $calculation->operand2 }} = {{
                                    $calculation->result }}
                                </a>
                            </button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <ul>
                </ul>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
</script>

</html>