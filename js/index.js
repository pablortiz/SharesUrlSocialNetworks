var token = "";
$(function() {	
	SHARED = {
		Url : '',		
		FacebookToken :'YOUR-FACEBOOK-TOKEN',		
		getToken: function(facebook, linkedin, pinteres, twitter){
			
			$.ajax({
				url: './getToken.php',
				dataType: "html",
				data: {'url':SHARED.Url},
				success: function(data){
					try{ 					
						token =  data;
						if ($('#chk1').is(':checked')) SHARED.facebook(); 
						if ($('#chk2').is(':checked')) SHARED.linkedin();
						if ($('#chk3').is(':checked')) SHARED.pinteres(); 
						if ($('#chk4').is(':checked')) SHARED.twitter();
					}catch(err){							
						$(".alert-danger").html("Ups! Something has gone wrong.");		
					}
				}
			});
		},
	    facebook: function() {
			$.ajax({
				url: 'https://graph.facebook.com/v2.7/',
				dataType: 'jsonp',
				type: 'GET',
				data: {access_token: SHARED.FacebookToken, id: SHARED.Url },
				success: function(data){
				  try{ 
					SHARED.save('facebook', data.share.share_count);
				  }catch(err){				  
					$('#facebook').html('<img src="./img/facebook.png"> <strong>Bad URL</strong>');
				  }
			   }
			});
		},
		pinteres : function (){
			$.ajax({
				url: 'http://api.pinterest.com/v1/urls/count.json',
				dataType: 'jsonp',
				type: 'GET',
				data: {callback:'shared', url: SHARED.Url },
				success: function(data){
				  try{ 		
					SHARED.save('pinterest', data.count);				  					
				  }catch(err){
					$('#pinterest').html('<img src="./img/pinterest.png"> <strong>&nbsp;Bad URL</strong>');
				  }
			   }
			});			
		},
		linkedin : function (){
			$.ajax({
				url: 'https://www.linkedin.com/countserv/count/share',
				dataType: "jsonp",
				data: {'url':SHARED.Url},
				success: function(data){					
						try{ 	
							SHARED.save('linkedin', data.count);								
						}catch(err){							
							$('#linkedin').html('<img src="./img/linkedin.png"> <strong>&nbsp;Bad URL</strong>');
						}
				}
			});
		},
		twitter : function (){
			$.ajax({
				url: './twitter.php',
				dataType: "html",
				data: {'q':SHARED.Url},
				success: function(data){					
						try{ 
							SHARED.save('twitter', data);								
						}catch(err){							
							$('#twitter').html('<img src="./img/twitter.png"> <strong>&nbsp;Bad URL</strong>');
						}
				}
			});
		},
		save : function (social, count) {
			$.ajax({
				url: './save.php',
				type: 'POST',
				dataType: "html",
				data: {'url':SHARED.Url,'token':token,'social':social,'count':count },
				success: function(data){					
					try{ 					
						SHARED.show(social);
					}catch(err){							
						$(".alert-danger").html("Ups! Something has gone wrong.");		
					}
				}
			});			
		},
		show: function (social) {
			$.ajax({
				url: './show.php',
				type: 'POST',
				dataType: "json",
				data: {'token':token,'social':social},
				success: function(data){					
					try{ 					
						$('#'+social).html("<img src=\"./img/"+social+".png\" />&nbsp;&nbsp;&nbsp;"+data.count+" shares.");							
					}catch(err){							
						$(".alert-danger").html("Ups! Something has gone wrong.");		
					}
				}
			});				
		},
	}
});

jQuery(function($) {
  $('#getShares').submit(function(){
	  	$(".alert-danger").hide();
		$(".alert-danger").html("");
		$("#facebook").html("");
		$("#linkedin").html("");
		$("#pinterest").html("");
		$("#twitter").html("");
		var url = $('#url').val();
		var error ="";
		if ( !url.length  ) {
			error +="<strong>Danger!</strong> You have not write URL.";
		}else if( !isURL(url) ) {
			error +="<strong>Danger!</strong> You have not write correct URL.";	
		}
		if( !$('#chk1').is(':checked')  && !$('#chk2').is(':checked') && !$('#chk3').is(':checked') && !$('#chk4').is(':checked') ) {
			error +="<strong>Danger!</strong> You have not selected any social network.";
		}
		
		if (error.length){
			$(".alert-danger").show();
			$(".alert-danger").html(error);		
		}else{
			if ($('#chk1').is(':checked')) $("#facebook").html("<img src='./img/nbc-ajax-loader.gif' />");	
			if ($('#chk2').is(':checked')) $("#linkedin").html("<img src='./img/nbc-ajax-loader.gif' />");	
			if ($('#chk3').is(':checked')) $("#pinteres").html("<img src='./img/nbc-ajax-loader.gif' />");	
			if ($('#chk4').is(':checked')) $("#twitter").html("<img src='./img/nbc-ajax-loader.gif' />");
			SHARED.Url =   $('#url').val();
			SHARED.getToken();
		}		
		return false;	
  });
 
  function isURL(str) {
	  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
	  '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name and extension
	  '((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
	  '(\\:\\d+)?'+ // port
	  '(\\/[-a-z\\d%@_.~+&:]*)*'+ // path
	  '(\\?[;&a-z\\d%@_.,~+&:=-]*)?'+ // query string
	  '(\\#[-a-z\\d_]*)?$','i'); // fragment locator
	  return pattern.test(str);
  } 
});

$(document).ready(function(e){
	$(".img-check").click(function(){
		$(this).toggleClass("check");
	});
});







