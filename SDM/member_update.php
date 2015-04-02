<!DOCTYPE HTML>


<body>
  <table>
  <fieldset>
	<legend>修改基本資料</legend>
		<tr>
	  <td valign="top">
	   <label>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <input type="text" id="name" placeholder="">
	  </td>
	  <td valign="top" style="padding:0px 0px 0px 100px">
	   <label>English Name:</label>
       <input type="text" id="ename">
       <span class="help-block"></span>
	  </td>
	 </tr>
	 <tr>
	  <td>
	   <label>Nickname:</label>
       <input type="text" id="nickname">
       <span class="help-block"></span>
	  </td>
	  <td valign="top" style="padding:0px 0px 0px 100px">
	
		<label>性別:</label>
		<label class="radio">
			<input type="radio" name="optionsRadios" id="gender" value="男" checked>
			男
			
		</label>
		<label class="radio">
			<input type="radio" name="optionsRadios" id="gender" value="女">
			女
		</label>
		<span class="help-block"></span>
		
	  </td>
	 </tr>
	 <tr>
	  <td>
	   <label>Phone:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       <input type="text" id="phone">
       <span class="help-block">Ex: 0912555789</span>
	  </td>
	  <td valign="top" style="padding:0px 0px 0px 100px">
	   <label>Education:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <input type="text" id="education">
       <span class="help-block">Ex:國立台灣大學資訊管理學系</span>
	  </td>
	 </tr>
	 <tr>
	 	<td>
	   		<label>City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
       		<input type="text" id="city">
      		<span class="help-block">Ex: 台北市</span>
	  	</td>
	  	<td valign="top" style="padding:0px 0px 0px 100px">
	   		<label>Birthday:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   		<input type="text" id="birthday">
       		<span class="help-block">EX:1990-04-07</span>
	  	</td>
	 </tr>
	 <tr>
	  <td>
	   <label>Work:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	   <textarea rows="5" Cols="22" style="width=20px;" id="work"></textarea>
	   <span class="help-block"></span>
	  </td>
	  <td valign="top" style="padding:0px 0px 0px 100px">
	   <label>Intro:&nbsp;&nbsp;</label>
	   <textarea rows="5" Cols="22" id="intro"></textarea>
	   <span class="help-block"></span>
      </td>
	 </tr>
	
	 <tr>
	  <td>
	   <button class="btn btn-success" onclick="do_updatemember()">送出</button>
	 </td>
	 </tr>
	 <input id="email" type="hidden" />
  </fieldset>
  </table>
    <script>load_member( );
    </script>
</body>