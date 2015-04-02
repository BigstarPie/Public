function build_time() { 
    var d = new Date();
    var year = d.getFullYear().toString(); 
    var month = d.getMonth() + 1;
    if (month < 10)
        month = "0".month.toString();
    var date = d.getDate();
    if (date < 10)
        date = "0" + date.toString();
    var hour = d.getHours();
    if (hour < 10)
        hour = "0" + hour.toString();
    var minute = d.getMinutes();
    if (minute < 10)
        minute = "0" + minute.toString();
    var second = d.getSeconds();
    if (second < 10)
        second = "0" + second.toString();
    var time = year + month + date + hour + minute + second;
    return time;
}

function do_login() {
    var StudentId = $("#StudentId").val();
    //return account and password element value
    var password = $("#password").val();
    var dataString = 'StudentId=' + StudentId + '&password=' + password;

    $.ajax({
        type : "GET",
        url : "./api/do_login.php",
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            if (element.state == "OK") {
                document.location.href = "main.php";
            } else if (element.state == "ERROR") {
                $("#alertdiv").html(element.result);
                $("#alertdiv").css("visibility", "visible");
            }
        }
    });
}

function load_page(page_name) {
    $("#main").load(page_name + ".php");
}

function load_articles(classify) {//載入該主題的文章
    var dataString = '&classify=' + classify;
    if($("#forumArticle").css('display') != "none")$("#forumArticle").toggle("Fade");
    if($("#comment_area").css('display') != "none")$("#comment_area").toggle("Fade");
    if($("#writepad").css('display') != "none")$("#writepad").toggle("Fade");
    //document.getElementById("classify_for_lm").value = classify;
    //document.getElementById("writepad").style.display = "none";
    $("#nowReading_classify").val(classify);
    $.ajax({
        type : "GET",
        url : "./api/forum_content.php",
        data : dataString,
        cache : false,
        success : function(result) {
            article = JSON.parse(result);
            document.getElementById(classify+"_table").innerHTML = "<thead><tr><td> 主題 </td><td> 作者 </td><td> 時間 </td></tr></thead>";
            for (var key in article) {
                switch(article[key].classify) {
                    case "official":
                        write_content(key, 'official');
                        break;
                    case "advice":
                        write_content(key, 'advice');
                        break;
                    case "credit_rule":
                        write_content(key, 'credit_rule');
                        break;
                    case "ob":
                        write_content(key, 'ob');
                        break;
                    case "im103":
                        write_content(key, 'im103');
                        break;
                    case "im104":
                        write_content(key, 'im104');
                        break;
                    case "im105":
                        write_content(key, 'im105');
                        break;
                    case "im106":
                        write_content(key, 'im106');
                        break;
                    case "imceo101":
                        write_content(key, 'imceo101');
                        break;
                    case "imceo102":
                        write_content(key, 'imceo102');
                        break;
                    case "course_dis":
                        write_content(key, 'course_dis');
                        break;
                    case "oldexam":
                        write_content(key, 'oldexam');
                        break;
                    case "assistant":
                        write_content(key, 'assistant');
                        break;
                    case "seek_talent":
                        write_content(key, 'seek_talent');
                        break;
                    case "experience":
                        write_content(key, 'experience');
                        break;
                    case "graduater":
                        write_content(key, 'graduater');
                        break;
                    case "bsoftball":
                        write_content(key, 'bsoftball');
                        break;
                    case "volleyball":
                        write_content(key, 'volleyball');
                        break;
                    case "badminton":
                        write_content(key, 'badminton');
                        break;
                    case "bbasketball":
                        write_content(key, 'bbasketball');
                        break;
                    case "gbaskedball":
                        write_content(key, 'gbaskedball');
                        break;
                    case "tabletennis":
                        write_content(key, 'tabletennis');
                        break;
                    case "sgame":
                        write_content(key, 'sgame');
                        break;
                }
            }
        }
    });
}

function write_content(key, classify) {
    var input = "'" + key + "','" + classify + "'";
    document.getElementById(classify+"_table").innerHTML += "<tr id='topic_" + key + "'><td><a href='#' onclick=\"load_content(" + input + ")\">" + article[key].topic + "</a></td><td>" + article[key].author + "</td><td>" + article[key].time + "</td></tr>";
}

