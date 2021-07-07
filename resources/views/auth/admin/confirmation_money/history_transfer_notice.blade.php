@extends('layouts.main_template')
@section('content')



    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">รายการโอนเงิน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">รายการโอนเงิน</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">ข้อมูลรายการโอนเงิน</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap" id="table_crud">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">เจ้าของบัญชี</th>
                                        <th scope="col">รูปสลิป</th>
                                        <th scope="col">เลขที่บัญชี</th>
                                        <th scope="col">ชื่อธนาคาร</th>
                                        <th scope="col">ชื่อบัญชี</th>
                                        <th scope="col">จำนวนเงิน</th>
                                        <th scope="col">โอนไปยัง</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">ทำรายการเมื่อ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transfer_noticeses as $transfer_notices)
                                        <tr align="center" id="row_{{ $transfer_notices->id }}">
                                            <td class="align-middle">
                                                {{ $transfer_notices->customer->username }}
                                            </td>
                                            <td class="align-middle">
                                                <a href="#" class="pop">
                                                    <img src="{{ asset($transfer_notices->pic) }}"
                                                        alt="{{ $transfer_notices->pic }}" width="100" height="100">
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $transfer_notices->no }}</td>
                                            <td class="align-middle">{{ $transfer_notices->name_bank }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $transfer_notices->name_account }}</td>
                                            <td class="align-middle">{{ $transfer_notices->money }}
                                            </td>
                                            <td class="align-middle">
                                                {{ $transfer_notices->my_bank->name }}
                                                <br>
                                                {{ $transfer_notices->my_bank->no }}
                                            </td>
                                            <td class="align-middle">
                                                @if ($transfer_notices->status == 0)
                                                    รอการยืนยัน
                                                @elseif ($transfer_notices->status == 1)
                                                    สำเร็จ
                                                @else
                                                    มีข้อผิดพลาด
                                                @endif
                                            </td>
                                            <th scope="row" class="align-middle">
                                                {{ Carbon\Carbon::parse($transfer_notices->created_at)->locale('th')->diffForHumans() }}
                                            </th>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $transfer_noticeses->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->


            <!-- /.card -->

        </div>
    </section>

    {{-- modal image preview --}}
    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <img src="" class="imagepreview" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
@endsection
