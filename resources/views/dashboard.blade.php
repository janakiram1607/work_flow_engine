<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @can('isAdmin')
        @if (\Session::has('message'))
            <div class="alert alert-success" style="color:green; text-align:center;">
                <ul>
                    <li>{!! \Session::get('message') !!}</li>
                </ul>
            </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">                
                <div class="m-6 space-x-3 text-center space-y-3">
                    <table id="myTable" class="table table-responsive">
                        <thead>
                        <tr>
                            <th style="text-align: left;"> Name</th>
                            <th style="text-align: left;"> Email</th>
                            <th> DOB</th>
                            <th> WorkFlow</th>
                            <th> Action</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getusers as $user)
                        <tr>
                            <td style="text-align: left;">{{$user->fullname}}</td>
                            <td style="text-align: left;">{{$user->email}}</td>
                            <td>{{date('m-d-Y', strtotime($user->dob))}}</td>
                            <td>{{$user->workflow}}</td>
                            <td>
                                <a class="underline text-sm text-blue-600" href="{{route('process.req', [$user, 3])}}"> {{($user->work_flow_engine != 3 ? 'Approve' : '')}}</a>
                                <a class="underline text-sm text-red-600" href="{{route('process.req', [$user, 4])}}"> {{($user->work_flow_engine != 4 ? 'Reject' : '')}}</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    </a>
                </div>
            </div>
        </div>
        @endcan
    </div>
</x-app-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