function load_content(key, classifier) {
    if($("#forumArticle").css('display') == "none")$("#forumArticle").toggle("Fade");
    if($("#writepad").css('display') != "none")$("#writepad").toggle("Fade");
    if($("#comment_area").css('display') != "none")$("#comment_area").toggle("Fade");
    $("#" + classifier + "_table>tbody>tr.active").removeClass("active");
    $("#topic_" + key).addClass("active");
    document.getElementById('forumArticleContent').innerHTML = article[key].content;
    var dataString = "aid=" + article[key].aid;
    $("#nowReading_aid").val(article[key].aid);
    document.getElementById('forumArticleComment').innerHTML = "";
    $.ajax({
        type : "GET",
        url : "api/forum_showcomment.php",
        data : dataString,
        cache : false,
        success : function(result) {
            var message_obj = JSON.parse(result);
            for (var key in message_obj) {
                var content = message_obj[key].content;
                var uid = message_obj[key].uid;
                var time = message_obj[key].time;
                document.getElementById('forumArticleComment').innerHTML += "<pre><div>" + uid + " says: <span style='float:right'>" + time + "</span><p>" + content + "</p></div></pre>";
            }
        }
    });
}

function load_content_s(aid) {
    var dataString = "aid=" + aid;
    document.getElementById('forumArticleComment').innerHTML = "";
    $.ajax({
        type : "GET",
        url : "api/forum_showcomment.php",
        data : dataString,
        cache : false,
        success : function(result) {
            var message_obj = JSON.parse(result);
            for (var key in message_obj) {
                var content = message_obj[key].content;
                var uid = message_obj[key].uid;
                var time = message_obj[key].time;
                document.getElementById('forumArticleComment').innerHTML += "<pre><div>" + uid + " says: <span style='float:right'>" + time + "</span><p>" + content + "</p></div></pre>";
            }
        }
    });
}

function do_updatemember() {
	var name = $("#name").val();
	var ename = $("#ename").val();
    var nickname = $("#nickname").val();
	var gender = $("#gender").val();
	var phone = $("#phone").val();
    var birthday = $("#birthday").val();
	var education = $("#education").val();
    var city = $("#city").val();
	var work = $("#work").val();
	var intro = $("#intro").val();
    var email= $("#email").val();
	var dataString = 'name=' + name + '&ename=' + ename +'&nickname=' + nickname + '&gender='+ gender +'&phone='+ phone +'&education=' + education + '&work='+ work +'&intro='+intro+'&city='+city+'&birthday='+birthday;
    $.ajax({
        type : "POST",
        url : "api/UpdateMember.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            if (element.state == "OK") {
	            member_sendmail(email,"updatemember");
            } else if (element.state == "ERROR") {
				 alert("fail!!");
            }
        
		
		}
    });

}


function member_sendmail(email,message) {
	var dataString = 'email=' + email+ '&message='+message;
    $.ajax({
        type : "POST",
        url : "api/sendmail.php",  
        data : dataString, 
        cache : false,
        success : function(result) {

            var element = JSON.parse(result);
            if (element.state == "OK") {
				alert("資料已成功修改!");
                document.location.href = "main.php";
            } else if (element.state == "ERROR") {
				 alert("資料有誤 請重新修正");
            }
		}
    });
}

function display_commentarea(){
    $("#comment_area").toggle("Fade");
}

function comment_it(){
    var newReading_aid = $("#nowReading_aid").val();
    var comment = $("#leave_message_box").val();
    comment = comment.replace(/\n/g, "<br>");
    var dataString = 'aid=' + newReading_aid+ '&comment='+comment;
    $.ajax({
        type : "GET",
        url : "api/leave_comment.php", 
        data : dataString, 
        cache : false,
        success : function(result) {
            load_content_s(newReading_aid);
            $("#leave_message_box").val("");
            $("#comment_area").toggle("Fade");
        }
    });
}


