var xmlHttp
xmlHttp=GetXmlHttpObject()

//Login Function Start Here
function login(str)
{
	var msg="";
	var uname=document.getElementById("uname").value;
	var pwd=document.getElementById("pwd").value;
	if(uname=="" && pwd=="")
		msg="Enter User name and Password";
	else if(uname!="" && pwd=="")
		msg="Enter Password";
	else if(uname=="" && pwd!="")
		msg="Enter User Name";
	else
		msg="";		
	if(msg=="")
	{
		var url="login_code.php?uname="+uname+"&pwd="+pwd;
		xmlHttp.onreadystatechange=function()
 		{	   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
  			{
  				var msg=xmlHttp.responseText.trim();
  				if(msg=="welcome")
  					window.location="dashboard.php";
  				else
					document.getElementById("err_id").innerHTML=msg;
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
	else
		document.getElementById("err_id").innerHTML=msg;
}
//Forgot Password Start Here
function forgot()
{	
	var error="";
	var user=document.getElementById("user").value;
	if(user=="")
		document.getElementById("err_id").innerHTML="Enter User Name";
	else
	{
		document.getElementById("err_id").innerHTML="";
		var url="forget_password_code.php?user="+user;	
		xmlHttp.onreadystatechange=function()
		{		
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{	
				var msg=xmlHttp.responseText.trim();
				window.location="forgot.php?msg="+msg;	
				//document.getElementById("err_id").innerHTML=msg;	
			}
		}
	}
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);
}
//Change password start here
// Validation for current password
function currpass(str)
{
	 var error="";
    if(str.length==0)
    {
		error="* Enter Current Password";
	    document.getElementById("curpwd1").innerHTML="Enter Current Password";
    }
    else
		document.getElementById("curpwd1").innerHTML=""; 
	 return error;
}
function newpass(str)
{	
    var error="";
    if(str.length==0)
    {
		error="Enter New Password";
	    document.getElementById("newpwd1").innerHTML="Enter New Password";
    }
	
	 else
		document.getElementById("newpwd1").innerHTML=""; 
	 return error;
}
 //Validation for Match Password & Confirm Password
function conpass(str)
{
	var error="";
	if (str.length==0)
   {
		error="Enter Confirm Password";
    	document.getElementById("conpwd1").innerHTML="Enter Confirm Password";
	} 
	
	else
		document.getElementById("conpwd1").innerHTML="";
	return error;
}
function change_pass()
{
	var msg="";
	var curpwd=document.getElementById("curpwd").value;
	var newpwd=document.getElementById("newpwd").value;
	var conpwd=document.getElementById("conpwd").value;
	msg+=currpass(curpwd);
	msg+=newpass(newpwd);
	msg+=conpass(conpwd);
	if (newpwd != conpwd) 
	{
        alert("Passwords do not match.");
     }
	 else{
	if(msg=="")
	{
		var url="change_pwd_code.php?curpwd="+curpwd+"&newpwd="+newpwd+"&conpwd="+conpwd;
		xmlHttp.onreadystatechange=function () 
		{
			if (xmlHttp.readyState==4 && xmlHttp.status==200) 
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="success")
				{
					var msg="success";
					window.location="change_pwd.php?msg="+msg;				
				}
				else if(msg=="Invalid")
				{
					var msg="Invalid";
					window.location="change_pwd.php?msg="+msg;	
				}
			}
		} 		
		xmlHttp.open("post",url,true);
		xmlHttp.send(null);
	}
	}
}

