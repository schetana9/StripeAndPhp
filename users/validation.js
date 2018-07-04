var xmlHttp
xmlHttp=GetXmlHttpObject()

function login(str)
{
	var msg="";
	var phone_no=document.getElementById("phone_no").value;
	var pwd=document.getElementById("password").value;
		
	if(msg=="")
	{
		var url="login_code.php?phone_no="+phone_no+"&pwd="+pwd;		
		xmlHttp.onreadystatechange=function()
 		{	   
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
  			{
  				var msg=xmlHttp.responseText.trim();
				if(msg=="welcome")
  					window.location="dashboard.php";
				else if(msg=="Invalid")
				{
					window.location="sign_in.php?msg="+msg;				
				}
  				
			}
		}
		xmlHttp.open("POST",url,true);
		xmlHttp.send(null);
	}
	else
		document.getElementById("err_id").innerHTML=msg;
}


function forgot()
{
	var msg="";	
	var phone_no=document.getElementById("phone_no").value;
if(msg=="")	
	{
		var url="forgot_pwd_code.php?phone_no="+phone_no;	
		xmlHttp.onreadystatechange=function()
		{		
			if(xmlHttp.readyState==4 && xmlHttp.status==200)
			{	
				var msg=xmlHttp.responseText.trim(); 
				if(msg=="Invalid")
					{				
						var msg="Invalid";
						window.location="forgot.php?msg="+msg;				
					}					
					else if(msg=="success")
					{
						window.location="forgot.php?msg="+msg;				
					}
			}
		}
	}
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);
}


//Change password start here
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
function change_pwd(str)
{
	var msg="";
	var curpwd=document.getElementById("cur_pwd").value;
	var newpwd=document.getElementById("new_pwd").value;
	var conpwd=document.getElementById("confirm_pwd").value;
	msg+=currpass(curpwd);
	msg+=newpass(newpwd);
	msg+=conpass(conpwd);
	if (newpwd != conpwd) 
	{
        alert("Passwords do not match.");
     }
	else {
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
					var msg="Success";
					window.location="change_password.php?msg="+msg;				
				}
				else if(msg=="Invalid")
				{
					window.location="change_password.php?msg="+msg;				
				}
				else
				document.getElementById("err").innerHTML=msg;
			}
		} 		
		xmlHttp.open("post",url,true);
		xmlHttp.send(null);
	}
}
}

//Order Sign In Function Start Here	
function user_address(str)
{
	var error="";
	if(str=="")
	{	
		var error="Enter Address";	
		document.getElementById("address_err").innerHTML="Enter Address";
	}	
	else	
	{		
		error="";		
		document.getElementById("address_err").innerHTML="";
	}
	return error;
}
function services_sub_select(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Select Sub Services";
		document.getElementById("services_sub_err").innerHTML="Select Sub Services";
	}		
	else
	{
		error="";	
		document.getElementById("services_sub_err").innerHTML="";	
	}
	return error;
}
function time_select(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Select Time";
		document.getElementById("time_err").innerHTML="Select Time ";
	}		
	else
	{
		error="";	
		document.getElementById("time_err").innerHTML="";	
	}
	return error;
}
function user_payment_mode(str)
{	
	var error="";
	if(str=="")	{	
	var error="Select Payment Mode";
	document.getElementById("payment_mode_err").innerHTML="Select Payment Mode";
	}		
	else
	{
		error="";	
		document.getElementById("payment_mode_err").innerHTML="";	
	}
	return error;
} 
function user_name(str){
	var error="";	
	if(str=="")	
	{	
		var error="Enter Name";	
		document.getElementById("name_err").innerHTML="Enter Name";
	}
	else	
	{	
		error="";	
		document.getElementById("name_err").innerHTML="";
	}
	return error; 
	}