function load_member(){

    dataString = ''; 
	$.ajax({
        type : "POST",
        url : "api/GetMember.php",
        data : dataString, 
        cache : false,
        success : function(result) {
				var data = JSON.parse(result);
            $("#name").val(data[0].name);
            $("#ename").val(data[0].ename);
            $("#nickname").val(data[0].nickname);
            $("#gender").val(data[0].gender);
            $("#education").val(data[0].education);
            $("#birthday").val(data[0].birthday);
            $("#phone").val(data[0].phone);
            $("#city").val(data[0].city);
            $("#work").val(data[0].work);
            $("#intro").val(data[0].intro);
            $("#email").val(data[0].email);
            
         
            }
        
		
		
    });
	

}


function do_membersearch() {
    
    var value = $("#searchvalue").val();
    var key =  $("#searchkey").val();
    var dataString = 'key=' + key + '&value=' + value ;
    $.ajax({
        type : "POST",
        url : "api/member_search.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            $("#searchresult").html("");
            for(var key in element){
                var name = element[key].Name;
                var ename = element[key].EName;
                var education= element[key].Education;
                var work= element[key].Work;

                document.getElementById('searchresult').innerHTML += "<pre><div>Name:" + name + "<p>English Name:" + ename + "</p><p>Education:" + education+ "</p><p>Work:" + work + "</p></div></pre>";
            
            }
        
        }
    });
}

function subscribe(message){
    var classify = $("#nowReading_classify").val();
    var dataString = 'message=' + message + '&classify=' + classify ;
    $.ajax({
        type : "POST",
        url : "api/sendmail.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
			//alert(element);
            if(element.state == "OK"){
                alert("訂閱成功");
            }
            else{
                alert("訂閱失敗");
            }
        }
    });
}

function display_writepad(){
    if($("#forumArticle").css('display') != "none")$("#forumArticle").toggle("Fade");
    if($("#writepad").css('display') == "none")$("#writepad").toggle("Fade");
    var classifier = $("#nowReading_classify").val();
    $("#" + classifier + "_table>tbody>tr.active").removeClass("active");
}


function write_article(){
    var aid = build_time();
    var topic = $("#new_topic").val();
    var content = $("#new_content").val();
    content = content.replace(/\n/g, "<br>");
    var classify = $("#nowReading_classify").val();
    var dataString = 'aid=' + aid + '&topic=' + topic + '&content=' + content + '&classify=' + classify ;
    $.ajax({
        type : "GET",
        url : "api/new_article.php", 
        data : dataString,
        cache : false,
        success : function(result) {
			aknowledge_subscribe(classify);
            load_articles(classify);
            $("#new_topic").val("");
            $("#new_content").val("");
        }
    });
}

function aknowledge_subscribe(classify){
    var dataString = 'message=newarticle&classify=' + classify;
    $.ajax({
        type : "GET",
        url : "api/sendmail.php", 
        data : dataString,
        cache : false,
        success : function(result) {
        }
    });
}

function do_changepassword() {
    var oldPassword = $("#oldPassword").val();
    var newPassword = $("#newPassword").val();
    var newPassword2 = $("#newPassword2").val();
    var dataString = 'oldPassword=' + oldPassword + '&newPassword=' + newPassword +'&newPassword2=' + newPassword2;
    alert(dataString);
    $.ajax({
        type : "GET",
        url : "api/ChangePassword.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            if (element.state == "OK") {
               alert("密碼修改成功 請收信!");
            } else if (element.state == "ERROR") {
                 alert("fail!!");
            }
        
        
        }
    });

}


 function logout(){
    var dataString = '';
    $.ajax({
        type : "POST",
        url : "api/logout.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            document.location.href = "index.php";
        }
    });

 }


 function index_check(){
    var dataString = '';
    $.ajax({
        type : "POST",
        url : "api/index_check.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            if (element.state == "OK") {
                document.location.href = "main.php";
            }; 
        }
    });
 }

 function main_check(){
    var dataString = '';
    $.ajax({
        type : "POST",
        url : "api/main_check.php", 
        data : dataString,
        cache : false,
        success : function(result) {
            var element = JSON.parse(result);
            if (element.state == "OK") {
                document.location.href = "index.php";
            }; 
        }
    });
 }