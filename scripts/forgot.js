$(document).ready(function(e) {
    let reset_pw_bool = 0;
    let reset_pw2_bool = 0;

    $("#reset_pw").on("keyup", function() {
        let reset_pw = $("#reset_pw").val();
        let pw_pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^*()\-_=+\\\|\[\]{};:\'",.<>\/?]).{8,20}$/;
        let pw_res = pw_pattern.test(reset_pw);

        if(pw_res) {
            $("#reset_pw_check").html("");
            pw_bool = 0;
            if((reset_pw_bool||reset_pw2_bool) != 1) {
                $("#confirm").removeAttr("disabled");
            }
        }
        else {
            $("#reset_pw_check").html("8~20자 대문자/소문자/숫자/특수문자 사용");
            pw_bool = 1;
            $("#confirm").attr("disabled", "disabled");
        }
    });

    $("#reset_pw2").on("keyup", function() {
        if($("#reset_pw").val() !== $("#reset_pw2").val()) {
            $("#reset_pw2_check").html("입력값이 다름");
            re_pw_bool = 1;
            $("#confirm").attr("disabled", "disabled");
        }
        else {
            $("#reset_pw2_check").html("비밀번호 일치");
            re_pw_bool = 0;
            if((reset_pw_bool||reset_pw2_bool) != 1) {
                $("#confirm").removeAttr("disabled");
            }
        }
    });

    $("#inp_name").on("keyup", function() {
        let inp_name = $("#inp_name").val();
        let name_pattern = /^[가-힣]+$/;
        let name_res = name_pattern.test(inp_name);

        if(inp_name == null) {
            $("#inpId_check").html("");
        }
        else if(name_res) {
            $("#inpName_check").html("");
        }
        else {
            $("#inpName_check").html("잘못된 형식");
        }
    });

    $("#inp_email").on("keyup", function() {
        let inp_email = $("#inp_email").val();
        let email_pattern = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))+$/;
        let email_res = email_pattern.test(inp_email);
        
        if(inp_email == "") {
            $("#inpId_check").html("");
        }
        else if(email_res) {
            $("#inpEmail_check").html("");
        }
        else {
            $("#inpEmail_check").html("잘못된 형식");
        }
    });

    $("#inp_id").on("keyup", function() {
        let inp_id = $("#inp_id").val();
        let id_pattern = /^[A-Za-z0-9_\-]{5,15}$/;
        let id_res = id_pattern.test(inp_id);

        if(inp_id == "") {
            $("#inpId_check").html("");
        }
        else if(id_res) {
            $("#inpId_check").html("");
        }
        else {
            $("#inpId_check").html("잘못된 형식");
        }
    });

    $("#reset").on("click", function() {
        $(".msg").html("");
    });
});