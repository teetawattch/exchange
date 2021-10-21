@extends('layouts.app')

@section('content')
<div class="container mr-12">
    <div class="row justify-content-center">
        <div class="col-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h3>Request</h3>
                </div>
                <div class="card-body p-5 text-center">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">request id</th>
                                <th scope="col">name</th>
                                <th scope="col">amount</th>
                                <th scope="col">total (USD)</th>
                                <th scope="col">status</th>
                                <th scope="col">date - time</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($request as $resutlRequest)
                            <tr>
                                <td>{{ $resutlRequest['id'] }}</td>
                                <td>{{ $resutlRequest['username'] }}</td>
                                <td>{{ $resutlRequest['amount'] }}</td>
                                <td>{{ $resutlRequest['total'] }}</td>
                                <td>{{ $resutlRequest['status'] }}</td>
                                <td>{{ $resutlRequest['created_at'] }}</td>
                                @if($resutlRequest['status'] == 'accept' || $resutlRequest['status'] == 'deny')
                                <td><button class="btn btn-success" onclick="accecptRequest(this)" value="{{ $resutlRequest['id'] }}" disabled><i class="fas fa-check"></i> accept</button> <button class="btn btn-danger" onclick="denyRequest(this)" value="{{ $resutlRequest['id'] }}" disabled><i class="fas fa-times"></i> deny</button></td>
                                @else
                                <td><button class="btn btn-success" onclick="accecptRequest(this)" value="{{ $resutlRequest['id'] }}"><i class="fas fa-check"></i> accept</button> <button class="btn btn-danger" onclick="denyRequest(this)" value="{{ $resutlRequest['id'] }}"><i class="fas fa-times"></i> deny</button></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@csrf
@endsection

<script>
    function accecptRequest(element){
        var id = element.value
        var _token = document.getElementsByName('_token')[0].value
        try {
            if(confirm('Are you sure to accept this request?')){
                $.ajax({
                    url: "{{ route('acceptRequest') }}",
                    method: 'post',
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: (res) => {
                        // console.log(res);
                        location.reload()
                    }
                })
            }
        } catch (error) {
            console.log(error);
        }
    }

    function denyRequest(element){
        var id = element.value
        var _token = document.getElementsByName('_token')[0].value
        try {
            if(confirm('Are you sure to deny this request?')){
                $.ajax({
                    url: "{{ route('denyRequest') }}",
                    method: 'post',
                    data: {
                        id: id,
                        _token: _token
                    },
                    success: (res) => {
                        // console.log(res);
                        location.reload()
                    }
                })
            }
        } catch (error) {
            console.log(error);
        }
    }
</script>