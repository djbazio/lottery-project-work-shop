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
                    var no = "";
                    var name_account = "";
                    var name_bank = "";
                    var cust_id = "";
                    var username = "";
                    var id = $("#post_id").val();
                    if (id == "") {
                        no = $("#no").val();
                        name_account = $("#name_account").val();
                        name_bank = $("#name_bank").val();
                        cust_id = $("#cust_id").val();
                        username = $("#cust_id option:selected").text();
                    } else {
                        no = $("#eno").val();
                        name_account = $("#ename_account").val();
                        name_bank = $("#ename_bank").val();
                        cust_id = $("#ecust_id").val();
                        username = $("#ecust_id option:selected").text();
                        // console.log(fname,lname,tel,username,address);
                    }

                    let _url = "{{ route('admin.data.customers_bank.store') }}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: _url,
                        type: "POST",
                        data: {
                            id: id,
                            no: no,
                            name_account: name_account,
                            name_bank: name_bank,
                            cust_id: cust_id,
                            _token: _token,
                        },
                        success: function(res) {
                            console.log("สำเร็จ");

                            if (id != "") {
                                $("#table_crud #row_" + id + " td:nth-child(3)").html(res.data.no);
                                $("#table_crud #row_" + id + " td:nth-child(4)").html(res.data
                                    .name_account);
                                $("#table_crud #row_" + id + " td:nth-child(5)").html(res.data
                                    .name_bank);
                                $("#table_crud #row_" + id + " td:nth-child(6)").html(username);
                            } else {
                                $('#table_crud tbody').prepend("<tr align='center' id='row_" + res.data
                                    .id + "'" +
                                    ">" +
                                    "<th id='td_choese" +
                                    "' class='align-middle' hidden='true'>" +
                                    "<div align='center'>" +
                                    "<input type='checkbox' class='form-check' name='select'" +
                                    "id='select_input' value='" + res.data.id + "'>" +
                                    "</div>" +
                                    "</th>" +

                                    "<td class='align-middle'>" + res.data.id + "</td>" +
                                    "<td class='align-middle'>" + res.data.no + "</td>" +
                                    "<td class='align-middle'>" + res.data.name_account + "</td>" +
                                    "<td class='align-middle'>" + res.data.name_bank + "</td>" +
                                    "<td class='align-middle'>" + username + "</td>" +
                                    "</td>" +
                                    "<td align='center' class='align-middle'>" +
                                    "<a href='javascript:void(0)' class='btn btn-warning'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='editPost(event.target)' id='btn_edit'>แก้ไข</a> " +
                                    " <a href='javascript:void(0)' class='btn btn-danger'" +
                                    "data-id='" + res.data.id +
                                    "' onclick='deletePost(event.target)' id='btn_delete'>ลบ</a>" +
                                    "</td>" +
                                    "</tr>"
                                );
                                $("#no").val('');
                                $("#name_account").val('');
                                $("#name_bank").val('');
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
                            Swal.fire(
                                'เกิดข้อผิดพลาด!',
                                'เกิดข้อผิดพลาดบางอย่าง กรุณาลองใหม่อีกครั้ง',
                                'error'
                            )
                            console.log("ไม่สำเร็จ");
                            console.log(err);
                            if (id == "") {
                                clearTextAddError();
                                $('#noError').text(err.responseJSON.errors.no);
                                $('#name_accountError').text(err.responseJSON.errors.name_account);
                                $('#name_bankError').text(err.responseJSON.errors.name_bank);
                                $('#cust_idError').text(err.responseJSON.errors.cust_id);
                            } else {
                                clearTextModalError();
                                $('#enoError').text(err.responseJSON.errors.no);
                                $('#ename_accountError').text(err.responseJSON.errors.name_account);
                                $('#ename_bankError').text(err.responseJSON.errors.name_bank);
                                $('#ecust_idError').text(err.responseJSON.errors.cust_id);
                            }
                        }
                    });
                }
            })

        }

        function clearTextAddError() {
            $('#noError').text("");
            $('#name_accountError').text("");
            $('#name_bankError').text("");
            $('#cust_idError').text("");
        }

        function clearTextModalError() {
            $('#enoError').text("");
            $('#ename_accountError').text("");
            $('#ename_bankError').text("");
            $('#ecust_idError').text("");
        }

        function editPost(event) {
            var id = $(event).data("id");
            let _url = "/admin/api/getCustomerBank/" + id;
            let _token = $('meta[name="csrf-token"]').attr('content');
            clearTextModalError();
            $("#text_addcus").html("แก้ไขข้อมูลธนาคาร");
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
                        $("#eno").val(res.no);
                        $("#ename_account").val(res.name_account);
                        $("#ename_bank").val(res.name_bank);
                        $("#ecust_id").val(res.cust_id).trigger('change'); //สั่งให้ selected
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
                    let _url = "/admin/data/delete/customer_bank/" + id;
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
            var _url = "{{ route('admin.data.delete.all_customer_bank') }}";
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
                    <h1 class="m-0">จัดการธนาคารลูกค้า</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">หน้าแรก</a></li>
                        <li class="breadcrumb-item active">จัดการธนาคารลูกค้า</li>
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
                            <h3 class="card-title">รายชื่อธนาคารลูกค้า</h3>
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
                                        <th>เลขที่บัญชี</th>
                                        <th>ชื่อบัญชี</th>
                                        <th>ชื่อธนาคาร</th>
                                        <th>เจ้าของบัญชี</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers_bank as $customer_bank)
                                        <tr id="row_{{ $customer_bank->id }}" align="center">
                                            <th id="td_choese" class="align-middle" hidden>
                                                <div align="center">
                                                    <input type="checkbox" class="form-check" name="select"
                                                        id="select_input" value="{{ $customer_bank->id }}">
                                                </div>
                                            </th>
                                            <td class="align-middle">{{ $customer_bank->id }}</td>
                                            <td class="align-middle">{{ $customer_bank->no }}</td>
                                            <td class="align-middle">{{ $customer_bank->name_account }}</td>
                                            <td class="align-middle">{{ $customer_bank->name_bank }}</td>
                                            <td class="align-middle">{{ $customer_bank->customers->username }}</td>
                                            <td class="align-middle" align="center">
                                                <a href="javascript:void(0)" class="btn btn-warning"
                                                    data-id="{{ $customer_bank->id }}" onclick="editPost(event.target)"
                                                    id='btn_edit'>แก้ไข</a>
                                                <a href="javascript:void(0)" class="btn btn-danger"
                                                    data-id="{{ $customer_bank->id }}" onclick="deletePost(event.target)"
                                                    id='btn_delete'>ลบ</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center">
                            {!! $customers_bank->links() !!}
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">เพิ่มข้อมูลธนาคาร</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_account">ชื่อบัญชี</label>
                                    <input type="text" class="form-control" id="name_account" name="name_account"
                                        placeholder="โปรดกรอกข้อมูลเป็นตัวอักษร">
                                    <span id="name_accountError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name_bank">ชื่อธนาคาร</label>
                                    <input type="text" class="form-control" id="name_bank" name="name_bank"
                                        placeholder="โปรดกรอกข้อมูลเป็นตัวอักษร">
                                    <span id="name_bankError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no">เลขที่บัญชี</label>
                                    <input type="number" class="form-control" name="no" id="no"
                                        placeholder="โปรดกรอกข้อมูลเป็นตัวเลข">
                                    <span id="noError" class="alert-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>เจ้าของบัญชี</label>
                                    <select class="form-control select2bs4" name="cust_id" id="cust_id"
                                        style="width: 100%;">
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->username }}</option>
                                        @endforeach
                                    </select>
                                    <span id="cust_idError" class="alert-message text-danger"></span>
                                </div>
                            </div>
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
                            <label for="ename_account">ชื่อบัญชี</label>
                            <input type="text" class="form-control" id="ename_account" name="name_account"
                                placeholder="โปรดกรอกข้อมูลเป็นตัวอักษร">
                            <span id="ename_accountError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="ename_bank">ชื่อธนาคาร</label>
                            <input type="text" class="form-control" id="ename_bank" name="name_bank"
                                placeholder="โปรดกรอกข้อมูลเป็นตัวอักษร">
                            <span id="ename_bankError" class="alert-message text-danger"></span>
                        </div>

                        <div class="form-group">
                            <label for="eno">เลขที่บัญชี</label>
                            <input type="number" class="form-control" name="no" id="eno"
                                placeholder="โปรดกรอกข้อมูลเป็นตัวเลข">
                            <span id="enoError" class="alert-message text-danger"></span>
                        </div>
                        <div class="form-group">
                            <label>เจ้าของบัญชี</label>
                            <select class="form-control select2bs4" name="cust_id" id="ecust_id" style="width: 100%;">
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->username }}</option>
                                @endforeach
                            </select>
                            <span id="ecust_idError" class="alert-message text-danger"></span>
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
