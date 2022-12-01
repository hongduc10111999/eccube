
$(document).ready(function () {
    //load dữ liệu
    function load_data() {
        $.ajax({
            type: "POST",
            url: 'loaddata.php',
            success: function (data) {
                $('#load_data').html(data);
            }
        });
    }
    load_data();

    //Sửa dữ liêu
    $(document).on('click', '.sua_click', function (event) {
        var id = $(this).val();
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: 'edit.php',
            dataType:'json',
            data: {
                id: id
            },
            success: function (data) {
                $('#edit_form').html(data);
            }
        })
    })
    $(document).on('click', '.capnhat', function (event) {
        var id = $(this).val();
        var text = $('#pass_text').text();
        event.preventDefault();
        $.ajax({
            type: "POST",
            url: 'edit.php',
            data: {
                id: id,
                text: text
            },
            success: function (data) {
                alert('cập nhật dữ liệu thành công');
                load_data();
            }
        })
    })


    //Xoá dữ liệu
    $(document).on('click', '.xoa_click', function (event) {
        var text = $(this).data('text');
        if (confirm("Bạn có muốn xoá người dùng " + text)) {
            var id = $(this).val();
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: 'delete.php',
                data: {
                    id: id
                },
                success: function (data) {
                    if (data == 1) {
                        load_data();
                        alert("Xoá dữ liệu thành công")

                    }
                    if (data == 0) {
                        alert("Xoá dữ liệu thất bại")
                    }
                }
            })
        } else {
            event.preventDefault();
        }

    });
    // chèn dữ liệu
    $("#insert_data").submit(function (event) {
        var email = $("#email").val();
        var pass = $("#pass").val();
        // console.log(email);
        // console.log(pass);
        event.preventDefault();
        if (email == '' || pass == '') {
            alert('Email và Password không được bỏ trống');
        } else {
            $.ajax({
                type: "POST",
                url: 'insert.php',
                data: {
                    email: email,
                    pass: pass
                },
                success: function (data) {
                    data = JSON.parse(data);
                    if (data.status == 0) {
                        alert(data.message);
                        $('#insert_data')[0].reset();
                    }
                    if (data.status == 1) {
                        alert(data.message);
                        $('#insert_data')[0].reset();
                        load_data();
                    }
                }
            });
        }
    });
});