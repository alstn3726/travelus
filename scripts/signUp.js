$(document).ready(function(e) {
    let id_bool = 0;
    let pw_bool = 0;
    let re_pw_bool = 0;
    let name_bool = 0;
    let birth_bool = 0;
    let email_bool = 0;

    $("#user_id").on("keyup", function() {
        let user_id = $("#user_id").val();
        let id_pattern = /^[A-Za-z0-9_\-]{5,15}$/;
        let id_res = id_pattern.test(user_id);

        if(!id_res) {
            $("#id_check").html("잘못된 형식");
            id_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
        else {
            $.ajax({
                url: "../check/id_check.php",
                type: "POST",
                data: {
                    user_id: $("#user_id").val()
                },
                dataType: "text",
                success: function(data) {
                    if($.trim(data) == 'duply') {
                        $("#id_check").html("중복된 아이디");
                        id_bool = 1;
                        $("#signUp").attr("disabled", "disabled");
                    }
                    else {
                        $("#id_check").html("사용 가능한 아이디");
                        id_bool = 0;
                        if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                            $("#signUp").removeAttr("disabled");
                        }
                    }
                },
            });
        }
    });

    $("#user_pw").on("keyup", function() {
        let user_pw = $("#user_pw").val();
        let pw_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^*()\-_=+\\\|\[\]{};:\'",.<>\/?]).{8,20}$/;
        let pw_res = pw_pattern.test(user_pw);

        if(pw_res) {
            $("#pw_check").html("");
            pw_bool = 0;
            if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                $("#signUp").removeAttr("disabled");
            }
        }
        else {
            $("#pw_check").html("8~20자 대문자/소문자/숫자/특수문자 사용");
            pw_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
    });

    $("#re_pw").on("keyup", function() {
        if($("#user_pw").val() !== $("#re_pw").val()) {
            $("#re_pw_check").html("입력값이 다름");
            re_pw_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
        else {
            $("#re_pw_check").html("비밀번호 일치");
            re_pw_bool = 0;
            if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                $("#signUp").removeAttr("disabled");
            }
        }
    });

    $("#user_name").on("keyup", function() {
        let user_name = $("#user_name").val();
        let name_pattern = /^[가-힣]+$/;
        let name_res = name_pattern.test(user_name);

        if(name_res) {
            $("#name_check").html("");
            name_bool = 0;
            if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                $("#signUp").removeAttr("disabled");
            }
        }
        else {
            $("#name_check").html("잘못된 형식");
            name_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
    });

    $("#birth").on("keyup", function() {
        let birth = $("#birth").val();
        let birth_pattern = /^(19[0-9][0-9]|20\d{2})(0[1-9]|1[0-2])(0[1-9]|[1-2][0-9]|3[0-1])+$/;
        let birth_res = birth_pattern.test(birth);

        if(!birth_res) {
            $("#birth_check").html("잘못된 형식");
            birth_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
        else {
            $("#birth_check").html("");
            birth_bool = 0;
            if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                $("#signUp").removeAttr("disabled");
            }
        }
    });

    $("#user_email").on("keyup", function() {
        let user_email = $("#user_email").val();
        let email_pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))+$/;
        let email_res = email_pattern.test(user_email);
        
        if(!email_res) {
            $("#email_check").html("잘못된 형식");
            email_bool = 1;
            $("#signUp").attr("disabled", "disabled");
        }
        else {
            $.ajax({
                url: "../check/email_check.php",
                type: "POST",
                data: {
                    user_email: $("#user_email").val()
                },
                dataType: "text",
                success: function(data) {
                    if($.trim(data) == 'duply') {
                        $("#email_check").html("중복된 이메일");
                        email_bool = 1;
                        $("#signUp").attr("disabled", "disabled");
                    }
                    else {
                        $("#email_check").html("사용 가능한 이메일");
                        email_bool = 0;
                        if((id_bool||pw_bool||re_pw_bool||name_bool||birth_bool||email_bool) != 1) {
                            $("#signUp").removeAttr("disabled");
                        }
                    }
                },
            });
        }
    });

    $("#reset").on("click", function() {
        $(".msg").html("");
    });
});