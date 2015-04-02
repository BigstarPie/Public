<!DOCTYPE HTML>
<body>
  <table>
  <fieldset>
	<legend>修改基本資料</legend>
	<tr>
	  <td valign="top">
	   <label>舊密碼:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <input type="text" id="oldPassword">
	   <!--  把type改成密文   -->
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	   <label>新密碼:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <input type="text" id="newPassword">
	  </td>
	</tr>
	<tr>
	  <td valign="top">
	   <label>請再輸入一次新密碼:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <input type="text" id="newPassword2">
	  </td>
	</tr>		
	 <tr>
	  <td>
	   <button class="btn btn-success" onclick="do_changepassword()">送出</button>
	 </td>
	 </tr>

  </fieldset>
  </table>
</body>
