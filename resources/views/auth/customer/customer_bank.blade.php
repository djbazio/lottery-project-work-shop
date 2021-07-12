@extends('layouts.normal_user.app')

@section('content')

    <script>
        function addPost() {
            $("#post_id").val('');
            $("#no").val('');
            $("#name_account").val('');
            $("#name_bank").val('');
            $("#text_addcus").html("เพิ่มข้อมูลธนาคาร");
            $('#post-modal').modal('show');
        }

        function resetInput() {
            $('#noError').text("");
            $('#name_accountError').text("");
            $('#name_bankError').text("");
        }
        var countRow = 0;

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
                    var no = $("#no").val();
                    var name_account = $("#name_account").val();
                    var name_bank = $("#name_bank").val();
                    var id = $("#post_id").val();
                    // console.log(name,username,post_id,tel);
                    resetInput();

                    let _url = "{{ route('customer.transfer_notice.cus_bank.store') }}";
                    let _token = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: _url,
                        type: "POST",
                        data: {
                            id: id,
                            no: no,
                            name_account: name_account,
                            name_bank: name_bank,
                            _token: _token,
                        },
                        success: function(res) {
                            // console.log(res.data.updated_at_2);

                            if (id != "") {
                                $("#table_crud #row_" + id + " td:nth-child(2)").html(res.data.no);
                                $("#table_crud #row_" + id + " td:nth-child(3)").html(res.data
                                    .name_bank);
                                $("#table_crud #row_" + id + " td:nth-child(4)").html(res.data.name_account);

                                $("#table_crud #row_" + id + " th:nth-child(5)").html(res.data.updated_at_2);
                                // $("#table_crud #row_" + id + " td:nth-child(5)").html(res.data.updated_at_2);

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

                                    "<td class='align-middle'>" + res.data.no + "</td>" +
                                    "<td class='align-middle'>" + res.data.name_bank + "</td>" +
                                    "<td class='align-middle'>" + res.data.name_account + "</td>" +
                                    "<th class='align-middle'>" + res.data.updated_at_2 + "</th>" +

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
                            }
                            Swal.fire(
                                'สำเร็จ!',
                                'ข้อมูลของท่านถูกบันทึกเรียบร้อยแล้ว',
                                'success'
                            )
                            $('#post-modal').modal('hide');
                            // countRow++;
                        },
                        error: function(err) {
                            console.log("ไม่สำเร็จ");
                            $('#noError').text(err.responseJSON.errors.no);
                            $('#name_bankError').text(err.responseJSON.errors.name_bank);
                            $('#name_accountError').text(err.responseJSON.errors.name_account);
                        }
                    });
                }
            })

        }

        function editPost(event) {
            var id = $(event).data("id");
            let _url = "/customer/api/get_customer_bank_data/" + id;
            let _token = $('meta[name="csrf-token"]').attr('content');

            $("#text_addcus").html("แก้ไขข้อมูลธนาคาร");
            resetInput();
            $.ajax({
                url: _url,
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(res) {
                    //console.log(_url);
                    if (res) {
                        $("#post_id").val(res.id);
                        $("#no").val(res.no);
                        $("#name_bank").val(res.name_bank);
                        $("#name_account").val(res.name_account);
                        $('#post-modal').modal('show');
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
                    let _url = "/customer/data/delete/customer_bank/" + id;
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

        function modalRandomClick() {
            $('#exampleModalCenter').modal('show');
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
            var _url = "{{ route('customer.data.delete.all_customer_bank') }}";
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

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                ========================================
                                                                                                                                                                                                                                                                                                                                                                                                    Single Blog Sections
                                                                                                                                                                                                                                                                                                                                                                                                ========================================                                                                                           -->
    <section id="single-blog" class="single-blog-layout pa-100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="comment-layout">
                        <h4>ธนาคารของฉัน</h4>
                        <p class="text-danger">* กรุณาตรวจสอบให้ดี</p>
                        <div align="right">
                            <button class="btn btn-info" status="0" onclick="showInputChouse(event)"
                                id="btn_chouse">เลือก</button>
                            <a href="javascript:void(0)" class="btn btn-success" hidden="true" id="select_all"
                                onclick="select_all()">เลือกทั้งหมด</a>
                            <a href="javascript:void(0)" class="btn btn-info" hidden="true" id="reset_select"
                                onclick="reset_select()">รีเซต</a>
                            <a href="javascript:void(0)" class="btn btn-danger" hidden="true" id="delete_select"
                                onclick="select_delete()">ลบข้อมูลที่เลือก</a>

                            <a href="javascript:void(0)" class="btn btn-success " id="create-new-post"
                                onclick="addPost()">เพิ่มข้อมูลธนาคาร</a>
                        </div>
                        <table class="table" id="table_crud">
                            <thead>
                                <tr align="center">
                                    <th id="th_choese" hidden>เลือก</th>
                                    <th scope="col">เลขที่บัญชี</th>
                                    <th scope="col">ชื่อธนาคาร</th>
                                    <th scope="col">ชื่อบัญชี</th>
                                    <th scope="col">อัพเดทเมื่อ</th>
                                    <th>อื่นๆ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bank_customers as $bank_customer)
                                    <tr align="center" id="row_{{ $bank_customer->id }}">
                                        <th id="td_choese" class="align-middle" hidden>
                                            <div align="center">
                                                <input type="checkbox" class="form-check" name="select" id="select_input"
                                                    value="{{ $bank_customer->id }}">
                                            </div>
                                        </th>
                                        <td class="align-middle">{{ $bank_customer->no }}</td>
                                        <td class="align-middle">{{ $bank_customer->name_bank }}</td>
                                        <td class="align-middle">{{ $bank_customer->name_account }}</td>
                                        <th scope="row" class="align-middle">
                                            {{ Carbon\Carbon::parse($bank_customer->updated_at)->locale('th')->diffForHumans() }}
                                        </th>
                                        <td class="align-middle" align="center">
                                            <a href="javascript:void(0)" class="btn btn-warning"
                                                data-id="{{ $bank_customer->id }}" onclick="editPost(event.target)"
                                                id='btn_edit'>แก้ไข</a>
                                            <a href="javascript:void(0)" class="btn btn-danger"
                                                data-id="{{ $bank_customer->id }}" onclick="deletePost(event.target)"
                                                id='btn_delete'>ลบ</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {!! $bank_customers->links() !!}
                        </div>
                    </div>

                </div>
                {{-- <div class="col-md-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-item item-category mb-30">
                            <h4>Categories</h4>
                            <ul class="category-lists">
                                <li><a href="#">Finance & Accounting</a></li>
                                <li><a href="#">Financial Services</a></li>
                                <li><a href="#">Funding Trends</a></li>
                                <li><a href="#">Industrial Products</a></li>
                                <li><a href="#">Press Releases</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item item-tag mb-30">
                            <h4>Blog Tags</h4>
                            <ul>
                                <li><a href="#">Branding</a></li>
                                <li><a href="#">UI/UX</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Corporate</a></li>
                                <li><a href="#">Website</a></li>
                            </ul>
                        </div>
                        <div class="sidebar-item item-recent mb-30">
                            <h4>Recently Viewed</h4>
                            <div class="recent-item d-flex mb-30">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Home in Merrick Way</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>

                            <div class="recent-item d-flex mb-30">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Villa on Grand Avenue</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>

                            <div class="recent-item d-flex">
                                <div class="img">
                                    <img src="https://via.placeholder.com/75/ededed/000/" alt="Behome">
                                </div>
                                <div class="content align-self-center">
                                    <h6 class="mb-1">Blue Pearl Therapeutic</h6>
                                    <p class="mb-0">$54,000</p>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-item sidebar-contact">
                            <div class="sidebar-author">
                                <img src="https://via.placeholder.com/370x270/ededed/999/" alt="Behome" class="img-fluid">
                                <div class="hover">
                                    <div class="author d-flex">
                                        <div class="img">
                                            <img src="{{ asset('be_home_template/Upload/img/property/thumb-6.png') }}"
                                                alt="Behome">
                                        </div>
                                        <h6 class="mb-0 align-self-center color-white">Dilliama Nelissa</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="contact">
                                <form>
                                    <input type="text" name="name" placeholder="Your Name*">
                                    <input type="email" name="email" placeholder="Your Email*">
                                    <textarea name="message" placeholder="Your Message*"></textarea>
                                    <button type="submit" class="d-block button button-primary">Send Message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
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
                        <input type="hidden" name="post_id" id="post_id">
                        <div class="form-group">
                            <label for="no">เลขที่บัญชี</label>
                            <div class="col-sm-12">
                                <input type="number" class="form-control" id="no" name="no"
                                    placeholder="กรุณากรอกเลขที่บัญชีเป็นตัวเลข">
                                <span id="noError" class="alert-message text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name_account">ชื่อบัญชี</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name_account" name="name_account"
                                    placeholder="กรุณากรอกชื่อบัญชีเป็นตัวอักษร">
                                <span id="name_accountError" class="alert-message text-danger"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name_bank">ชื่อธนาคาร</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name_bank" name="name_bank"
                                    placeholder="กรุณากรอกชื่อธนาคารเป็นตัวอักษร">
                                <span id="name_bankError" class="alert-message text-danger"></span>
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

    {{-- <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script>
        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script> --}}
@endsection
