@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>Korisnici</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @auth
                            @if(Auth::user()->isSuperAdmin())

                                    <form action = "<?php echo $users[0]->id; ?>" method = "post">
                                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
                                        <table>
                                            <tr>
                                                <td>First Name</td>
                                                <td>
                                                    <input type = 'text' name = 'name'
                                                           value = '<?php echo$users[0]->name; ?>'/> </td>
                                            </tr>


                                            <tr>
                                                <td>Email</td>
                                                <td>
                                                    <input type = 'text' name = 'email'
                                                           value = '<?php echo$users[0]->email; ?>'/>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Role</td>
                                                <td>
                                                    <input type = 'number' name = 'role'
                                                           value = '<?php echo$users[0]->role; ?>'/>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan = '2'>
                                                    <input type = 'submit' class="btn btn-primary" value = "Ažuriraj" />
                                                </td>
                                            </tr>
                                        </table>
                                    </form>


                                    @else NISTE SUPERADMIN
                            @endif



                        @endauth




                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


