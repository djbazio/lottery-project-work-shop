@extends('layouts.main_template')
@section('content')

    <script>
        function processAccetpe(event) {
            var type = $(event).data("type");

            Swal.fire({
                title: 'คูณแน่ใจใช่หรือไม่?',
                text: "คุณต้องการจะยืนยันการโอนเงินนี้หรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(event).data("id");
            var cusm_id = $(event).data("cusm_id");
                    let _url = "/admin/confirmation_money/accept/" + id + "/" + cusm_id;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: _url,
                        type: "post",
                        data: {
                            _token: _token,
                        },
                        success: function(res) {
                            console.log(res);
                            if (res.code == '200') {
                                $("#row_" + id).remove();
                                Swal.fire(
                                    'สำเร็จ!',
                                    'ข้อมูลถูกยืนยันเรียบร้อยแล้ว',
                                    'success'
                                )
                            } else {
                                Swal.fire(
                                    'ไม่สำเร็จ!',
                                    res.error,
                                    'error'
                                )
                            }
                        }
                    });
                }
            })
        }
    </script>

    <script>
        function select_all() {
            $("[id='select_input']").prop('checked', true);
        }

        function reset_select() {
            $("[id='select_input']").prop('checked', false);

        }

        function showInputChouse(event) {
            var btn_chouse = document.getElementById("btn_chouse");
            var delete_select = document.getElementById("delete_select");
            var chk = btn_chouse.getAttribute("status");
            var reset_select = document.getElementById("reset_select");
            var select_all = document.getElementById("select_all");
            if (chk == 0) {
                document.getElementById("th_choese").hidden = false;
                $("[id='td_choese']").prop('hidden', false);
                $("[id='th_choese']").prop('hidden', false);
                $("[id='btn_delete']").prop('hidden', true);

                // console.log("fwf")
                //ปุ่มยกเลิก
                btn_chouse.innerHTML = "ยกเลิก";
                btn_chouse.setAttribute("status", "1");
                btn_chouse.setAttribute("class", "btn btn-warning");
                //ปุ้มเพิ่มรรายชื่อ

                //ปุ่มลบทั้งหมด
                delete_select.hidden = false;
                //reset
                reset_select.hidden = false;
                //เลือกทั้งหมด
                select_all.hidden = false;

            } else {
                processBtnCancel();
            }

            console.log(chk);
        }

        function processBtnCancel() {
            var btn_chouse = document.getElementById("btn_chouse");
            var delete_select = document.getElementById("delete_select");
            var chk = btn_chouse.getAttribute("status");
            var reset_select = document.getElementById("reset_select");
            var select_all = document.getElementById("select_all");
            document.getElementById("th_choese").hidden = true;
            $("[id='td_choese']").prop('hidden', true);
            $("[id='th_choese']").prop('hidden', true);
            $("[id='btn_delete']").prop('hidden', false);

            //เลือก
            btn_chouse.innerHTML = "เลือก";
            btn_chouse.setAttribute("status", "0");
            btn_chouse.setAttribute("class", "btn btn-info");
            //ปุ่มลบทั้งหมด
            delete_select.hidden = true;
            //reset
            reset_select.hidden = true;
            //เลือกทั้งหมด
            select_all.hidden = true;
            this.reset_select();
        }

        function select_delete() {
            var arr = [];
            var _url = "{{ route('admin.data.delete.all_user') }}";
            let _token = $('meta[name="csrf-token"]').attr('content');
            $("input:checkbox[name=select]:checked").each(function() {
                arr.push({
                    id: $(this).val()
                });
            });
            var filtarr = arr.filter(function(el) {
                return el != null;
            });
            //  console.log(arr);

            if (filtarr.length > 0) {
                Swal.fire({
                    title: 'คุณแน่ใจใช่หรือไม่?',
                    text: "คุณต้องการลบข้อมูลที่เลือกใช่หรือไม่?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'ตกลง!',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "post",
                            url: _url,
                            data: {
                                _token: _token,
                                pass: filtarr,
                            },
                            success: function(res) {
                                console.log("Sucess");
                                if (res.code == '200') {
                                    var response = res.data;
                                    // console.log(response[0].id);
                                    for (let i = 0; i < response.length; i++) {
                                        $("#row_" + response[i].id).remove();
                                        // console.log(response[i].id)
                                    }
                                    Swal.fire(
                                        'สำเร็จ!',
                                        res.message,
                                        'success'
                                    )
                                }
                            },
                            error: function(err) {
                                Swal.fire(
                                    'เกิดข้อผิดพลาด!',
                                    "เกิดข้อผิดพลาดบางอย่าง",
                                    'error',
                                )
                            }
                        });
                    }
                })
            } else {
                Swal.fire(
                    'มีข้อผิดพลาด!',
                    "คุณยังไม่ได้เลือกรายการ",
                    'warning'
                )
            }

        }
    </script>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ยืนยันการโอนเงิน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">ยืนยันการโอนเงิน</li>
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
                            <h3 class="card-title">ข้อมูลการโอนเงิน</h3>

                            <div class="card-tools">
                                <button class="btn btn-info" status="0" onclick="showInputChouse(event)"
                                    id="btn_chouse">เลือก</button>
                                <a href="javascript:void(0)" class="btn btn-success" hidden="true" id="select_all"
                                    onclick="select_all()">เลือกทั้งหมด</a>
                                <a href="javascript:void(0)" class="btn btn-info" hidden="true" id="reset_select"
                                    onclick="reset_select()">รีเซต</a>
                                <a href="javascript:void(0)" class="btn btn-danger" hidden="true" id="delete_select"
                                    onclick="select_delete()">ลบข้อมูลที่เลือก</a>
                                {{-- <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 300px;">
                            <table class="table table-head-fixed text-nowrap" id="table_crud">
                                <thead>
                                    <tr align="center">
                                        <th id="th_choese" hidden>เลือก</th>
                                        <th scope="col">เจ้าของบัญชี</th>
                                        <th scope="col">รูปสลิป</th>
                                        <th scope="col">เลขที่บัญชี</th>
                                        <th scope="col">ชื่อธนาคาร</th>
                                        <th scope="col">ชื่อบัญชี</th>
                                        <th scope="col">จำนวนเงิน</th>
                                        <th scope="col">โอนไปยัง</th>
                                        <th scope="col">สถานะ</th>
                                        <th scope="col">อัพเดทเมื่อ</th>
                                        <th>อื่นๆ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transfer_notice_histories as $transfer_notice_history)
                                        <tr align="center" id="row_{{ $transfer_notice_history->id }}">
                                            <td class="align-middle">
                                                <a href="#" class="pop">
                                                    <img src="{{ asset($transfer_notice_history->pic) }}"
                                                        alt="{{ $transfer_notice_history->pic }}" width="100"
                                                        height="100">
                                                </a>
                                            </td>
                                            <td class="align-middle">{{ $transfer_notice_history->customer->username }}
                                            </td>
                                            <td class="align-middle">{{ $transfer_notice_history->no }}</td>
                                            <td class="align-middle">{{ $transfer_notice_history->name_bank }}</td>
                                            <td class="align-middle">{{ $transfer_notice_history->name_account }}</td>
                                            <td class="align-middle">{{ $transfer_notice_history->money }}</td>
                                            <td class="align-middle">
                                                {{ $transfer_notice_history->my_bank->name }}
                                                <br>
                                                {{ $transfer_notice_history->my_bank->no }}
                                            </td>
                                            <td class="align-middle">
                                                @if ($transfer_notice_history->status == 0)
                                                    รอการยืนยัน
                                                @elseif ($transfer_notice_history->status == 1)
                                                    สำเร็จ
                                                @else
                                                    มีข้อผิดพลาด
                                                @endif
                                            </td>
                                            <th scope="row" class="align-middle">
                                                {{ Carbon\Carbon::parse($transfer_notice_history->updated_at)->locale('th')->diffForHumans() }}
                                            </th>
                                            <td class="align-middle" align="center">
                                                <a href="javascript:void(0)" class="btn btn-success" data-type="1"
                                                    data-cusm_id="{{ $transfer_notice_history->customer->id }}"
                                                    data-id="{{ $transfer_notice_history->id }}" id='btn_accept'
                                                    onclick="processAccetpe(event.target)">ยืนยัน</a>
                                                <a href="javascript:void(0)" class="btn btn-danger" data-type="0"
                                                    data-cusm_id="{{ $transfer_notice_history->customer->id }}"
                                                    data-id="{{ $transfer_notice_history->id }}"
                                                    onclick="processAccetpe(event.target)" id='btn_cancel'>ยกเลิก</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $transfer_notice_histories->links() !!}
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

    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="text_addcus">เพิ่มรายชื่อ</h4>
                </div>
                <div class="modal-body">
                    <form name="userForm" class="form-horizontal">
                        <input type="hidden" name="post_id" id="post_id" value="">
                        <div class="form-group">
                            <label for="efname">ชื่อแรก</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="efname" name="fname"
                                    placeholder="กรุณากรอกชื่อ เช่น ณัฐวุด">
                                <span id="efnameError" class="alert-message text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="elname">นามสกุล</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="elname" name="lname"
                                    placeholder="กรูณากรอกนามสกุล เช่น ศรีระว้า">
                                <span id="elnameError" class="alert-message text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="eusername">ชื่อผู้ใช้</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="eusername" name="username"
                                    placeholder="โปรดกรอกข้อมูลชื่อผู้ใช้ 6-12 หลัก เช่น wutza001">
                                <span id="eusernameError" class="alert-message text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="etel">เบอร์โทรศัพท์</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="etel" name="tel"
                                    placeholder="กรุณากรอกเบอร์ เช่น 0981546231">
                                <span id="etelError" class="alert-message text-danger"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="eaddress">ที่อยู่</label>
                            <div class="col-sm-12">
                                <textarea name="address" class="form-control" id="eaddress" cols="30" rows="5"
                                    placeholder="กรุณากรอกที่อยู่ เช่น พช.3017 ตำบล ยางสาว อำเภอวิเชียรบุรี เพชรบูรณ์ 67130"></textarea>
                                <span id="eaddressError" class="alert-message text-danger"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="createPost()">บันทึก</button>
                </div>
            </div>
        </div>
    </div>
@endsection
