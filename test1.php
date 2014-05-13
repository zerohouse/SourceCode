<!DOCTYPE html>
<meta charset="utf-8" />
<title>jQuery 로그인</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        $("#find").click(function() {
                var action = $("#form1").attr('action');
                var form_data = {
                        find_id: $("#find_id").val(),
                        is_ajax: 1
                };
                $.ajax({
                        type: "POST",
                        url: action,
                        data: form_data,
                        success: function(response) {
                                if(response == 'success') {
                                        $("#message").html("<p style='color:green;font-weight:bold'>친구 요청이 전달 되었습니다.</p>");
                                }
								else if (response == 'already'){
									$("#message").html("<p style='color:green;font-weight:bold'>이미 친구요청을 하셨습니다.</p>");
									}
								else if (response == 'already_fr'){
									$("#message").html("<p style='color:green;font-weight:bold'>이미 친구입니다.</p>");
									}
								
								
                                else {
                                        $("#message").html("<p style='color:red'>찾는 사용자가 없습니다.</p>"); 
                                }
                        }
                });
                return false;
        });
});
</script>
<body>

<form id="form1" name="form1" action="req1.php" method="post">
<table>
<tr>
        <td>친구ID</td>
        <td><input type='text' id='find_id' name='find_id' tabindex='1' onKeyDown="javascript:if (event.keyCode == 13) return false;" ></td>
        <td rowspan='2'><input type='button' id='find' value='친구요청' style='height:25px' tabindex='4'/></td>
</tr>
</table>
</form>
<div id="message"></div>


</body>
