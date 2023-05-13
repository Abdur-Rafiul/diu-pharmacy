@extends('backend.layouts.app')

@section('content')

    <div class="col-md-12 p-0">
        <div class="card mt-5">
            <div class="card-header" style="background: #16263d">
                <h2 class="float-left text-white">User List</h2>

            </div>
            <div class="card-body">
                <table id="dataTable" class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Website Access</th>
                        <th scope="col">User Name</th>
                        <th scope="col">User Email</th>
                    </thead>
                    <tbody>


                    @foreach ($users as $data)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $data->is_admin==1? 'Admin':'Simple User'}}</td>
                            <td>{{ $data->name}}</td>
                            <td>{{ $data->email}}</td>

                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>
        $(document).ready(function(){

            $('#dataTable').DataTable();

            $('.dataTables_length').addClass('bs-select');
        });
    </script>


@endsection
