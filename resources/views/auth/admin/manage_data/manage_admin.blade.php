@extends('layouts.main_template')
@section('content')

    <script>
        function new_save() {
            $("#post_id").val("");
            createPost();
        }

        function createPost() {
            Swal.fire({
                title: 'คุณแน่ใจใช่หรือไม่?',
                text: "คุณต้องการบันทีกใช่หรือไม่?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: "ยกเลิก"
            }).then((result) => {
                if (result.isConfirmed) {
                    var fname = "";
                    var lname = "";
                    var tel = "";
                    var username = "";
                    var address = "";
                    var password = "";
                    var password_confirmation = "";

                    var id = $("#post_id").val();
                    if (id == "") {
                        fname = $("#fname").val();
                        lname = $("#lname").val();
                        tel = $("#tel").val();
                        username = $("#username").val();
                        address = $("#address").val();
                        password = $("#password").val();
                        password_confirmation = $("#password_confirmation").val();
                    } else {
                        fname = $("#efname").val();
                        lname = $("#elname").val();
                        tel = $("#etel").val();
                        username = $("#eusername").val();
                        address = $("#eaddress").val();
                        // console.log(fname,lname,tel,username,address);

                    }

                    let _url = "{{ route('admin.data.store') }}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: _url,
                        type: "POST",
                        data: {
                            id: id,
                            fname: fname,
                            lname: lname,
                            tel: tel,
                            username: username,
                            address: address,
                            password: password,
                            password_confirmation: password_confirmation,
                            _token: _token,
                        },
                        success: function(res) {
                            console.log("สำเร็จ");

                            if (id != "") {
                                $("#table_crud #row_" + id + " td:nth-child(3)").html(res.data.fname +
                                    " " + res.data.lname);
                                $("#table_crud #row_" + id + " td:nth-child(4)").html(res.data
                                    .tel);
                                $("#table_crud #row_" + id + " td:nth-child(5)").html(res.data.address);
                                $("#table_crud #row_" + id + " td:nth-child(6)").html(res.data
                                    .username);
                            } else {
                                $('#table_crud tbody').prepend("<tr id='row_" + res.data.id + "'" +
                                    ">" +

                                    "<th id='td_choese" +
                                    "' class='align-middle' hidden='true'>" +
                                    "<div align='center'>" +
                                    "<input type='checkbox' class='form-check' name='select'" +
                                    "id='select_input' value='" + res.data.id + "'>" +
                                    "</div>" +
                                    "</th>" +

                                    "<td>" + res.data.id + "</td>" +
                                    "<td>" + res.data.fname + " " + res.data.lname + "</td>" +
                                    "<td>" + res.data.tel + "</td>" +
                                    "<td>" + res.data.address + "</td>" +
                                    "<td>" + res.data.username + "</td>" +
                                    "<td align='center'>" +
                                    "<a href='javascript:void(0)' class='btn btn-warning'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='editPost(event.target)' id='btn_edit'>แก้ไข</a> " +
                                    " <a href='javascript:void(0)' class='btn btn-danger'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='deletePost(event.target)' id='btn_delete'>ลบ</a>" +
                                    "</td>" +
                                    "</tr>"
                                );
                                $("#fname").val('');
                                $("#lname").val('');
                                $("#tel").val('');
                                $("#username").val('');
                                $("#address").val('');
                                $("#password").val('');
                                $("#password_confirmation").val('');
                                clearTextAddError();
                                processBtnCancel();
                            }
                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success'
                            )
                            $('#post-modal').modal('hide');
                            // countRow++;
                            clearTextModalError();
                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            // console.log(err);
                            if (id == "") {

                                clearTextAddError();
                                $('#fnameError').text(err.responseJSON.errors.fname);
                                $('#lnameError').text(err.responseJSON.errors.lname);
                                $('#usernameError').text(err.responseJSON.errors.username);
                                $('#passwordError').text(err.responseJSON.errors.password);
                                $('#telError').text(err.responseJSON.errors.tel);
                                $('#addressError').text(err.responseJSON.errors.address);
                                $('#password_confirmationError').text(err.responseJSON.errors
                                    .password_confirmation);
                            } else {
                                clearTextModalError();
                                $('#efnameError').text(err.responseJSON.errors.fname);
                                $('#elnameError').text(err.responseJSON.errors.lname);
                                $('#eusernameError').text(err.responseJSON.errors.username);
                                $('#etelError').text(err.responseJSON.errors.tel);
                                $('#eaddressError').text(err.responseJSON.errors.address);
                            }
                        }
                    });
                }
            })

        }

        function clearTextAddError() {
            $('#fnameError').text("");
            $('#lnameError').text("");
            $('#usernameError').text("");
            $('#passwordError').text("");
            $('#telError').text("");
            $('#addressError').text("");
            $('#password_confirmationError').text("");
        }

        function clearTextModalError() {
            $('#efnameError').text("");
            $('#elnameError').text("");
            $('#eusernameError').text("");
            $('#etelError').text("");
            $('#eaddressError').text("");
        }

        function editPost(event) {
            var id = $(event).data("id");
            let _url = "/admin/api/getUserData/" + id;
            let _token = $('meta[name="csrf-token"]').attr('content');
            clearTextModalError();
            $("#text_addcus").html("แก้ไขรายชื่อ");
            $('#post-modal').modal('show');

            $.ajax({
                url: _url,
                type: "POST",
                data: {
                    _token: _token,
                },
                success: function(res) {
                    // console.log(_url);
                    // console.log(res);
                    if (res) {
                        $("#post_id").val(res.id);
                        $("#efname").val(res.fname);
                        $("#elname").val(res.lname);
                        $("#etel").val(res.tel);
                        $("#eusername").val(res.username);
                        $("#eaddress").val(res.address);
                        // $('#epost-modal').modal('show');
                    }
                }
            });
        }

        function deletePost(event) {
            Swal.fire({
                title: 'คูณแน่ใจใช่หรือไม่?',
                text: "คุณต้องการลบข้อมูลใช่หรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(event).data("id");
                    let _url = "/admin/data/delete/user/" + id;
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: _url,
                        type: "DELETE",
                        data: {
                            _token: _token,
                        },
                        success: function(res) {
                            console.log(res);
                            if (res.code == '200') {
                                $("#row_" + id).remove();
                                Swal.fire(
                                    'สำเร็จ!',
                                    'ข้อมูลถูกลบเรียบร้อยแล้ว',
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
                    <h1 class="m-0">จัดการข้อมูลแอตมิน</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">จัดการข้อมูลแอตมิน</li>
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
                            <h3 class="card-title">รายชื่อแอตมิน</h3>

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
                                        <th>ID</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>ที่อยู่</th>
                                        <th>ชื่อผู้ใช้</th>
                                        <th>อื่นๆ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                        <tr id="row_{{ $admin->id }}" align="center">
                                            <th id="td_choese" class="align-middle" hidden>
                                                <div align="center">
                                                    <input type="checkbox" class="form-check" name="select"
                                                        id="select_input" value="{{ $admin->id }}">
                                                </div>
                                            </th>
                                            <td class="align-middle">{{ $admin->id }}</td>
                                            <td class="align-middle">{{ $admin->fname }} {{ $admin->lname }}</td>
                                            <td class="align-middle">{{ $admin->tel }}</td>
                                            <td class="align-middle">{{ $admin->address }}</td>
                                            <td class="align-middle">{{ $admin->username }}</td>
                                            <td class="align-middle" align="center">
                                                <a href="javascript:void(0)" class="btn btn-warning"
                                                    data-id="{{ $admin->id }}" onclick="editPost(event.target)"
                                                    id='btn_edit'>แก้ไข</a>
                                                <a href="javascript:void(0)" class="btn btn-danger"
                                                    data-id="{{ $admin->id }}" onclick="deletePost(event.target)"
                                                    id='btn_delete'>ลบ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $admins->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">เพิ่มข้อมูลแอตมิน</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">ชื่อผู้ใช้</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        placeholder="โปรดกรอกข้อมูลชื่อผู้ใช้ 6-12 หลัก เช่น wutza001">
                                    <span id="usernameError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">รหัสผ่าน</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="โปรดกรอกรหัสผ่าน 6-20 หลัก">
                                    <span id="passwordError" class="alert-message text-danger"></span>

                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">ยืนยันรหัสผ่าน</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                id="password_confirmation" placeholder="ยืนยันรหัสผ่านด้านบน">
                            <span id="password_confirmationError" class="alert-message text-danger"></span>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="fname">ชื่อแรก</label>
                                    <input type="text" class="form-control" id="fname"
                                        placeholder="กรุณากรอกชื่อ เช่น ณัฐวุด" name="fname">
                                    <span id="fnameError" class="alert-message text-danger"></span>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lname">นามสกุล</label>
                                    <input type="text" class="form-control" id="lname"
                                        placeholder="กรูณากรอกนามสกุล เช่น ศรีระว้า" name="lname">
                                    <span id="lnameError" class="alert-message text-danger"></span>

                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel">เบอร์โทร</label>
                            <input type="number" class="form-control" id="tel" placeholder="กรุณากรอกเบอร์ เช่น 0981546231"
                                name="tel">
                            <span id="telError" class="alert-message text-danger"></span>

                        </div>
                        <div class="form-group">
                            <label for="address">ที่อยู่</label>
                            <textarea name="address" class="form-control" id="address" cols="30" rows="10"
                                placeholder="กรุณากรอกที่อยู่ เช่น พช.3017 ตำบล ยางสาว อำเภอวิเชียรบุรี เพชรบูรณ์ 67130"></textarea>
                            <span id="addressError" class="alert-message text-danger"></span>

                        </div>
                        {{-- <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="new_save()">บันทึก</button>
                    </div>
                </form>
            </div>
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