function checkFile(str)
{
	var error="";		
		var file = document.getElementById("logo").files[0];
		var file12 = document.getElementById("logo").files[0].size;
		var filename = file.name;
		var fileSize = file.size / 1024 / 1024;
		
		var dotPosition = filename.lastIndexOf(".");
        var FileExt = filename.substring(dotPosition);
		
		var FileExt=FileExt.toLowerCase();
		var allow=3/1024/1024;
		if ( (FileExt != ".jpg" && FileExt != ".jpeg" && FileExt != ".png"))
        {
		
            //var error = "File type : "+ FileExt+"\n\n";
			var error = "";
            //error += "Size: " + fileSize + " MB \n\n";
            error += "select only png,jpg or jpeg image format";
			document.getElementById("logo_err").innerHTML=error;
		}
		else if(file12 > 1048576)
		{
			error="only allowed less than 1 MB";
			document.getElementById("logo_err").innerHTML=error;
		}
		else if(fileSize <allow)
		{
			
			document.getElementById("logo_err").innerHTML="";
		}	
	
 return error;
 }
 function checkFile1(str)
{
	var error="";			
		var file = document.getElementById("favicon").files[0];	
		var file12 = document.getElementById("favicon").files[0].size;
		
		var filename = file.name;
		var fileSize = file.size / 1024 / 1024;
		
		var dotPosition = filename.lastIndexOf(".");
        var FileExt = filename.substring(dotPosition);
		
		var FileExt=FileExt.toLowerCase();
		var allow=3/1024/1024;
		if ( (FileExt != ".jpg" && FileExt != ".jpeg" && FileExt != ".png" && FileExt != ".ico"))
        {
           // var error = "File type : "+ FileExt+"\n\n";
			 var error = "";
            //error += "Size: " + fileSize + " MB \n\n";
            error += "select only png,jpg,jpeg & ico image format";
			document.getElementById("favicon_err").innerHTML=error;
		}
		else if(file12 > 1048576)
		{
			error="only allowed less than 1 MB";
			document.getElementById("favicon_err").innerHTML=error;
		}
		else
		{
			
			document.getElementById("favicon_err").innerHTML="";
		}	
	
 return error;
 } 
 function adminname(str)
{
	var error="";	
	if(str=="")
	{
		
		var error="Enter User Name";		
		document.getElementById("admin_name_err").innerHTML=error;
	}	
	else
	{
		error="";
		document.getElementById("admin_name_err").innerHTML="";
	}
return error;
 }
 function emailid(str)
{
	var error="";	
	if(str=="")
	{
		var error="Enter Email";
		document.getElementById("email_err").innerHTML="Enter Email";
	}	
	else
	{
		error="";
		document.getElementById("email_err").innerHTML="";
	}
return error;
 }
 function sitename(str)
{
	var error="";	
	if(str=="")
	{
		var error="Enter Site Name";
		document.getElementById("site_name_err").innerHTML="Enter Site Name";
	}	
	else
	{
		error="";
		document.getElementById("site_name_err").innerHTML="";
	}
return error;
 }
 function sitedesc(str)
{
	var error="";	
	if(str=="")
	{
		var error="Enter Site Description";
		document.getElementById("site_desc_err").innerHTML="Enter Site Description";
	}	
	else
	{
		error="";
		document.getElementById("site_desc_err").innerHTML="";
	}
return error;
 }
 function sitekwd(str)
{
	var error="";	
	if(str=="")
	{
		var error="Enter Site Keyword";
		document.getElementById("site_kwd_err").innerHTML="Enter Site Keyword";
	}	
	else
	{
		error="";
		document.getElementById("site_kwd_err").innerHTML="";
	}
return error;
 }
 function siteurl(str)
{
	var error="";	
	if(str=="")
	{
		var error="Enter Site URL";
		document.getElementById("site_url_err").innerHTML="Enter Site URL";
	}	
	else
	{
		error="";
		document.getElementById("site_url_err").innerHTML="";
	}
return error;
 }
 
 function admin_email()
{	
	var msg="";
	var admin_name=document.getElementById("admin_name").value;
	var email=document.getElementById("email_id").value;
	var site_name=document.getElementById("site_name").value;
	var site_desc=document.getElementById("site_desc").value;
	var site_kwd=document.getElementById("keyword").value;
	var site_url=document.getElementById("site_url").value;
	
	var file_name=document.getElementById("logo").value;
	var file_name1=document.getElementById("favicon").value;
	
	var paypal_id=document.getElementById("paypal_id").value;
	var cmode=document.getElementById("cmode").value;
	var smode=document.getElementById("smode").value;
	
	msg+=adminname(admin_name);
	msg+=emailid(email);
	msg+=sitename(site_name);
	msg+=sitedesc(site_desc);
	msg+=siteurl(site_url);
	
	//msg+=checkFile(file_name);
	//msg+=checkFile1(file_name1);
	if(file_name!=="" && file_name1=="")
		msg+=checkFile(file_name);
	else if(file_name1!=="" && file_name=="")
		msg+=checkFile1(file_name1);
	else if(file_name!=="" && file_name1!=="")
	{
		msg+=checkFile(file_name);
		msg+=checkFile1(file_name1);
	}
	
	
	if(msg=="")
	{
		document.getElementById("admin_s").submit();
	}
}