function user_email(str)
{
	var error="";	
	var illegalChars = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;	
	if(str=="")
	{	
		var error="Enter Email";	
		document.getElementById("email_err").innerHTML="Enter Email";
	}		
	else if (!illegalChars.test(str))  
	{	
		error="Enter Valid Email ID";
		document.getElementById("email_err").innerHTML="Enter Valid Email ID"; 
	}
	else
	{
		error="";	
		document.getElementById("email_err").innerHTML="";	
	}
	return error; 
}
function user_pho_no(str)
{
	var error="";	
	var illegalChars = /^[0-9- +]+$/;	
	if(str=="")	
	{	
		var error="Enter phone no";	
		document.getElementById("pho_no_err").innerHTML="Enter Phone No";
	}	
	else if (!illegalChars.test(str)) 
	{	
		error="Enter Number Only";		
		document.getElementById("pho_no_err").innerHTML="Enter Number Only"; 
	}		
	else
	{
		error="";
		document.getElementById("pho_no_err").innerHTML="";
	}
	return error;
}
function user_mob_no(str)
{
	var error="";	
	var illegalChars = /^[0-9- +]+$/;	
	if(str=="")	
	{	
		var error="Enter phone no";	
		document.getElementById("mob_no_err").innerHTML="Enter Mobile No";
	}	
	else if (!illegalChars.test(str)) 
	{	
		error="Enter Number Only";		
		document.getElementById("mob_no_err").innerHTML="Enter Number Only"; 
	}		
	else
	{
		error="";
		document.getElementById("mob_no_err").innerHTML="";
	}
	return error;
}

