<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 " >
        <div class="max-w-7xl mx-auto sm:px-6 ">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="wrapper">
                    @php
                        $messages= DB::table('messages')
                        ->join('users','messages.user_id','users.id')
                        ->select('messages.*','users.name')
                        ->get();
                    @endphp


                    <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper " style="margin-left: 0px !important;">
                      <!-- Content Header (Page header) -->
                      <section class="content-header">
                        <div class="container-fluid">
                          <div class="row mb-2">
                            <div class="col-sm-6">
                              <h1>Test User Text Message</h1>
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif
                            </div>
                            <div class="col-sm-6">

                            </div>
                          </div>
                        </div><!-- /.container-fluid -->
                      </section>

                      <!-- Main content -->
                      <section class="content">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <form method="post" action="{{ route('store.messages') }}">
                                    @csrf
                              <div class="card-header">
                                <h3 class="card-title">
                                  Message
                                </h3>
                              </div>
                              <!-- /.card-header -->
                              <div class="card-body">
                                <textarea id="summernote" name="summernote" maxlength="255" rows="6" cols="70">

                                </textarea>
                              </div>
                              <div class="card-footer">
                                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                              </div>
                            </form>
                            </div>
                          </div>
                          <!-- /.col-->
                        </div>
                        <!-- ./row -->
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header ">
                                    <div class="row">
                                        <div class="col-12 col-md-6 text-left pt-3">
                                            <h3 class="card-title">Message Table</h3>
                                        </div>
                                        <div class="col-12 col-md-6 text-right pt-1">

                                        </div>
                                    </div>

                                </div>
                                <div class="card-body">

                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">ID</th>
                                                <th class="wd-15p">User ID</th>
                                                <th class="wd-15p">User Name</th>
                                                <th class="wd-15p">Message</th>
                                                <th class="wd-15p">created_at</th>
                                                <th class="wd-15p">updated_at</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                                @foreach ($messages as $key=>$item)
                                                <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $item->user_id }}</td>
                                                <td>{{ $item->name }}</td>
                                                 <td ><textarea  rows="3" cols="60%" style="border: none;box-sizing: border-box;
                                                     display: flex;" readonly>
                                                        {{ $item->message  }}
                                                     </textarea></td>
                                                <td>{{ $item->created_at }} </td>
                                                <td>{{ $item->updated_at }} </td>
                                            </tr>
                                                @endforeach




                                        </tbody>

                                    </table>
                                </div>
                              <div class="card-footer">

                              </div>
                            </div>
                          </div>
                          <!-- /.col-->
                        </div>
                        <!-- ./row -->
                      </section>
                      <!-- /.content -->

                    <!-- /.content-wrapper -->
                    <footer class="main-footer">


                    </footer>

                    <!-- Control Sidebar -->
                    <aside class="control-sidebar control-sidebar-dark">
                      <!-- Control sidebar content goes here -->
                    </aside>
                    <!-- /.control-sidebar -->
                  </div>

            </div>
        </div>
    </div>


</x-app-layout>