//Postal Code Function Start Here	
function city_funct(str)
{	
	var cname=document.getElementById("cname").value;	
	if(str=="add")
	{
		if(cname=="")
		{ msg="Enter City Name"; alert(msg); } 	else { var url="city_add.php?cname="+cname+"&action="+str;}
	}
	else if(str=="update") 
	{
		if(cname=="")
		{  msg="Enter City Name"; alert(msg); } else {
		var hid=document.getElementById("hid").value;
		var url="city_add.php?cname="+cname+"&action="+str+"&hid="+hid;}
		
	}	
		xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  					
					if(msg=="Inserted")
					{				
						var msg="Inserted";
						//document.getElementById("err_id").innerHTML="* Company Quality Deleted";
						window.location="city.php?msg="+msg;
				
					}
					else if(msg=="Updated")
					{
						var msg="Updated";
						window.location="city.php?msg="+msg;
					}
					
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	
function city_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="city_add.php?hid="+str+"&action=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						var msg="Deleted";
						window.location="city.php?msg="+msg;
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}

function serviceimg(str)
{
	var error="";	
	
		var file = document.getElementById("service_img").files[0];
		var file12 = document.getElementById("service_img").files[0].size;
		
		var filename = file.name;
		var fileSize = file.size / 1024 / 1024;
		
		var dotPosition = filename.lastIndexOf(".");
        var FileExt = filename.substring(dotPosition);
		
		var FileExt=FileExt.toLowerCase();
		var allow=3/1024/1024;
		if ( (FileExt != ".jpg" && FileExt != ".jpeg" && FileExt != ".png"))
        {
           // var error = "File type : "+ FileExt+"\n\n";
			var error = "";
            //error += "Size: " + fileSize + " MB \n\n";
            error += "select only png,jpg & jpeg image format";
			document.getElementById("service_img_err").innerHTML=error;
		}
		else if(file12 > 1048576)
		{
			error="only allowed less than 1 MB";
			document.getElementById("service_img_err").innerHTML=error;
		}
		else 
		{
			document.getElementById("service_img_err").innerHTML="";
		}	

	
 return error;
 } 
 function snamef(str)
{
	var error="";	
	if(str=="")
	{
		
		error="Enter Service Name";
		
		document.getElementById("sname_err").innerHTML=error;
	}	
	else
	{
		error="";
		document.getElementById("sname_err").innerHTML="";
	}
return error;
 }
 
function services_funct(str)
{	

	var msg="";
	var sname=document.getElementById("sname").value;		
	var service_img=document.getElementById("service_img").value;	
	msg+=snamef(sname);		
		//msg+=serviceimg(service_img);
	if(sname=="" && service_img=="")
	{
		msg+=snamef(sname);
		msg+=serviceimg(service_img);
	}
	else if(service_img!=="" && sname=="")
		msg+=serviceimg(service_img);
	else if(sname!=="" && service_img!=="")
	{
		msg+=snamef(sname);
		msg+=serviceimg(service_img);
	}
	else if(sname=="" && service_img!=="")
	{
		msg+=serviceimg(service_img);
	}
	
	else
		msg="";	
	if(msg=="")
		document.getElementById("service_s").submit();
	
}
function services_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="services_add.php?hid="+str+"&typ=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						var msg="Deleted";
						window.location="services.php?msg="+msg;
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}

//User Function Start Here	
function user_funct(str)
{	
	var name=document.getElementById("name").value;	
	var email_id=document.getElementById("email_id").value;	
	var phone_no=document.getElementById("phone_no").value;	
	var city=document.getElementById("city").value;	
	var address=document.getElementById("address").value;	
	var pin_code=document.getElementById("pin_code").value;	
	var gender=document.getElementById("gender").value;	
	if(str=="update") 
	{
		var hid=document.getElementById("hid").value;
		var url="user_add.php?name="+name+"&email_id="+email_id+"&phone_no="+phone_no+"&city="+city+"&address="+address+"&pin_code="+pin_code+"&gender="+gender+"&action="+str+"&hid="+hid;	
	}	
		xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  					
					if(msg=="Updated")
					{				
						var msg="Updated";
						//document.getElementById("err_id").innerHTML="* Company Quality Deleted";
						window.location="users.php?msg="+msg;
				
					}
					
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	
function user_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="user_add.php?hid="+str+"&action=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						var msg="Deleted";
						window.location="users.php?msg="+msg;
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}
//Services Function Start Here	
function subname(str)
{
	var error="";	
	if(str=="")
	{
		error="Enter sub Service Name";
		document.getElementById("sub_name_err").innerHTML=error;
	}	
	else
	{
		error="";
		document.getElementById("sub_name_err").innerHTML="";
	}
return error;
 }
 function pricef(str)
{
	var error="";	
	if(str=="")
	{		
		error="Enter Price";		
		document.getElementById("price_err").innerHTML=error;
	}	
	else
	{
		error="";
		document.getElementById("price_err").innerHTML="";
	}
return error;
 }