function user_pwd(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Enter Password";		
		document.getElementById("pwd_err").innerHTML="Enter Password";	
	}	
	else
	{	
		error="";	
		document.getElementById("pwd_err").innerHTML="";	
	}
	return error; 
} 
function select_date(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Select Date";		
		document.getElementById("date_err").innerHTML="Select Date";	
	}	
	else
	{	
		error="";	
		document.getElementById("date_err").innerHTML="";	
	}
	return error; 
} 
function order_signin(str)
{

	var msg="";
	var city_name=document.getElementById("city_name").value;
	var address=document.getElementById("address").value;
	//var city=document.getElementById("city").value;
	var services=document.getElementById("services").value;
	var sub_services=document.getElementById("sub_services").value;
	var price=document.getElementById("price").value;
	var date=document.getElementById("datepicker").value;
	var time=document.getElementById("time").value;
	var req=document.getElementById("req").value;
	var name=document.getElementById("name").value;
	var email_id=document.getElementById("email_id").value;
	var phone_no=document.getElementById("phone_no").value;
	var pwd=document.getElementById("password").value;
	var payment_mode=document.getElementById("payment_mode").value;
	
	
	msg+=city_select(city_name);
	msg+=user_address(address);	
	msg+=select_date(date);	
	msg+=services_select(services);	
	msg+=services_sub_select(sub_services);	
	msg+=time_select(time);
	msg+=user_payment_mode(payment_mode);
	msg+=user_name(name);	
	msg+=user_email(email_id);	
	msg+=user_pho_no(phone_no);
	msg+=user_pwd(pwd);	
	
	if(msg=="") {
	if(str=="add")
	{
		 var url="order_signin_add.php?address="+address+"&city_name="+city_name+"&services="+services+"&sub_services="+sub_services+"&price="+price+"&date="+date+"&time="+time+"&req="+req+"&name="+name+"&email_id="+email_id+"&phone_no="+phone_no+"&pwd="+pwd+"&payment_mode="+payment_mode+"&action="+str;
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim(); 
					//alert(msg);
					if(msg=="Inserted")
					{				
						var msg="Inserted";
						
						window.location="dashboard.php?msg="+msg;				
					}					
					else if(msg=="Exist")
					{
						document.getElementById("pno_err").innerHTML="Phone No already exist";
						//window.location="order.php?msg="+msg;				
					}
					else if(msg=="Invalid City")
					{						
						document.getElementById("city_err").innerHTML="Our service not available to this city";
						//window.location="order.php?msg="+msg;				
					}
					else if(msg=="paypal")
					{						
						window.location="payment.php";				
					}
					
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
	}
		
}	

//Order Sign Up Function Start Here	
function order_signup(str)
{
	var msg="";
	var city_name=document.getElementById("city_name").value;
	var address=document.getElementById("address").value;
	//var city=document.getElementById("city").value;
	var services=document.getElementById("services").value;
	var sub_services=document.getElementById("sub_services").value;
	var price=document.getElementById("price").value;
	var date=document.getElementById("datepicker").value;
	var time=document.getElementById("time").value;
	var req=document.getElementById("req").value;
	var name=document.getElementById("name").value;
	var order_pno=document.getElementById("order_pno").value;
	var payment_mode=document.getElementById("payment_mode").value;
	
	msg+=city_select(city_name);
	msg+=user_address(address);	
	msg+=select_date(date);	
	msg+=services_select(services);	
	msg+=services_sub_select(sub_services);	
	msg+=time_select(time);
	msg+=user_payment_mode(payment_mode);
	msg+=user_name(name);		
	msg+=user_pho_no(order_pno);	
	
	if(msg=="") {
	if(str=="add")
	{
		 var url="postorder_add.php?address="+address+"&name="+name+"&order_pno="+order_pno+"&city_name="+city_name+"&services="+services+"&sub_services="+sub_services+"&price="+price+"&time="+time+"&req="+req+"&order_date="+date+"&payment_mode="+payment_mode+"&action="+str;
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  
					if(msg=="Inserted")
					{				
						var msg="Inserted";						
						window.location="dashboard.php?msg="+msg;				
					}					
					else if(msg=="Invalid")
					{
						document.getElementById("city_err").innerHTML="Our service not available to this city";
						//window.location="postorder.php?msg="+msg;				
					}
					else if(msg=="paypal")
					{						
						window.location="payment.php";				
					}
					else if(msg=="stripe")
					{
						//for stripe payment
						window.location="payment.php";
					}
					
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
	}
		
}	
function select_function(str)
{
	var error="";	
	if(str=="")	
	{	
		var error="Select anyone";	
		document.getElementById("select_err").innerHTML="Select anyone";	
	}	
	else
	{
		error="";	
		document.getElementById("select_err").innerHTML="";	
	}
	return error; 
}
function user_pin_code(str)
{
	var error="";	
	if(str=="")
	{	
		var error="Enter Pin Code";	
		document.getElementById("pin_code_err").innerHTML="Enter Pin Code";	
	}		
	else
	{	
		error="";
		document.getElementById("pin_code_err").innerHTML="";
	}
	return error; 
}
//Profile Edit Code start Here
function edit_profile(str)
{
	
	var msg="";
	var name=document.getElementById("name").value;
	var phone_no=document.getElementById("phone_no").value;
	var city=document.getElementById("city").value;
	var address=document.getElementById("address").value;
	var pin_code=document.getElementById("pin_code").value;
	var gender=document.getElementById("gender").value;
	msg+=user_name(name);	
	msg+=user_pho_no(phone_no);
	msg+=city_select(city);
	msg+=user_address(address);
	msg+=user_pin_code(pin_code);
	msg+=select_function(gender);
	if(msg=="") {
	if(str=="add")
	{
		var url="editpro_add.php?name="+name+"&pno="+phone_no+"&city="+city+"&address="+address+"&pin_code="+pin_code+"&gender="+gender+"&action="+str;
		xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim(); 					
					if(msg=="Updated")
					{				
						var msg="Updated";
						window.location="edit-profile.php?msg="+msg;				
					}		
					else if(msg=="Error")
					{
						window.location="edit-profile.php?msg="+msg;				
					}
					else if(msg=="Exist")
					{
						document.getElementById("pno_err").innerHTML="Phone No Already Exist";
						//window.location="edit-profile.php?msg="+msg;				
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);		
	}
	}	
	
}

//sub services select function
function sub_select(str)
{	
	if(str=="select")
  	{
  		document.getElementById("sub_services").options.length=0;
  		var sel=document.getElementById("sub_services");		
  		sel.options[0]=new Option("Select","select"); 
 	}
   else
   {
   	var services=document.getElementById("services").value;  	
  		get_cour_name1(str,services);
 		get_cour_id1(str,services);
  		var dps_name1=cour1;
  		var dps_id1=cour2; 
  		var dpname1=dps_name1.split("#");
  		var dpid1=dps_id1.split("#"); 
  		document.getElementById("sub_services").options.length=0;
  		var sel=document.getElementById("sub_services");
  		//sel.options[0]=new Option("None","None"); 
  		for(var i=1;i<dpid1.length;i++)
  		{
  			sel.options[i]=new Option(dpname1[i-1],dpid1[i-1]); 
  		}	
   }
}
var cour1="";
function get_cour_name1(str)
{
	var url="services_change.php?type="+'name'+"&sub_id="+str;
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4)
		{
			cour1=xmlHttp.responseText; 
		}
	}
	xmlHttp.open("POST",url,false);	
	xmlHttp.send(null);
}
var cour2="";
function get_cour_id1(str)
{
	var url="services_change.php?type="+'id'+"&sub_id="+str;
	xmlHttp.onreadystatechange=function()
	{
		if (xmlHttp.readyState==4)
		{
			cour2=xmlHttp.responseText; 
		}
	}
		xmlHttp.open("POST",url,false);	
		xmlHttp.send(null);
}
function price_select(str)
{
	var url="price_change.php?studid="+str;
	xmlHttp.onreadystatechange=function()
	 {   
		if(xmlHttp.readyState==4 && xmlHttp.status==200)
  		{
			var msg1=xmlHttp.responseText.trim();
			document.getElementById("price").value=msg1;
		}
	 }
	xmlHttp.open("POST",url,true);
	xmlHttp.send(null);      
}
//Become a cleaner Function Start Here	
function user_cemail(str,str1)
{	 
	var error="";	
	var illegalChars = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(str=="")
	{	
		var error="Enter Confirm Email";	
		document.getElementById("cemail_err").innerHTML="Enter Confirm Email";	
	}	
	else if (!illegalChars.test(str)) 
	{	
		error="Enter Valid Email ID";	
		document.getElementById("cemail_err").innerHTML="Enter Valid Email ID";
	}	
	else	
	{	
		if(str == str1) {
			error="";	
			document.getElementById("cemail_err").innerHTML="";	
		}else{
			error="Email should match with confirm email";	
			document.getElementById("cemail_err").innerHTML="Email should match with confirm email";
		}
	}	
	return error;
}
function user_lname(str)
{	
	var error="";	
	if(str=="")	
	{	
		var error="Enter Last Name";	
		document.getElementById("lname_err").innerHTML="Enter Last Name";
	}		
	else			
	{	
		error="";
		document.getElementById("lname_err").innerHTML="";	
	}
return error;
 } 
 function user_post_code(str)
 {
	 var error="";	
	 if(str=="")
	 {	
		var error="Enter Postal Code";	
		document.getElementById("post_code_err").innerHTML="Enter Postal Code";
	 }
	 else	
	 {	
		error="";	
		document.getElementById("post_code_err").innerHTML="";
	 }
	 return error;
 }  
 function user_exp(str)
 {
	 var error="";	
	 if(str=="")
	 {	
		var error="Select anyone";	
	 document.getElementById("exp_err").innerHTML="Select anyone";	
	 }	
	 else	
	 {	
		 error="";
		 document.getElementById("exp_err").innerHTML="";
	 }
	 return error; 
}
function user_paid_work(str)
	 {	
		var error="";	
		if(str=="")	{	
		var error="Select anyone";	
		document.getElementById("paid_work_err").innerHTML="Select anyone";
		}		
		else
			{		
		error="";	
		document.getElementById("paid_work_err").innerHTML="";	
		}
		return error;
		}
		
		function user_location(str) 
		{	
		var error="";	
		if(str=="")	{	
		var error="Enter Location";	
		document.getElementById("suburb_err").innerHTML="Enter Location";	
		}	
		else
			{	
		error="";	
		document.getElementById("suburb_err").innerHTML="";
		}
		return error; 
		}
		function user_nation(str)
		{
			var error="";	
			if(str=="")	{	
				var error="Enter Nationality";	
				document.getElementById("nation_err").innerHTML="Enter Nationality";	
			}	
			else	
			{	
				error="";	
				document.getElementById("nation_err").innerHTML="";	}return error; 
		} 
		
