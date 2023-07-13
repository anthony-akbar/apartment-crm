@extends('admin')

@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center p-10">
        <h2 class="text-lg font-medium mr-auto">Квартиры</h2>
    </div>


    <table class="table table-report -mt-2">
        <thead>
        <tr>
            <th class="text-center whitespace-nowrap">№</th>
            <th class="text-center whitespace-nowrap">Rooms</th>
            <th class="text-center whitespace-nowrap">Floor</th>
            <th class="text-center whitespace-nowrap">SQ</th>
            <th class="text-center whitespace-nowrap">Terace</th>
            <th class="text-center whitespace-nowrap">Price/M²</th>
            <th class="text-center whitespace-nowrap">Total</th>
            <th class="text-center whitespace-nowrap">Status</th>
            <th class="text-center whitespace-nowrap">ACTIONS</th>
        </tr>
        </thead>
        <tbody>
        <tr class="intro-x searchs">
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="number" type="text" class="form-control" placeholder="№"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="rooms" type="number" class="form-control" placeholder="Rooms"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="floor" type="number" class="form-control" placeholder="Floor"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="square" step="0.01" type="number" class="form-control" placeholder="SQ"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="terace" step="0.01" type="number" class="form-control" placeholder="Terace"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="price" step="0.01" type="number" class="form-control" placeholder="Price/M²"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="total" step="0.01" type="number" class="form-control" placeholder="Total"> </div>
            </td>
            <td class="text-center">
                <div><input onchange="handle(this)" id="regular-form-1" name="status" type="number" class="form-control" placeholder="Status"> </div>
            </td>
            <td class="table-report__action text-center w-56">

                <button class="btn btn-primary">Search</button>
            </td>
        </tr>
        <div class="tabless">
            @include('apartments.table')
        </div>
        </tbody>
    </table>

    <div id="filters">

    </div>

@endsection

@section('script')

    <script type="text/javascript">

        function handle(element) {
            let searchs = $('.searchs')
            let inputs = searchs.find('input')
            let array = {}
            for(let i = 0; i < inputs.length; i++) {
                array[inputs[i].getAttribute('name')] = inputs[i]['value'] === '' ? null : inputs[i]['value']
            }
            console.log(array)
            $.ajax({
                type: 'get',
                url: '{{URL::to('/apartments/search')}}',
                data: {
                    'data': array
                },
                success: (data) => {
                    let trs = $('tbody').find('tr')
                    for(let i = 0; i<trs.length; i++){
                        if(!$(trs[i]).hasClass('searchs')){
                            trs[i].remove()
                        }
                    }
                    $('tbody').append(data)
                }
            })
        }

    </script>

@endsection