function services_sub_funct(str)
{	
    var msg="";
	var sname=document.getElementById("sname").value;	
	var sub_sname=document.getElementById("sub_sname").value;	
	var price=document.getElementById("price").value;	
	msg+=snamef(sname);
	msg+=subname(sub_sname);	
	msg+=pricef(price);	
	
	if(msg=="")
	{
		if(str=="add")
		{
			var url="services_sub_add.php?sname="+sname+"&sub_sname="+sub_sname+"&price="+price+"&action="+str;
		}
		else if(str=="update") 
		{
			var hid=document.getElementById("hid").value;
			var url="services_sub_add.php?sname="+sname+"&sub_sname="+sub_sname+"&price="+price+"&action="+str+"&hid="+hid;		
		}
	}	
		xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  
					if(msg=="Inserted")
					{				
						var msg="Inserted";						
						window.location="services_sub.php?msg="+msg;
				
					}
					else if(msg=="Updated")
					{
						var msg="Updated";
						window.location="services_sub.php?msg="+msg;
					}
					else
					{
						document.getElementById("err_id").innerHTML=msg;
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	
function services_sub_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="services_sub_add.php?hid="+str+"&action=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						var msg="Deleted";
						window.location="services_sub.php?msg="+msg;
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}
//Become a cleaner Function Start Here	
function cleaner(str)
{	
	var email=document.getElementById("email").value;
	var cemail=document.getElementById("cemail").value;
	var fname=document.getElementById("fname").value;	
	var lname=document.getElementById("lname").value;
	var mob_no=document.getElementById("mob_no").value;
	var post_code=document.getElementById("post_code").value;
	var exp=document.getElementById("exp").value;
	var paid_work=document.getElementById("paid_work").value;
	var gender=document.getElementById("gender").value;
	var dob=document.getElementById("datepicker").value;
	var nation=document.getElementById("nation").value;
	var address=document.getElementById("address").value;
	var suburb=document.getElementById("suburb").value;
	var abt=document.getElementById("abt").value;
	if(str=="add")
	{
		var hid=document.getElementById("hid").value;
		var url="cleaner_add.php?email="+email+"&cemail="+cemail+"&fname="+fname+"&lname="+lname+"&mob_no="+mob_no+"&post_code="+post_code+"&exp="+exp+"&paid_work="+paid_work+"&gender="+gender+"&dob="+dob+"&nation="+nation+"&address="+address+"&suburb="+suburb+"&abt="+abt+"&action="+str+"&hid="+hid;
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  					
					if(msg=="Updated")
					{				
						var msg="Updated";
						//document.getElementById("err_id").innerHTML="* Order Inserted";
						window.location="cleaner.php?msg="+msg;				
					}					
					else
					{
						document.getElementById("err_id").innerHTML=msg;
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
		
}	

function cleaner_del(str)
{
	var r=confirm("Do you want to Delete?");
	if(r==true)
	{
		var url="cleaner_add.php?hid="+str+"&action=delete";
		xmlHttp.onreadystatechange=function()
		{   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{
				var msg=xmlHttp.responseText.trim();
				if(msg=="Deleted")
					{				
						var msg="Deleted";
						window.location="cleaner.php?msg="+msg;
					}
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
}

// Pages code Start Here
function pages_funct()
{
	var pname=document.getElementById("pname").value;
	var page_content=document.getElementById("content").value;
	document.getElementById("form_s").submit();
	
}






function GetXmlHttpObject()
{
var xmlHttp=null;
try
  {
  // Firefox, Opera 8.0+, Safari
  xmlHttp=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    var aVersions = [ "MSXML2.XMLHttp.5.0",
        "MSXML2.XMLHttp.4.0","MSXML2.XMLHttp.3.0",
        "MSXML2.XMLHttp","Msxm12.XMLHTTP","Microsoft.XMLHttp"];

    for (var i = 0; i < aVersions.length; i++) 
	 {
        try {
            var xmlHttp = new ActiveXObject(aVersions[i]);
            return xmlHttp;
            } 
		catch (oError) 
		   {
            //Do nothing
           }
    }
    }
  catch (e)
    {
    }
  }
  if (xmlHttp==null)
  {
  alert ("Your browser does not support AJAX!");
  return;
  } 
return xmlHttp;
}