function cleaner(str)
{
    var msg="";	
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
	var token=document.getElementById("token").value;
	
	var competen=document.getElementById("competen").value;
	var qualifi=document.getElementById("qualifi").value;
	
	var type=document.getElementById("acctType").value;
	
	var buis_name=document.getElementById("buis_name").value;
	var buis_id=document.getElementById("buis_id").value;
	
	var passport=  'tttt';//document.getElementById("passport").value;
	var nat_id=document.getElementById("nat_id").value;
	var res_permit=document.getElementById("res_permit").value;
	
	
	msg+=user_email(email);
	msg+=user_cemail(cemail,email);	
	msg+=user_name(fname);	
	msg+=user_lname(lname);		
	msg+=user_mob_no(mob_no);	
	msg+=user_post_code(post_code);
	msg+=user_exp(exp);
	msg+=user_paid_work(paid_work);	
	msg+=select_function(gender);
	msg+=select_date(dob);	
	msg+=user_nation(nation);	
	msg+=user_address(address);
	msg+=user_location(suburb);	
	
	if(msg=="")	
	{
	if(str=="add")
	{
		var part_url = '';
		if(type == 'company'  || type == 'association') {
		 		var part_url = "&buis_name="+buis_name+"&buis_id="+buis_id;
		}
		 var url="cleaner_add.php?email="+email+"&cemail="+cemail+"&fname="+fname+"&lname="+lname+"&mob_no="+mob_no+"&post_code="+post_code+"&exp="+exp+"&paid_work="+paid_work+"&gender="+gender+"&dob="+dob+"&nation="+nation+"&address="+address+"&suburb="+suburb+"&abt="+abt+"&action="+str+"&token="+token+"&type="+type+part_url+"&passport="+passport+"&nat_id="+nat_id+"&res_permit="+res_permit;
  
 }
	xmlHttp.onreadystatechange=function()
 	        {	 
		 
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
					var msg=xmlHttp.responseText.trim();  
 					if(msg=="Inserted")
					{				
						var msg="Inserted";
						window.location="apply.php?msg="+msg;				
					}
				/*	else if(msg=="EmailExist")
					{
						document.getElementById("email_err").innerHTML="Email address already exist";
						 window.location="apply.php?msg="+msg;				
					}
					else if(msg=="PhoneExist")
					{
						document.getElementById("mob_no_err").innerHTML="Mobile number already exist";
						 window.location="apply.php?msg="+msg;				
					}*/
					else if(msg=="Error")
					{
						window.location="apply.php?msg="+msg;				
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
	}
}	

/*stripe */

async function createaccountstripe(event) {
	event.preventDefault();
  
	const result = await stripe.createToken('account', {
	  legal_entity: {
		first_name: document.getElementById('fname').value,
		last_name: document.getElementById('lname').value,
		
	  },
	  tos_shown_and_accepted: true,
	});
  
	if (result.token) {
	  document.querySelector('#token').value = result.token.id;
	  //myForm.submit();
	  document.getElementById('my-form').submit();
	}
  }



/*  Contact us start here -------------------*/
 function user_msg(str)
 {	
 	var error="";	
	if(str=="")	
	{
		var error="Enter Message";
		document.getElementById("msg_err").innerHTML="Enter Message";
	}		
	else	
	{
		error="";
		document.getElementById("msg_err").innerHTML="";
	}
	return error;
}
function contact(str)
{	
    var msg="";
	var name=document.getElementById("name").value;
	var email=document.getElementById("email").value;
	var pho_no=document.getElementById("pho_no").value;	
	var sv_msg=document.getElementById("msg").value;
	msg+=user_name(name);
	msg+=user_email(email);
	msg+=user_pho_no(pho_no); 
	msg+=user_msg(sv_msg);
	if(msg=="") {
	if(str=="add")
	{
		 var url="contact_add.php?name="+name+"&email="+email+"&pho_no="+pho_no+"&sv_msg="+sv_msg+"&action="+str;
		
	}
	xmlHttp.onreadystatechange=function()
 	        {	   
				if(xmlHttp.readyState==4 && xmlHttp.status==200)
  				{
  					var msg=xmlHttp.responseText.trim();  
					if(msg=="Inserted")
					{	
						var msg="Inserted";
						window.location="contact.php?msg="+msg;				
					}					
					else if(msg=="Error")
					{
						window.location="contact.php?msg="+msg;				
					}
				}
			}
			xmlHttp.open("POST",url,true);
			xmlHttp.send(null);
	}
}	

function city_select(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Select City";
		document.getElementById("city_err").innerHTML="Select City";
	}		
	else
	{
		error="";	
		document.getElementById("city_err").innerHTML="";	
	}
	return error;
} 
function services_select(str)
{	
	var error="";
	if(str=="")
	{	
		var error="Select Services";
		document.getElementById("services_err").innerHTML="Select Services";
	}		
	else
	{
		error="";	
		document.getElementById("services_err").innerHTML="";	
	}
	return error;
}
function booking_function()
{	
	var msg="";
	var city=document.getElementById("City").value;
	var services=document.getElementById("services").value;

	msg+=city_select(city);
	msg+=services_select(services);

	if(msg=="")	
	{	
		document.getElementById("booking_form").submit();	
	}
}
function login_validation()
{		
	var msg="";	
	var name=document.getElementById("name").value;
	var email=document.getElementById("email_id").value;
	var pho_no=document.getElementById("pho_no").value;	
	var pwd=document.getElementById("pwd").value;	
	var address=document.getElementById("address").value;
	var city=document.getElementById("city").value;		
	var pin_code=document.getElementById("pin_code").value;
	var gender=document.getElementById("gender").value;
	msg+=user_name(name);	
	msg+=user_email(email);
	msg+=user_pho_no(pho_no);	
	msg+=user_pwd(pwd);	
	msg+=user_address(address);
	msg+=city_select(city);	
	msg+=user_pin_code(pin_code);	
	
	if(msg=="")
	{	
		document.getElementById("login_form").submit();
	}
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

function callIdentity(){         
	var str = $('#nation').val();
	if(str == 'France' || str == 'FRANCE' || str == 'france' || str == 'fr' || str == 'FR') {
		$('#nat_id_label').show();	
		$('#nat_id').show().attr("required", "required");
		$('#res_permit').hide().removeAttr("required");
		$('#res_permit_label').hide();
	}
	else{
		$('#res_permit_label').show();
		$('#res_permit').show().attr("required", "required");
		$('#nat_id').hide().removeAttr("required");
		$('#nat_id_label').hide();
	}
 }
 
 
function checkSPEmailExist(email){   


 a = window.location.origin;
 
 alert(a + "/rud/users/checkExist.php");      
	  var a;
	  
           
                
      $.ajax({
            method: "POST",
          url: a + "/rud/users/checkExist.php",
            async:false,
            data: { 'action': 'checkEmailalreadyexist','email':email},
            success: function (data) {
                a = data;
            }
        });
        return a;
 }